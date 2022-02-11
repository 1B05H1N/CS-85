<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Candidate Database</title>
</head>

<link rel="stylesheet" href="style.css">

<body>

<h1>Candidate details:</h1>

<div class="container">

    <table class="table">
        <thead>
        <tr>
            <th>Number</th>
            <th>Interviewer</th>
            <th>Position</th>
            <th>Date</th>
            <th>Candidate</th>
            <th>Communication abilities</th>
            <th>Computer skills</th>
            <th>Business knowledge</th>
            <th>Comment</th>
        </tr>
        </thead>

        <tbody>
            <?php
            require('logic.php')
            ?>
        </tbody>
    </table>
</div>

<div>
    <h3><a href="index.php"">Return to interviewer page</a></h3>
</div>

</body>
</html>