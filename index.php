<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}


$emailErr = $streetErr = $streetNumberErr = $cityErr = $zipcodeErr = "";
$email = $street = $streetNumber = $city = $zipcode = "";
$check = $check1 = $check2 = $check3 = $check4 = "";

 //check if the user enter a valid mail
if (empty($_POST["email"])) {
    $emailErr = "* Email is required";
} else {
    $email = test_input($_POST["email"]);
    $check = true;
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr= "* Invalid email format";
        $check = false;
    }
}
// check if the user enter a valid street
if (empty($_POST["street"])) {
    $streetErr = "* street is required";
} else {
    $street= test_input($_POST["street"]);
    $check1 = true;
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$street)) {
        $streetErr = "Only letters and white space allowed";
        $check1 = false;
    }
}
// check if the user enter a valid street number
if (empty($_POST["streetnumber"])) {
    $streetNumberErr = "* street number is required";
} else {
    $streetNumber= test_input($_POST["streetnumber"]);
    $check2 = true;
    // check if name only contains letters and whitespace
    if (!is_numeric($streetNumber)) {
        $streetNumberErr = "Only letters and white space allowed";
        $check2 = false;
    }
}
//check if the user enter a valid city
if (empty($_POST["city"])) {
    $cityErr = "* city is required";
} else {
    $city = test_input($_POST["city"]);
    $check3 = true;
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$city)) {
        $cityErr = "Only letters and white space allowed";
        $check3 = false;
    }
}
//check if the user enter a valid postal code
if (empty($_POST["zipcode"])) {
    $zipcodeErr = "* street number is required";
} else {
    $zipcode= test_input($_POST["zipcode"]);
    $check4 = true;
    // check if name only contains letters and whitespace
    if (!is_numeric($zipcode)) {
        $zipcodeErr = "Only letters and white space allowed";
        $check4 = false;
    }
}

///////////
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


//your products with their price.
$pizza = [
    ['name' => 'Margherita', 'price' => 8],
    ['name' => 'Hawaï', 'price' => 8.5],
    ['name' => 'Salami pepper', 'price' => 10],
    ['name' => 'Prosciutto', 'price' => 9],
    ['name' => 'Parmiggiana', 'price' => 9],
    ['name' => 'Vegetarian', 'price' => 8.5],
    ['name' => 'Four cheeses', 'price' => 10],
    ['name' => 'Four seasons', 'price' => 10.5],
    ['name' => 'Scampi', 'price' => 11.5]
];

$drinks = [
    ['name' => 'Water', 'price' => 1.8],
    ['name' => 'Sparkling water', 'price' => 1.8],
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 2.2],
];
//if ( $check && $check1 && $check2 && $check3 && $check4 ) {
//    echo 'envoyé';
//}
//else{
//    echo 'NOPE';
//}

$totalValue = 0;


require 'src/form-view.php';

?>
