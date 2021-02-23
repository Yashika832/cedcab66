var userName,password;
$(document).ready(function(){
    $("#submit").click(function(){
        // console.log("hello");
        userName = $("#uName").val();
        password = $("#password").val();
        // console.log(userName,password);
        if(userName == " " && password == " "){
            $("#alertMsg").removeClass("hide");
            $("#alertMsg").html("Please Enter Your Email and Password !");
        }
        $.ajax({
            url: 'login.php',
            type: 'POST',
            data : {userName:userName,password:password},
            success:function(data){
                // console.log(data);
                if(data == 1){
                    // console.log(data);
                    // console.log("Valid Admin !");
                    window.location.replace("admin/admin_dashboard.php");
                }
                if(data == 0){
                // console.log(data); 
                    // console.log("Valid User !");
                    window.location.replace("user_dashboard.php");
                }
                else{
                    // console.log(data);
                    // alert("Not Logging");
                    console.log("Invalid User or Password !");
                    $("#alertMsg").removeClass("hide");
                    $("#alertMsg").html("Invalid User or Password !");
                }
            }

        })
    })
})