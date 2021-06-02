<?php
    include('connect.php');

    if (isset($_POST['xacnhan']))
    {
        $tentacgia = $_POST['tentacgia'];

        //Lấy tên người đăng từ bảng tai_khoan.
        $mataikhoan = $_GET['id'];

        //Lấy mã thể loại từ bảng the_loai.
        $theloai = $_POST['theloai'];
        $sql = "SELECT * FROM the_loai WHERE Ten_the_loai='". $theloai . "'";
        $result = mysqli_query($conn, $sql);
        $matheloai = "";

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $matheloai = $row['Ma_the_loai'];
            }
        }


        

        //insert thêm sách vào bảng sách.
        $tensach = $_POST['tensach'];
        $gia = $_POST['giasach'];
        $tentacgia = $_POST['tentacgia'];
        $motabaiviet = nl2br($_POST['mota']);
        

        $tenanhmacdinh = strval(time());    

        //Upload ảnh bìa.
        $songaunhien = strval(mt_rand());
        $anhbia = $_FILES['anhbia_1']['tmp_name'];
        $nameanhbia = $_FILES['anhbia_1']['name'];

        $nameanhbia = substr_replace($nameanhbia,$tenanhmacdinh,0,0);
        $nameanhbia = substr_replace($nameanhbia,$songaunhien,0,0);

        $noichua_anhbia = './image/'.$nameanhbia;

        move_uploaded_file($anhbia, $noichua_anhbia);

        //Upload ảnh chi tiết 1.
        $songaunhien = strval(mt_rand());
        $anhchitiet_1 = $_FILES['anhchitiet_1']['tmp_name'];
        $nameanhchitiet1 = $_FILES['anhchitiet_1']['name'];

        $nameanhchitiet1 = substr_replace($nameanhchitiet1,$tenanhmacdinh,0,0);        
        $nameanhchitiet1 = substr_replace($nameanhchitiet1,$songaunhien,0,0);        
        $noichua_anhchitiet_1 = './image/'.$nameanhchitiet1;

        move_uploaded_file($anhchitiet_1, $noichua_anhchitiet_1);

        //Upload ảnh chi tiết 2.
        $songaunhien = strval(mt_rand());
        $anhchitiet_2 = $_FILES['anhchitiet_2']['tmp_name'];
        $nameanhchitiet2 = $_FILES['anhchitiet_2']['name'];

        $nameanhchitiet2 = substr_replace($nameanhchitiet2,$tenanhmacdinh,0,0);
        $nameanhchitiet2 = substr_replace($nameanhchitiet2,$songaunhien,0,0);

        $noichua_anhchitiet_2 = './image/'.$nameanhchitiet2;

        move_uploaded_file($anhchitiet_2, $noichua_anhchitiet_2);





        $ketquatrave = "";


        $sql = "INSERT INTO sach (Ma_the_loai, Ma_nguoi_dang, Tac_gia, Ten_sach, Gia_sach, Anh_bia, Anh_chi_tiet_1, Anh_chi_tiet_2, Mo_ta, Trang_thai_sach, Duyet_sach) 
        VALUES ('" . $matheloai . "', '" . $mataikhoan . "', '" . $tentacgia . "','" . $tensach . "','" . $gia ."','" . $noichua_anhbia . "', '" . $noichua_anhchitiet_1 . "', '" . $noichua_anhchitiet_2 . "' , '" . $motabaiviet . "', 0, 0)";


        $result = mysqli_query($conn, $sql);
        if ($result) 
        {
            $ketquatrave = 'Bạn đã thêm sách thành công';
        }
        else
        {
            $ketquatrave = 'Bạn đã thêm sách thất bại';
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Trang xác nhận thêm sách</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>


<body class="container" style="background-color: #F1F1F1">
    <div class="col-12 p-3">
        <h1 style="color: #f48225">THÊM SÁCH</h1>
        <br><br>
        <h5><?php echo $ketquatrave; ?></h5>
        <br>
        <p>
            <?php
                if ($mataikhoan == "1"){
                    echo '<a class="btn btn-warning" href="trangquantrivien.php" ><i class="fa fa-user"></i><b>Về Trang Quản Trị Viên</b></a>';
                }
                else{
                    echo '<a class="btn btn-warning" href="trangcanhan.php" ><i class="fa fa-user"></i><b>Về Trang Cá Nhân</b></a>';
                }
            ?>
        </p>
    </div>
    
</body>