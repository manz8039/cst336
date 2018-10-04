<!DOCTYPE html>
<html>
    <head>
        <title>Intro Screen</title>
        <style>
            body {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>Aces vs. Kings!</h1>
        <form action="results.php" method="post">
            <h2>   Number of Rows: <input type="number" name="rows"/></h2>
            <h2>Number of Columns:<input type="number" name="columns"/></h2>
            <h2>     Suit to Omit:
            <select name = "omit">
                
                  <option value="clubs">Clubs</option>
                  <option value="diamonds">Diamonds</option>
                  <option value="spades">Spades</option>
                  <option value="hearts">Hearts</option>
            </select></h2>
            <input type="submit" name="submit">
        </form>
        
    </body>
</html>