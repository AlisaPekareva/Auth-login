<?php
error_reporting(E_ALL);

require_once "config.php";
require_once "session.php";
 
$error = '';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $age = trim($_POST['age']);
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST["confirm_password"]);
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    
 

    if($query = $db->prepare("SELECT * FROM users WHERE login = ?")) {

          
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$query->bind_param('s', $login);
	$query->execute();
	// Store the result so we can check if the account exists in the database.
	$query->store_result();
        if ($query->num_rows > 0) {
            echo "<p>Пользователь уже зарегистрирован!</p>";
        } else {
            // Validate password
            if (strlen($password ) < 6) {
                echo "<p>Пароль должен иметь минимум 6 символов.</p>";
            }

            // Validate confirm password
            if (empty($confirm_password)) {
                echo "<p>Пожалуйста, повторите пароль еще раз.</p>";
            }
             else {
                if ($password != $confirm_password) {
                    echo "<p>Пароли не совпадают. Попробуйте еще раз.</p>";
                }
            }
            if (empty($error) ) {
                $insertQuery = $db->prepare("INSERT INTO users (name, surname, age, login, password) VALUES (?, ?, ?, ?, ?);");
                $insertQuery->bind_param("ssiss", $name, $surname, $age, $login, $password_hash);
                $result = $insertQuery->execute();
                if ($result) {
                    echo "<p>Your registration was successful!</p>";
                    header("location: welcome.php");
                    exit;
                } else {
                    echo "<p>Что-то пошло не так.Попробуйте еще раз!</p>";
                }   
      
    $query->close();
    $insertQuery->close();
               
    // Close DB connection
    mysqli_close($db);
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Register</h2>
                    <p>Пожалуйста, заполните фому для регистрации.</p>
                  
                    <?php  
                      //  echo $success;
                        echo $error;
                   
                        
                     ?>
                  
                    <form action="" method="post">
                        <div class="form-group">
                            <label> Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>   
                        <div class="form-group">
                            <label> Surname</label>
                            <input type="text" name="surname" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label> Age</label>
                            <input type="int" name="age" class="form-control" required>
                        </div>  
                        <div class="form-group">
                            <label>Login</label>
                            <input type="text" name="login" class="form-control" required />
                        </div>    
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        </div>
                        <p>Already have an account? <a href="login.php">Login here</a>.</p>
                    </form>
                </div>
            </div>
        </div>    
    </body>
</html>