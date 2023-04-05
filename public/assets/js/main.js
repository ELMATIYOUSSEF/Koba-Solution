
function openModal(camionId) {
    console.log('im here ')
    $.ajax({
        url: '/camions/edit/' + camionId,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log(data)
            $('#exampleModal1').find('[name="idDriver"]').val(data.idDriver);
            $('#exampleModal1').find('[name="idcamion"]').val(camionId);
            $('#exampleModal1').find('[name="Camion_type"]').val(data.Camion_type);
            $('#exampleModal1').find('[name="Camion_capacity"]').val(data.Camion_capacity);
            $('#exampleModal1').find('[name="Camion_location"]').val(data.Camion_location);
            $('#exampleModal1').find('[name="Camion_status"][value="' + data.Camion_status + '"]').prop('checked', true);
        }
    });
}