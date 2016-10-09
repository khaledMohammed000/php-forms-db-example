<!doctype html>
<html>
    <head>
        <title>Php form example</title>
    </head>
    <body>


    <?php
if (isset($_POST['submit'])) {
    $ok = true;
    if (!isset($_POST['name']) || $_POST['name'] === '') {
        $ok = false;
    }
    if (!isset($_POST['password']) || $_POST['password'] === '') {
        $ok = false;
    }
    if (!isset($_POST['comments']) || $_POST['comments'] === '') {
        $ok = false;
    }
    if (!isset($_POST['gender']) || $_POST['gender'] === '') {
        $ok = false;
    }
    if (!isset($_POST['tc']) || $_POST['tc'] === '') {
        $ok = false;
    }
    if (!isset($_POST['color']) || $_POST['color'] === '') {
        $ok = false;
    }
    if (!isset($_POST['languages']) || !is_array($_POST['languages'])
        || count($_POST['languages']) === 0) {
        $ok = false;
    }

    if ($ok) {
        printf('User name: %s
      <br>Password: %s
      <br>Gender: %s
      <br>Color: %s
      <br>Language(s): %s
      <br>Comments: %s
      <br>T&amp;C: %s',
            htmlspecialchars($_POST['name']),
            htmlspecialchars($_POST['password']),
            htmlspecialchars($_POST['gender']),
            htmlspecialchars($_POST['color']),
            htmlspecialchars(implode(' ', $_POST['languages'])),
            htmlspecialchars($_POST['comments']),
            htmlspecialchars($_POST['tc']));
    }
    /**
        isset($_POST('name')) -> its used to check if when the form
        gets submitted ... have this named thing set or not

        htmlspecialchars() -> suppresses the meaning of html tags if inputted
        implode('pattern',array of strings):  outputs array of string as a single string with
                                          pattern in between them

     */
}
?>
<form  method="post" action="">
    User Name : <input type="text" name="name"><br>
    Password : <input type="password" name="password"><br>
    Gender :
    <input type="radio" name="gender" value="m">male
    <input type="radio" name="gender" value="f">female <br>
    Favorite Color :
    <select name="color">
        <option value="">Please select</option>
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
    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>