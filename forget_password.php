<?php
require_once("connection.php");
?>
<html>
<head>
<?php
include_once("link.php");
?>
<link rel="stylesheet" href="forget-password.css">
</head>

    <body>
      <div class="circle"></div>
      <div class="circle1"></div>
        <div class='container-fluid fp-main'>
          <div class="fp-internal">
            <div class="col container">
						<form id='registration-form2' class='form-horizontal'
            action='data.php' method='post' role='form'>
<?php
			$cnt_array=array(
			   array("Email Id","text","")
		 );
		 $c=0;
		 $title_value='Find User';
     if(isset($_REQUEST['c']))
		 {
			 if(isset($_REQUEST['id']))
			 $id=$_REQUEST['id'];
 	     $c=$_REQUEST['c'];
       if($c==3)
				{
          echo "Password Updated";
				}
				else if($c==0)
				{
          echo "User not found";
				}
				else if($c==1||$c==-1)
				{
					$title_value='Verify OTP';
          if($c==-1)
          {
						echo "OTP MISS MATCH";
          }
          $cnt_array=array(
               array("Enter OTP","text",""),
			   		   array("id","hidden","$id")
				       );
          }
          else if($c==2)
				  {
					       $cnt_array=array(
			           array("Enter New Password","password",""),
			           array("Retype New Password","password","")
		              );
		 		 	$title_value='Reset Password';
        }
			}
		for($i=0;$i<count($cnt_array);$i++)
		{

	$label_name=$cnt_array[$i][0];
	$cnt_type=$cnt_array[$i][1];
	$value=$cnt_array[$i][2];
?>
  <div class='form-group'>
    <?php
  if($cnt_type!="hidden")
      echo "<label class='form-label mb-2'>$label_name</label>";
	$label_name=str_replace(" ","_",$label_name);
	$label_name="cnt_".$i;
	//echo "cnt_name=$label_name";
		if($cnt_type=="hidden")
		echo "<input type='$cnt_type' name='$label_name' value='$value' class='mb-2'/>";
	   else if($cnt_type=="text"||$cnt_type=="password"||$cnt_type=="file")
		echo "<input type='$cnt_type' name='$label_name' class=' form-control mb-3' required/>";
		else if($cnt_type=="select")
		{
			echo "<select name='$label_name' class='form-control'>";
			$select_option_value_list=$cnt_array[$i][2];
			$temp=explode("/",$select_option_value_list);
			for($j=0;$j<count($temp);$j++)
			echo "<option value='$temp[$j]'>$temp[$j]</option>";
			echo "</select>";
		}
		else if($cnt_type=="radio"|| $cnt_type=="checkbox")
		{

			$status="";
			echo "<div class='form-check'>";
			if($cnt_type=="checkbox")
			{						$label_name .="[]";
			}else
				$status="checked";

			$option_value_list=$cnt_array[$i][2];
			$temp=explode("/",$option_value_list);
			for($j=0;$j<count($temp);$j++)
			echo "

		<input type='$cnt_type' name='$label_name' $status class='form-check-input' value='$temp[$j]'/>
				<label class='form-check-label' for='flexCheckDefault'>$temp[$j]  &nbsp;&nbsp;</label>
		";
			echo "</div>";
		}
	   else if($cnt_type=="textarea")
		echo "<textarea name='$label_name' class='form-control' rows=5 cols=10 required></textarea>";



      echo "
    </div>";
		}

	echo "<div class='form-group '>
      <div class='col-md-8 col-md-offset-3'>
       <input type='submit' name='forget' class='btn' value='$title_value' />
      </div>
    </div>";
		   $len=count($cnt_array);
		echo "<input type='hidden' name='max_cnt_num' value='$len'/>";
		echo "<input type='hidden' name='case' value='$c'/>";

?>

</form>
</div>
<div class="col container">
  <img src="fp.png" alt="">
</div>
</div>


</html>
