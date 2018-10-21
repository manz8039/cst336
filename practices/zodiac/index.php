<?= include 'functions.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                text-align: center;
                font-size: 1.5em;
            }
            td {
                border: 1px solid black;
                text-align: center;
            }
            table {
                margin-left: auto;
                margin-right: auto;
            }
        </style>
    </head>    
    <body>
        <h1>Chinese Zodiac List</h1>
        <form>
            <h2>Number of rows: <input type="number" name="row"></h2>
            <h2>Number of columns: <input type="number" name="col"></h2>
            <input type="submit" value="submit">
        </form>
        <table>
            <?= displayYears($_GET['row'], $_GET['col']); ?>
        </table>
        
    </body>
</html>