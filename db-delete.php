<?php
/**
 * Created by PhpStorm.
 * User: user-1
 * Date: 10/11/2016
 * Time: 8:29 PM
 */
if(isset($_GET['id']) &&ctype_digit($_GET['id'])){
    $id = $_GET['id'];
}else{
    header('Location : db-select.php');
}
?>
<!doctype html>
<html>
<head>
    <title>db-delete</title>
</head>
<body>
<?php
$db = mysqli_connect('localhost','root','','php');
$sql = "DELETE FROM users WHERE id=$id";
mysqli_query($db,$sql);
echo '<p>User Deleted !</p>';
mysqli_close($db);
?>
</body>
</html>
