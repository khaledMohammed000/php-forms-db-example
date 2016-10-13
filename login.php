<?php
session_start();
$message = '';
if(isset($_POST['Login']) || isset($_POST['username'])){
    $db = mysqli_connect('localhost','root','','php');
    $sql = sprintf("SELECT * FROM users WHERE name='%s'",
            mysqli_real_escape_string($db,$_POST['username']));
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_assoc($result);
    if($row){
        $hash = $row['password'];
        $password = $_POST['password'];
        $isAdmin = $row['isAdmin'];
        if(password_verify($password,$hash)){
            $message= 'Login Successful';
            $_SESSION['user'] = $row['name'];
            $_SESSION['isAdmin'] = $isAdmin;
        }else{
            $message= 'Login Failed';
        }
    }else{
        $message= 'Login Failed';
    }
    mysqli_close($db);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<?php
readfile('navigation.tmpl.html');
echo "<p> $message </p>";
?>
<form action="" method="post">

    User Name : <input type="text" name="username"><br>
    Password : <input type="password" name="password"><br>
    <input type="submit" name="Login">

</form>
</body>
</html>