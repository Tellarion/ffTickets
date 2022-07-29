$(document).ready(function() {
    let genTable = ``
    
    $.ajax({
        url: `api/requests`,
        method: 'GET',
        dataType: 'json',
        data: {},
        beforeSend: function() {
            $('table tbody').html(`<div style="position: absolute;left: 50%; margin-top: 30px;"><div class="spinner-border" role="status"><span class="sr-only"></span></div></div>`)
        },
        error: function(e) {
            console.log(e)
            $('#dmodal .modal-title').html(`Tickets`)
            $('#dmodal .modal-body').html(`${e.responseJSON.message}<p>${e.responseText}</p>`)
            $('#dmodal').modal('show')
        },
        success: function(data) {
            console.log(data)
            for(let i = 0; i < data.length; i++) {
                genTable += `<tr data-click="${data[i].id}">`
                genTable += `<td>${data[i].id}</td><td>${data[i].name}</td><td>${data[i].email}</td><td>${data[i].status}</td><td>${data[i].message}</td><td>${data[i].comment}</td><td>${data[i].timeleft_at}</td><td>${data[i].created_at}</td><td>${data[i].updated_at}</td>`
                genTable += `<tr>`
            }
            $('table tbody').html(genTable)
        }
    })
})