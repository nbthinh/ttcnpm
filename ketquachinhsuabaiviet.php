<?php
    include('connect.php');
    session_start();

    $idbaiviet = $_GET['id'];
    $tenbaiviet = $tensach = $ngaydang = $anhbia = $mota = $ketquatrave = "";

    if(isset($_POST['xacnhan']))
    {
        $tenbaiviet = $_POST['tenbaiviet'];
        $tensach = $_POST['tensach_thembaiviet'];
        $ngaydang = $_POST['ngaydang'];
        $mota = nl2br($_POST['mota_thembaiviet']);

        //Upload ảnh bài viết.

        $sql = "SELECT * FROM bai_viet WHERE Ma_bai_viet=" . $idbaiviet;
        $result = mysqli_query($conn, $sql);

        $pathanhbia = "";

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $pathanhbia = $row['Anh_bai_viet'];
            }    
        }





        $tenanhmacdinh = strval(time());    

        if ($_FILES['anhbia_thembaiviet']['tmp_name'] != "")
        {
            $anhbia = $_FILES['anhbia_thembaiviet']['tmp_name'];

            $nameanhbia = $_FILES['anhbia_thembaiviet']['name'];
            $nameanhbia = substr_replace($nameanhbia,$tenanhmacdinh,0,0);


            $noichua = './image/'.$nameanhbia;

            move_uploaded_file($anhbia, $noichua);  

            unlink($pathanhbia);
            
            $sql = "UPDATE bai_viet SET Anh_bai_viet='" . $noichua . "' WHERE Ma_bai_viet=" . $idbaiviet;

            $result = mysqli_query($conn, $sql);
    
            if ($result) 
            {
                $ketquatrave = 'Bạn đã sửa bài viết thành công';
            }
            else
            {
                $ketquatrave = 'Bạn đã sửa bài viết thất bại';
            }
    
        }



        $sql = "UPDATE bai_viet SET ten_sach='" . $tensach . "',ten_bai_viet='" . $tenbaiviet . "',Ngay_dang_bai_viet='" . $ngaydang . "',Mo_ta_bai_viet='" . $mota . "' WHERE Ma_bai_viet=" . $idbaiviet;

        $result = mysqli_query($conn, $sql);

        if ($result) 
        {
            $ketquatrave = 'Bạn đã sửa bài viết thành công';
        }
        else
        {
            $ketquatrave = 'Bạn đã sửa bài viết thất bại';
        }



    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Trang xác nhận chỉnh sửa bài viết</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>


<body class="container" style="background-color: #F1F1F1">
    <div class="col-12 p-3">
        <h1 style="color: #f48225">CHỈNH SỬA BÀI VIẾT</h1>
        <br><br>
        <h5>Bạn đã chỉnh sửa bài viết thành công.</h5>
        <br>
        <p>
            <?php
                if ($_SESSION['email'] == "admin@gmail.com"){
                    echo '<a class="btn btn-warning" href="trangquanlybaiviet_admin.php?page=' . $_GET['page'] . '" ><i class="fa fa-user"></i><b>Về Trang QTV</b></a>';
                }
                else{
                    echo '<a class="btn btn-warning" href="trangcanhan.php" ><i class="fa fa-user"></i><b>Về Trang cá nhân</b></a>';
                }
            ?>
        </p>
    </div>
    
</body>