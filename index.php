<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3x + 1 Function Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h2 {
            text-align: center;
        }
        form {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Calculate 3x + 1 Function</h2>
    <form action="index.php" method="post">
        <label for="start">Start Number:</label>
        <input type="number" id="start" name="start">
        <label for="end">End Number:</label>
        <input type="number" id="end" name="end">
        <button type="submit">Calculate</button>
    </form>

    <?php
    require_once 'ExtendedCalculator.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $start_custom = $_POST["start"];
        $end_custom = $_POST["end"];

        if (!is_null($start_custom) && !is_null($end_custom)) {
            $calculator = new ExtendedCalculator();
            $results_custom = $calculator->calculateRangeCustom($start_custom, $end_custom);

            echo "<h3>Results:</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Number</th><th>Max Value</th><th>Iterations</th></tr>";
            foreach ($results_custom as $result_custom) {
                echo "<tr><td>{$result_custom['number_custom']}</td><td>{$result_custom['max_value_custom']}</td><td>{$result_custom['iterations_custom']}</td></tr>";
            }
            echo "</table>";

            $histogram = $calculator->calculateHistogram($start_custom, $end_custom);

            echo "<h3>Histogram:</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Iteration Value</th><th>Frequency</th></tr>";
            foreach ($histogram as $value => $frequency) {
                echo "<tr><td>$value</td><td>$frequency</td></tr>";
            }
            echo "</table>";

            $max_iterations_number_custom = $calculator->findMaxIterationsCustom($results_custom);
            $min_iterations_number_custom = $calculator->findMinIterationsCustom($results_custom);

            echo "<h3>Number with Maximum Iterations:</h3>";
            echo "Number: {$max_iterations_number_custom['number_custom']}<br>";
            echo "Iterations: {$max_iterations_number_custom['iterations_custom']}<br>";
            echo "Max Value: {$max_iterations_number_custom['max_value_custom']}<br>";

            echo "<h3>Number with Minimum Iterations:</h3>";
            echo "Number: {$min_iterations_number_custom['number_custom']}<br>";
            echo "Iterations: {$min_iterations_number_custom['iterations_custom']}<br>";
            echo "Max Value: {$min_iterations_number_custom['max_value_custom']}<br>";
        } else {
            echo "Please provide both start and end numbers.";
        }
    }
    ?>
</body>
</html>
