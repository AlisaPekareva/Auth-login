<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Главная страница ,  ВХОД НА САЙТ</h2>
                    <p>Пожалуйста, введите Ваш логин и пароль.</p>
                    
                    
            
                   
                    <form action="" method="post">
                    <div class="form-group">
                            
                            <p><a href="users.php">Cписок пользователей</a>.</p>
                            <br></br>
                        </div>  
                        <div class="form-group">
                            <label>Login</label>
                            <input type="text" name="login" placeholder="login" >
                            <br></br>
                        </div>    
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password">
                            <br></br>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Submit">
                           
                            <input type="checkbox" name="remember"  value="1">
                            <br></br> 
                        </div>
                        <p>Вы еще не зарегистрированы? <a href="register.php">Можете зарегистрироваться здесь</a>.</p>
                    </form>
                </div>
            </div>
        </div>    
    </body>
</html>