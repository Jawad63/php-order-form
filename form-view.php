
<?php // This files is mostly containing things for your view / html ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Your fancy store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Place your order</h1>
    <?php if (!empty($result['message'])) { ?>
        <div class="alert <?php if ($result['errors']) { echo 'alert-danger'; } else { echo 'alert-success'; } ?>">
            <?= $result['message'] ?>
        </div>
    <?php }; ?>

    <!--
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="?food=1">Order playstation 5</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?food=0">Order Xbox X</a>
            </li>
        </ul>
    </nav>
    -->

    <div class="container">
        <div class="row">
            <div class="col-md-4 product">
                <div class="card" style="width: 18rem;">
                    <img src="./IMG/playstation.jpg" class="card-img-top" alt="playstation">
                    <div class="card-body">
                        <h5 class="card-title">Playstation 5</h5>
                        <p class="card-text">Get your hands on the new PS5 :)</p>
                        <a href="#" class="btn btn-primary">Order now!</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 product">
                <div class="card" style="width: 18rem;">
                    <img src="./IMG/xbox.jpg" class="card-img-top" alt="xbox">
                    <div class="card-body">
                        <h5 class="card-title">Xbox X</h5>
                        <p class="card-text">Or just buy this :/</p>
                        <a href="#" class="btn btn-primary">Order?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    <form method="post" >

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" class="form-control"/>
                <span class="error">*<?php echo $emailErr;?></span>
            </div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label>
                    <input type="text" id="streetnumber" name="streetnumber" class="form-control">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control">
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Products</legend>

            <?php foreach ($products as $i => $product): ?>
                <label>
					<?php // <?p= is equal to <?php echo ?>
                    <input type="checkbox" value="1" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                    &euro; <?= number_format($product['price'], 2) ?></label><br />
            <?php endforeach; ?>
            
        </fieldset>

        <button type="submit" class="btn btn-primary">Order!</button>
    </form>



    <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> worth of electronics!</footer>
</div>

</body>
</html>