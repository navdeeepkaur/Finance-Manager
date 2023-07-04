<?php
include_once'connection.php';
include_once'confic.php';
$id=$_SESSION['login_id'];

    $query3= "SELECT month(date) as months,sum(amount) as amount3 from dashboard where email='$id' group by month(date) order by month(date), year(date)";
    $result3 = mysqli_query($con,$query3);
    $data3=array();
	if($result3 !=NULL)
    {
    foreach ($result3 as $row3) {
    $data3[] = $row3;
  }
	}
    print json_encode($data3);
?>
