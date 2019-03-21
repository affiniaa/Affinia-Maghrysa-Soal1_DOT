<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Register</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container" style="margin-top: 100px;">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-body">

             
              

              <legend>Register Your Account</legend>
              <form action="<?php echo site_url('pengguna/tambah') ?>" method="post">
                <div class="form-group">
                  <?php
                    echo form_label('Fullname', 'fullname');
                  ?>
                    <input type="text" name="nama_kasir" class="form-control" placeholder="fullname">
                </div>
                <div class="form-group">
                  <?php
                    echo form_label('Username', 'username');
                    ?>
                  <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Password', 'password');
                    ?>
                  <input type="text" name="password" class="form-control" placeholder="Kata Sandi">
            
                </div>
               
                 <input type="submit" name="submit" class="btn btn-primary" value="Register">

                <a href="<?php echo site_url('login') ?>" class="btn btn-link">Sign in</a>
            

            </div>
          </div>
        </div>
        <div class="col-md-4"></div>  
        </div>
        
      </div>
      
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  </body>
</html>