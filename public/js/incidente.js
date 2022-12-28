// $('#EditIncidenteModal').on('show.bs.modal', function (event) {
//     $("#EditIncidenteModal input").val("");
//     $("#EditIncidenteModal textarea").val("");
//     $("#EditIncidenteModal select").val("");
//     $("#EditIncidenteModal input[type='checkbox']").prop('checked', false).change();
// });


$(document).on('click', '.edit-incidente', function (event) {
    // var id_incidente = button.data('id');
    // var id_incidente = $(this).attr("data-id");
    var id_incidente = $(this).attr("id_incidente");


    $('#EditIncidenteModal').appendTo('body').modal('show');
    $('#incidente_id').val(id_incidente);
    // $("#id_incidente").html(id_incidente);
    // console.log(id_incidente);
});


$(document).on('submit', '#editIncidenteForm', function (event) {
    
    event.preventDefault();
    
    let id_incidente = $('#incidente_id').val();
    let solucion = $('#solucion').val();
    let duracion = $('#duracion').val();

    var datos = new FormData();  //clase formdata de javascript
    datos.append("id_incidente", id_incidente);
    datos.append("solucion", solucion);
    datos.append("duracion", duracion);

    console.log(id_incidente);
    console.log(solucion);
    console.log(duracion);

    $.ajax({
        url:   "ajax/ajax.incidentes.php",
        type: 'get',
        data: id_incidente,
        processData: false,
        contentType: false,
        success: function success(result) {
            if (result.success) {
                $('#EditProfileModal').modal('hide');
                setTimeout(function () {
                    location.reload();
                }, 1500);
            }
        },
        error: function error(result) {
            console.log(result);
        },
        complete: function complete() {
            // loadingButton.button('reset');
        }
    });
});
