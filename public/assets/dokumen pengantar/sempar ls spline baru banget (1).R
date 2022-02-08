data <- read_excel("C:/Users/ACER/Downloads/datacfrcgrjatim_fix Ya Allah.xlsx")
data<-as.matrix(data)
mp<-function(data,eps=1e-016)
{
	x<-as.matrix(data)
 	xsvd<-svd(data)
	diago<-xsvd$d[xsvd$d>eps]
	if(length(diago)==1)
	{
	xplus<-as.matrix(xsvd$v[,1])%*%t(as.matrix(xsvd$u[,1])/diago)
	}
	else
  	{
xplus<-xsvd$v[,1:length(diago)]%*%diag(1/diago)%*%t(xsvd$u[,1:length(diago)])
	}
      return(xplus)
}    
quant<-function(t,P)
{
      r<-quantile(t,seq(0,1,by=1/P))
	return (r)
}
trun<-function(prediktor,knot,orde)
{
	prediktor[prediktor<knot]<-knot
	b<-(prediktor-knot)^orde
	return(b)
}
estp<-function(data)
{  
	x<-data[,1]
	y1<-data[,3]
	t<-data[,2]
	a=0.05
	corr<-korelasi(a,data)
	M<-length(y1)
	if(corr<a)
  	{
		cat("terdapat korelasi antara respon 1 dan respon 2 \n\n")
		n<-as.numeric(readline("Inputkan banyak subyek : "))
		d1<-as.numeric(readline("Input orde parametrik respon 1 : "))
		d2<-as.numeric(readline("Input orde parametrik respon 2 : "))
		P<-as.numeric(readline("Input maksimum orde: ") )
		p<-matrix(0,(P*P),2)
		p[,2]<-rep((1:P),P)
		for(i in 1:P)
	{
 		c<-rep(i,P)
		p[((P*(i-1)+1):(P*i)),1]<-c
	}
	print(p)
	t<-data[,2]
	y1<-data[,3]
	M<-length(y1)
	gm<-rep(0,(n+1))
	gm[1]<-0
	jpmn<-rep(0,n)
	for(i in 2:n)
	{
      s<-gm[i-1]+1
      repeat
      {   
      	s<-s+1
      	if(t[s]<t[s-1])break
       	g<-s
	}
       gm[i]<-g
       jpmn [i-1]<-gm[i]-gm[i-1]
       }
	 jpmn [n]<-M-sum(jpmn [1:(n-1)])
       cat("subjek ke-\tjumlah pengamatan\n")
       for(i in 1:n)
       cat(i,"\t\t",jpmn[i], "\n")
       print(jpmn)
       	tbaru<-sort(unique(t))
            pmax<-rep(0,2)
            minimumGCV<-rep(0,(P*P))
            for(m in 1: (P*P))
            {
	cat ("\nORDE respon 1 :",p[m,1],"; ORDE respon 2 :",p[m, 2], "\n")
      cat ("=====================================================\n")
	cat ("KNOT\t\t\t MSE\t\t GCV\n")
      cat ("=====================================================\n")
		y<-c(data[,3],data[,4])
          	w<-quant(tbaru,1+1)
          	MSE<-matrix(0,4,1)
          	GCV<-matrix(0,4,1)
         	v11<-matrix(0,M,(p[m,1]+1))
          	for(s in 1:(p[m,1]+1))
		{
            	v11[,s]<-t^(s-1)
		}
          	v12<-matrix(0,M,(p[m,2]+1))
          	for(s in 1:(p[m,2]+1))
            {
			v12[,s]<-t^(s-1)
            }
		v21<-matrix(0,M,1)
            v22<-matrix(0,M,1)
            for(j in 1:1)
		{
                 v21[,j]<-trun(t,w[j+1],p[m,1])
		}           
		for (j in 1:1)
            {  
			v22[,j]<-trun(t,w[j+1],p[m,2])
		}
            ZA<-cbind(v11,v21)
            ZB<-cbind(v12,v22)
            ZC<-matrix(0,M,(p[m,2]+1+1))
            ZD<-matrix(0,M,(p[m,1]+1+1))
         
            c1<-matrix(0,M,1+d1)
            for (i in 1:d1)
		{
            	c1[,i]<-x^(i-1)
            	c1[,1+1]<-x^(1)
            	
            }
		c2<-matrix(0,M,1+d2)
		for(i in 1:d2)
            {  
			c2[,i]<-x^(i-1)
            	c2[,1+1]<-x^(1)
		}
            c3<-matrix(0,M,1+d2)
            c4<-matrix(0,M,1+d1)
            
		D1<-cbind(c1,ZA[,-1])
		D2<-cbind(c2,ZB[,-1])
		D3<-cbind(c3,ZC[,-1])
		D4<-cbind(c4,ZD[,-1])
		E1<-cbind(D1,D3)
		E2<-cbind(D4,D2)
		C<-rbind(E1,E2)
            omega<-mp(t(C)%*%C)%*%t(C)%*%y
            ytopi=C%*%omega
            A=C%*%mp(t(C)%*%C)%*%t(C)
            MSE[1]<-(t(y-ytopi)%*%(y-ytopi))/(2*M)
            GCV[1]<-MSE[1]/((1/(2*M))%*%(sum(diag(1-A))))^2
            cat(t(w[2:(1+1)]),"\t\t\t",MSE[1],"\t",GCV[1],"\n")
		cat("-----------------------------------------------------\n")
            K=1
            
		repeat
            {      
                K=K+1
                y<-c(data[,3],data[,4])
                w<-quant(tbaru,K+1)
                v11<-matrix(0,M,(p[m,1]+1))
                for(s in 1:(p[m,1]+1))
		    {
                  v11[,s]<-t^(s-1)
                }
                v12<-matrix(0,M,(p[m,2]+1))
                for(s in 1:(p[m,2]+1))
                {  
			v12[,s]<-t^(s-1)
		    }
          	    v21<-matrix(0,M,K)
          	    v22<-matrix(0,M,K)

          	    for(j in 1:K)
                {
		  	v21[,j]<-trun(t,w[j+1],p[m,1])
                }
                for(j in 1:K)
		    {
			v22[,j]<-trun(t,w[j+1],p[m,2])
		    }
                ZA<-cbind(v11,v21)
                ZB<-cbind (v12,v22)
                ZC<-matrix(0,M,(p[m,2]+K+1))
                ZD<-matrix(0,M,(p[m,1]+K+1))
               
                c1<-matrix(0,M,1+d1)
                for(i in 1:d1)
		    {
                c1[,i]<-x^(i-1)
         	    c1[,1+1]<-x^(1)
		    }
                c2<-matrix(0,M,1+d2)
          	    for(i in 1:d2)
		    {
            	c2[,i]<-x^(i-1)
			c2[,1+1]<-x*(1)
  		    }
		    c3<-matrix(0,M,1+d2)
		    c4<-matrix(0,M,1+d1)

		   D1<-cbind(c1,ZA[,-1])
		D2<-cbind(c2,ZB[,-1])
		D3<-cbind(c3,ZC[,-1])
		D4<-cbind(c4,ZD[,-1])
		E1<-cbind(D1,D3)
		E2<-cbind(D4,D2)
		C<-rbind(E1,E2)
		    omega<-mp(t(C)%*%C)%*%t(C)%*%y
		    ytopi=C%*%omega
		    A=round(C%*%mp(t(C)%*%C)%*%t(C),1)
		    MSE[K]<-(t(y-ytopi)%*%(y-ytopi))/(2*M)
		    GCV[K]<-MSE[K]/((1/(2*M))%*%(sum(diag(1-A))))^2
		    if(K==3||K==4){
		      cat(t(w[2:(K+1)]),"\t",MSE[K],"\t",GCV[K],"\n")
		    }else{
		      cat(t(w[2:(K+1)]),"\t\t\t",MSE[K],"\t",GCV[K],"\n")
		    }
		    
		    cat ("-----------------------------------------------------\n")
			if(K==4)break
			}
			for(i in 1:4)
			{
  			if(GCV[i]== min(GCV))
    			g<-GCV[i]
          		minimumGCV[m]<-g
			}}}
          print(minimumGCV)
          for(a in 1: (P*P))
          {  
		if(minimumGCV[a]==min(minimumGCV))
          {
		kecilGCV<-minimumGCV[a]
          	pmax<-a}
	    }
cat("Nilai GCV minimum adalah", kecilGCV, "\n")
cat("dengan orde respon 1:",p[pmax,1], "\n")
cat("dan orde respon 2:",p[pmax,2], "\n")
KO<-as.numeric(readline("Input jumlah knot maksimum: "))
y<-c(data[,3],data[,4])
for (i in 1:KO)
{
	cat("Input titik knot optimum ke-", i)
	w[i]<-as.numeric(readline(" = "))
}
v11<-matrix(0,M,p[pmax,1]+1)
v12<-matrix(0,M,p[pmax,2]+1)
for (i in 1:(p[pmax,1]+1))
{
    v11[,i]<-t^(i-1)
}
for(i in 1:(p[pmax,2]+1))
{ 
	v12[,i]<-t^(i-1)
}
v21<-matrix(0,M,KO)
v22<-matrix(0,M,KO)
for(j in 1:KO)
{  
	v21[,j]<-trun(t,w[j],p[pmax,1])
}
for(j in 1:KO)
{
	v22[,j]<-trun(t,w[j],p[pmax,2])
}
ZA<-cbind(v11,v21)
ZB<-cbind(v12,v22)
print(ZA)
print(ZB)
ZC<-matrix(0,M,(p[pmax,2]+KO+1))
ZD<-matrix(0,M,(p[pmax,1]+KO+1))

c1<-matrix(0,M,1+d1)
for (i in 1:d1)
{
	c1[,i]<-x^(i-1)
      c1[,1+1]<-x^(1)
}
c2<-matrix(0,M,1+d2)
for(i in 1:d2)
{
	c2[,i]<-x^(i-1)
      c2[,1+1]<-x^(1)
}
c3<-matrix(0,M,1+d2)
c4<-matrix(0,M,1+d1)
D1<-cbind(c1,ZA[,-1])
D2<-cbind(c2,ZB[,-1])
D3<-cbind(c3,ZC[,-1])
D4<-cbind(c4,ZD[,-1])
E1<-cbind(D1,D3)
E2<-cbind(D4,D2)
C<-rbind(E1,E2)
omega<-mp(t(C)%*%C)%*%t(C)%*%y
ytopi<-C%*%omega
A=C%*%mp(t(C)%*%C)%*%t(C)
ytopi<-C%*%omega
MSE<-(t(y-ytopi)%*%(y-ytopi))/(2*M)
GCV<-MSE/((1/(2*M))%*%(sum(diag(1-A))))^2
MSE=(t(y-ytopi)%*%(y-ytopi))/length(y)
cat("MSE=", MSE, "\n")
JKT<-t(y-(mean(y)))%*%(y-(mean(y)))
JKG<-t(y-ytopi)%*%(y-ytopi)
RK<-1-(JKG/JKT)
cat("R-square=",RK,"\n")
error<-y-ytopi
ER<-matrix(0,M,3)
ER[,1]<-error[1:M]
ER[,2]<-error[(M+1):(2*M)]
C<-rep(0,(M+1))
c[1]<-0
for (i in 1:n)
{
	c[i+1]<-sum(jpmn[1:i])
	ER[(c[i]+1):c[i+1],3]<-rep(i,jpmn[i])
}
cat("error respon 1\terror respon 2\tsubyek\n")
print(ER)}
