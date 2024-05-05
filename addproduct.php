<?php 
// lay du lieu tu form
 require('../db/conn.php');
 $name = $_POST['name'];
 $slug= strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/','-',$name)));
$description = $_POST['description'];
$summary = $_POST['summary'];
$stock = $_POST['stock'];
$price = $_POST['price'];
$disscounted_price = $_POST['disscounted_price'];
$category_id = $_POST['category_id'];
$brand_id = $_POST['brand_id'];

// xu ly hinh anh
if(isset($_FILES['anhs']['name'])) {
    $countfiles = count($_FILES['anhs']['name']);
    $imgs = '';
$imgs = '';
for($i=0;$i<$countfiles;$i++){
    $filename = $_FILES['anhs']['name'][$i];
    ## Location
    $location =  "uploads/".uniqid().$filename;
    $extension = pathinfo($location,PATHINFO_EXTENSION);
    $extension = strtolower($extension);
    ## file upload allowed extensions
    $valid_extension = array("jpg","jpeg","png");
    $response = 0;
    ## check file extension
    if(in_array(strtolower($extension), $valid_extension)){
        // them vao CSDL - them thanh cong moi upload anh len
        ## upload file
        if(move_uploaded_file($_FILES['anhs']['tmp_name'][$i],$location)){
           // echo "file name : ".$filename."<br>";
          //  $totalFileUploaded++;
          $imgs .= $location . ";" ;
         
        }
    }
}
   $imgs = substr($imgs, 0, -1);
  //echo substr($imgs, 0, -1); exit;
}
// cau lenh them vao bang
 $sql_str = "INSERT INTO `products` (`id`, `name`, `slug`, `description`, `summary`, `stock`, `price`, `disscounted_price`, `images`, `category_id`, `brand_id`, `status`, `created_at`, `updated_at`) 
 VALUES (NULL, '$name', '$slug', '$description', '$summary', $stock, $price, $disscounted_price, '$imgs', $category_id, $brand_id, 'Active', NULL, NULL);";
// echo $sql_str; exit;
 // thuc thi cau lenh
 mysqli_query($conn, $sql_str);
 
// tro ve trang
 header("location: listsanpham.php");
?>