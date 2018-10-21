<?= include 'functions.php'; ?>
<!DOCTYPE html>
<html>
    <h1>What animal are you? The Quiz!</h1>
    <form>
        <h3>What does your room look like?
        <select name="one" width="150px">
            <option <?= $_GET['one'] == '1' ? "selected" : "" ?> value="">Select One</option>
            <option <?= $_GET['one'] == '2' ? "selected" : "" ?> value="1">It's really dusty.</option>
            <option <?= $_GET['one'] == '3' ? "selected" : "" ?> value="2">It's super cute.</option>
            <option <?= $_GET['one'] == '4' ? selected : "" ?> value="3">I'm never home!</option>
            <option <?= $_GET['one'] == '5' ? selected : "" ?> value="4">It's bad but who cares.</option>
        </select>
        </h3>
        
        <h3>What are your friends like?
        <select name="two" width="150px">
            <option value="">Select One</option>
            <option value="1">odmv</option>
        </select></h3>
        
        
        <input type="submit" value="Submit"/>
    </form>
    
</html>