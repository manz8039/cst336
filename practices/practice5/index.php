<?php
    if (!isset($_SESSION['history'])) {
        session_start();
        $_SESSION['history'] = array();
        $_SESSION['form'] = "generate";
        echo "in here";
    }
    
    function changeView() {
        echo "Session changed from " . $_SESSION['form'];
        $_SESSION['form'] = ($_SESSION['form'] == 'generate' ? 'history' : 'generate');
        echo " to " . $_SESSION['form'];
    }

    if (isset($_GET['reload'])) {
        echo "No need to redirect";
    }
    else if (isset($_GET['get_history'])) {
        changeView();
        echo "View is " . $_SESSION['form'];
        unset($_SESSION['get_history']);
    }
    else if (isset($_GET['generate'])) {
        changeView();
        echo "View is " . $_SESSION['form'];
        unset($_SESSION['generate']);
    }
    
    
    function display() {
        for ($i = 0; $i < count($_SESSION['history']); $i++) {
            echo "<h2>";
            echo $_SESSION['history'][$i];
            echo "</h2>";
        }
    }
    
    function genPass() {
        $generated = array();
        $length = $_GET['size'];
        $alpha = "QWERTYUIOPASDFGHJKLZXCVBNM";
        $num = "1234567890";
        
        for ($i = 0; $i < $length; $i++) {
            $char = $alpha[rand(0, 25)];
            array_push($generated, $char);
        }
        if (isset($_GET['with_digits'])) {
            $size = rand(0, 3);
            
            for ($i = 0; $i < $size; $i++) {
                $postion = rand(0, $length - 1);
                echo "Random position: $position";
                $generated[$position] = $num[rand(0, 9)];
            }
        }
        return implode($generated);
    }
    function multiplePass() {
        $numPass = $_GET['num'];
        for ($i = 0; $i < $numPass;  $i++) {
            $generated = genPass();
            echo "<h5>$generated</h5>";
            array_push($_SESSION['history'], $generated);
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Practice 5</title>
        <style>
            body {
                text-align: center;
            }
            .formbox {
                background-color: pink;
                width: 50%;
                margin-left: auto;
                margin-right: auto;
                padding: 2%;
                border-radius: 20px;
            }
        </style>
    </head>
    <body>
        <?php
            if ($_SESSION['form'] == "generate") {
        ?>
        <div class="formbox">
            <h1>Custom Password Generator</h1>
            <form>
                <h3>How many passwords: <input type="number" name="num" max="8"/> (No more than 8)</h3>
                <h3>Password Length</h3>
                
                <input type="radio" id="six_char" name="size" value="6">
                    <label for="six_char">6 characters</label>
                    
                <input type="radio" id="eight_char" name="size" value="8">
                    <label for="eight_char">8 characters</label>
                    
                <input type="radio" id="ten_char" name="size" value="10">
                    <label for="ten_char">10 characters</label>
                    
                    <br>
                    <br>
                    <input type="checkbox" name="with_digits" value="check"> Include digits (up to 3 digits will be part of the password)<br>
                    <br>
                <input type="submit" value="Create Passwords!" name="reload"/>
            </form>
            <form>
                <input type="submit" value="Display Password History" name="get_history">
            </form>
        </div>
        <?php
            if (isset($_GET['reload'])) {
                multiplePass();
            }
        ?>
        <?php
            }
            else {
        ?>
        <h1>Password History</h1>
        <?= display() ?>
        <form>
            <input type="submit" value="Generate more passwords" name="generate">
        </form>
        <?php
            }
        ?>
        
    </body>
</html>