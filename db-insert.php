<!doctype html>
<html>
<head>

</head>
<body>
<?php
readfile('navigation.tmpl.html');
?>
<?php

$name = '';
$gender = '';
$color = '';
$password = '';

if(isset($_POST['submit'])){
    $ok=true;
    if(!isset($_POST['name']) || $_POST['name'] === ''){
        $ok=false;
    }else{
        $name=$_POST['name'];
    }

    if(!isset($_POST['password']) || $_POST['password'] === ''){
        $ok=false;
    }else{
        $password=$_POST['password'];
    }

    if(!isset($_POST['gender']) || $_POST['gender'] === ''){
        $ok = false;
    }else{
        $gender = $_POST['gender'];
    }

    if(!isset($_POST['color']) || $_POST['color'] === ''){
        $ok = false;
    }else{
        $color = $_POST['color'];
    }


    //code for inserting data into DB goes here
    if($ok){
        $db = mysqli_connect('localhost','root','','php');
        //this is done to prevent sql injection
        $sql = sprintf("INSERT INTO users (name ,password, gender,color)
         VALUES ('%s','%s','%s','%s')",
        mysqli_real_escape_string($db,$name),
        mysqli_real_escape_string($db,password_hash($password,PASSWORD_DEFAULT)),
        mysqli_real_escape_string($db,$gender),
        mysqli_real_escape_string($db,$color));

        mysqli_query($db,$sql);
        //to improve performance and not using garbage collector
        mysqli_close($db);

        echo '<p>User Added .</p>';

    }
}
?>

<form action="" method="post">
    User Name : <input type="text" name="name" value="<?php echo htmlspecialchars($name);?>"> <br>

    Password : <input type="password" name="password"> <br>

    Gender : <input type="radio" name="gender" value="m" <?php if($gender === 'm'){echo 'checked';}?>> Male
             <input type="radio" name="gender" value="f" <?php if($gender === 'f'){echo 'checked';}?>> Female <br>

    Favorite Color : <select name="color">
                        <option value="">Please select</option>
                        <option value="#f00" <?php if($color === '#f00') echo 'selected';?>>red</option>
                        <option value="#0f0" <?php if($color === '#0f0') echo 'selected';?>>green</option>
                        <option value="#00f" <?php if($color === '#00f') echo 'selected';?>>blue</option>
                     </select>

    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>