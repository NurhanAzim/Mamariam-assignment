<?php
include('includes/header.php');
include('includes/navbar.php');
?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            $query = "SELECT * FROM `tbl_product`";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $row) {

            ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="<? $row['productImage'] ?>'" alt=".." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $row['productName'] ?></h5>
                                    <!-- Product reviews-->
                                    RM <?= $row['productPrice'] ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="checkout.php?id= <?= $row['productId'] ?>">Tempah Sekarang</a></div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>
<?php
include('includes/footer.php');
?>