<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>You have reached the end!</p>
    <?php 
        session_start(); // Make sure to start the session before accessing session variables

        $answer1 = isset($_SESSION["esrig_answer"]) ? $_SESSION["esrig_answer"] : "Not answered";
        $answer2 = isset($_SESSION["bannister_answer"]) ? $_SESSION["bannister_answer"] : "Not answered";
        $answer3 = isset($_SESSION["blairmoon_answer"]) ? $_SESSION["blairmoon_answer"] : "Not answered";

        echo $answer1 . " " . $answer2 . " " . $answer3;

        $servername = "sql109.infinityfree.com";
        $username = "if0_35466301";
        $password = "FmeknCKAxy6g";
        $database = "if0_35466301_UserData";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            echo "Connected successfully";
        }
    ?>

</body>
</html>