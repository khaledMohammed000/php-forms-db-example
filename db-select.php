<?php
require 'auth.php';
?>

<?php
if(isset($_POST['Logout']) && $_POST['Logout'] == 'logout'){
    unset($_SESSION["isAdmin"]);
    header('Location: login.php');
}
?>
<!doctype html>
<html>
<head>
    <title>db-select</title>

</head>
<body>
<?php
readfile('navigation.tmpl.html');
?>
<form action="" method="post">
<input type="submit" name="Logout" value="logout">
</form>

    <ul>
        <?php
        $db= mysqli_connect('localhost','root','','php');
        $sql = 'SELECT * FROM users';

        $result = mysqli_query($db,$sql);

        foreach($result as $row){
            printf('<li><span style="color: %s">%s (%s)</span>
                <a href="db-update.php?id=%d">edit</a>
                <a href="db-delete.php?id=%d">delete</a></li>',
                htmlspecialchars($row['color']),
                htmlspecialchars($row['name']),
                htmlspecialchars($row['gender']),
                htmlspecialchars($row['id']),
                htmlspecialchars($row['id']));
        }
        ?>
    </ul>
</body>
</html>