<?php
include_once 'header.php';
?>
    <div id="alertMsg" class="alert alert-danger hide" role="alert">
      This is a danger alert—check it out!
    </div>
      <div class="login">

        <h1>Ced Cab signup Page !</h1>
        <form action="" method="POST" id="emailverifydiv">
            
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Email Id</span>
                <input type="email" id="email"name="email" class="form-control" placeholder="@ : "  required>
            </div>
            
            <button type="button" id="submitemail" name="submitemail" class="btn btn-success btnC">SENDOTP</button>
           
            <span class="errors" style="color:red"></span>
        </form>

        <form action="" method="POST" id="emailotpdiv">
            
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Enter OTP</span>
                <input type="text" id="emailotp"name="emailotp" class="form-control" placeholder="@ : "  required>
            </div>
            
            <button type="button" id="emailotpsubmit" name="emailotpsubmit" class="btn btn-success btnC">VERIFY</button>
           
            <span class="errors" style="color:red"></span>
        </form>

        <form action="" method="POST" id="formdiv">
              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Name</span>
                <input type="text" id="uName" name="uName" class="form-control" placeholder="" aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>
            
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Password</span>
                <input type="password" id="password"name="password" class="form-control" placeholder="Enter Password : " aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Mobileno</span>
                <input type="number" id="mobilenumber" name="mobilenumber" class="form-control" placeholder="Enter Phoneno: " aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>
            <button type="button" id="submit" name="submit" class="btn btn-success btnC">Signup</button>
           
            <span class="errors" style="color:red"></span>
        </form>
        <p class="mt-3">New User ? <a href="signUp.php">SignUp</a></p>
      </div>
      
      <?php
      include_once 'footer.php';
      ?>
      