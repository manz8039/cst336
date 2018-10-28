<?php
session_start();
if (!isset($_SESSION['valid'])) {
    $_SESSION['valid'] = 0;
}
include 'functions.php'; ?>
<!DOCTYPE html>
<html>
    <body>
    <h1>Welcome to the Jungle, The Quiz!</h1>
        <form>
            <h3 <?= validate("zero") ?>>Enter your name: <input type='text' name='zero'value='<?= $_GET['name'] ?>' placeholder='John Doe'></h3>
            
            <h3 <?= validate("one") ?>>What does your room look like?
            <select name="one" width="150px">
                <option <?= $_GET['one'] == '' ? "selected" : "" ?> value="">Select One</option>
                <option <?= $_GET['one'] == '1' ? "selected" : "" ?> value="1">It's really dusty.</option>
                <option <?= $_GET['one'] == '2' ? "selected" : "" ?> value="2">It's super cute.</option>
                <option <?= $_GET['one'] == '3' ? "selected" : "" ?> value="3">I'm never home!</option>
                <option <?= $_GET['one'] == '4' ? "selected" : "" ?> value="4">It's bad but who cares.</option>
            </select>
            </h3>
            
            <h3 <?= validate("two") ?>>What are your friends like?
            <select name="two" width="150px">
                <option <?= $_GET['two'] == '' ? "selected" : "" ?> value="">Select One</option>
                <option <?= $_GET['two'] == '1' ? "selected" : "" ?> value="1">I don't have friends.</option>
                <option <?= $_GET['two'] == '2' ? "selected" : "" ?> value="2">I love all of them.</option>
                <option <?= $_GET['two'] == '3' ? "selected" : "" ?> value="3">Everyone is my friend.</option>
                <option <?= $_GET['two'] == '4' ? "selected" : "" ?> value="4">Who cares.</option>
            </select></h3>
            
            <h3>How would you describe yourself:</h3>
                <input type="radio" checked=<?= $_GET['three'] == '1' ? 'checked' : "" ?>  name="three" value="1" > Alone<br>
                <input type="radio" checked=<?= $_GET['three'] == '2' ? 'checked' : "" ?>  name="three" value="2"> Elegant<br>
                <input type="radio" checked=<?= $_GET['three'] == '3' ? 'checked' : "" ?>  name="three" value="3"> Free-spirited<br>
                <input type="radio" checked=<?= $_GET['three'] == '4' ? 'checked' : "" ?>  name="three" value="4"> Eh<br>
            
            <input type="submit" value="Submit"/>
        </form>
        <?= grade($_GET['valid']); ?>
    </body>
</html>