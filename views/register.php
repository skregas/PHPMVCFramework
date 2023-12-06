<?php

/**
 * register view
 * 
 * @author skregas <skregas01@gmail.com>
 * @package app\views
 */

use app\core\form\Form;

?>

<h1>Register!</h1>

<h2>Fill in the form!!</h2>
<h2>Skadoosh!!</h2>

<?php $form =  Form::begin('', 'post')?>
  <?php echo $form->field($model, 'f_name')->setLabel("First Name") ?>
  <?php echo $form->field($model, 'l_name')->setLabel('Last Name') ?>
  <?php echo $form->field($model, 'email')->setLabel('Email')->emailField() ?>
  <?php echo $form->field($model, 'password')->setLabel('Password')->passwordField() ?>
  <?php echo $form->field($model, 'passwd_confirm')->setLabel('Confirm Password')->passwordField() ?>

  <button type="submit" class="btn btn-primary">Submit</button>

<?php echo Form::end()?>
