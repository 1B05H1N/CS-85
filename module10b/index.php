<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Candidate Description</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Candidate description</h1>
    <form id="login" method="post" action="candidate.php">
        <table>
            <tr>
                <td>
                    <label>Interviewer name:</label>
                </td>
                <td>
                    <input type="text" name="interviewer"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Position:</label>
                </td>
                <td>
                    <input type="text" name="position"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Date of interview:</label>
                </td>
                <td>
                    <input type="date" name="date"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Candidate name:</label>
                </td>
                <td>
                    <input type="text" name="candidate"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Communication abilities:</label>
                </td>
                <td>
                    <input type="text" name="communication"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Computer skills:</label>
                </td>
                <td>
                    <input type="text" name="computerskills"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Business knowledge:</label>
                </td>
                <td>
                    <input type="text" name="businessknowledge"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Comments</label>
                </td>
                <td>
                    <input type="text" name="comments"/>
                </td>
            </tr>
        </table>
        <div>
            <br>
            <input type="submit" class="btn btn-success" value="submit"/>
        </div>
    </form>
</div>

<div>
    <h3><a href="details.php">Interviewed candidate details</a></h3>
</div>
</body>
</html>