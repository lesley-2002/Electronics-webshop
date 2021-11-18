<?php

include('database_connection.php');

$id = $_GET["id"];
$name = "";
$price = "";
$image = "";
$smalldesc = "";
$desc = "";
$category = "";
$brand = "";
$mpn = "";
$model = "";
$ean = "";
$afmetingen = "";
$color = "";
$toetsenbordindeling = "";
$wireless = "";
$kabellengte = "";
$inputoutput = "";
$opslag = "";
$muisvorm = "";
$handside = "";
$voedingstype = "";
$draadloosbereik = "";
$inclusiefbatterijen = "";
$aantalbatterijen = "";
$accubatterijcode = "";
$oplaadbaar = "";
$scrollwiel = "";
$aantalmuisknoppen = "";
$dpi = "";
$instelbaredpi = "";
$typeverlichting = "";
$geschiktvoorbesturingssystemen = "";
$aantalstuksinverpakking = "";
$opslagcapaciteit = "";
$sluiting = "";
$maximaleleessnelheid = "";
$maximaleschrijfsnelheid = "";
$typeaansluiting = "";
$connectortype = "";
$rotatiesnelheid = "";
$formaathardeschijf = "";

$query = "SELECT * FROM product WHERE product_status = '1' AND product_id = '$id'";

