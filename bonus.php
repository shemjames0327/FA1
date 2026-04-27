<!DOCTYPE html>
<html>
<head>
    <title>Employee Performance Bonus Evaluation</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1a5f3f;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 500px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 40px;
            animation: slideIn 0.4s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 600;
            letter-spacing: -0.5px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        label {
            font-weight: 600;
            color: #2c3e50;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: #d4af37;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
            background-color: #f8fafb;
        }

        input[type="submit"] {
            width: 100%;
            padding: 14px 24px;
            background-color: #1a5f3f;
            color: #d4af37;
            border: 2px solid #d4af37;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(212, 175, 55, 0.3);
            background-color: #0d3d28;
        }

        input[type="submit"]:active {
            transform: translateY(0);
        }

        .result {
            margin-top: 30px;
            padding: 24px;
            background-color: #f5f5f5;
            border-radius: 10px;
            border-left: 5px solid #d4af37;
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .result div {
            margin-bottom: 12px;
            color: #2c3e50;
            font-size: 14px;
            line-height: 1.6;
        }

        .result div strong {
            font-weight: 700;
            color: #1a5f3f;
        }

        .result div:last-child {
            margin-bottom: 0;
            font-size: 16px;
            padding-top: 12px;
            border-top: 2px solid #d4af37;
            margin-top: 16px;
            color: #1a5f3f;
        }

        .error-message {
            background-color: #fee;
            color: #c33;
            padding: 16px;
            border-radius: 8px;
            border-left: 5px solid #c33;
            font-weight: 500;
        }

        .results-container {
            width: 100%;
            max-width: 500px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 40px;
            animation: slideIn 0.4s ease-out;
            margin-top: 20px;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Employee Bonus Evaluation</h2>

    <form method="post">
        <div class="form-group">
            <label>Employee Name:</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Performance Score (0–100):</label>
            <input type="number" name="score" min="0" max="100" required>
        </div>

        <div class="form-group">
            <label>Base Salary:</label>
            <input type="number" name="salary" step="0.01" required>
        </div>

        <input type="submit" value="Compute Bonus">
    </form>

    <?php
    if (isset($_POST['name'], $_POST['score'], $_POST['salary'])) {

        $name = $_POST['name'];
        $score = $_POST['score'];
        $salary = $_POST['salary'];
        $bonusPercent = 0;

        if ($score < 0 || $score > 100) {
            echo "<div class='result error-message'>Invalid performance score. Please enter a value between 0 and 100.</div>";
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
            echo "<div><strong>Employee Name:</strong> $name</div>";
            echo "<div><strong>Performance Score:</strong> $score / 100</div>";
            echo "<div><strong>Base Salary:</strong> ₱" . number_format($salary, 2) . "</div>";
            echo "<div><strong>Bonus Percentage:</strong> $bonusPercent%</div>";
            echo "<div><strong>Bonus Amount:</strong> ₱" . number_format($bonusAmount, 2) . "</div>";
            echo "<div><strong>Total Salary with Bonus: ₱" . number_format($totalSalary, 2) . "</strong></div>";
            echo "</div>";
        }
    }
    ?>
</div>

</body>
</html>
