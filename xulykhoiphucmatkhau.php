<?php
session_start();
// Thiết lập charset utf8
header('Content-Type: text/html; charset=utf-8');
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'ourbooks';
$table = 'tai_khoan';

// Kiểm tra định dạng email
function is_email($str) {
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
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
        <h1 style="color: #f48225">KHÔI PHỤC MẬT KHẨU</h1>
        <br><br>
        <?php
		if (isset($_POST['xacnhan']))
        {
			if (isset( $_SESSION['email']))
			{
				$error = array();
				$data = array();
				$data['oldpassword']  			= isset($_POST['oldpassword']) ? md5($_POST['oldpassword']) : '';
				$data['setpassword']  			= isset($_POST['setpassword']) ? md5($_POST['setpassword']) : '';

				//nếu chưa nhập một trong những loại password
				if (empty($data['oldpassword']) || empty($data['setpassword'])){
					$error['setpassword'] = 'Chưa nhập mật khẩu. <br>';
				}
				//hoặc password nhập không trùng khớp
				else if ($data['oldpassword'] != $_SESSION['matkhau']){
					$error['setpassword'] = 'Mật khẩu không trùng khớp <br>';
				}

				if($error){
					echo "<h5>Có lỗi trong quá trình nhập dữ liệu</h5>";
					echo $error['setpassword'];
					$success = 0;
				}
				//Không có lỗi trong quá trình nhập
				else if (!$error){
					// Kết nối CSDL
					$conn = mysqli_connect($server,$user,$pass,$database);
				
					//Kiểm tra kết nối
					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}
					//echo "Connected successfully <br>";
					
					mysqli_set_charset($conn, "utf8");
		
					//cập nhật database
					//chú ý cách ghi biến $data rất hay
					$sql = "UPDATE tai_khoan SET Mat_khau_tai_khoan ='".$data['setpassword']."'WHERE Email = '".$_SESSION['email']."'";
					$result = mysqli_query($conn, $sql);
	
					echo "<h5>Mật khẩu mới của bạn đã được cập nhật <br></h5>";
					session_destroy();
					$success = 1;					 
				}

			}
			
		}

		
		?>
        <p>
            <br>
            <?php
            if ($success==1)
                echo '<a class="btn btn-warning" href="dangnhap.php" ><i class="fa fa-user"></i><b>Đăng nhập</b></a>';
            if ($success==0)
                echo '<a class="btn btn-warning" href="khoiphucmatkhau.php"><i class="fa fa-user"></i><b>Trở lại</b></a>';
            ?>
        </p>
    </div>
</body>
</html>