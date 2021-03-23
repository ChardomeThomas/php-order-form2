<?php

$cookie_name = "user";
$cookie_value = "customer";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
error_reporting(E_ERROR | E_PARSE);

$products = $pizza;
if($_GET['food'] !== null) {
if ($_GET['food'] == false){
$products = $drinks;
}
}





?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Order Pizzas & drinks</title>
</head>
<body>
<?php

//if(!isset($_COOKIE[$cookie_name])) {
//    echo "Cookie named '" . $cookie_name . "' is not set!";
//} else {
//    echo "Cookie '" . $cookie_name . "' is set!<br>";
//    echo "Value is: " . $_COOKIE[$cookie_name];
//}
?>
<div class="container">
    <h1>Order pizzas in restaurant "the Personal Pizza Processors"</h1>
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="?food=1">Order pizzas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?food=0">Order drinks</a>
            </li>
        </ul>
    </nav>

    <form method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" class="form-control" value="<?php echo $email; ?>"/>
                <span class="error"> <?php echo $emailErr;?>
            </div>
            <div></div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control" value="<?php echo $street; ?>">
                    <span class="error"> <?php echo $streetErr;?>
                </div>
                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label>
                    <input type="text" id="streetnumber" name="streetnumber" class="form-control" value="<?php echo $streetNumber; ?>">
                    <span class="error"> <?php echo $streetNumberErr;?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control" value="<?php echo $city; ?>">
                    <span class="error"> <?php echo $cityErr;?>
                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control" value="<?php echo $zipcode; ?>">
                    <span class="error"> <?php echo $zipcodeErr;?>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
            <?php foreach ($products AS $i => $product): ?>
                <label>
                    <input type="checkbox" value="1" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                    &euro; <?php echo number_format($product['price'], 2) ?></label><br />
            <?php endforeach; ?>
        </fieldset>

        <label>
            <input type="checkbox" name="express_delivery" value="5" />
            Express delivery (+ 5 EUR)
        </label>

        <button type="submit" class="btn btn-primary">Order!</button>
    </form>
    <?php
    if ( $check && $check1 && $check2 && $check3 && $check4 ) {


        foreach ($_POST['products'] AS $i => $product){
            $totalValue += $products[$i]['price'];
        }
        if ($totalValue != 0){
            echo '<div class="alert alert-success" role="alert">
         Commande envoyée !
</div>';
            if (isset($_POST['express_delivery'])){

                $totalValue += $_POST['express_delivery'];
                echo "livraison dans 30min";


            }
            else{
                echo "livraison dans 1h";
            }
        }

        echo '<footer>You already ordered <strong>€';  echo $totalValue; echo '</strong> in pizza(s) and drinks.</footer>';

    }
    else{
        echo '<div class="alert alert-danger" role="alert">
         Veuillez remplir vos informations!
</div>';
    }

    ?>

</div>

<style>
    footer {
        text-align: center;
    }
    .error {color: #FF0000;}
</style>
</body>
</html>
