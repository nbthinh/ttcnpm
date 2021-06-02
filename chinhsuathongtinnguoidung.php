<?php
    // Khởi tạo session
    session_start();
    include("connect.php");
    $ma_tai_khoan = $_GET['id'];
    $sql = "SELECT * FROM tai_khoan WHERE Ma_tai_khoan='$ma_tai_khoan'";
    $sql_query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($sql_query);
    $first_name = $row['Ho_tai_khoan'];
    $last_name = $row['Ten_tai_khoan'];
    $email = $row['Email'];
    $phone = $row['SDT_tai_khoan'];
    $so_nha = $row['So_nha'];
    $duong = $row['Duong'];
    $quan_huyen = $row['Quan_Huyen'];
    $thanh_pho = $row['Thanh_pho'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Trang chỉnh sửa thông tin cá nhân</title>
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
			<form class="form-detail" action="xulychinhsuathongtinnguoidung.php?ma_tai_khoan=<?php echo $ma_tai_khoan; ?>" method="post" id="myform">
				<h2>THÔNG TIN CÁ NHÂN</h2>
				<div class="form-group">
					<div class="form-row form-row-1">
						<label for="first_name">Họ</label>
                        <?php
                            //echo "Họ";
                            echo '<input type="text" name="ho" id="ho" class="input-text" value= "'.$first_name.'">';
                        ?>
					</div>
					<div class="form-row form-row-1">
                        <label for="last_name">Tên</label>
                        <?php
                            //echo "Họ";
                            echo '<input type="text" name="ten" id="ten" class="input-text" value= "'.$last_name.'">';
                        ?>
					</div>
				</div>
				<div class="form-row">
                    <label for="your_email">Email</label>
                    <?php
                        //echo "Họ";
                        echo '<input type="text" name="email" id="email" class="input-text" value= "'.$email.'" disabled>';
                    ?>
				</div>
				<div class="form-row">
                    <label for="your_email">Điện thoại</label>
                    <?php
                        //echo "Họ";
                        echo '<input type="text" name="dienthoai" id="dienthoai" class="input-text" value= "'.$phone.'">';
                    ?>
				</div>

                <div class="form-group">
					<div class="form-row form-row-1 ">
                        <label for="address">Số nhà</label>
                        <?php
                            //echo "Họ";
                            echo '<input type="text" name="sonha" id="sonha" class="input-text" value= "'.$so_nha.'">';
                        ?>
					</div>
					<div class="form-row form-row-1">
                        <label for="street">Đường</label>
                        <?php
                            //echo "Họ";
                            echo '<input type="text" name="duong" id="duong" class="input-text" value= "'.$duong.'">';
                        ?>
					</div>
                </div>
                <div class="form-group">
					<div class="form-row form-row-1 ">
                        <label for="ward">Quận Huyện</label>
                        <?php
                            //echo "Họ";
                            echo '<input type="text" name="quanhuyen" id="quanhuyen" class="input-text" value= "'.$quan_huyen.'">';
                        ?>
					</div>
					<div class="form-row form-row-1">
                        <label for="province">Tỉnh Thành phố</label>
                        <?php
                            //echo "Họ";
                            echo '<input type="text" name="thanhpho" id="thanhpho" class="input-text" value= "'.$thanh_pho.'">';
                        ?>
					</div>
				</div>
				
				<div class="form-row-last">
					<input type="submit" name="chinhsua" class="register" value="Chỉnh Sửa">
				</div>
			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	
</body>
</html>