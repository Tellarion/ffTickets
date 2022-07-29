$(document).ready(function() {

    var obj = {}

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
            obj = data
            for(let i = 0; i < obj.length; i++) {
                let status = (obj[i].status == 'Active') ? `<span style="color: yellow;">${obj[i].status}</span>` : `<span style="color: green;">${status}</span>`
                let createdAt = new Date(obj[i].created_at).toLocaleString()
                genTable += `<tr data-click="${obj[i].id}">`
                genTable += `<td>${obj[i].id}</td><td>${obj[i].name}</td><td>${obj[i].email}</td><td>${status}</td><td>${obj[i].message}</td><td>${obj[i].comment??"-"}</td><td>${obj[i].timeleft_at == 0 ? "-" : obj[i].timeleft_at}</td><td>${createdAt}</td><td>${obj[i].updated_at == null ? "-" : obj[i].updated_at}</td>`
                genTable += `<tr>`
            }
            $('table tbody').html(genTable)
            $('[data-click]').on('click', function() {
                let getId = $(this).data('click')
                alert(getId)
            })
        }
    })
})