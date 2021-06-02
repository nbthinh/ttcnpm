<?php
session_start();
session_destroy();
header('Content-Type: text/html; charset=utf-8');

// echo "<h1>Bạn đã đăng xuất thành công </h1>";
// echo "<br />\n";
// echo "<a href='index.php'><h1> Về trang chủ </h1></a>";

?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Trang xác nhận đăng xuất</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>


<body class="container" style="background-color: #F1F1F1">
    <!-- <div class = "row p-3">
        <h6>Bạn đã đăng xuất thành công</h6>
    </div>

    <div class = "row p-3">
        <a href='index.php'><h6>Về trang chủ</h6></a>
    </div> -->
    <div class="col-12 p-3">
        <h1 style="color: #f48225">ĐĂNG XUẤT</h1>
        <br><br>
        <h5>Bạn đã đăng xuất thành công.</h5>
        <br>
        <p>
            <a class="btn btn-warning" href="index.php" ><i class="fa fa-user"></i><b>Về Trang Chủ</b></a>
        </p>
    </div>
    
</body>
