<?php include_once'confic.php';
include_once("connection.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>ChartJS - BarGraph</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body style="background-color:#ededed">
    <link rel="stylesheet" href="dashboard.css">
    <div class="circle"></div>
    <div class="circle1"></div>
    <div class="circle2"></div>

		<?php
  echo"
      <div class=container-fluid>
      <nav class='navbar navb'>
        <a class='bt' href='logout.php'>Logout</a>
        <button id='form' class='bt' onclick='show()'>Add Expense</button>
      </nav>
    </div>
	<div id='form-container' class='container-fluid insert'>
    <div class='insert-inner'>
		<form action='data.php' method='post' role='form'>";
		  $cnt_array=array(

			   array("Date:","date",""),
			array("Amount:","number",""),
			array("Category:","text","")


			  );
			  	for($i=0;$i<count($cnt_array);$i++)
		{

	$label_name=$cnt_array[$i][0];
	$cnt_type=$cnt_array[$i][1];

  echo "  <div class='mb-3'>
      <label for='$label_name' class='form-label'>$label_name</label>
      ";
	$label_name=str_replace(" ","_",$label_name);
	$label_name="cnt_".$i;

		        $u=$_SESSION['login_id'];

		 if($cnt_type=="text"||$cnt_type=="number"||$cnt_type="date")
					echo "<input type='$cnt_type' name='$label_name' id='$label_name' class='form-control'  required/>";


      echo "</div>
    ";
		}

		   $len=count($cnt_array);
		echo "<input type='hidden' name='max_cnt_num' value='$len'/>";

echo" <input type='submit' name='submit-form' class='form-control' id='submit-form' value='Submit'/>
<a href='dashboard.php?id=$u'>
   <input type='button' value='Back' id='back' class='form-control'/>
</a>
		</form>";
echo " </div>
	</div>";
?>

    <div class="y">


    <div class="container main-container">

        <div class="container chart-container">
          <h4>All time Expenses</h4>
          <canvas id="mycanvas"></canvas>
        </div>
        <div class="container chart-container">
          <h4>Date-Wise Expenses</h4>
          <canvas id="mycanvas2"></canvas>
        </div>
    <div class="container chart-container">
        <h4>Month-Wise Expenses</h4>
        <canvas id="mycanvas1"></canvas>
    </div>
    <div class="container chart-container">
        <h4>This Month's Expenses</h4>
        <canvas id="mycanvas4"></canvas>
    </div>



    </div>
    <div class="container x">
      <div class="container other-container">
        <h5>Welcome,</h5>
        <p class="dashboard-name"><?php
        $u=$_SESSION['login_id'];
        $query="SELECT name from users where email='$u'";
        $result=mysqli_query($con, $query);
        if($result->num_rows>0)
        {
          while($row=$result->fetch_assoc())
          {
            echo $row["name"];
          }
        } ?>
      </p>
      </div>
      <div class="container other-container">
        <p class="text-center dashboard-p">Expense details</p>
      <table class="admin-table">
        <?php
        $u=$_SESSION['login_id'];
        $query="SELECT distinct(date) FROM dashboard where email='$u' order by date desc";
	      $result = mysqli_query($con, $query);
        foreach($result as $row) {
        ?>
        <table>
        <tr><br><p class="dashboard-name" style="background-color:#e5e5e5"> <?php echo $row['date']; ?></p></tr>
        <?php $val=$row['date'];
        $query1="SELECT sum(amount) as amt,category FROM dashboard where (email='$u' and date='$val') group by category";
	      $result1 = mysqli_query($con, $query1);
        foreach($result1 as $row1)
        {
         ?>
          <tr>
          <?php echo $row1['category']; ?><span class="right"><?php  echo $row1['amt']; ?></span><br/>
          </tr>
          <?php
        }
        }
        //print json_encode($data);



        ?>
      </table>
      </div>
    </div>


</div>

    <!-- javascript -->
    <script src = "https://d3js.org/d3.v4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script type="text/javascript" src="script.js"></script>

  </body>
</html>
