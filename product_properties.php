<?php
include 'database_connection.php';

$query = "SELECT * FROM product_properties WHERE product_id = '$id'";

                    $statement = $connect->prepare($query);
                    $result = $connect->query($query);


    
?>