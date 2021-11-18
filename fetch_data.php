<?php

//fetch_data.php

include('database_connection.php');

if (isset($_POST["action"])) {
    $query = "
  SELECT * FROM product WHERE product_status = '1'
 ";
    if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])) {
        $query .= "
   AND product_price BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "'
  ";
    }
    if (isset($_POST["brand"])) {
        $brand_filter = implode("','", $_POST["brand"]);
        $query .= "
   AND product_brand IN('" . $brand_filter . "')
  ";
    }
    if (isset($_POST["ram"])) {
        $ram_filter = implode("','", $_POST["ram"]);
        $query .= "
   AND product_ram IN('" . $ram_filter . "')
  ";
    }
    if (isset($_POST["storage"])) {
        $storage_filter = implode("','", $_POST["storage"]);
        $query .= "
   AND product_storage IN('" . $storage_filter . "')
  ";
    }

    $statement = $connect->prepare($query);
    $result = $connect->query($query);
    $total_row = mysqli_num_rows($result);
    $output = '';
    if ($total_row > 0) {
        foreach ($result as $row) {
            if ($row['product_category'] == "Toetsenbord"){
                $details = $row['product_toetsenbordindeling'].' &bull; '.$row['product_color']. ' &bull; '.$row['product_wireless'];
            } 
            if ($row['product_category'] == "USB"){
                $details = $row['product_opslag'].' &bull; '.$row['product_inputoutput'];
            }
            if ($row['product_category'] == "HDD"){
                $details = $row['product_opslagcapaciteit'].' &bull; '.$row['product_formaathardeschijf']. ' &bull; ' .$row['product_connectortype']. ' &bull; ' .$row['product_rotatiesnelheid'];
            }
            if ($row['product_category'] == "SSD"){
                $details = $row['product_opslagcapaciteit'].' &bull; '.$row['product_maximaleleessnelheid']. ' &bull; ' .$row['product_maximaleschrijfsnelheid']. ' &bull; ' .$row['product_rotatiesnelheid'];
            }
            $output .= '
   <div class="card">
    <div style="border:1px solid #ccc; padding:16px; margin-bottom:16px; height:400px;">
     <img style="width:100%" src="assets/products/' . $row['product_image'] .'" class="card-img">
     <p align="center"><strong><a href="product.php?id='. $row['product_id'].'" class="name">' . $row['product_name'] . '</a></strong></p>
     
     <p style="text-align:center;">
     ' . $details . '
     <h4 class="price" style="text-align:center;" class="text-danger" >&euro; ' . $row['product_price'] . '</h4>
    </div>

   </div>
   ';
        }
    } else {
        $output = '<h3>No Data Found</h3>';
    }
    echo $output;
}
