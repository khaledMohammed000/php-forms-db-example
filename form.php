<!doctype html>
<html>
    <head>
        <title>Php form example</title>
    </head>
    <body>
    <?php
        if(isset($_POST['submit'])){
        //process form
            printf('user name : %s <br> 
                    password : %s <br>
                    gender : %s <br>
                    color : %s <br>
                    language : %s <br>
                    comments : %s <br>
                    T&ampC : %s <br>',
                    htmlspecialchars($_POST['name']),
                    htmlspecialchars($_POST['password']),
                    htmlspecialchars($_POST['gender']),
                    htmlspecialchars($_POST['color']),
                    htmlspecialchars(implode(' ' , $_POST['languages'])),
                    htmlspecialchars($_POST['comments']),
                    htmlspecialchars($_POST['tc'])
                );
            //htmlspecialchars() /// supreesses the meaning of html tags if inputted
            //implode('pattern',array of strings):  outputs array of string as a single string with
            //                                      pattern in between them
        }
    ?>
    <hr>
    <form action="" method="post">
            User Name : <input type="text" name="name"><br>
            Password : <input type="password" name="password"><br>
            Gender :
                <input type="radio" name="gender" value="m">male
                <input type="radio" name="gender" value="f">female <br>
            Favorite Color :
                <select name="color">
                    <option value="#f00">red</option>
                    <option value="#0f0">green</option>
                    <option value="#00f">blue</option>
                </select><br>
            Languages Spoken :
                <select name="languages[]" multiple size="3">
                    <option value="en">English</option>
                    <option value="fr">French</option>
                    <option value="it">Italian</option>
                </select><br>
            Comments : <textarea name="comments"></textarea><br>
            <input type="checkbox" name="tc" value="ok"> I accept T&C <br>
            <input type="submit" name="submit" value="submit">
        </form>
    </body>
</html>