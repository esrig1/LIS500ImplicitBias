<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Perceptions of the Harvard Implicit Bias test | LIS 500 Assignment 4</title>    
    <!-- Import the Google Fonts: -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@500&family=IBM+Plex+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/survey.css">

</head>
<body>
<?php

//creates a user session for the form, only does this after the first quesiton
session_start();
$user_id = $_SESSION['user_id'];
$question_text = "Do you agree that Harvard IBT ensures equal accessibility for users with disabilities, such as those with color blindness?";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedAnswer = isset($_POST['answer']) ? $_POST['answer'] : null;
    $_SESSION['blairmoon_answer'] = $selectedAnswer;
    header("Location: end.php");
    exit();
}


?>

<form method="post" action="q-blairmoon.php">
    <?php echo '<h1>'.$question_text.'</h1>'; ?>
    <?php echo '<p><input type="hidden" name="user_id" value="'.$user_id.'" /></p>'; ?>
    <?php echo '<p><input type="hidden" name="question" value="'.$question_text.'" /></p>'; ?>
    <p><input type="radio" name="answer" value="5" /> I Strongly Agree</p>
    <p><input type="radio" name="answer" value="4" /> I Agree</p>
    <p><input type="radio" name="answer" value="3" /> Neutral</p>
    <p><input type="radio" name="answer" value="2" /> I Disagree</p>
    <p><input type="radio" name="answer" value="1" /> I Strongly Disagree</p>
    <p><input type="submit" value="Continue" /></p>
</form>
	</main>
</div>
<footer>
    
<!-- Text and design from Ben Pettis Spring 2021 -->     
	<p>
	When you participate in this survey, information about your answers is submitted to the website and stored in a database. Your responses to individual questions are associated with one another via a random id that was generated when you visited the first survey page. This id is not generated based on any of your personal information and to our knowledge there is no way to associate this random id with you or any other of yoru personal information.
	</p>
	<p>
	Once you leave the survey, no further information is collected by this website. While we appreciate everyone completing all of the survey questions, you are welcome to leave at any time. Because your user id is randomly generated every time that you visit the survey starting page, there is no way to return to your in-progress responses at a later time.
	</p>
	<br />
	&copy; <?php echo date('Y');?> <br />
	All Rights Reserved
</footer>
</body>
</html>