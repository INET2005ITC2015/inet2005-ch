<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 9/24/15
 * Time: 7:21 PM
 */

$firstName = $_GET['firstName'];
$lastName = $_GET['lastName'];
$month = $_GET['bMonth'];
$day = $_GET['bDay'];
$zodiac = "";

//http://phpsnips.com/115/Zodiac-Signs
if(( $month == 3 && $day > 20) || ($month == 4 && $day < 20 )) {
    $zodiac = "Aries";
}
elseif(($month == 4 && $day > 19) || ($month == 5 && $day < 21)) {
    $zodiac = "Taurus";
}
elseif(( $month == 5 && $day > 20) || ($month == 6 && $day < 21)) {
    $zodiac = "Gemini";
}
elseif(( $month == 6 && $day > 20) || ($month == 7 && $day < 23)) {
    $zodiac = "Cancer";
}
elseif(( $month == 7 && $day > 22) || ($month == 8 && $day < 23)) {
    $zodiac = "Leo";
}
elseif(( $month == 8 && $day > 22) || ($month == 9 && $day < 23)) {
    $zodiac = "Virgo";
}
elseif(( $month == 9 && $day > 22) || ($month == 10 && $day < 23)) {
    $zodiac = "Libra";
}
elseif(( $month == 10 && $day > 22) || ($month == 11 && $day < 22)) {
    $zodiac = "Scorpio";
}
elseif(( $month == 11 && $day > 21) || ($month == 12 && $day < 22)) {
    $zodiac = "Sagittarius";
}
elseif(( $month == 12 && $day > 21) || ($month == 1 && $day < 20)) {
    $zodiac = "Capricorn";
}
elseif(( $month == 1 && $day > 19) || ($month == 2 && $day < 19)) {
    $zodiac = "Aquarius";
}
elseif(( $month == 2 && $day > 18) || ($month == 3 && $day < 21)) {
    $zodiac = "Pisces";
}
else {
    echo "Enter your birthday using numerical values";
    $zodiac = "_ERROR_";
}

echo "<h3>$firstName $lastName your zodiac sign is $zodiac!</h3>";
