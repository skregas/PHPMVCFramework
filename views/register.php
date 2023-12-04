<?php

/**
 * register view
 * 
 * @author skregas <skregas01@gmail.com>
 * @package app\views
 */

?>

<h1>Register!</h1>

<h2>Fill in the form!!</h2>
<h2>Skadoosh!!</h2>

<form action="" method="post">
  <div class="form-group">
    <label>Email address</label>
    <input type="email" name="email" class="form-control">
  </div>
  <div class="form-group">
    <label>First Name</label>
    <input type="text" name="f_name" class="form-control">
  </div>
  <div class="form-group">
    <label>Last Name</label>
    <input type="text" name="l_name" class="form-control">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control">
  </div>
  <div class="form-group">
    <label>Confirm Password</label>
    <input type="password" name="passwd_confirm" class="form-control">
  </div>
  <!-- <div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea class="form-control" name="message" rows="3"></textarea>
  </div> -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>