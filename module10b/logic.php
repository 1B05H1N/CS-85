<?php

require('connect.php');

$querystring = "select * from candidate";
$queryresult = mysqli_query($DBConnection, $querystring);

$i = 0;
$counter = 1;

if (!(mysqli_num_rows($queryresult) <= 0)) while ($data = $queryresult->fetch_assoc()) {
    extract($data);

    ?>

    <tr>

        <td>
            <?php
            echo $counter
            ?>
        </td>

        <td>
            <?php echo
            $data["interviewer"];
            ?>
        </td>

        <td>
            <?php
            echo $data["position"];
            ?>
        </td>

        <td>
            <?php
            echo $data["date"];
            ?>
        </td>

        <td>
            <?php
            echo $data["candidate"];
            ?>
        </td>

        <td>
            <?php
            echo $data["communication"];
            ?>
        </td>

        <td>
            <?php
            echo $data["computerskills"];
            ?>
        </td>

        <td>
            <?php
            echo $data["businessknowledge"];
            ?>
        </td>

        <td>
            <?php
            echo $data["comments"];
            ?>
        </td>

    </tr>

    <?php
    $i++;
    $counter++;
}
?>