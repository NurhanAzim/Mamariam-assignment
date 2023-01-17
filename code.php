<?php
include('admin/config/db_con.php');
require_once __DIR__ . '/includes/composer/vendor/autoload.php';

if (isset($_POST['confirm_order-btn'])) {
    $randomBytes = random_bytes(4);
    $customerId = unpack('N', $randomBytes)[1] & 0x7FFFFFFF;
    $customerId = $customerId % 1000000000; //generate 9 random number

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
    $telNo = mysqli_real_escape_string($conn, $_POST['telNo']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $createCustomer = "INSERT INTO `tbl_customer`(`customerId`, `first_name`, `last_name`, `address`, `city`, `state`, `postcode`, `telNo`, `email`) VALUES ('$customerId', '$fname', '$lname', '$address', '$city', '$state', '$postcode', $telNo, '$email') LIMIT 1";
    $createCustomer_run = $conn->query($createCustomer);
    if ($createCustomer_run) {
        $query = "INSERT INTO `tbl_order` (`productId`, `orderQuantity`, `totalPrice`, `customerId`) VALUES ('" . $_POST['productId'] . "', 1, '" . $_POST['productPrice'] . "', '$customerId')";
        $query_run = $conn->query($query);

        if ($query_run) {
            header("Location: index.php");
            exit(0);
        } else {
            header("Location: checkout.php");
            exit(0);
        }
    } else {
        echo $createCustomer;
    }
}
