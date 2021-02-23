$(document).ready(function (){
    getDropdown();
    $('#emailotpdiv').hide();
    $('#formdiv').hide();
});



$('#submitemail').on('click', () => {

    if ($('#email').val() == "") {
    $('.errors').text(" * Enter Email");
    
    } else {
    
    let cedemail = $('#email').val();
    
    $.ajax({
    url: 'helper.php',
    type: 'POST',
    data: {
    
    'cedemail': cedemail,
    'action': 'emailcheck'
    },
    success: (response) => {
    if (response == 1) {
    $('#emailverifydiv').hide();
    $('#emailotpdiv').show();
   
    } else {
    alert("Email Already Exists!!")
    }
    },
    error: (response) => {
    alert(response);
    }
    });
    
    }
    });
    
    //JS for Email OTP
    $('#emailotpsubmit').on('click', () => {
    
    if ($('#emailotp').val() == "") {
    $('.errors').text(" * Enter OTP");
    
    } else {
    
    let cedemailotp = $('#emailotp').val();
    
    $.ajax({
    url: 'helper.php',
    type: 'POST',
    data: {
    
    'cedemailotp': cedemailotp,
    'action': 'emailcheckotp'
    },
    success: (response) => {
    if (response == 1) {
    $('#emailotpdiv').hide();
    $('#formdiv').show();
  
    } else {
    alert("Wrong OTP!!")
    }
    },
    error: (response) => {
    alert(response);
    }
    });
    
    }
    });

$('#submit').on('click', () => {

     
     if ($('#uName').val() == "") {
        $('.errors').text(" * Enter Username");
        
        } else
        
        if ($('#password').val() == "") {
        
        $('.errors').text(" * Enter Password");
        
        }  else
        if ($('#mobilenumber').val() == "") {
        
        $('.errors').text(" * Enter Mobile Number");
        
        } else {
    let cedname = $('#uName').val();
    let cedpassword = $('#password').val();
    let cedmobile = $('#mobilenumber').val();
   
    
    
    
    $.ajax({
    url: 'helper.php',
    type: 'POST',
    data: {
    'cedname': cedname,
    'cedpassword': cedpassword,
    'cedmobile': cedmobile,
    'action': 'insert'
    },
    success: (response) => {
    alert(response);
    },
    error: (response) => {
    console.log(response);
    }
    });
}
    });
    
    
    
    $('#reset').on('click', () => {
    $('#uName').val('');
    $('#password').val('');
    $('#email').val('');
    $('#mobilenumber').val('');
    });

 ////gytytyt
 
 
$('#loginsubmit').on('click', () => {

    if ($('#uName').val() == "") {
    $('.errors').text(" * Enter Username");
    
    } else
    
    if ($('#password').val() == "") {
    
    $('.errors').text(" * Enter Password");
    
    } else {
    
    
    let cedpassword = $('#password').val();
    let cedemail = $('#uName').val();
    
    $.ajax({
    url: 'helper.php',
    type: 'POST',
    data: {
    'cedpassword': cedpassword,
    'cedemail': cedemail,
    'action': 'logincheck'
    },
    success: (flag) => {
    
    switch (flag) {
    case '1':
    console.log('this is admin');
    window.location.href = "admin";
    break;
    
    case '0':
    console.log('this is active customer');
    window.location.href = "user";
    break;
    
    case '-1':
    console.log('this is blocked customer');
    break;
    
    case '-2':
    console.log('this is worng credentials');
    break;
    
    default:
    console.log('somthing went wrong' + flag);
    break;
    }
    },
    error: (response) => {
    alert(response);
    }
    });
    
    }
    });
    //fair calculation

function getDropdown() {
    $.ajax({
    url: 'helper.php',
    type: 'POST',
    data: {
    
    'action': 'getDropdown'
    },
    success: (response) => {
        console.log(response);
    let datarespond = JSON.parse(response);
   
    if (datarespond != 0) {
    
    for (let i = 0; i < datarespond.length; i++) {
    
    $('#pickupLocation')
    .append($("<option></option>")
    .attr("value", datarespond[i]['distance'])
    .text(datarespond[i]['name']));
    
    $('#dropLocation')
    .append($("<option></option>")
    .attr("value", datarespond[i]['distance'])
    .text(datarespond[i]['name']));
    
    }
    
    
    
    } else {
    alert("something is wrong");
    }
    },
    error: (response) => {
    
    alert(response);
    }
    });
    }
    
    function showdrop(e) {
    
    $('select#dropLocation').find('option').each(function() {
    if ($(this).val() == e.value) {
    $("#dropLocation option[value=" + e.value + "]").each(function() {
    $(this).remove();
    });
    }
    });
    
    }
    
    
    $('#calsubmit').on('click', (e) => {
    
    let pickupLocation = $('#pickupLocation').val();
    let dropLocation = $('#dropLocation').val();
    let cabtype = $('#cabtype').val();
    let luggage = $('#luggage').val();
    
    if ($('#pickupLocation').val() == "") {
    $('.errors').text(" * Select Pickup");
    
    } else
    if ($('#dropLocation').val() == "") {
    $('.errors').text(" * Select Drop");
    
    } else
    if ($('#cabtype').val() == "") {
    $('.errors').text(" * Select Cabtype");
    
    } else {
    
    $('.errors').remove();
    $.ajax({
    url: 'helper.php',
    type: 'POST',
    data: {
    'pickupLocation': pickupLocation,
    'dropLocation': dropLocation,
    'cabtype': cabtype,
    'luggage': luggage,
    'action': 'calculate'
    },
    success: (response) => {
    let jsonData = JSON.parse(response);
   
$('#detailsdata').html("<h3>PICKUP LOCATION :" + jsonData.fromLocation + "</h3><h3>DROP LOCATION :" + jsonData.toLocation + "</h3><h3>CAB TYPE :" + cabtype + "</h3><h3>LUGGAGE :" + luggage + " Kg</h3><h3>FARE :" + jsonData.totalfare + " /-Rs</h3><h3>TOTAL DISTANCE :" + jsonData.totaldistance + "Km</h3>");

$('#modalshow').modal('show');
    
    
    },
    error: function(response) {
    $('#detailsdata').html("something went wrong");
    $('#modalshow').modal('show');
    }
    });
    }
    
    });