$statement = $connect->prepare($query);
$result = $connect->query($query);
$total_row = mysqli_num_rows($result);
$output = '';
if ($total_row > 0) {
    foreach ($result as $row) {
        $name = $row['product_name'];
        $price = $row['product_price'];
        $image = $row['product_image'];
        $smalldesc = $row['product_smalldesc'];
        $desc = $row['product_desc'];
        $category = $row['product_category'];
        $brand = $row['product_brand'];
        $mpn = $row['product_mpn'];
        $model = $row['product_model'];
        $ean = $row['product_ean'];
        $afmetingen = $row['product_afmetingen'];
        $color = $row['product_color'];
        $toetsenbordindeling = $row['product_toetsenbordindeling'];
        $wireless = $row['product_wireless'];
        $kabellengte = $row['product_kabellengte'];
        $inputoutput = $row['product_inputoutput'];

        $opslag = $row['product_opslag'];
        $muisvorm = $row['product_muisvorm'];
        $handside = $row['product_handside'];
        $voedingstype = $row['product_voedingstype'];
        $draadloosbereik = $row['product_draadloosbereik'];
        $inclusiefbatterijen = $row['product_inclusiefbatterijen'];
        $aantalbatterijen = $row['product_aantalbatterijen'];
        $accubatterijcode = $row['product_accubatterijcode'];
        $oplaadbaar = $row['product_oplaadbaar'];
        $scrollwiel = $row['product_scrollwiel'];
        $aantalmuisknoppen = $row['product_aantalmuisknoppen'];
        $dpi = $row['product_dpi'];
        $instelbaredpi = $row['product_instelbaredpi'];
        $typeverlichting = $row['product_typeverlichting'];
        $geschiktvoorbesturingssystemen = $row['product_geschiktvoorbesturingssystemen'];
        $aantalstuksinverpakking = $row['product_aantalstuksinverpakking'];
        $opslagcapaciteit = $row['product_opslagcapaciteit'];
        $sluiting = $row['product_sluiting'];
        $maximaleleessnelheid = $row['product_maximaleleessnelheid'];
        $maximaleschrijfsnelheid = $row['product_maximaleschrijfsnelheid'];
        $typeaansluiting = $row['product_typeaansluiting'];
        $connectortype = $row['product_connectortype'];
        $rotatiesnelheid = $row['product_rotatiesnelheid'];
        $formaathardeschijf = $row['product_formaathardeschijf'];

        $all = [
            $name, $price, $image, $smalldesc, $desc, $category, $brand, $mpn, $model, $ean, $afmetingen, $color,
            $toetsenbordindeling, $wireless, $kabellengte, $inputoutput,
            $opslag, $muisvorm, $handside, $voedingstype, $draadloosbereik,
            $inclusiefbatterijen, $aantalbatterijen, $accubatterijcode,
            $oplaadbaar, $scrollwiel, $aantalmuisknoppen, $dpi, $instelbaredpi,
            $typeverlichting, $geschiktvoorbesturingssystemen, $aantalstuksinverpakking,
            $opslagcapaciteit, $sluiting, $maximaleschrijfsnelheid, $maximaleleessnelheid,
            $typeaansluiting, $connectortype, $rotatiesnelheid, $formaathardeschijf
        ];
    }
} else {
    $output = '<h3>No Data Found</h3>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="product_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title><?php echo $name ?></title>
</head>

<body>
    <div class="nav">
        <a href="index.html">
            <img src="assets/Header Logo.png" alt="">
        </a>

        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="about-us.html">About Us</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>

    </div>

    <div class="product">
        <div class="container">
            <div class="col">
                <img src="assets/products/<?php echo $image ?>" alt="">
            </div>
            <div class="col">
                <h1><?php echo $name ?></h1>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <p><?php echo $smalldesc ?></p>
                <input type="number" name="quantity" id="quantity">
                <button>Toevoegen aan winkelmand</button>

                <!----<p class="delivery on-stock">Dit product is op voorraad! Voor 19:00 besteld, morgen in huis.</p>--->
                <!----<p class="delivery no-stock">Dit product is niet op voorraad! Voor 19:00 besteld, overmorgen in huis.</p>
                <p class="delivery no-no-stock">Dit product is tijdelijk niet leverbaar!</p>--->
                <p><i class="fas fa-check-circle"></i> Dit product is op voorraad! Voor 19:00 besteld, morgen in huis.</p>
                <p><i class="fas fa-check-circle"></i> Niet goed, geld terug garrantie</p>
                <p><i class="fas fa-check-circle"></i> Volg je pakket met PostNL</p>
            </div>
        </div>
    </div>

    <div class="details">
        <div class="container">
            <div class="toggler">
                <button id="btn1" class="active">Omschrijving</button>
                <button id="btn2">Eigenschappen</button>
                <button id="btn3">Beoordelingen</button>
            </div>




            <div class="description" id="description">
                <h2>Beschrijving</h2>
                <p><?php echo $desc ?></p>
            </div>
            <div class="properties" id="properties" style="display: none;">
                <table>
                    <?php
                    echo "
                    <tr>
                    <td class='p-name'>Merk</td>
                    <td class='p-value'>$brand</td>
                    </tr>
                    ";
                    echo "
                    <tr>
                    <td class='p-name'>MPN</td>
                    <td class='p-value'>$mpn</td>
                    </tr>
                    ";
                    echo "
                    <tr>
                    <td class='p-name'>Model</td>
                    <td class='p-value'>$model</td>
                    </tr>
                    ";
                    echo "
                    <tr>
                    <td class='p-name'>EAN</td>
                    <td class='p-value'>$ean</td>
                    </tr>
                    ";
                    if ($category == "Toetsenbord") {
                        echo "
                        <tr>
                        <td class='p-name'>Afmetingen</td>
                        <td class='p-value'>$afmetingen</td>
                        </tr>
                        ";
                        echo "
                        <tr>
                        <td class='p-name'>Kleur</td>
                        <td class='p-value'>$color</td>
                        </tr>
                        ";
                        echo "
                        <tr>
                        <td class='p-name'>Toetsenbordindeling</td>
                        <td class='p-value'>$toetsenbordindeling</td>
                        </tr>
                        ";
                        echo "
                        <tr>
                        <td class='p-name'>Draadloos</td>
                        <td class='p-value'>$wireless</td>
                        </tr>
                        ";
                        echo "
                        <tr>
                        <td class='p-name'>Kabellengte</td>
                        <td class='p-value'>$kabellengte</td>
                        </tr>
                        ";
                        echo "
                        <tr>
                        <td class='p-name'>Type input/output</td>
                        <td class='p-value'>$inputoutput</td>
                        </tr>
                        ";
                    }
                    ?>

                </table>
            </div>
            <div class="reviews" id="reviews" style="display: none;">

                <?php
                $query = "SELECT * FROM reviews WHERE product = '$id'";

                $statement = $connect->prepare($query);
                $result = $connect->query($query);
                $reviewcount = mysqli_num_rows($result);
                $output = '';
                echo "<p class='totalReview'>All Reviews " . $reviewcount;
                "</p>";
                if ($total_row > 0) {
                    foreach ($result as $row) {
                        $rating = $row['rating'];

                        echo "<div class='rating'>";
                        echo "<i class='fas fa-user-circle'></i>";
                        echo "<p class='reviewerName'>" . $row['name'] . "</p>";


                        if ($rating == 0.5) {
                            echo "<i class='fas fa-star-half-alt'></i>";
                        } else if ($rating == 1) {
                            echo "<i class='fas fa-star'></i>";
                        } else if ($rating == 1.5) {
                            echo "<i class='fas fa-star'></i>";
                            echo "<i class='fas fa-star-half-alt'></i>";
                        } else if ($rating == 2) {
                            echo "<i class='fas fa-star'></i>";
                            echo "<i class='fas fa-star'></i>";
                        } else if ($rating == 2.5) {
                            echo "<i class='fas fa-star'></i>";
                            echo "<i class='fas fa-star'></i>";
                            echo "<i class='fas fa-star-half-alt'></i>";
                        } else if ($rating == 3) {
                            echo "<i class='fas fa-star'></i>";
                            echo "<i class='fas fa-star'></i>";
                            echo "<i class='fas fa-star'></i>";
                        } else if ($rating == 3.5) {
                            echo "<i class='fas fa-star'></i>";
                            echo "<i class='fas fa-star'></i>";
                            echo "<i class='fas fa-star'></i>";
                            echo "<i class='fas fa-star-half-alt'></i>";
                        } else if ($rating == 4) {
                            echo "<i class='fas fa-star'></i>";
                            echo "<i class='fas fa-star'></i>";
                            echo "<i class='fas fa-star'></i>";
                            echo "<i class='fas fa-star'></i>";
                        } else if ($rating == 4.5) {
                            echo "<i class='fas fa-star'></i>";
                            echo "<i class='fas fa-star'></i>";
                            echo "<i class='fas fa-star'></i>";
                            echo "<i class='fas fa-star'></i>";
                            echo "<i class='fas fa-star-half-alt'></i>";
                        } else if ($rating == 5) {
                            echo "<i class='fas fa-star'></i>";
                            echo "<i class='fas fa-star'></i>";
                            echo "<i class='fas fa-star'></i>";
                            echo "<i class='fas fa-star'></i>";
                            echo "<i class='fas fa-star'></i>";
                        }
                        echo "<p class='comment'>" . $row['comment'] . "</p>";
                        echo "</div>";
                    }
                } else {
                    $output = '<h3>No Data Found</h3>';
                }

                ?>

            </div>
        </div>

    </div>

    <div class="recommended-products">
        <div class="container">
            <h2>Andere bekeken ook</h2>

            <?php
            $query = "SELECT * FROM product WHERE product_category = 'toetsenbord' limit 4";

            $statement = $connect->prepare($query);
            $result = $connect->query($query);
            $total_row = mysqli_num_rows($result);
            $output = '';
            if ($total_row > 0) {
                foreach ($result as $row) {
                    $output .= '
   <div class="card">
    <div style="border:1px solid #ccc; padding:16px; margin-bottom:16px; height:400px;">
     <img style="width:100%" src="assets/products/' . $row['product_image'] . '" class="card-img">
     <p align="center"><strong><a href="product.php?id=' . $row['product_id'] . '" class="name">' . $row['product_name'] . '</a></strong></p>
     
     <p style="text-align:center;">' . $row['product_camera'] . ' MP
     ' . $row['product_brand'] . ' 
     ' . $row['product_ram'] . ' GB
     ' . $row['product_storage'] . ' GB </p>
     <h4 class="price" style="text-align:center;" class="text-danger" >&euro; ' . $row['product_price'] . '</h4>
    </div>

   </div>
   ';
                }
            } else {
                $output = '<h3>No Data Found</h3>';
            }
            echo $output;
            ?>
        </div>
    </div>



    <script>
        var btn1 = document.getElementById('btn1');
        var btn2 = document.getElementById('btn2');
        var btn3 = document.getElementById('btn3');

        var divDesc = document.getElementById('description');
        var divProp = document.getElementById('properties');
        var divReviews = document.getElementById('reviews');

        $("#btn1").on("click", function() {
            var htmlString = $(this).html();
            divDesc.style.display = 'block';
            btn1.className += '.active';
            divProp.style.display = 'none';
            divReviews.style.display = 'none';
            $("#btn1").addClass("active");
            $("#btn2").removeClass("active");
            $("#btn3").removeClass("active");
        });
        $("#btn2").on("click", function() {
            var htmlString = $(this).html();
            divDesc.style.display = 'none';
            divProp.style.display = 'block';
            $("#btn1").removeClass("active");
            $("#btn2").addClass("active");
            $("#btn3").removeClass("active");
            divReviews.style.display = 'none';
        });
        $("#btn3").on("click", function() {
            var htmlString = $(this).html();
            divDesc.style.display = 'none';
            divProp.style.display = 'none';
            $("#btn1").removeClass("active");
            $("#btn2").removeClass("active");
            $("#btn3").addClass("active");
            divReviews.style.display = 'block';
        });
    </script>

</body>

</html>