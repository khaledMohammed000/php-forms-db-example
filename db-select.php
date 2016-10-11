<!doctype html>
<html>

<head>
    <title>db-select</title>
</head>
<body>
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