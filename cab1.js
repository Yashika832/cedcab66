$(document).ready(function(){
    $("#cabtype").on('change',function(){
       
        if(this.value=="CedMicro"){
            $("#luggage").prop("disabled,true");
            $("#luggage").val('')
            $("#luggage").attr("placeholder","nocost");

        }
        else{
            $("#luggage").prop("disabled,false");
            $("#luggage").attr("placeholder","enterluggage");
        }
        
      
    });
    $("#pickup").on("change",function(){
        $("#drop option").show();

    })
  });
 

 $('#submit').on('click', (e) => {

    e.preventDefault();
    
    if ($('#pickupLocation').val() != "" && $('#dropLocation').val() != "" && $('#cabtype').val()) {
    let pickupLocation = $('#pickupLocation').val();
    let dropLocation = $('#dropLocation').val();
    let cabtype = $('#cabtype').val();
    let luggage = ($('#luggage').val()) == "" ? 0 : $('#luggage').val();
    
    $.ajax({
    type: 'POST',
    url: 'helper.php',
    data: {
    'pickupLocation': pickupLocation,
    'dropLocation': dropLocation,
    'cabtype': cabtype,
    'luggage': luggage,
    'action': 'calculate',
    'subType': 'submit'
    },
    success: function(response) {
    let jsonData = JSON.parse(response);
    
    console.log(response);
    $('#detailsdata').html("<h3>PICKUP LOCATION :" + jsonData.pickuplocation + "</h3><h3>DROP LOCATION :" + jsonData.droplocation + "</h3><h3>CAB TYPE :" + cabtype + "</h3><h3>LUGGAGE :" + luggage + " Kg</h3><h3>FARE :" + jsonData.totalfare + " /-Rs</h3><h3>TOTAL DISTANCE :" + jsonData.totaldistance + "Km</h3>");
    
    
    $('#modalshow').modal('show');
    
    
    },
    error: function(response) {
    $('#detailsdata').html("something went wrong");
    $('#modalshow').modal('show');
    }
    });
    } else {
    alert("Please enter full form");
    }
    });
  
 function showdrop(e) {

 $('select#dropLocation').find('option').each(function() {
     if($(this).val() == e.value) {
  $("#dropLocation option[value=" + e.value + " ]").each(function() {
                $(this).remove();
           });
        }
     });
    }

