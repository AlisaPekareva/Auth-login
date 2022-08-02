<?php
 require_once "session.php";
 require_once "config.php";
 require_once "loginpage.php";

// error_reporting(E_ALL); ini_set('display_errors', 'On'); 
 $error = '';

   
 if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

       $login = trim($_POST['login']);
       $password = trim($_POST['password']);

               if (!empty($login) && !empty($password))  {
       
                $stmt = $db->prepare("SELECT * FROM users WHERE login= ?;");
                $stmt->bind_param('s', $login);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
               
               
            
                  
                    if($row){
                      $verify = password_verify($password, $row['password']);
                     

                     if ($verify){

                          //echo "все верно" ;         
                     $_SESSION['userid'] = $row['id'];
                     $_SESSION['userid'] = $row;
                     
                      
                    // var_dump($_SESSION);
                                        
                                        
                    // Redirect the user to welcome page
                    header("Location: welcome.php");
                   exit;
                     
                      }  
                      else {
                        echo "Пароль неверный";
                        }
                        
                             }
                  
                  
               else {
                    echo "Пользователь не найден.Проверьте правильность ввода данных";
                  }
                $stmt->close();

    }
         else {
            echo "Данные не заполнены. Нужны логин и пароль";
           
               }    
     
    // Close connection
    mysqli_close($db);
    
}
