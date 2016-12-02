<!DOCTYPE html>
<html lang="en">
<head>
<title>My website </title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet"  href="css/bootstrap.css"></style>
<!--<link rel="stylesheet"  href="css/bootstrap-tagsinput.css"></style>-->

</head>
<?php session_start(); //print_r($_SESSION); ?>
<div class="container">

        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
             
              <?php  if(isset($_SESSION['user_email'])){?>
              <li><a href="#" id="over" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover"><span class="glyphicon glyphicon-bell" id="logIcon"></span></a></li>
              
               <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href=""><?php echo $_SESSION['first_name'] ?> <b class="caret"></b></a>

                    <ul role="menu" class="dropdown-menu">
                        <li><a href="next_step.php">Edit profile</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
             <?php }else{ ?>
              <li class="active"><a href="login.php">Login<span class="sr-only">(current)</span></a></li>
              <li><a href="register.php">Register</a></li>
              <?php }?>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      

