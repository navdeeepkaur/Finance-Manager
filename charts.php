<?php
include_once'connection.php';
include_once'confic.php';
 $id=$_SESSION['login_id'];
    $query = "SELECT sum(amount) as amount,category FROM dashboard where email='$id' group by category";
    $result = mysqli_query($con, $query);
    $data = array();
    if($result !=NULL)
    {
      foreach ($result as $row) {
      $data[] = $row;
      }
    }
    else{
      echo "no data yet";
    }
    print json_encode($data);
?>
