<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trvia</title>
  <link rel="stylesheet" href="trivia.css">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body class="trivia-page"> 
    <header>
    <nav>
      <ul>
        <li><a href="index.html">Home Page</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="cookbook.html">Recipes</a></li>
        <li><a href="adventure.html">Adventures</a></li>
      </ul>
    </nav>
  </header>
  <main class="trivia-main" id="trivia-main">
    <?php 

        $name = $_GET["name"];
        $question1 = $_GET['question1'] ?? 'Error: No answer provided for question 1';
        $question2 = $_GET['question2'] ?? 'Error: No answer provided for question 2';
        $question3 = $_GET['question3'] ?? 'Error: No answer provided for question 3';
       
        $firstLetter1 = strtoupper(substr(trim($question1), 0, 1));
        $firstLetter2 = strtoupper(substr(trim($question2), 0, 1));
        $firstLetter3 = strtoupper(substr(trim($question3), 0, 1));
        
        $okay = true;
        if (!empty($name) && preg_match("~\A[A-Za-z]+(?:[ '-][A-Za-z]+)*\z~", $name)) {
            // Name is valid
        } else {
            echo "<p>Please enter your name again.</p>";
            $okay = false;
        }
       
        if (!empty($question1) && preg_match("~\A[A-Za-z]+(?:[ '-][A-Za-z]+)*\z~", $question1)  && $firstLetter1 === 'C') {
            // Question 1 answer is valid
        } else {
            echo "<p>Please enter a valid answer for question 1.</p>";
            $okay = false;
        }
        if (!empty($question2) && preg_match("~\A[A-Za-z]+(?:[ '-][A-Za-z]+)*\z~", $question2) && $firstLetter2 === 'A') {
            // Question 2 answer is valid
        } else {
            echo "<p>Please enter a valid answer for question 2.</p>";
            $okay = false;
        }
        if (!empty($question3) && preg_match("~\A[A-Za-z]+(?:[ '-][A-Za-z]+)*\z~", $question3)  && $firstLetter3 === 'N') {
            // Question 3 answer is valid
        } else {
            echo "<p>Please enter a valid answer for question 3.</p>";
            $okay = false;
        }
       
        function boldFirstLetter($answer) { // to bold the first letter of the answer and leave the rest of the answer normal
            $answer = trim($answer);

            $firstLetter = substr($answer, 0, 1);
            $remainingLetters = substr($answer, 1);

            return '<b>' . htmlspecialchars($firstLetter, ENT_QUOTES, 'UTF-8') . '</b>'
                . htmlspecialchars($remainingLetters, ENT_QUOTES, 'UTF-8');
            }

       if ($okay == true) {
        $formattedQuestion1 = boldFirstLetter($question1);
        $formattedQuestion2 = boldFirstLetter($question2);
        $formattedQuestion3 = boldFirstLetter($question3);

        echo "<h1>Thank you for your submission, $name!</h1>";
        echo "<p>Congrats you got the trivia answers coorect!!! Your answers were:</p>";
        echo "<ul>";
        echo "<li>Question 1: $formattedQuestion1</li>";
        echo "<li>Question 2: $formattedQuestion2</li>";
        echo "<li>Question 3: $formattedQuestion3</li>";
        echo "</ul>";
        $hint = $firstLetter1 . strtolower($firstLetter2) . strtolower($firstLetter3);
        echo "<p>The hint to the bonus question is $hint?¿? 🤔</p>";
        echo "<p> Please go back to Jub and give him the hint to obtain the bonus questions</p>";
       }
        else {
        echo "<p>There was an error in your submission. Please go back an check all answer are filled and with proper format</p>";
       }
      
       
       ?>
  </main>