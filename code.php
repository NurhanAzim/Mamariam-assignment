<?php
include('admin/config/db_con.php');

if (isset($_POST['confirm_order-btn'])) {
    $customerId = hash('sha256', $_SERVER['REMOTE_ADDR'] . time());
    $checkCustomerId = "SELECT `customerId` FROM `tbl_customer` WHERE `customerId`='$customerId'";
    $checkCustomerId_run = $conn->query($conn, $checkCustomerId);

    if (mysqli_num_rows($checkCustomerId_run) == 0) {
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
        $telNo = mysqli_real_escape_string($conn, $_POST['telNo']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $query = "INSERT INTO `tbl_customer`(`customerId`, `first_name`, `last_name`, `address`, `city`, `state`, `postcode`, `telNo`, `email`) VALUES ('$customerId', '$fname', '$lname', '$address', '$city', '$state', '$postcode', $telNo, '$email') LIMIT 1";
        $query_run = $conn->query($query);
    } else {
        $query = "INSERT INTO `tbl_order` (`productId`, `orderQuantity`, `totalPrice`, `customerId`) VALUES ('" . $_POST['productId'] . "', 1, '" . $_POST['productPrice'] . "', '$customerId')";
        $query_run = $conn->query($query);

        if ($query_run) {
            header("Location: index.php");
            exit(0);
        } else {
            header("Location: checkout.php");
            exit(0);
        }
    }
}
