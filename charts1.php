<?php
include_once'connection.php';
include_once'confic.php';
$id=$_SESSION['login_id'];

    $query2= "SELECT date,sum(amount) as amount2 from dashboard where email='$id' group by date order by date";
    $result2 = mysqli_query($con,$query2);
    $data2=array();
	if($result2 !=NULL)
    {
    foreach($result2 as $row2) {
    $data2[] = $row2;
    }
	}
    print json_encode($data2);
?>
