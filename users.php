<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Users</title>
        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Cписок  пользователей</h2>
                           
                       

<?php
 require_once "session.php";
 require_once "config.php";
 
  $sql = mysqli_query($db, 'SELECT `ID`, `Name`, `Surname`, `Age` FROM `users`');
  while ($result = mysqli_fetch_array($sql)) {
    echo "{$result['Name']} {$result['Surname']}, возраст: {$result['Age']} <br>";
  }

?>
<div>
<div>
<form action="register.php" target="_blank">
<div class="form-group">
     <input type="submit" name="submit" class="btn btn-primary" value="Добавить Пользователя">
</form>  </div>
  <div>
<form action="logout.php" target="_blank">
<div class="form-group">
  <br><input type="submit" name="submit"  class="btn btn-primary" value="Выйти">
</br>
 </form> </div> 
  <div>


       