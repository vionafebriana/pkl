$('#pendaftarbaru').click((e) => {
    $('#pendaftartab').css('display', 'block')
    $('#aktivitastab').css('display', 'none')
    $('#aktiftab').css('display', 'none')
})
$('#aktivitasbaru').click((e) => {
    $('#pendaftartab').css('display', 'none')
    $('#aktivitastab').css('display', 'block')
    $('#aktiftab').css('display', 'none')
})
$('#pesaktif').click((e) => {
    $('#pendaftartab').css('display', 'none')
    $('#aktivitastab').css('display', 'none')
    $('#aktiftab').css('display', 'block')
})