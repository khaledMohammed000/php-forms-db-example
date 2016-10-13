<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<?php

if(isset($_POST['Login']) || isset($_POST['username'])){
    $db = mysqli_connect('localhost','root','','php');
    $sql = sprintf("SELECT * FROM users WHERE name='%s'",
            mysqli_real_escape_string($db,$_POST['username']));
    $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_assoc($result);
    if($row){
        $hash = $row['password'];
        $password = $_POST['password'];
        if(password_verify($password,$hash)){
            echo 'Login Successful';
        }else{
            echo 'Login Failed';
        }

    }else{
        echo 'Login Failed';
    }
    mysqli_close($db);
}
?>
<form action="" method="post">

    User Name : <input type="text" name="username"><br>
    Password : <input type="password" name="password"><br>
    <input type="submit" name="Login">

</form>
</body>
</html>