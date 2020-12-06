<div class="main-content">
<div class="login-register-block" style="width: 40rem; float:left;">
<h3 style="text-align:center" class="display-4"> Login </h3>
<form action='/blood/login' method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name="email"  type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div>
<?php if (isset($validation)): ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?=$validation->listErrors()?>
              </div>
            </div>
          <?php endif;?>
          </div>
<div>
<?php if (isset($user)): ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?=$user?>
              </div>
            </div>
          <?php endif;?>
          </div>  
          </div>        
<div class="order-now" style="width: 40rem; float:right;">
<div class="register-link">
  <form action='/blood/view/register?form=c' method="POST">
    <h3> Not registered yet ! </h3>
    <button type="submit" class="btn btn-primary register-btn">Register Now as Reciever</button>
    </form>
</div>
<div class="register-link">
  <form action='/blood/view/register?form=r' method="POST">
    <h3> Need Blood Register ! </h3>
    <button type="submit" class="btn btn-primary register-btn">Register Now as Hospital</button>
    </form>
</div>
</div>
<?php

?>
