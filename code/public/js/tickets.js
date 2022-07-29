const API_URL = "api/"

$(document).ready(function() {
    $.ajax({
        url: `${API_URL}requests`,
        method: 'POST',
        dataType: 'json',
        data: {name: $('#name').val(), message: $('#message').text()},
        error: function(e) {
            $('#dmodal .modal-title').html(`Tickets`)
            $('#dmodal .modal-body').html(e.responseJSON.message)
            $('#dmodal').modal('show')
        },
        success: function(data) {
            console.log(data)
        }
    })
})