<?php
require_once("connection.php");
require_once("confic.php");
include_once("link.php");
?>
<?php
echo "<body>
  <link rel='stylesheet' href='contact.css'>";
echo "<div class='circle'></div>
      <div class='circle1'></div>";
echo "<div class='container-fluid fp-main'>
      <div class='fp-internal'>
      <div class='col container'>";

echo"<form id='registration-form1' class='form-horizontal' action='data.php' method='post' role='form'>";
$cnt_array=array(
            array("Name","text",""),
            array("Email","text",""),
            array("Contact Number","text",""),
            array("Message","text",""),
          );

for($i=0;$i<count($cnt_array);$i++)
{
    $label_name=$cnt_array[$i][0];
    $cnt_type=$cnt_array[$i][1];
    echo "  <div class='form-group'>
            <label class='col-md-4 control-label'>$label_name</label>";
                $label_name=str_replace(" ","_",$label_name);
                $label_name="cnt_".$i;
                if($cnt_type=="text"||$cnt_type=="password"||$cnt_type=="file")
                echo "<input type='$cnt_type' name='$label_name' class='form-control mb-3' required/>";
          echo "</div>";
}

$len=count($cnt_array);
echo "<input type='hidden' name='max_cnt_num' value='$len'/>";
echo "<div class='form-group'>
        <div class='col-md-8'>
        <input type='submit'name='contact_us' class='btn' />
        </div>
      </div>";
echo"</form>
     </div>";
echo "<div class='col container'>
      <img src='contact.png' alt=''>
      </div>";
echo "</div>
      </div>
      </body>";
?>
