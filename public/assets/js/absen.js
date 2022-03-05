
    $('#absen').click(() => {
        $.post(
            '/Peserta/addAbsen',
            (data) => {
                console.log(data)
            }
        )
    })

    dataAbsen = {}
    setInterval(() => {
        $.get(
            '/Peserta/getAbsen' , 
            (data) => {
                if(data){
                    if(JSON.stringify(data) == JSON.stringify(globalThis.dataAbsen)){
                        return;
                    }else{
                        globalThis.dataAbsen = data
                        $('#start-time').html(data['datang'])
                        $('#end-time').html(data['pulang'])

                        pagi = isbeetweentwotime('00:00:00', '16:00:00')
                        if(pagi){
                            if(data.datang=="00:00:00"){
                                $('#message').html("anda belum absen pagi")
                            }else{
                                $('#message').html("anda sudah absen pagi")
                            }
                        }else{
                            if(data.pulang=="00:00:00"){
                                $('#message').html("anda belum absen sore")
                            }else{
                                $('#message').html("anda sudah absen sore")
                            }
                        }
                    }
                }else{
                        $('#start-time').html(data['datang'])
                        $('#end-time').html(data['pulang'])
                        $('#message').html('Anda belum absen')
                }
            }
        )
    }, 1000);