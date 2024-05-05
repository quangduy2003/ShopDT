<?php 
// lay du lieu tu form
 require('../db/conn.php');
 $name = $_POST['name'];
 $slug= strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/','-',$name)));

// cau lenh them vao bang
 $sql_str = "INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) 
 VALUES (NULL, '$name', '$slug','Active', NULL, NULL);";
// echo $sql_str; exit;
 // thuc thi cau lenh
 mysqli_query($conn, $sql_str);
 
// tro ve trang
 header("location: listbrands.php");
?>