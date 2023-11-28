<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<h1> Results for our Shared Survey</h1>
    
    <p>Below you will the results for all questions displayed in their Likert numerals and an average of all current test takers. 
    <br>Since no personal IP address data is taken in this form, if you take again the average will shift. <br>This is nothing like a statistically accurate survey, but it is a good model for your final projects.</p>
    
    <h2> As a reminder, here's your Likert scale:</h2>
    <ul>
        <li> 5 - I Strongly Agree </li>
        <li> 4 - I Agree </li>
        <li> 3 - Neutral </li>
        <li> 2 - I Disagree </li>
        <li> 1 - I Strongly Disagree </li>        
</ul>
    <?php

    error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : "Not answered";
$answer1 = isset($_SESSION["esrig_answer"]) ? (int)$_SESSION["esrig_answer"] : 0;
$answer2 = isset($_SESSION["bannister_answer"]) ? (int)$_SESSION["bannister_answer"] : 0;
$answer3 = isset($_SESSION["blairmoon_answer"]) ? (int)$_SESSION["blairmoon_answer"] : 0;

$total = $answer1 + $answer2 + $answer3;

$servername = "sql109.infinityfree.com";
$username = "if0_35466301";
$password = "FmeknCKAxy6g";
$database = "if0_35466301_UserData";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Prepare the SQL statement
$sql = "INSERT INTO UserSubmission (UserID, Question1, Question2, Question3, Total) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("siiii", $user_id, $answer1, $answer2, $answer3, $total);

// Execute the statement
$stmt->execute();
$stmt->close();

$sql1 = "SELECT AVG(Question1) AS avg_answer1 FROM UserSubmission";
$sql2 = "SELECT AVG(Question2) AS avg_answer2 FROM UserSubmission";
$sql3 = "SELECT AVG(Question3) AS avg_answer3 FROM UserSubmission";

// Execute the SQL statements
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);

// Initialize variables to store averages
$avgAnswer1 = 0;
$avgAnswer2 = 0;
$avgAnswer3 = 0;

// Check if the queries were successful
if ($result1 && $result2 && $result3) {
    // Fetch the results as associative arrays
    $row1 = $result1->fetch_assoc();
    $row2 = $result2->fetch_assoc();
    $row3 = $result3->fetch_assoc();

    // Extract the average values
    $avgAnswer1 = $row1['avg_answer1'];
    $avgAnswer2 = $row2['avg_answer2'];
    $avgAnswer3 = $row3['avg_answer3'];

    // Free the result sets
    $result1->free();
    $result2->free();
    $result3->free();
} else {
    echo "Error: " . $conn->error;
}

        echo "When growing up, you had many friends that were not the same ethnic background as you";
        echo "<p>   Your Answer: $answer1</p>";
        echo "<p>   Average Answer: $avgAnswer1</p>";

        echo "<p>2. Do you agree or disagree with the following statement: implicit bias training helps create more inclusive school and work environments.</p>";
        echo "<p>   Your Answer: $answer2</p>";
        echo "<p>   Average Answer: $avgAnswer2</p>";

        echo "<p>3. Do you agree that Harvard IBT ensures equal accessibility for users with disabilities, such as those with color blindness?</p>";
        echo "<p>   Your Answer: $answer3</p>";
        echo "<p>   Average Answer: $avgAnswer3</p>";

        echo "<p>User's Total: $total</p>";

        // Query to get average total
        $sqlAverageTotal = "SELECT AVG(Total) AS avg_total FROM UserSubmission";
        $resultAverageTotal = $conn->query($sqlAverageTotal);
        $avgTotal = $resultAverageTotal->fetch_assoc()['avg_total'];

        echo "<p>Average Total: $avgTotal</p>";


// Close the connection
$conn->close();

?>




</body>
</html>