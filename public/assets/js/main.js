
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
function changeRole(ClientId , role) {
    let checkadmin = document.getElementById('adminRadio');
    let userId = document.getElementById('userId');
    let checkclient = document.getElementById('clinetRadio');
    let checkdriver = document.getElementById('driverRadio');
    userId.value=ClientId;
    console.log(ClientId , role)
    if(role=='client'){
        checkclient.setAttribute('checked', 'checked');
    }
    if(role=='admin'){
        checkadmin.setAttribute('checked', 'checked');
    }
    if(role=='driver'){
        checkdriver.setAttribute('checked', 'checked');
    }

}

//  change status for camion 
$(document).ready(function () {
    $('.camion-switch').click(function () {
        let numunavailable ='';
        let numavailable ='';
           numavailable = parseInt( document.getElementById('numavailable').innerText ); 
           numunavailable = parseInt( document.getElementById('numunavailable').innerText); 
        var camionId = $(this).attr('id').replace('customSwitches', '');
        var isChecked = $(this).is(':checked');
        var status = isChecked ? 'available' : 'unavailable';

        console.log(camionId);
        console.log(status);
        let data ={
            'id':camionId,
            'status':status,
        }
        // update the status 
        $.ajax({
            url: 'camions/changestatus',
            type: "POST",
            data,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                console.log(response);
                if( response.bol){
                    document.getElementById('numavailable').innerText = numavailable + 1 ;
                    document.getElementById('numunavailable').innerText = numunavailable - 1 ;
                }
                if( response.bol == false) {
                    document.getElementById('numavailable').innerText = numavailable - 1 ;
                    document.getElementById('numunavailable').innerText = numunavailable + 1 ;
                }
            },
            error: function (xhr) {
              console.error(xhr.responseText);
                // console.log('hi form error');
            }
        });
    });
});


//  change status for mycamion 
function SWITCH(id){
    var isChecked = $(this).is(':checked');
    var status = isChecked ? 'available' : 'unavailable';
console.log(id , status );

let data ={
    'id':id,
    'status':status,
}
// update the status for my camion 
$.ajax({
    url: 'camions/changestatus',
    type: "POST",
    data,
    headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function (response) {
        console.log(response);
    },
    error: function (xhr) {
      console.error(xhr.responseText);
    }
});

}



// remplire my camion 
function Remplire(id){

    let data ={
        'id':id
    }
   
    $.ajax({
        url: 'camions/Remplire',
        type: "POST",
        data,
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            console.log(response);
            if(response.success){
                $('#Capacitydisponible').text(response.capacity);
            }
        },
        error: function (xhr) {
          console.error(xhr.responseText);
        }
    });

}


// remove alert of success
  function removeAlert() {
    setTimeout(function() {
      var errorElement = document.querySelector('.flash-error');
      if (errorElement) {
        errorElement.parentNode.removeChild(errorElement);
      }
      var successElement = document.querySelector('.flash-success');
      if (successElement) {
        successElement.parentNode.removeChild(successElement);
      }
    }, 5000);
  }
  
  window.addEventListener('load', function() {
    removeAlert();
  });

  function changeStatusOrder( idOrder, status ){
    let pendingRadio = document.getElementById('pendingRadio');
    let orderId = document.getElementById('orderId');
    let progressRadio = document.getElementById('progressRadio');
    let deliveredRadio = document.getElementById('deliveredRadio');
    orderId.value = idOrder ;
    if(status=='pending'){
        pendingRadio.setAttribute('checked', 'checked');
    }
    if(status=='progress'){
        progressRadio.setAttribute('checked', 'checked');
    }
    if(status=='delivered'){
        deliveredRadio.setAttribute('checked', 'checked');
    }

  }