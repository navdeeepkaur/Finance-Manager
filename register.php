<?php
require_once("connection.php");
require_once("confic.php");
include_once("link.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="login+register.css">
  </head>
  <body>
    <div class=container-fluid>
    <nav class='navbar navb-register'>
      <a class='bt' href='contact.php'>CONTACT US</a>
      <a class='bt' href='login.php'>LOGIN</a>
    </nav>
  </div>
    <div class="container-fluid cont">
    <div class="row main-cont container-fluid">
      <div class="circle-register"></div>
      <div class="circle1-register"></div>
      <div class="col container">
        <img src="login.png" class="img-fluid" alt="Responsive image">
      </div>
      <div class="col container">
        <?php

         ?>
        <form id='registration-form2' class='form-horizontal' action='data.php' method='post' role='form'>
          <div class="container form-cont">
          <?php
          $cnt_array=array(
          array("Username","text"),
          array("Password","password"),
          array("Email Id","text")
          );

          for($i=0;$i<count($cnt_array);$i++)
          {
            $label_name=$cnt_array[$i][0];
            $cnt_type=$cnt_array[$i][1];
          echo " <div class='mb-3'>
                  <label class='form-label'>$label_name</label>";
          $label_name=str_replace(" ","_",$label_name);
          $label_name="cnt_".$i;
          if($cnt_type=="text"||$cnt_type=="password"||$cnt_type=="file")
          echo "<input type='$cnt_type' name='$label_name' class='form-control' required />";
          echo "</div>";
          }
          $len=count($cnt_array);
   		     echo "<input type='hidden' name='max_cnt_num' value='$len'/>";
?>
          <!--<div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input class="form-control" id="password"></input>
          </div>-->
            <div class="mb-3">
            <input type="submit" value="Register" name='newuser' class="btn btn-primary w-100 text-center"></input>
            <div class="mb-3 no-account" ><a href='login.php'>Already have an account?</a></div>
          </div>
            </div>
        </form>
      </div>
      </div>
    </div>
  </body>
</html>
