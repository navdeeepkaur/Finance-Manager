<?php
require_once("connection.php");
if(isset($_POST['forget']))
{
	$c=$_POST['case'];
	if($c==0)
	{
		$user_id=$_POST['cnt_0'];
		$userid="";
		$sql="select id,name,email,password from `users` where  email='$user_id'";
		$_SESSION['userid']=$user_id;
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if($num==1)
		{
			$user_info= mysqli_fetch_row($query);
			$otp=rand(1111,9999);
			$sql="update users set otp=$otp  where id=$user_info[0]";
			$que=mysqli_query($con,$sql);
			header("Location:forget_password.php?id=$user_info[0]&c=1");
		}
    else
			header("Location:forget_password.php?c=0");
		}
	else if($c==1||$c==-1)
  {
		echo "case1";
		$user_otp=$_POST['cnt_0'];
		$id=$_POST['cnt_1'];
		$_SESSION['id']=$id;
		echo $id;
		echo "user otp=$user_otp";
		$sql="select * from  `users` where id=$id and otp=$user_otp";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		echo $num;
		if($num==1)
		header("Location:forget_password.php?c=2");
		else
		header("Location:forget_password.php?id=$id&c=-1");
	}
  else if($c==2)
	{
		$newpassword=$_POST['cnt_0'];
		$recheckpassword=$_POST['cnt_1'];
		$id=$_SESSION['id'];
		if($newpassword==$recheckpassword)
		{
			$newpassword=base64_encode($newpassword);
			$sql="update `users` set password='$newpassword' where id=$id";
			if(mysqli_query($con,$sql))
				header("Location:login.php");
			else
				save_error($sql);
		}
   }
}
else if(isset($_POST['submit-form']))
{
 	$max_cnt_num=$_POST['max_cnt_num'];
	$array=array();
	$sql_value_list="";
	$id=$_SESSION['login_id'];
	for($i=0;$i<$max_cnt_num;$i++)
	{
		$cnt_name="cnt_".$i;
		$array[$i]=$_POST[$cnt_name];
		$sql_value_list .="'".$array[$i]."'";
		if($i<$max_cnt_num)
    $sql_value_list .=",";
	}
	$sql_value_list .="'".$id."'";
	$sql="INSERT INTO `dashboard` (`date`,`amount`,`category`,`email`) values($sql_value_list)";
	if(mysqli_query($con,$sql))
	{
		echo "saved";
		$id=mysqli_insert_id($con);
		header("Location:dashboard.php?id=$id");
	}
	else
	{
		save_error($sql);
	}
}
else if(isset($_POST['login']))
{
	$user_id=$_POST['cnt_0'];
	$user_password=$_POST['cnt_1'];
	$sql="select id,name,password,email from users where email='$user_id'";
	$query=mysqli_query($con,$sql);
	$num=mysqli_num_rows($query);
	if($num==1)
	{
		$user_info=mysqli_fetch_row($query);
    $db_password=base64_decode($user_info[2]);
		if($db_password==$user_password)
		{
			$_SESSION['login_id']=$user_info[3];
			header("Location:dashboard.php?id=$user_info[3]");
		}
}
else
header("Location:login.php?id=$user_id&case=1");
}

else if(isset($_POST['contact_us']))
{
 $max_cnt_num=$_POST['max_cnt_num'];
$array=array();
$sql_value_list="";
for($i=0;$i<$max_cnt_num;$i++)
{

	$cnt_name="cnt_".$i;
	$array[$i]=$_POST[$cnt_name];

	$sql_value_list .="'".$array[$i]."'";
	if($i<$max_cnt_num-1)
		$sql_value_list .=",";
}

$sql="INSERT INTO `contact`(name,email,mobile_number,message) values($sql_value_list)";

if(mysqli_query($con,$sql))
{echo "saved";
$id=mysqli_insert_id($con);
header("Location:register.php");
}
else
{save_error($sql);}
}

else if(isset($_POST['newuser']))
{
 $max_cnt_num=$_POST['max_cnt_num'];
$array=array();
$sql_value_list="";

for($i=0;$i<$max_cnt_num;$i++)
{
	$cnt_name="cnt_".$i;
	//if($i!==5)
	if($i==1)
	$array[$i]=base64_encode($_POST[$cnt_name]);

	else
	$array[$i]=$_POST[$cnt_name];

	$sql_value_list .="'".$array[$i]."'";
	if($i<$max_cnt_num-1)
		$sql_value_list .=",";
}

$sql="INSERT INTO `users` (`name`,`password`,`email`) values($sql_value_list)";
if(mysqli_query($con,$sql))
{echo '<script>alert("saved")</script>';
$id=mysqli_insert_id($con);
header("Location:login.php");
}
else
{
	header("Location:register.php");
}
}
else
{
echo "alert('Please login')";
}

?>
