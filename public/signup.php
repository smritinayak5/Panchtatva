<?php
require "../private/autoload.php";
$Error     = "";
$email     = "";
$username  = "";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $email = $_POST['email'];
    if(!preg_match("/^[\w\-]+@[\w\-]+.[\w\-]+$/", $email))
    {
        $Error = "Please enter a valid email";
    }
    $date = date("Y-m-d H:i:s");
    $url_address = get_random_string(60);
    $username = trim($_POST['username']);
    if(!preg_match("/^[a-zA-Z]+$/", $username))
    {
        $Error = "Please enter a valid username";
    }
    $username = esc($username);
    $password = esc($_POST['password']);
    //Check if email exists
    $arr = false;
    $arr['email'] = $email;
    $query = "select * from user where email = :email limit 1";
        $stm = $connection->prepare($query);
        $check = $stm->execute($arr);
        if($check){
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            if(is_array($data) && count($data) > 0){
                $Error = "Someone is already using this email";
            }
        }
    if($Error == ""){
        $arr['url_address'] = $url_address;
        $arr['date'] = $date;
        $arr['username'] = $username;
        $arr['password'] = $password;
        $arr['email'] = $email;
        $query = "insert into user (url_address,username,password,email,date) values (:url_address,:username,:password,:email,:date)";
        $stm = $connection->prepare($query);
        $stm->execute($arr);
        header("Location: login.php");
        die;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Signup</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="stylelog.css">
        <link rel="stylesheet" href="file:///E:/fontawesome/css/all.css">
    </head>
    <body>
    <div class="center">
            <div class="container">
                <label for="" class="close-btn fas fa-times"></label>
                <div class="text">Signup</div>
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
                        <label>Username</label>
                        <input type="text" id="textbox" name="username" value="<?=$username?>"  required>
                    </div>
                    <div class="data">
                        <label>Email</label>
                        <input type="email" id="textbox" name="email" value="<?=$email?>"  required>
                    </div>
                    <div class="data">
                        <label>Password</label>
                        <input type="password" id="textbox" name="password" required>
                    </div>
                    <div class="btn">
                        <div class="inner"></div>
                        <button type="submit">Signup</button>
                    </div>
                    <div class="signup-link">Alrady a member? <a href="login.php">Login</a></div>
                </form>
            </div>
        </div>
    </body>
</html>