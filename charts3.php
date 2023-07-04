<?php
include_once'connection.php';
include_once'confic.php';
$id=$_SESSION['login_id'];

    $query4= "SELECT category,sum(amount) as amount FROM dashboard where email='$id' group by category,date having month(date)=(select month(sysdate()) from dual)";
    $result4 = mysqli_query($con, $query4);
    $data4=array();
	if($result4 !=NULL)
    {
    foreach ($result4 as $row4) {
    $data4[] = $row4;
  }
	}
    print json_encode($data4);
?>
