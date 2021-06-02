<?php
session_start();
$success = 0;
// Thiết lập charset utf8
header('Content-Type: text/html; charset=utf-8');
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'ourbooks';
$table = 'tai_khoan';

// Kiểm tra tên hợp lệ
function is_name($str) {
    return (!preg_match("/^[^<,\"@{}()*$%?=>:|;#]*$/", $str)) ? FALSE : TRUE;
}

// Kiểm tra định dạng email
function is_email($str) {
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}
// Kiểm tra định dạng điện thoại
function is_phone($str) {
    return (!preg_match("/^0[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/", $str)) ? FALSE : TRUE;   
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title>Trang xác nhận đăng ký</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="./style/style_dangky.css"/>
</head>

<body class="container" style="background-color: #F1F1F1">
    <div class="col-12 p-3">
        <h1 style="color: #f48225">ĐĂNG KÝ</h1>
        <br><br>
        <?php
        // Vì tên button submit là do-register nên ta sẽ kiểm tra nếu
        // tồn tại key này trong biến toàn cục $_POST thì nghĩa là người 
        // dùng đã click register(submit)
        if (isset($_POST['chinhsua']))
        {
            // Code PHP xử lý validate
            $error = array();
            $data = array();

            $data['ho']             = isset($_POST['ho']) ? $_POST['ho'] : '';
            $data['ten']            = isset($_POST['ten']) ? $_POST['ten'] : '';
            $data['dienthoai']      = isset($_POST['dienthoai']) ? $_POST['dienthoai'] : '';
            $data['sonha']          = isset($_POST['sonha']) ? $_POST['sonha'] : '';
            $data['duong']          = isset($_POST['duong']) ? $_POST['duong'] : '';
            $data['quanhuyen']      = isset($_POST['quanhuyen']) ? $_POST['quanhuyen'] : '';
            $data['thanhpho']       = isset($_POST['thanhpho']) ? $_POST['thanhpho'] : '';


            //Validate các trường bị blank hoặc không đúng định dạng hoặc mật khẩu không trùng khớp
            // Kiểm tra định dạng dữ liệu
            //chưa nhập họ
            if (empty($data['ho'])){
                $error['ho'] = 'Chưa nhập họ <br>';
            }
            else if (!is_name($data['ho'])){
                $error['ho'] = 'Họ không đúng định dạng <br>';
            }

            //chưa nhập tên
            if (empty($data['ten'])){
                $error['ten'] = 'Chưa nhập tên <br>';
            }
            else if (!is_name($data['ten'])){
                $error['ten'] = 'Tên không đúng định dạng <br>';
            }

            //chưa nhập điện thoại
            if (empty($data['dienthoai'])){
                $error['dienthoai'] = 'Chưa nhập điện thoại <br>';
            }
            //hoặc điện thoại không đúng định dạng
            else if (!is_phone($data['dienthoai'])){
                $error['dienthoai'] = 'Điện thoại không đúng định dạng <br>';
            }

            if ($error){
                echo "<h5>Có lỗi trong quá trình nhập dữ liệu. <br></h5>";
            }
            //Không có lỗi trong quá trình nhập
            else if (!$error){
                //Validate email đã tồn tại trong database
                // Kết nối CSDL
                $conn = mysqli_connect($server, $user, $pass, $database);
                
                //Kiểm tra kết nối
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                //echo "Connected successfully <br>";
                
                mysqli_set_charset($conn, "utf8");

                $sql = "UPDATE tai_khoan SET Ho_tai_khoan ='".$data['ho']."', Ten_tai_khoan ='".$data['ten']."',
                SDT_tai_khoan = '".$data['dienthoai']."', So_nha = '".$data['sonha']."', Duong = '".$data['duong']."',
                Quan_Huyen = '".$data['quanhuyen']."', Thanh_pho = '".$data['thanhpho']."'  
                WHERE Email = '".$_SESSION['email']."'";

                if (mysqli_query($conn, $sql)){
                    //echo '<script language="javascript">alert("Đăng ký thành công"); window.location="register.php";</script>';
                    echo "<h5>Cập nhật thông tin tài khoản thành công. <br></h5>";
                    $_SESSION['ho'] = $data['ho'];
                    $_SESSION['ten'] = $data['ten'];
                    $_SESSION['dienthoai'] = $data['dienthoai'];
                    $_SESSION['sonha'] = $data['sonha'];
                    $_SESSION['duong'] = $data['duong'];
                    $_SESSION['quanhuyen'] = $data['quanhuyen'];
                    $_SESSION['thanhpho'] = $data['thanhpho'];

                    $success = 1;    
                }
                else {
                    //echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="register.php";</script>';
                    echo "Error: " . $sql . "" . mysqli_error($conn);
                    echo "<h5>Cập nhật thông tin không thành công.</h5>";
                }

                //đóng kết nối
                mysqli_close($conn);
                
            }
        }
        ?>
        <p>
            <br>
            <?php
            if ($success==1)
                echo '<a class="btn btn-warning" href="trangcanhan.php" ><i class="fa fa-user"></i><b>Về Trang Cá Nhân</b></a>';
            if ($success==0)
                echo '<a class="btn btn-warning" href="trangthongtincanhan.php"><i class="fa fa-user"></i><b>Trở lại</b></a>';
            ?>
        </p>
    </div>
</body>

</html>