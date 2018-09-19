<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>AMT Data Management</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>public/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>public/css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="/login" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <span style="color:red;"><b><?php echo $login_failed; ?></b></span>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="username" name="username" alue="<?php echo set_value('username'); ?>" class="form-control" placeholder="Email address" required autofocus>
      <?php echo form_error('username');?>
      <label for="password" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
      <?php echo form_error('password');?>
      <div class="checkbox mb-3">
        <label>
           <a href="/register">Register</a>
        </label>
      </div>
      <!--<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>-->
      <input type="submit" name="submit" value="Sign In" class="btn btn-lg btn-primary btn-block" />
    </form>
  </body>
</html>
