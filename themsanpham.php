<?php
require('includes/header.php');
?>
<div>
    <h3>Trang thêm sản phẩm </h3>
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Thêm Sản Phẩm </h1>
                            </div>
                            <form class="user" method="post" action="addproduct.php" enctype="multipart/form-data">
                            <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="name" name="name" aria-describedby="emailHelp"
                                                placeholder="Nhập tên sản phẩm">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Các hình ảnh cho sản phẩm</label>
                                            <input type="file" class="form-control form-control-user"
                                                id="anhs" name="anhs[]"
                                                multiple>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Tóm tắt sản phẩm</label>
                                            <textarea name="summary" class="form-control">

                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Mô tả sản phẩm</label>
                                            <textarea name="description" class="form-control">

                                            </textarea>
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-sm-4 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                                id="stock" name="stock" aria-describedby="emailHelp"
                                                placeholder="Số lượng">
                                        </div>
                                        <div class="col-sm-4 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                                id="price" name="price" aria-describedby="emailHelp"
                                                placeholder="Giá gốc ">
                                        </div>
                                        <div class="col-sm-4 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                                id="disscounted_price" name="disscounted_price" aria-describedby="emailHelp"
                                                placeholder="Giá khuyến mãi">
                                        </div>
                                        </div>
                                        <div class="form-group">
                                           <label class="form-label">Danh mục :</label>
                                           <select class="form-control" name="category_id"> 
                                            <option> Chọn danh mục</option>
                                            <?php 
    require('../db/conn.php');
    $sql_str = "select * from categories order by name";
    $result = mysqli_query($conn, $sql_str);
    while ($row = mysqli_fetch_assoc($result)){
        ?>
                             <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
           <?php   }  ?>
                                           </select>
                                        </div>
                                        <div class="form-group">
                                        <label class="form-label">Thương hiệu :</label>
                                           <select class="form-control" name="brand_id"> 
                                            <option> Chọn danh mục</option>
                                            <?php 
    require('../db/conn.php');
    $sql_str = "select * from brands order by name";
    $result = mysqli_query($conn, $sql_str);
    while ($row = mysqli_fetch_assoc($result)){
        ?>
                             <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
           <?php   }  ?>
                                           </select>
                                        </div>
                                        <button class="btn btn-primary">Thêm mới </button>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
            
<?php
require('includes/footer.php')
?>