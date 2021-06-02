<?php
    include('connect.php');

    if (isset($_POST['xacnhan']))
    {
        $mataikhoan = $_GET['id'];
        $tensach = $_POST['tensach_thembaiviet'];
        $tenbaiviet = $_POST['tenbaiviet'];
        $ngaydangbaiviet = $_POST['ngaydang'];
        $motabaiviet = nl2br($_POST['mota_thembaiviet']);

        //Upload ảnh bài viết.
        $tenanhmacdinh = strval(time());    

        $anhbaiviet = $_FILES['anhbia_thembaiviet']['tmp_name'];
        $nameanhbia = $_FILES['anhbia_thembaiviet']['name'];

        $nameanhbia = substr_replace($nameanhbia,$tenanhmacdinh,0,0);





        $noichua = './image/'.$nameanhbia;

        move_uploaded_file($anhbaiviet, $noichua);

        $ketquatrave = "";


        $sql = "INSERT INTO bai_viet (Ma_tai_khoan, ten_sach, ten_bai_viet, Ngay_dang_bai_viet, Mo_ta_bai_viet, Anh_bai_viet, Kiem_duyet_bai_viet, luot_view) VALUES ('" . $mataikhoan . "', '". $tensach . "','". $tenbaiviet . "', '" . $ngaydangbaiviet ."','" .$motabaiviet . "','" . $noichua . "', 0, 0)";
        $result = mysqli_query($conn, $sql);
        if ($result) 
        {
            $ketquatrave = 'Bạn đã thêm bài viết thành công';
        }
        else
        {
            $ketquatrave = 'Bạn đã thêm bài viết thất bại';
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
        <h5><?php echo $ketquatrave; ?></h5>

        <br>
        <p>
            <?php
                if ($mataikhoan == "1"){
                    echo '<a class="btn btn-warning" href="trangquantrivien.php" ><i class="fa fa-user"></i><b>Về Trang QTV</b></a>';
                }
                else{
                    echo '<a class="btn btn-warning" href="trangcanhan.php" ><i class="fa fa-user"></i><b>Về Trang Cá Nhân</b></a>';
                }
            ?>
            
        </p>
    </div>
    
</body>

