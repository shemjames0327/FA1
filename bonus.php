<!DOCTYPE html>
<html>
<head>
    <title>Employee Performance Bonus Evaluation</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            width: 450px;
            margin: 60px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #eef;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Employee Bonus Evaluation</h2>

    <form method="post">
        <label>Employee Name:</label>
        <input type="text" name="name" required>

        <label>Performance Score (0–100):</label>
        <input type="number" name="score" required>

        <label>Base Salary:</label>
        <input type="number" name="salary" required>

        <input type="submit" value="Compute Bonus">
    </form>

    <?php
    if (isset($_POST['name'], $_POST['score'], $_POST['salary'])) {

        $name = $_POST['name'];
        $score = $_POST['score'];
        $salary = $_POST['salary'];
        $bonusPercent = 0;

        if ($score < 0 || $score > 100) {
            echo "<div class='result'>Invalid performance score.</div>";
        } else {

            if ($score >= 90) {
                $bonusPercent = 20;
            } elseif ($score >= 80) {
                $bonusPercent = 15;
            } elseif ($score >= 70) {
                $bonusPercent = 10;
            } elseif ($score >= 60) {
                $bonusPercent = 5;
            } else {
                $bonusPercent = 0;
            }

            $bonusAmount = $salary * ($bonusPercent / 100);
            $totalSalary = $salary + $bonusAmount;

            echo "<div class='result'>";
            echo "Employee Name: $name<br>";
            echo "Performance Score: $score<br>";
            echo "Base Salary: ₱$salary<br>";
            echo "Bonus Percentage: $bonusPercent%<br>";
            echo "Bonus Amount: ₱$bonusAmount<br>";
            echo "<strong>Total Salary with Bonus: ₱$totalSalary</strong>";
            echo "</div>";
        }
    }
    ?>
</div>

</body>
</html>
