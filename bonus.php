<!DOCTYPE html>
<html>
<head>
    <title>Employee Performance Bonus Evaluation</title>
</head>
<body>

<h2>Employee Performance Bonus Evaluation System</h2>

<form method="post">
    <label>Enter Performance Score (0–100):</label><br>
    <input type="number" name="score" required>
    <br><br>
    <input type="submit" value="Check Bonus">
</form>

<?php
if (isset($_POST['score'])) {
    $score = $_POST['score'];

    if ($score < 0 || $score > 100) {
        echo "Invalid performance score.";
    } elseif ($score >= 90) {
        echo "Eligible for 20% Bonus";
    } elseif ($score >= 80) {
        echo "Eligible for 15% Bonus";
    } elseif ($score >= 70) {
        echo "Eligible for 10% Bonus";
    } elseif ($score >= 60) {
        echo "Eligible for 5% Bonus";
    } else {
        echo "No Bonus";
    }
}
?>

</body>
</html>
