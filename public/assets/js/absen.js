
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
            '/Peserta/getAbsen',
            (data) => {
                if (data) {
                    if (JSON.stringify(data) == JSON.stringify(globalThis.dataAbsen)) {
                        console.log('same')
                    } else {
                        globalThis.dataAbsen = data
                        $('#start-time').html(data['datang'])
                        $('#end-time').html(data['pulang'])
                        $('#message').html('Anda sudah absen')
                    }
                } else {
                    $('#start-time').html(data['datang'])
                    $('#end-time').html(data['pulang'])
                    $('#message').html('Anda belum absen')
                }
            }
        )
    }, 1000);