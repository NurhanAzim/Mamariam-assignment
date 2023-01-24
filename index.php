<?php
include('includes/header.php');
include('includes/navbar.php');
?>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4>Order Preview</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-responsive-md">
                            <thead class="bg-light">
                                <th class="py-4 align-middle">Order#</th>
                                <th class="py-4 align-middle">Tarikh</th>
                                <th class="py-4 align-middle">Jumlah</th>
                                <th class="py-4 align-middle">Status</th>
                                <th class="py-4 align-middle">Tindakan</th>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT `tbl_order`.`orderId`, `tbl_order`.`orderDate`, `tbl_order`.`totalPrice`, `tbl_order`.`statusId`,`tbl_status`.`description` FROM `tbl_order` INNER JOIN `tbl_status` ON `tbl_order`.`statusId`=`tbl_status`.`statusId`";
                                $query_run = $conn->query($query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $row) {
                                ?>
                                        <tr>
                                            <td><?= $row['orderId'] ?></td>
                                            <td><?= $row['orderDate'] ?></td>
                                            <td><?= $row['totalPrice'] ?></td>
                                            <td><?= $row['description'] ?></td>
                                            <?php if ($row['statusId'] == 0) { ?>

                                                <td ><button><a class="btn btn-dark mt-auto" href="#">Buat pembayaran</a></button></td>

                                            <?php } else { ?>
                                                <td></td>
                                            <?php } ?>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5">Anda belum membuat sebarang tempahan</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include('includes/footer.php');
?>