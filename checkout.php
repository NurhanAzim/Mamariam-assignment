<?php
include('includes/header.php');
include('includes/navbar.php');
?>
<section class="py-5">
    <div class="container">
        <div class="row g-2 justify-content-center">
            <form name="form" action="code.php" method="POST">
                <div class="col-md-8">
                    <div class="block">
                        <div class="block-header">
                            <h4>Invoice Details</h4>
                        </div>
                        <div class="block-body">

                            <?php
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="fname">First name</label>
                                    <input type="text" name="fname" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="lname">Last name</label>
                                    <input type="text" name="lname" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="telNo">Phone Number</label>
                                    <input type="text" name="telNo" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="email">Email Address</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="address">Address</label>
                                    <input type="text" name="address" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="city">City</label>
                                    <input type="text" name="city" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="state">State</label>
                                    <select name="state" class="form-control" data-placeholder="Select an option…" aria-hidden="true" required>
                                        <option value="">Select an option…</option>
                                        <option value="JHR">Johor</option>
                                        <option value="KDH">Kedah</option>
                                        <option value="KTN">Kelantan</option>
                                        <option value="LBN">Labuan</option>
                                        <option value="MLK">Malacca (Melaka)</option>
                                        <option value="NSN">Negeri Sembilan</option>
                                        <option value="PHG">Pahang</option>
                                        <option value="PNG">Penang (Pulau Pinang)</option>
                                        <option value="PRK">Perak</option>
                                        <option value="PLS">Perlis</option>
                                        <option value="SBH">Sabah</option>
                                        <option value="SWK">Sarawak</option>
                                        <option value="SGR">Selangor</option>
                                        <option value="TRG">Terengganu</option>
                                        <option value="PJY">Putrajaya</option>
                                        <option value="KUL">Kuala Lumpur</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label" for="postcode">Zip</label>
                                    <input type="text" name="postcode" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12 d-flex justify-content-end flex-column flex-lg-row">
                                <button class="btn btn-dark" name="confirm_order-btn">Confirm order</button>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="block bg-light">
                        <div class="block-header">
                            <h4>Order Details</h4>
                        </div>
                        <div class="block-body ">
                            <table class="table ">
                                <tr>
                                    <td>Product</td>
                                    <td>Subtotal</td>
                                </tr>
                                <?php
                                if (isset($_GET['id'])) {
                                    $productId = mysqli_real_escape_string($conn, $_GET['id']);
                                    $query = "SELECT * FROM `tbl_product` WHERE `productId`='$productId'";
                                    $query_run = mysqli_query($conn, $query);
                                    while ($result = mysqli_fetch_assoc($query_run)) {
                                ?>
                                        <input type="hidden" name="productId" value="<?= $result['productId'] ?>" >
                                        <input type="hidden" name="productPrice" value="<?= $result['productPrice'] ?>" >
                                        <tr>
                                            <td><?= $result['productName'] ?></td>
                                            <td>RM <?= $result['productPrice'] ?></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </table>
            </form>
        </div>
    </div>
</section>

<?php
include('includes/footer.php');
?>