<?php
    // Here
    session_start();
    include("connect.php");
    $ma_tai_khoan = $_GET['ma_tai_khoan'];
    $ho = $_POST['ho'];
    $ten = $_POST['ten'];
    $dienthoai = $_POST['dienthoai'];
    $sonha = $_POST['sonha'];
    $duong = $_POST['duong'];
    $quanhuyen = $_POST['quanhuyen'];
    $thanhpho = $_POST['thanhpho'];
    $sql = "UPDATE tai_khoan SET Ho_tai_khoan='$ho', Ten_tai_khoan='$ten', SDT_tai_khoan='$dienthoai', So_nha='$sonha', Duong='$duong', Quan_Huyen='$quanhuyen', Thanh_pho='$thanhpho' WHERE Ma_tai_khoan='$ma_tai_khoan'";
    $sql_query = mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo '
        <br/><br/>
        <h2>Đã chỉnh sửa thành công thông tin người dùng, click vào <a href="trangquantrivien.php">Link sau đây</a> để trở lại trang chính</h2>
    ';
?>
