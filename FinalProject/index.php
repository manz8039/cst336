<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>FighterFinder</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   

    </head>
    <body>
        
        
        <div class="navbar">
            <img src="https://i.pinimg.com/originals/77/c0/1f/77c01fa23908900d83c4a4b78223bb9f.jpg" class="navbar-logo">
            <a href="#" id="home-button" class="navbar-item">Home</a>
            <a href="#" id="login-button" class="navbar-item">Login</a>
        </div>
        
        
        <div class="content">
            
            
            <div id="home" class="home">
                
                <h2>Welcome to the Smash Bros. Fighter Store!</h2>
                <h2>Make a search, and use our filters to order your fighters<h2>
                
                <h2><input type='text' id='keyword' name='keyword' placeholder='Enter fighter keywords here'/></h2>
                
                <select class='select-option' id='style-option' name='style'></select>
                <select class='select-option' id='weight-option' name='weight'></select>
                <button id='search-button'>SEARCH!</button>

                <br><br>
                
                <input type='radio' name='order' value='descending' class='search-filter' id='descend-button'>
                <input type='radio' name='order' value='ascending' class='search-filter' id='ascend-button'>
                <input type='radio' name='category' value='style' class='search-filter' id='style-button'>
                <input type='radio' name='category' value='weight' class='search-filter' id='weight-button'>
                <input type='radio' name='category' value='name' class='search-filter' id='name-button'>
                
                <label for='descend-button' class='filter-label' id='descend-label'>DESCENDING</label>
                <label for='ascend-button' class='filter-label' id='ascend-label'>ASCENDING</label>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label for='style-button' class='filter-label' id='style-label'>FIGHT-STYLE</label>
                <label for='weight-button' class='filter-label' id='weight-label'>WEIGHT</label>
                <label for='name-button' class='filter-label' id='name-label'>NAME</label>
                
                <br><br>
                
                <div id='search-results'></div>
                
            </div>
            
            
            
            <div id="login" class="login">
                <h1>Login to access admin settings</h1>
                <p><input type="text" name="username" id="userfield" placeholder="username"><span id="userlog"></span></p>
                <p><input type="password" name="password" id="passfield" placeholder="password"><span id="passlog"></span></p>
                <button id='access-button'>ACCESS</button>
            </div>
            <div id="admin" class="admin">
                <h1>Welcome, Mr. President!</h1>
                <button id='logout-button'>LOGOUT</button><button id='edit-button'>EDIT</button><button id='add-button'>ADD</button><button id='aggregate-button'>STATISTICS</button>
                

                <div id="addPage">
                    <h1>New Fighter Information!</h1>
                    <p>Name: <input type="text" name="newName"></p>
                    <p>Weight (1-3): <input type="number" name="newWeight"></p>
                    <p>Style (1-3): <input type="number" name="newStyle"></p>
                    <p>Game: <input type="text" name="newGame"></p>
                    <p>Description: <input type="text" name="newDescription"></p>
                    <p>Image Link: <input type="text" name="newImage"></p>
                    <button id='insert-button'>INSERT</button>
                </div>
                
                <div id="aggregatePage">
                    <p><strong>Total Fighters: </strong><span id="total-fighters"></span></p>
                    <p><strong>Total Brawlers: </strong><span id="total-brawlers"></span></p>
                    <p><strong>Total Gunners: </strong><span id="total-gunners"></span></p>
                    <p><strong>Total Swordfighters: </strong><span id="total-swordfighters"></span></p>
                </div>
                
                <div id="editPage">
                    
                </div>
            </div>
        </div>
        <script src="js/pageHandler.js"></script>
    </body>
</html>