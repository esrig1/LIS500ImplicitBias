<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<?php
if (isset($_POST['start_survey'])) {
    session_start();
    $_SESSION['answers'] = array();
    $user_id = uniqid();
    $_SESSION['user_id'] = $user_id;
    header("Location: q-esrig.php");
    exit();
}
?>

<div class="container" id = "bio-card">
    <div class="bio-content">
        <p>Hey, my name is Joshua Esrig, and this is a site for LIS 500,
            a course named Code and Power. Our coursework has focused on the
            role of power relations, race, class, and gender as they shape our 
            digital experiences. 
            
            <br> <br>
            This website aims to improve Harvard's <strong>Implicit Bias</strong> test,
            based on criticisms we came to as a class. Enter below!

        </p>
    </div>
    <div class="bio-info">
        <img src="images/profile.png" alt="Profile Picture" class="profile-picture">
        <div class="basic-info">
            <p><strong>Year:</strong> Senior</p>
            <p><strong>Major:</strong> CS</p>
        </div>
    </div>
</div>

<div class="container">
    <h1>Implicit Bias Overhaul</h1>
    <p>Your submission data is recorded, but anonymously for data purposes</p>
    <form action="index.php" method="post">
        <input type="submit" name="start_survey" value="Start Survey">
    </form>
</div>

</body>
</html>
