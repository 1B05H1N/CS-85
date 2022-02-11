<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music Sounds</title>
</head>
<body>
<h1>Song Organizer</h1>
<?php

//Comment: What does this if statement check for exactly? - If/else loops+switch/case statement that checks if the action param is being passed in the GET array. Checking if param passed is an existing file. If it's not an existing file then it returns false. If the file exists and is not 0, then it's read into an array.
if (isset($_GET['action'])) {
    if ((file_exists("SongOrganizer/songs.txt")) && (filesize("SongOragnizer/songs.,txt") != 0)) {
        $SongArray = file("SongOrganizer/songs/.txt");

        //Comment: Explain line 16-27 - Switch/case that compares the action param passed in the _GET array with existing array values. If there is a match on a case then dupes are removed, then all unique values are returned. If shuffle is passed then the SongArray is shuffled.
        switch ($_GET['action']) {
            case 'Remove Duplicates':
                $SongArray = array_unique($SongArray);
                $SongArray = array_values($SongArray);
                break;
            case 'Sort Ascending':
                sort($SongArray);
                break;
            case 'Shuffle':
                shuffle($SongArray);
                break;
        }

        //Comment: What does this if statement do? - If/else loops that check the length of the SongArray. If it's greater than 0, then the array elements are joined and added to a songs.txt file. If there was an issue opening the file, then an error message is returned. If the array length is less than 0, then the file is deleted.
        if (count($SongArray) > 0) {
            $NewSongs = implode($SongArray);
            $SongStore = fopen("SongOrganizer/songs.txt", "wb");
            if ($SongStore == false)
                echo "There was an error updating the song file\n";
            else {
                fwrite($SongStore, $NewSongs);
                fclose($SongStore);
            }
        } else unlink("SongOrganizer/songs.txt");

    }

}

//Comment: Explain line 47 - Checking if submit is set in the $_POST array. If so, then slashes are stripped, a new line is added and an array is created.
if (isset($_POST['submit'])) {
    $SongToAdd = stripslashes($_POST['SongName']) . "\n";
    $ExistingSongs = array();

    //Comment: Explain line 51 - 69 - Some nested if/else loops; if the file exists and the filesize is greater than 0, then add it to the list unless it already exists in the file.
    if (file_exists("SongOrganizer.txt") && filesize("SongOrganizer/songs.txt") > 0) {
        $ExistingSongs = file("SongOrganizer/songs.txt");

        if(in_array($SongToAdd, $ExistingSongs)) {
            echo "<p>The song you entered already exists!<br />\n";
            echo "Your song was not added to the list.</p>";
        } else {
            $SongFile = fopen("SongOrganizer/songs.txt", "ab");
            if ($SongFile === false)
               echo "There was an error saving your message!\n";
            else {
                fwrite($SongFile, $SongToAdd);
                fclose($SongFile);
                echo "Your song has been added to the list.\n";
            }
        }

    }
}

//Comment: Explain line 73 - 84 - An if/else loop; if the file doesn't exist or is filesize 0, then the user is returned a message. Else the song names are listed in a table.
if ((!file_exists("SongOrganizer/songs.txt")) || (filesize("SongOrganizer/songs.txt") == 0))
    echo "<p>There are no songs in the list.</p>\n";
else {
    $SongArray = file("SongOrganizer/songs.txt");
    echo "<table border=\"1\" width=\"100%\" style=\"background-color:lightgray\">\n";
    foreach ($SongArray as $Song) {
        echo "<tr>\n";
        echo "<td>" . htmlentities($Song) . "</td>";
        echo "</tr>\n";
    }
    echo "</table>\n";
}
?>


<p> <a href = "SongOrganizer.php?action=Sort%20Ascending"> Sort Song List</a><br />
    <a href = "SongOrganizer.php?action=Remove%20Duplicates"> Remove Duplicate Songs</a><br />
    <a href = "SongOrganizer.php?action=Shuffle"> Randomize Song List</a><br />
</p>

<form action="SongOrganizer.php" method="post">
    <p>Add a New Song</p>
    <p>Song Name: <input type="text" name="SongName" /></p>
    <p>
        <input type="submit" name="submit" value="Add Song to List" />
        <input type="reset" name="reset" value="Reset Song Name" />
    </p>
</form>


</body>
</html>
