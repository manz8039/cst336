<?php
    session_start(); // starts or resumes an existing session
?>

<!DOCTYPE html>
<html>
    <body>
        <h1>My name is <?= $_SESSION["my_name"] ?></h1>
    </body>
</html>