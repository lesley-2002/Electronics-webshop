<?php

include('database_connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="product_list.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Products</title>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

    <div class="top-filters">
        <div class="container">
            <div class="col">
                <div class="wrapper">
                    <p>Filter</p>
                    <i class="fas fa-sync"></i>
                </div>
            </div>
            <div class="col">
                <div class="wrapper">
                    <select name="sort-by" id="sort-by">
                        <option value="Recommended">Recommended</option>
                        <option value="Price $-$$">Price $-$$</option>
                        <option value="Price $$-$">Price $$-$</option>
                        <option value="Reviews">Reviews</option>
                    </select>
                </div>

            </div>
            <div class="col">
                <div class="wrapper">
                    <select name="show" id="show">
                        <option value="12">12</option>
                        <option value="24">24</option>
                        <option value="36">36</option>
                        <option value="48">48</option>
                    </select>
                </div>

            </div>
            <div class="col">
                <div class="wrapper">

                </div>
            </div>
        </div>

    </div>

    <!-- Page Content -->
    <div class="content">
        <div class="container">
            <div class="col-1">
                <div class="list-group">
                    <h3>Price</h3>
                    <input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
                </div>
                <div class="list-group">
                    <h3>Merk</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                        <?php

                        $query = "SELECT DISTINCT(product_brand) FROM product WHERE product_status = '1' ORDER BY product_id DESC";
                        $statement = $connect->prepare($query);
                        $result = $connect->query($query);
                        foreach ($result as $row) {
                        ?>
                            <div class="list-group-item checkbox">
                                <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['product_brand']; ?>"> <?php echo $row['product_brand']; ?></label>
                            </div>
                        <?php
                        }

                        ?>
                    </div>
                </div>

                <div class="list-group">
                    <h3>Categorie</h3>
                    <?php

                    $query = "
                    SELECT DISTINCT(product_category) FROM product WHERE product_status = '1'
                    ";
                    $statement = $connect->prepare($query);
                    $result = $connect->query($query);
                    foreach ($result as $row) {
                    ?>
                        <div class="list-group-item checkbox">
                            <label><input type="checkbox" class="common_selector ram" value="<?php echo $row['product_category']; ?>"> <?php echo $row['product_category']; ?></label>
                        </div>
                    <?php
                    }

                    ?>
                </div>

                <div class="list-group">
                    <h3>Kleur</h3>
                    <?php
                    $query = "
                    SELECT DISTINCT(product_color) FROM product WHERE product_status = '1'
                    ";
                    $statement = $connect->prepare($query);
                    $result = $connect->query($query);
                    foreach ($result as $row) {
                    ?>
                        <div class="list-group-item checkbox">
                            <label><input type="checkbox" class="common_selector storage" value="<?php echo $row['product_color']; ?>"> <?php echo $row['product_color']; ?></label>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="col-2">
                <br />
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>
    <style>
        #loading {
            text-align: center;
            background: url('loader.gif') no-repeat center;
            height: 150px;
        }
    </style>

    <script>
        $(document).ready(function() {

            filter_data();

            function filter_data() {
                $('.filter_data').html('<div id="loading" style="" ></div>');
                var action = 'fetch_data';
                var minimum_price = $('#hidden_minimum_price').val();
                var maximum_price = $('#hidden_maximum_price').val();
                var brand = get_filter('brand');
                var ram = get_filter('ram');
                var storage = get_filter('storage');
                $.ajax({
                    url: "fetch_data.php",
                    method: "POST",
                    data: {
                        action: action,
                        minimum_price: minimum_price,
                        maximum_price: maximum_price,
                        brand: brand,
                        ram: ram,
                        storage: storage
                    },
                    success: function(data) {
                        $('.filter_data').html(data);
                    }
                });
            }

            function get_filter(class_name) {
                var filter = [];
                $('.' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }

            $('.common_selector').click(function() {
                filter_data();
            });

            $('#price_range').slider({
                range: true,
                min: 1000,
                max: 65000,
                values: [1000, 65000],
                step: 500,
                stop: function(event, ui) {
                    $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                    $('#hidden_minimum_price').val(ui.values[0]);
                    $('#hidden_maximum_price').val(ui.values[1]);
                    filter_data();
                }
            });

        });
    </script>
</body>

</html>

<?php

?>