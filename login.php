<?php

error_reporting (E_ALL);
 require_once "session.php";
 require_once "config.php";
require_once "loginpage.php";

$error = '';
 

 
 if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

     if (!empty($login) && !empty($password))  {
       
        $query = $db->prepare("SELECT * FROM users WHERE login= ?;");
         $query->bind_param('s', $login);
         $query->execute();
         $row = $query->fetch();
             
            if ($row) {
                 password_verify($password, $row['password']);
                    $_SESSION['userid'] = $row['id'];
                    $_SESSION['userid'] = $row;

                    // Redirect the user to welcome page
                    header("location: welcome.php");
                    exit;
                } 
             else {
                    echo "Пользователь не найден.проверьте правильность ввода данных";
                }
                $query->close();
             }
         else {
            echo "Данные не заполнены. Нужны логин и пароль";
           
         }    
     
          
    // Close connection
    mysqli_close($db);
    
}

?>
