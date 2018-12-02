<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <h1>Thank you for your purchase! Your item will arrive in <?= $_GET['days'] ?> day(s).</h1>
        <h1>Your credit card has been charged $<?= $_GET['total'] ?></h1>
    </body>
</html>