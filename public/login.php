<?php
require "../private/autoload.php";
$Error = "";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $email = $_POST['email'];
    if(!preg_match("/^[\w\-]+@[\w\-]+.[\w\-]+$/", $email))
    {
        $Error = "Please enter a valid email";
    }
    $password = $_POST['password'];
    if($Error == ""){
        $arr['password'] = $password;
        $arr['email'] = $email;
        $query = "select * from user where email = :email && password = :password limit 1";
        $stm = $connection->prepare($query);
        $check = $stm->execute($arr);
        if($check){
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            if(is_array($data) && count($data) > 0){
                $data = $data[0];
                $_SESSION['username'] = $data->username;
                $_SESSION['url_address'] = $data->url_address;
                header("Location: index.php");
                die;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="stylelog.css">
        <link rel="stylesheet" href="file:///E:/fontawesome/css/all.css">
    </head>
    <body>
        <div class="center">
            <div class="container">
                <label for="" class="close-btn fas fa-times"></label>
                <div class="text">Login</div>
                <form action="#" method="post">
                    <div>
                        <?php
                        if(isset($Error) && $Error != "")
                        {
                            echo $Error;
                        }
                        ?>
                    </div>
                    <div class="data">
                        <label>Email</label>
                        <input type="email" id="textbox" name="email"  required>
                    </div>
                    <div class="data">
                        <label>Password</label>
                        <input type="password" id="textbox" name="password" required>
                    </div>
                    <div class="btn">
                        <div class="inner"></div>
                        <button type="submit">Login</button>
                    </div>
                    <div class="signup-link">Not a member? <a href="signup.php">Signup now</a></div>
                </form>
            </div>
        </div>
    </body>
</html>