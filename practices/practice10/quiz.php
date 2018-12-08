<?= session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>CSUMB Online Quiz</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
        <!--Display user and logout button-->
        <div class="user-menu">
            Welcome <?= $_SESSION['user']; ?>!  
            <input type="button" id="logoutBtn" value="Logout" />    
        </div>
        
        <!--Display Quiz Content-->
        <div class="content-wrapper">
            <div id="quiz">
              <h1>Quiz</h1>
              <form>
    <!--Question 1-->
    What year was CSUMB founded? 
    <input type="text" name="question1" size="5" /><br />
    <div id="question1-feedback" class="answer"></div><br />

    <!--Question 2-->
    What is the name of CSUMB's mascot?<br />
    <input type="radio" name="question2" id="q2-1"  value="A"/><label for='q2-1'>Otto <br />
    <input type="radio" name="question2" id="q2-2"  value="B"/><label for='q2-2'>Albus <br />
    <input type="radio" name="question2" id="q2-3"  Value="C"/><label for='q2-3'>Monte Rey <br />
    <div id="question2-feedback" class="answer"></div><br />

    <!--Question 3-->
    What animal is CSUMB's mascot?<br>
    <input type='radio' name='question3' id='q3-1' value='A'><label for='q3-1'>Chicken<br>
    <input type='radio' name='question3' id='q3-2' value='B'><label for='q3-2'>Bigger Chicken<br>
    <input type='radio' name='question3' id='q3-3' value='C'><label for='q3-3'>Otter (Like our mascot)<br>
    <div id='question3-feedback' class='answer'></div><br>
    
    <!-- Question 4 -->
    What year is it?<br>
    <input type='number' name='question4' size='5'><br>
    <div id='question4-feedback' class='answer'></div>

    <input type="submit" value="Submit" />
    
    <!--Will display the "loading" or "spinning" animated gif-->
    <div id="waiting"></div>
</form>


<!--Will display the quiz score-->
<div id="scores"></div>            
                <div id="feedback">
                    <h2>Your final score is <span id="score"> score  </span> </h2>
                    
                    You've taken this quiz <strong id="times"></strong> time(s). <br /><br />
    
                    Your average score was  <strong id="average"></strong>
                </div>
            </div>
            <div id="mascot">
                <img src="http://cst336.herokuapp.com/projects/csumb_quiz/img/mascot.png" alt="CSUMB Mascot" width="350" />
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="js/gradeQuiz.js"></script>
    </body>
</html>