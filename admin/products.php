<?php 
include('includes/header.php'); 
include('../middleware/adminmiddle.php'); 

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
           <div class="card">
            <div class="card-header">
                <h4> Products </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $prod=getAll("product");
                            if(mysqli_num_rows($prod)>0)
                            { 
                                foreach($prod as $items){
                                ?>
                                <tr>
                                    <td><?php echo $items['pid']; ?></td>
                                    <td><?php echo $items['name']; ?></td>
                                    <td><img src="../uploads/<?php echo $items['img']; ?>" width="50px" height="50px" alt="<?php echo $items['name']; ?>"></td>
                                    <td>
                                        <a href="edit-product.php?id=<?php echo $items['pid']; ?>" class="btn btn-primary">EDIT</a>
                                        <form action="code.php" method="post">
                                            <input type="hidden" name="pid" value="<?php echo $items['pid'];?>">
                                            <button type="submit" class="btn btn-danger" name="delete_product">Delete</button>
                                        </form>
                                    </td>

                                </tr>

                            <?php
                                }
                            }
                            else
                            {
                                echo "<tr><td colspan='4'>No products found</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
           </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>