<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Movie Class</title>
</head>

<?php
class Movies
{
    private $age = 0;
    public function age($age)
    {
        $this->age=$age;
    }

    public function price($ticket)
    {
        if($this->age<5)
            return 0;
        else {
            if ( $this->age <= 17) {
                return $ticket / 2;
            } else if ($this->age >= 17) {
                if ($this->age < 55) {
                    return $ticket;
                } else {
                    return $ticket - 2;
                }
            }
        }
    }
}

echo "<h1><em><b>🎥🎥🎥 CINEMA PRICES 🎥🎥🎥</b></em></h1>\n\n<p><b>Under five years old?</b> <sup>(how did you read that?)</sup> Price is Free.99 👶</p><p>5 through 17 pay <em>half price</em> 🧒</p><p>😞😞😞 18 through 55 pay <mark>full price</mark>, <sub>sorry</sub> 😞😞😞</p><p> Over 55 get 2 whole dollars off 👴</p>";
echo "<p><h3>💵💵💵<mark><i> EXAMPLE PRICES! </i></mark>💵💵💵</h3></p>";

$price = 10;
$movies = new Movies();

// Wasn't sure if I was supposed to create a form to pass in age via a POST or something, so provided a few example price calculations
$movies -> age(1);
$ticket = $movies -> price($price);
echo "<p><em>1 year olds pay <b>$$ticket</b>.</em></p>\n";

$movies -> age(5);
$ticket = $movies -> price($price);
echo"<p><em>5 year olds pay <b>$$ticket</b>.</em></p>\n";

$movies -> age(56);
$ticket = $movies -> price($price);
echo"<p><em>56 year olds pay <b>$$ticket</b>.</em></p>\n";

?>

</body>
</html>
