<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Trang khôi phục mật khẩu</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="./style/style_dangnhap.css"/>
</head>
<body class="form-v4">
	<div class="page-content">
		<div class="form-v4-content">
			<!-- <div class="form-left">
				<h2>CHÀO MỪNG BẠN <br> ĐẾN VỚI OURBOOKS</h2>
				<h3><b>Đăng nhập để có thể:</b></h3>
				<h3>- Mua sách</h3>
				<h3>- Thêm sách</h3>
				<h3>- Thêm bài viết</h3>
				<h3>- Quản lý đơn hàng</h3> -->
				<!-- <div class="form-left-last"> -->
					<!-- <input type="button" class="button_active" onclick="location.href='1.html';"> -->
					<!-- <input type="button" name="dendangkymk" class="account" value="Chưa có tài khoản?" onclick="location.href='dangky.php';"> -->
				<!-- </div> -->
			<!-- </div> -->
			<form class="form-detail" action="xulykhoiphucmatkhau.php" method="post" id="myform">
				<h2>KHÔI PHỤC MẬT KHẨU</h2>
				<!-- <div class="form-group">
					<div class="form-row form-row-1">
						<label for="first_name">Họ</label>
						<input type="text" name="first_name" id="first_name" class="input-text" required>
					</div>
					<div class="form-row form-row-1">
						<label for="last_name">Tên</label>
						<input type="text" name="last_name" id="last_name" class="input-text" required>
					</div>
				</div> -->
				
				<!-- <div class="form-row">
					<label for="your_email">Điện thoại</label>
					<input type="text" name="your_phone" id="your_phone" class="input-text" required pattern="0[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]">
				</div> -->
				
				
				<div class="form-row ">
					<label for="password">Mật khẩu cũ</label>
					<input type="password" name="oldpassword" id="oldpassword" class="input-text" required>
					
				</div>

                
                <div class="form-row ">
					<label for="password">Mật khẩu mới</label>
					<input type="password" name="setpassword" id="setpassword" class="input-text" required>
					
				</div>

				
				<!-- <div class="form-row"><p><a href="#" class="text"><b>Quên mật khẩu</b></a></p></div> -->

				<br>
				<div class="form-row-last">
					<input type="submit" name="xacnhan" class="register" value="Xác nhận">
					<input type="button" name="erase" class="register" value="Hủy" onclick="location.href='trangthongtincanhan.php';">
				</div>
			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> -->
	<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> -->
	<!-- <script>
		
		jQuery.validator.setDefaults({
		  	debug: true,
		  	success:  function(label){
        		label.attr('id', 'valid');
   		 	},
		});
		$( "#myform" ).validate({
		  	rules: {
			    password: "required",
		    	comfirm_password: {
		      		equalTo: "#password"
		    	}
		  	},
		  	messages: {
		  		first_name: {
		  			required: "Chưa nhập họ"
		  		},
		  		last_name: {
		  			required: "Chưa nhập tên"
		  		},
		  		your_email: {
		  			required: "Chưa nhập email"
		  		},
				your_phone: {
		  			required: "Chưa nhập điện thoại"
		  		},
		  		password: {
	  				required: "Chưa nhập mật khẩu"
		  		},
		  		comfirm_password: {
		  			required: "Chưa xác nhận mật khẩu",
		      		equalTo: "Mật khẩu không khớp"
		    	}
		  	}
		});
	</script> -->
</body>
</html>