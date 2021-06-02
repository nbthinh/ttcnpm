<?php
    session_start();
    include('connect.php');

    $idsach = $_GET['id'];
    $tensach = $gia = $tentacgia = $theloai = $anhbia = $anhchitiet = $mota = "";
    $matacgia = $matheloai = "";
    if(isset($_POST['xacnhan']))
    {
        $tensach = $_POST['tensach'];
        $gia = $_POST['giasach'];
        $tentacgia = $_POST['tentacgia'];

        //Thay đổi thể loại trong bảng the_loai
        $theloai = $_POST['theloai'];

        $sql = "SELECT * FROM the_loai WHERE Ten_the_loai='" . $theloai . "'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) {
            $sql = "INSERT INTO the_loai (Ten_the_loai) VALUES ('" . $theloai . "')";

            $result = mysqli_query($conn, $sql);

            if ($result) 
            {
                $ketquatrave = 'Bạn đã sửa sách thành công';
            }
            else
            {
                $ketquatrave = 'Bạn đã sửa sách thất bại';
            }
        }

        $sql = "SELECT * FROM the_loai WHERE Ten_the_loai='" . $theloai . "'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $matheloai = $row['Ma_the_loai'];
            }    
        }


        $sql = "SELECT * FROM sach WHERE Ma_sach=" . $idsach;
        $result = mysqli_query($conn, $sql);

        $pathanhbia = $pathanhchitiet1 = $pathanhchitiet2 = "";

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $pathanhbia = $row['Anh_bia'];
                $pathanhchitiet1 = $row['Anh_chi_tiet_1'];
                $pathanhchitiet2 = $row['Anh_chi_tiet_2'];
            }    
        }



        $tenanhmacdinh = strval(time());    

        //update ảnh bìa.

        if ($_FILES['anhbia_1']['tmp_name'] != "")
        {
            $songaunhien = strval(mt_rand());
            $anhbia = $_FILES['anhbia_1']['tmp_name'];

            $nameanhbia = $_FILES['anhbia_1']['name'];

            $nameanhbia = substr_replace($nameanhbia,$tenanhmacdinh,0,0);
            $nameanhbia = substr_replace($nameanhbia,$songaunhien,0,0);

            $noichua = './image/'.$nameanhbia;
    
            move_uploaded_file($anhbia, $noichua);  

            unlink($pathanhbia);

            
            $sql = "UPDATE sach SET Anh_bia='" . $noichua . "' WHERE Ma_sach=" . $idsach;

            $result = mysqli_query($conn, $sql);
    
            if ($result) 
            {
                $ketquatrave = 'Bạn đã sửa sách thành công';
            }
            else
            {
                $ketquatrave = 'Bạn đã sửa sách thất bại';
            }
    
        }

        //update ảnh chiết 1.

        if ($_FILES['anhchitiet_1']['tmp_name'] != "")
        {
            $songaunhien = strval(mt_rand());
            $anhchitiet_1 = $_FILES['anhchitiet_1']['tmp_name'];
            $nameanhchitiet1 = $_FILES['anhchitiet_1']['name'];

            $nameanhchitiet1 = substr_replace($nameanhchitiet1,$tenanhmacdinh,0,0);        
            $nameanhchitiet1 = substr_replace($nameanhchitiet1,$songaunhien,0,0);      

            $noichua = './image/'.$nameanhchitiet1;
    
            move_uploaded_file($anhchitiet_1, $noichua);  

            unlink($pathanhchitiet1);
            
            $sql = "UPDATE sach SET Anh_chi_tiet_1='" . $noichua . "' WHERE Ma_sach=" . $idsach;

            $result = mysqli_query($conn, $sql);
    
            if ($result) 
            {
                $ketquatrave = 'Bạn đã sửa sách thành công';
            }
            else
            {
                $ketquatrave = 'Bạn đã sửa sách thất bại';
            }
    
        }

        //update ảnh chi tiết 2.

        if ($_FILES['anhchitiet_2']['tmp_name'] != "")
        {
            $songaunhien = strval(mt_rand());
            $anhchitiet_2 = $_FILES['anhchitiet_2']['tmp_name'];
            $nameanhchitiet2 = $_FILES['anhchitiet_2']['name'];

            $nameanhchitiet2 = substr_replace($nameanhchitiet2,$tenanhmacdinh,0,0);
            $nameanhchitiet2 = substr_replace($nameanhchitiet2,$songaunhien,0,0);
    
            $noichua = './image/'.$nameanhchitiet2;
    
            move_uploaded_file($anhchitiet_2, $noichua);  

            unlink($pathanhchitiet2);
            
            $sql = "UPDATE sach SET Anh_chi_tiet_2='" . $noichua . "' WHERE Ma_sach=" . $idsach;

            $result = mysqli_query($conn, $sql);
    
            if ($result) 
            {
                $ketquatrave = 'Bạn đã sửa sách thành công';
            }
            else
            {
                $ketquatrave = 'Bạn đã sửa sách thất bại';
            }
    
        }









        $mota = nl2br($_POST['mota']);


        $sql = "UPDATE sach SET Ma_the_loai='" . $matheloai . "', Tac_gia='" . $tentacgia . "' , Ten_sach='" . $tensach . "', Mo_ta='" . $mota . "' WHERE Ma_sach=" . $idsach;

        $result = mysqli_query($conn, $sql);

        if ($result) 
        {
            $ketquatrave = 'Bạn đã sửa sách thành công';
        }
        else
        {
            $ketquatrave = 'Bạn đã sửa sách thất bại';
        }



    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Trang xác nhận chỉnh sửa sách</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>


<body class="container" style="background-color: #F1F1F1">
    <div class="col-12 p-3">
        <h1 style="color: #f48225">CHỈNH SỬA SÁCH</h1>
        <br><br>
        <h5><?php echo $ketquatrave; ?></h5>
        <br>
        <p>
            <?php
                if ($_SESSION['email'] == 'admin@gmail.com'){
                    echo '<a class="btn btn-warning" href="trangquanlysach_admin.php?page=' . $_GET['page'] . '" ><i class="fa fa-user"></i><b>Về Trang Quản Trị Viên</b></a>';
                }
                else{
                    echo '<a class="btn btn-warning" href="trangcanhan.php" ><i class="fa fa-user"></i><b>Về Trang Cá Nhân</b></a>';
                }
            ?>
            
        </p>
    </div>
    
</body>