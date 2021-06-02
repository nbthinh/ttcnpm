<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Trang đăng ký</title>
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
			<div class="form-left">
				<h2>CHÀO MỪNG BẠN <br> ĐẾN VỚI OURBOOKS</h2>
				<h3><b>Đăng ký để có thể:</b></h3>
				<h3>- Mua sách</h3>
				<h3>- Thêm sách</h3>
				<h3>- Thêm bài viết</h3>
				<h3>- Quản lý đơn hàng</h3>
				<div class="form-left-last">
					<!-- <input type="submit" name="account" class="account" value="Đã có tài khoản?"> -->
					<input type="button" name="dendangnhap" class="account" value="Đã có tài khoản?" onclick="location.href='dangnhap.php';">
				</div>
			</div>
			<form class="form-detail" action="xulydangky.php" method="post" id="myform">
				<h2>ĐĂNG KÝ</h2>
				<div class="form-group">
					<div class="form-row form-row-1">
						<label for="first_name">Họ</label>
						<input type="text" name="hodk" id="hodk" class="input-text" required pattern="[^<,@{}()*$%?=>:|;#]*">
					</div>
					<div class="form-row form-row-1">
						<label for="last_name">Tên</label>
						<input type="text" name="tendk" id="tendk" class="input-text" required pattern="[^<,@{}()*$%?=>:|;#]*">
					</div>
				</div>
				<div class="form-row">
					<label for="your_email">Email</label>
					<input type="text" name="emaildk" id="emaildk" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
				</div>
				<div class="form-row">
					<label for="your_email">Điện thoại</label>
					<input type="text" name="dienthoaidk" id="dienthoaidk" class="input-text" required pattern="0[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]">
				</div>
				<div class="form-group">
					<div class="form-row form-row-1 ">
						<label for="password">Mật khẩu</label>
						<input type="password" name="matkhaudk" id="matkhaudk" class="input-text" required>
					</div>
					<div class="form-row form-row-1">
						<label for="comfirm-password">Xác nhận mật khẩu</label>
						<input type="password" name="xacnhanmk" id="xacnhanmk" class="input-text" required>
					</div>
				</div>
				<!-- <div class="form-checkbox">
					<label class="container"><p>Tôi đồng ý với <a href="#" class="text">Điều khoản dịch vụ</a></p>
					  	<input type="checkbox" name="checkbox">
					  	<span class="checkmark"></span>
					</label>
				</div> -->
				<div class="form-row-last">
					<input type="submit" name="dangky" class="register" value="Đăng Ký">
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