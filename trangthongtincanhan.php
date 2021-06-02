<?php
// Khởi tạo session
session_start();
include('connect.php');
if (!isset( $_SESSION['ten'])){
    echo "<h1>Trang thông tin cá nhân không tồn tại</h1>";
    exit;
}
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
	<title>Trang thông tin cá nhân</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="./style/style_dangky.css"/>
</head>
<body class="form-v4">
	<div class="page-content">
		<div class="form-v4-content">
			<form class="form-detail" action="xulythongtincanhan.php" method="post" id="myform">
				<h2>THÔNG TIN CÁ NHÂN</h2>
				<div class="form-group">
					<div class="form-row form-row-1">
						<label for="first_name">Họ</label>
                        <?php
                            //echo "Họ";
                            echo '<input type="text" name="ho" id="ho" class="input-text" value= "'.$_SESSION['ho'].'">';
                        ?>
					</div>
					<div class="form-row form-row-1">
                        <label for="last_name">Tên</label>
                        <?php
                            //echo "Họ";
                            echo '<input type="text" name="ten" id="ten" class="input-text" value= "'.$_SESSION['ten'].'">';
                        ?>
					</div>
				</div>
				<div class="form-row">
                    <label for="your_email">Email</label>
                    <?php
                        //echo "Họ";
                        echo '<input type="text" name="email" id="email" class="input-text" value= "'.$_SESSION['email'].'" disabled>';
                    ?>
				</div>
				<div class="form-row">
                    <label for="your_email">Điện thoại</label>
                    <?php
                        //echo "Họ";
                        echo '<input type="text" name="dienthoai" id="dienthoai" class="input-text" value= "'.$_SESSION['dienthoai'].'">';
                    ?>
				</div>
				<div class="form-group">
					<div class="form-row form-row-1 ">
						<label for="password">Mật khẩu</label>
                        <?php
                            //echo "Họ";
                            echo '<input type="password" name="matkhau" id="matkhau" class="input-text" value= "'.$_SESSION['matkhau'].'" disabled>';
                        ?>
                    </div>
					<div class="form-row form-row-1">
                        <a href="khoiphucmatkhau.php" id="reset"><img src="image/reset.png" width="30" height="30" alt="Không tìm thấy ảnh"></a>
					</div>
                </div>
                <div class="form-group">
					<div class="form-row form-row-1 ">
                        <label for="address">Số nhà</label>
                        <?php
                            //echo "Họ";
                            echo '<input type="text" name="sonha" id="sonha" class="input-text" value= "'.$_SESSION['sonha'].'">';
                        ?>
					</div>
					<div class="form-row form-row-1">
                        <label for="street">Đường</label>
                        <?php
                            //echo "Họ";
                            echo '<input type="text" name="duong" id="duong" class="input-text" value= "'.$_SESSION['duong'].'">';
                        ?>
					</div>
                </div>
                <div class="form-group">
					<div class="form-row form-row-1 ">
                        <label for="ward">Quận Huyện</label>
                        <?php
                            //echo "Họ";
                            echo '<input type="text" name="quanhuyen" id="quanhuyen" class="input-text" value= "'.$_SESSION['quanhuyen'].'">';
                        ?>
					</div>
					<div class="form-row form-row-1">
                        <label for="province">Tỉnh Thành phố</label>
                        <select name="thanhpho" id="thanhpho" class="input-text">
                            <option><?php echo $_SESSION['thanhpho']; ?></option>
                                <?php
                                    $sql = "SELECT * FROM tinhthanhpho WHERE ten_tp <> '" . $_SESSION['thanhpho'] . "'";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0)
                                    {
                                        while($row = mysqli_fetch_array($result)) {
                                            echo
                                            '
                                            <option>'
                                            . $row['ten_tp']
                                            .
                                            '</option>
                                            ';
                                        }
                                    }
                                
                                ?>

                        </select>


                        <?php
                            //echo "Họ";
                            // echo '<input type="text" name="thanhpho" id="thanhpho" class="input-text" value= "'.$_SESSION['thanhpho'].'">';
                        ?>
					</div>
				</div>
				
				<div class="form-row-last">
					<input type="submit" name="chinhsua" class="register" value="Chỉnh Sửa">
                    <input type="button" name="erase" class="register" value="Hủy" onclick="location.href='trangcanhan.php';">
				</div>
                
			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	
</body>
</html>