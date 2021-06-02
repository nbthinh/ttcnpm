<?php
    include('connect.php');

    if (isset($_POST['xacnhan']))
    {
        // $mataikhoan = $_GET['id'];
        // $masach = $_GET['masach'];
        $suasach = $suabaiviet = $suangaydang = $suamota = $suaanhbia = "";




        if($_POST['tensach_thembaiviet'] != "")
        {
            $tensach = $_POST['tensach_thembaiviet'];
            $sql = "UPDATE bai_viet SET ten_sach='" . $tensach . "' WHERE Ma_bai_viet=19 ";
            $result = mysqli_query($conn, $sql);

            if ($result) 
            {
                $suasach = 'Bạn đã sửa tên sách thành công';
            }
            else
            {
                $suasach = 'Bạn đã sửa tên sách thất bại';
            }
    


        }

        if($_POST['tenbaiviet'] != "")
        {
            $tenbaiviet = $_POST['tenbaiviet'];

            $sql = "UPDATE bai_viet SET ten_bai_viet='" . $tenbaiviet . "' WHERE Ma_bai_viet=19";
            $result = mysqli_query($conn, $sql);

            if ($result) 
            {
                $suabaiviet = 'Bạn đã sửa tên bài viết thành công';
            }
            else
            {
                $suabaiviet = 'Bạn đã sửa tên bài viết thất bại';
            }

        }

        if($_POST['ngaydang'] != "")
        {
            $ngaydangbaiviet = $_POST['ngaydang'];

            $sql = "UPDATE bai_viet SET Ngay_dang_bai_viet='" . $ngaydangbaiviet . "' WHERE Ma_bai_viet=19";
            $result = mysqli_query($conn, $sql);

            if ($result) 
            {
                $suangaydang = 'Bạn đã sửa ngày đăng thành công';
            }
            else
            {
                $suangaydang = 'Bạn đã sửa ngày đăng thất bại';
            }

        }

        if($_POST['mota_thembaiviet'] != "")
        {
            $motabaiviet = $_POST['mota_thembaiviet'];

            $sql = "UPDATE bai_viet SET Mo_ta_bai_viet='" . $motabaiviet . "' WHERE Ma_bai_viet=19";
            $result = mysqli_query($conn, $sql);

            if ($result) 
            {
                $suamota = 'Bạn đã sửa mô tả bài viết thành công';
            }
            else
            {
                $suamota = 'Bạn đã sửa mô tả bài viết thất bại';
            }

        }

        if($_POST['anhbia_thembaiviet'] != "")
        {
            $Anh_bai_viet = $_POST['anhbia_thembaiviet'];

            $sql = "UPDATE bai_viet SET Anh_bai_viet='" . $Anh_bai_viet . "' WHERE Ma_bai_viet=19";
            $result = mysqli_query($conn, $sql);

            if ($result) 
            {
                $suaanhbia = 'Bạn đã sửa ảnh bìa bài viết thành công';
            }
            else
            {
                $suaanhbia = 'Bạn đã sửa ảnh bìa bài viết thất bại';
            }

        }








    }

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Trang xác nhận thêm bài viết</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>


<body class="container" style="background-color: #F1F1F1">
    <div class="col-12 p-3">
        <h1 style="color: #f48225">THÊM BÀI VIẾT</h1>
        <br><br>
        <h5><?php echo $suasach; ?></h5>
        <h5><?php echo $suabaiviet; ?></h5>
        <h5><?php echo $suangaydang; ?></h5>
        <h5><?php echo $suamota; ?></h5>
        <h5><?php echo $suaanhbia; ?></h5>

        <br>
        <p>
            <a class="btn btn-warning" href="index.php" ><i class="fa fa-user"></i><b>Về Trang Chủ</b></a>
        </p>
    </div>
    
</body>