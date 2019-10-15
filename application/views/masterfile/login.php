<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>CHECK VOUCHER FORM</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href='<?php echo base_url(); ?>assets/css/googleapis.css' rel='stylesheet' type='text/css'>

    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="<?php echo base_url(); ?>assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/data-table/bootstrap-editable.css"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href='<?php echo base_url(); ?>assets/css/googleapis.css' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>assets/css/themify-icons.css" rel="stylesheet">

</head> 
<style type="text/css">
  html, body{
            background: #f1eee3!important;/*2d2c2c , f4f3ef*/
            font-size:12px!important;
        }
  h2 {
  font-weight: 300;
  text-align: center;
  font: 200 30px Arial;
  }

  p {
    position: relative;
  }

  a,
  a:link,
  a:visited,
  a:active {
    color: #3ca9e2;
    transition: all 0.2s ease;
  }
  a:focus, a:hover,
  a:link:focus,
  a:link:hover,
  a:visited:focus,
  a:visited:hover,
  a:active:focus,
  a:active:hover {
    color: #329dd5;
    transition: all 0.2s ease;
  }

  #login-form-wrap {
    background-color: #fff;
    width: 35%;
    margin: 30px auto;
    text-align: center;
    padding: 20px 0 0 0;
    border-radius: 4px;
    box-shadow: 0px 30px 50px 0px rgba(0, 0, 0, 0.2);
  }

  #login-form {
    padding: 0 60px;
  }

  input {
    display: block;
    box-sizing: border-box;
    width: 100%;
    outline: none;
    height: 60px;
    line-height: 60px;
    border-radius: 4px;
  }

  input[type="text"],
  input[type="password"] {
    width: 100%;
    padding: 0 0 0 10px;
    margin: 0;
    color: #8a8b8e;
    border: 1px solid #c2c0ca;
    font-style: normal;
    font-size: 16px;
    -webkit-appearance: none;
       -moz-appearance: none;
            appearance: none;
    position: relative;
    display: inline-block;
    background: none;
  }
  input[type="text"]:focus,
  input[type="password"]:focus {
    border-color: #3ca9e2;
  }
  input[type="text"]:focus:invalid,
  input[type="password"]:focus:invalid {
    color: #cc1e2b;
    border-color: #cc1e2b;
  }
  input[type="text"]:valid ~ .validation,
  input[type="password"]:valid ~ .validation {
    display: block;
    border-color: #0C0;
  }
  input[type="text"]:valid ~ .validation span,
  input[type="password"]:valid ~ .validation span {
    background: #0C0;
    position: absolute;
    border-radius: 6px;
  }
  input[type="text"]:valid ~ .validation span:first-child,
  input[type="password"]:valid ~ .validation span:first-child {
    top: 30px;
    left: 14px;
    width: 20px;
    height: 3px;
    -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
  }
  input[type="text"]:valid ~ .validation span:last-child,
  input[type="password"]:valid ~ .validation span:last-child {
    top: 35px;
    left: 8px;
    width: 11px;
    height: 3px;
    -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
  }

  .validation {
    display: none;
    position: absolute;
    content: " ";
    height: 60px;
    width: 30px;
    right: 15px;
    top: 0px;
  }

  input[type="submit"] {
    border: none;
    display: block;
    background-color: #3ca9e2;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 18px;
    position: relative;
    display: inline-block;
    cursor: pointer;
    text-align: center;
  }
  input[type="submit"]:hover {
    background-color: #329dd5;
    transition: all 0.2s ease;
  }

  #create-account-wrap {
    background-color: #eeedf1;
    color: #8a8b8e;
    font-size: 14px;
    width: 100%;
    padding: 10px 0;
    border-radius: 0 0 4px 4px;
  }
  .alert-shake {
    -webkit-animation-name: spaceboots;
    -webkit-animation-duration: 0.8s;
    -webkit-transform-origin: 50% 50%;
    -webkit-animation-iteration-count: 1;
    -webkit-animation-timing-function: linear;
}
.alert-danger {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
}
.alert {
    font: 200 14px Arial;
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
        border-top-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-left-color: transparent;
    border-radius: 4px;
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

</style>

<br><br><br>
<div id="login-form-wrap">
    <h2>Login</h2>
    <?php
        $error_msg= $this->session->flashdata('error_msg');  
        ?>
        <?php 
            if($error_msg){
        ?>
        <div class="alert alert-danger alert-shake">
          <center><?php echo $error_msg; ?></center>                    
        </div>
    <?php } ?>
    <form id="login-form" method = "POST" action="<?php echo base_url(); ?>index.php/masterfile/login">
    <p>
    <input type="text" id="username" name="username" placeholder="Username" required><!-- <i class="validation"><span></span><span></span></i> -->
    </p>
    <p>
    <input type="password" id="password" name="password" placeholder="Password" required><!-- <i class="validation"><span></span><span></span></i> -->
    </p>
    <p>
    <input type="submit" id="login" value="Login">
    <br>
    <br>
    </p>
    </form>
<div id="create-account-wrap">

</div>
</div>