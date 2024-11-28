<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
require_once 'connectDB/config.php';
if(!isset($_SESSION['admin']))
    header('Location:userlogin.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>فروشگاه آنلاین شاپ</title>
    <link href="./css/bootstrap-rtl.css" rel="stylesheet">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/shop-homepage.css" rel="stylesheet">
</head>
<body>