$(document).ready(function() {
    $('#sendTicket').on('click', function() {
        $.ajax({
            url: `api/requests`,
            method: 'POST',
            dataType: 'json',
            data: {name: $('#name').val(), email: $('#email').val(), message: $('#message').val()},
            error: function(e) {
                console.log(e)
                $('#dmodal .modal-title').html(`Tickets`)
                $('#dmodal .modal-body').html(`${e.responseJSON.message}<p>${e.responseText}</p>`)
                $('#dmodal').modal('show')
            },
            success: function(data) {
                console.log(data)
                $('#dmodal .modal-title').html(`Tickets`)
                $('#dmodal .modal-body').html(`Message sent successfully`)
                $('#dmodal').modal('show')
            }
        })
    })
})