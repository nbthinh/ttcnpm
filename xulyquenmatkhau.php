<?php
// include PHP Mailer
include "./PHPMailer-master/src/PHPMailer.php";
include "./PHPMailer-master/src/Exception.php";
include "./PHPMailer-master/src/OAuth.php";
include "./PHPMailer-master/src/POP3.php";
include "./PHPMailer-master/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$success = 0;
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
        <h1 style="color: #f48225">QUÊN MẬT KHẨU</h1>
        <br><br>
        <?php
		if (isset($_POST['gui']))
        {
			$error = array();
			$data = array();
			$data['emailqmk']  = isset($_POST['emailqmk']) ? $_POST['emailqmk'] : '';
			if (empty($data['emailqmk'])){
                $error['emailqmk'] = 'Chưa nhập email <br>';
            }
            //hoặc email không đúng định dạng
            else if (!is_email($data['emailqmk'])){
                $error['emailqmk'] = 'Email không đúng định dạng <br>';
			}
		}

		if($error){
			echo "<h5>Có lỗi trong quá trình nhập dữ liệu</h5>";
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

			// Kiểm tra email có tồn tại hay không
			$sql = "SELECT * FROM tai_khoan WHERE Email = '$data[emailqmk]'";

			// Thực thi câu truy vấn
			$result = mysqli_query($conn, $sql);

			// Nếu kết quả trả về bằng 0 thì nghĩa là email chưa tồn tại
			if (mysqli_num_rows($result) == 0)
			{
				echo "<h5>Email chưa tồn tại. Vui lòng kiểm tra lại.</h5>";
				//exit;
			}
			else {
				$success = 1;

				//tạo một password
				$random = rand(72891,92729);
				$new_password = $random;

				//mã hóa password
				$data['matkhaumoi'] = md5($new_password);

				//cập nhật database
				//chú ý cách ghi biến $data rất hay
				$sql = "UPDATE tai_khoan SET Mat_khau_tai_khoan ='".$data['matkhaumoi']."'WHERE Email = '".$data['emailqmk']."'";
				$result = mysqli_query($conn, $sql);

				// //gửi email
				$mail = new PHPMailer(true);                              // Passing 'true' enables exceptions
				try {
					//Server settings
					$mail->SMTPDebug = 0;                                 // Enable verbose debug output
					$mail->isSMTP();                                      // Set mailer to use SMTP
					$mail->Host = 'smtp.gmail.com';  					  // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'contactourbooks@gmail.com';        // SMTP username
					$mail->Password = 'Ourbooks123';                      // SMTP password
					$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 587;                                    // TCP port to connect to
				
					//Recipients
					$mail->setFrom('contactourbooks@gmail.com', 'Recovery Password');
					$mail->addAddress($data['emailqmk']);     			  // Add a recipient
					$mail->addReplyTo('contactourbooks@gmail.com');
					//$mail->addCC('cc@example.com');
					//$mail->addBCC('bcc@example.com');
				
					//Attachments
					//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
					//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
				
					//Content
					$mail->isHTML(true);                                  // Set email format to HTML
					$mail->Subject = 'Recovery Password from Ourbooks';
					$mail->Body    = '<b>Mật khẩu mới</b> của bạn là '.$new_password;
					$mail->AltBody = '<b>Mật khẩu mới</b> của bạn là '.$new_password;
				
					$mail->send();
					echo '<h5>Mật khẩu mới đã được gửi đến email của bạn.</h5>';
				} catch (Exception $e) {
					echo 'Không thể gửi mật khẩu. Lỗi: ', $mail->ErrorInfo;
				}

				// echo "<h5>Mật khẩu mới của bạn là <br></h5>";
				// echo "<h5>$new_password</h5>";
			}
		}

		?>
        <p>
            <br>
            <?php
            if ($success==1)
                echo '<a class="btn btn-warning" href="dangnhap.php" ><i class="fa fa-user"></i><b>Đăng nhập</b></a>';
            if ($success==0)
                echo '<a class="btn btn-warning" href="dangky.php"><i class="fa fa-user"></i><b>Trở lại</b></a>';
            ?>
        </p>
    </div>
</body>
</html>