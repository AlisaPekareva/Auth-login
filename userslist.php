
<?php
 require_once "session.php";
 require_once "config.php";
 
   
  $sql = "SELECT * FROM users";
  
  $result_select = mysqli_query($sql);


  echo "<select name = 'login'>";

while($object = mysql_fetch_object($result_select)){

echo "<option value = '$object->column_name' > $object->column_name </option>";

}

echo "</select>";

?>





       