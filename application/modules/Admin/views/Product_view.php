<?php include('pages/admin/header.php') ?>
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Color</th>
                        <th>QTY</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Color</th>
                        <th>QTY</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach ($product as $one_product ) {?>
                    <tr>
                        <td><img width="90px" src="<?php echo base_url().'assets/images/products/' ?><?php echo $one_product['img'] ?>" alt=""></td>
                        <td><?php echo $one_product['name'] ?></td>
                        <td><?php echo $one_product['price'] ?></td>
                        <td><?php echo $one_product['color'] ?></td>
                        <td><?php echo $one_product['qty'] ?></td>
                        <td><button style="margin-right: 10px" class="btn btn-info" onclick="editProduct(<?php echo $one_product['id'] ?>)"><i class="fa fa-pencil"></i></button><button class="btn btn-danger" onclick="deleteProduct(<?php echo $one_product['id'] ?>)"><i class="fa fa-times"></i></button></td>

                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>
<!-- /.container-fluid-->
<?php include('pages/admin/footer.php') ?>
