<?php
include_once 'header.php';
?>
    <div id="alertMsg" class="alert alert-danger hide" role="alert">
      This is a danger alert—check it out!
    </div>
      <div class="login">

        <h1>Ced Cab Login Page !</h1>
        <form action="" method="POST">
              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Email Id</span>
                <input type="email" id="uName" class="form-control" placeholder="@ : " aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Password</span>
                <input type="password" id="password" class="form-control" placeholder="Enter Password : " aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>
            <button type="button" id="loginsubmit" class="btn btn-success btnC">Login</button>
        </form>
        <p class="mt-3">New User ? <a href="signUp.php">SignUp</a></p>
      </div>
      
      <?php
      include_once 'footer.php';
      ?>
      