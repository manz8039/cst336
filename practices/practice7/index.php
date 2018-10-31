<?= include 'functions.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>
        <div class='form'>
        <h1>Quote Finder</h1>
        <form>
            <p>Enter Quote Keyword: <input type='text' name = 'keyword' value = '<?= $_GET['keyword'] ?>' placeholder = 'keyword'></p>
            <?= displayCategories(); ?>
            <p>Order</h3>
            <p><input type='radio' name = 'order' value = 'up'>A - Z</p>
            <p><input type='radio' name = 'order' value = 'down'>Z - A</p>
            
            <input type='submit' value='Display Choices'>
        </form>
        </div>
        <hr>
        <?= displayQuotes(); ?>
    </body>
</html>