<?php

/**
 * Contact view
 * 
 * @author skregas <skregas01@gmail.com>
 * @package app\views
 */

?>

<h1>Contact Us!</h1>

<h2>Fill in the form!!</h2>
<h2>Skadoosh!!</h2>

<form action="" method="post">
  <div class="form-group">
    <label>Email address</label>
    <input type="email" name="email" class="form-control">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Subject</label>
    <input type="text" name="subject" class="form-control">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea class="form-control" name="message" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>