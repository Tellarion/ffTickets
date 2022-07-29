$(document).ready(function() {

    var obj = {}

    let genTable = ``
    let selId = -1
    
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
                let status = (obj[i].status == 'Active') ? `<span style="color: yellow;">${obj[i].status}</span>` : `<span style="color: green;">${obj[i].status}</span>`
                let createdAt = new Date(obj[i].created_at).toLocaleString()
                let updatedAt = new Date(obj[i].updated_at).toLocaleString()??`-`
                genTable += `<tr data-click="${i}">`
                genTable += `<td>${obj[i].id}</td><td>${obj[i].name}</td><td>${obj[i].email}</td><td>${status}</td><td>${obj[i].message}</td><td>${obj[i].comment??"-"}</td><td>${obj[i].timeleft_at == 0 ? "-" : obj[i].timeleft_at} sec</td><td>${createdAt}</td><td>${updatedAt}</td>`
                genTable += `<tr>`
            }
            $('table tbody').html(genTable)
            $('[data-click]').on('click', function() {
                let getId = $(this).data('click')
                selId = getId
                $('#dmodal .modal-title').html(`Ticket #${obj[getId].id} by ${obj[getId].name}`)
                $('#dmodal .modal-body').html(`
                    <form>
                        <div class="mb-3">
                            <p>${obj[getId].message}</p>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" id="message" rows="3"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary mb-3" id="ans">Give answer</button>
                    </form>
                `)
                $('#dmodal').modal('show')
                $('#ans').on('click', function() {
                    console.log('test')
                    $.ajax({
                        url: `api/requests/${obj[selId].id}`,
                        method: 'PUT',
                        dataType: 'json',
                        data: {comment: $('#message').val()},
                        error: function(e) {
                            $('#dmodal .modal-title').html(`Ticket #${obj[selId].id} by ${obj[selId].name}`)
                            $('#dmodal .modal-body').html(`${e.responseJSON.message}<p>${e.responseText}</p>`)
                            $('#dmodal').modal('show')
                        },
                        success: function(data) {
                            console.log(data)
                            $('#dmodal .modal-title').html(`Ticket #${obj[selId].id} by ${obj[selId].name}`)
                            $('#dmodal .modal-body').html(`Message sent on E-mail successefuly`)
                            $('#dmodal').modal('show')
                        }
                    })
                })
            })
        }
    })
})