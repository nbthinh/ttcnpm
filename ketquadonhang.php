<?php
    // PHP Mailer
    include "./PHPMailer-master/src/PHPMailer.php";
    include "./PHPMailer-master/src/Exception.php";
    include "./PHPMailer-master/src/OAuth.php";
    include "./PHPMailer-master/src/POP3.php";
    include "./PHPMailer-master/src/SMTP.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    include('connect.php');

    $ketquatrave = "";

    $mahoadon = $_POST['iddonhang'];
    $tensach = $_POST['tensach'];
    $ngaydathang = $_POST['ngaydathang'];
    $sdt_nguoimua = $_POST['sdtnguoimua'];
    $sdt_nguoiban = $_POST['sdtnguoiban'];
    $diachinhan = $_POST['nhanguoimua'] . ", " . $_POST['duongnguoimua'] . ", " . $_POST['xanguoimua'] . ", " . $_POST['tinhnguoimua'];
    $diachigui = $_POST['nhanguoiban'] . ", " . $_POST['duongnguoiban'] . ", " . $_POST['xanguoiban'] . ", " . $_POST['tinhnguoiban'];
    $ghichu = $_POST['ghichu'];
    $hinhthuc = $_POST['thanhtoan'];
    $giasach = $_POST['dongia'];
    $phivanchuyen = $_POST['phivanchuyen'];
    $tongcong = $_POST['tongcong'];
    $manguoimua = $_POST['idnguoimua'];
    $manguoiban = $_POST['idnguoiban'];
    $idsach = $_POST['idsach'];

    $sql = "INSERT INTO hoa_don (Ma_hoa_don, Ten_sach, Ngay_dat_hang, SDT_nguoi_mua, SDT_nguoi_ban, Dia_chi_nhan, Dia_chi_gui, Ghi_chu, Hinh_thuc, Gia_sach, Phi_van_chuyen, Tong_cong, Ma_nguoi_mua, Ma_nguoi_ban)
    VALUES (" . $mahoadon . ", '" . $tensach . "', '" . $ngaydathang . "', '" . $sdt_nguoimua . "', '" . $sdt_nguoiban . "', '" . $diachinhan . "', '" . $diachigui . "', '" . $ghichu . "', '" . $hinhthuc . "', " 
    . $giasach . ", " . $phivanchuyen .", " . $tongcong . ", " . $manguoimua . ", " . $manguoiban . ")";

    if (mysqli_query($conn, $sql))    
    {
        $sql_1 = "UPDATE sach SET Trang_thai_sach=1 WHERE Ma_sach=" . $idsach;
        if (mysqli_query($conn, $sql_1)){ 
            $ketquatrave = "Bạn đã mua sách thành công.";
            
            //send mail to buyer
            $mail = new PHPMailer(true);                              // Passing 'true' enables exceptions
            try {
                $sqlemailnguoimua = "SELECT * FROM tai_khoan WHERE Ma_tai_khoan = $manguoimua";
                // Thực thi câu truy vấn
                $result = mysqli_query($conn, $sqlemailnguoimua);
                $row = mysqli_fetch_array($result);
                $emailnguoimua = $row['Email'];

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
                $mail->setFrom('contactourbooks@gmail.com', 'Confirm Order');
                $mail->addAddress($emailnguoimua);     			  // Add a recipient
                $mail->addReplyTo('contactourbooks@gmail.com');
            
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Confirm Order from Ourbooks';
                $mail->Body    = 'Bạn đã mua sách thành công. Mã đơn hàng của bạn là '.$mahoadon. ".<br>";
                $mail->Body   .= 'Số điện thoại người bán: '.$sdt_nguoiban ."<br>";
                $mail->Body   .= 'Địa chỉ người bán: ' . $_POST['nhanguoiban'] . ", " . $_POST['duongnguoiban'] . ", Quận " . $_POST['xanguoiban'] . ", " . $_POST['tinhnguoiban'] . "<br>";
                $mail->Body   .= 'Tên sách: '.$tensach. "<br>";
                $mail->Body   .= 'Đơn giá: '.$giasach. " đ <br>";
                $mail->Body   .= 'Phí vận chuyển: '.$phivanchuyen ." đ <br>";
                $mail->Body   .= 'Ghi chú: '.$ghichu. "<br>";
                $mail->Body   .= 'Tổng số tiền thanh toán: '.$tongcong ." đ <br><br>";
                $mail->Body   .= 'Xem nội dung hóa đơn chi tiết trong theo dõi đơn hàng mua.';
            
                $mail->send();

            } catch (Exception $e) {
                //echo 'Không thể gửi xác nhận. Lỗi: ', $mail->ErrorInfo;
            }

            //send mail to seller
            $mail = new PHPMailer(true);                              // Passing 'true' enables exceptions
            try {
                $sqlemailnguoiban = "SELECT * FROM tai_khoan WHERE Ma_tai_khoan = $manguoiban";
                // Thực thi câu truy vấn
                $result = mysqli_query($conn, $sqlemailnguoiban);
                $row = mysqli_fetch_array($result);
                $emailnguoiban = $row['Email'];

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
                $mail->setFrom('contactourbooks@gmail.com', 'Confirm Book Buying');
                $mail->addAddress($emailnguoiban);     			  // Add a recipient
                $mail->addReplyTo('contactourbooks@gmail.com');
            
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Confirm Book Buying from Ourbooks';
                $mail->Body    = 'Sách bạn đăng đã được bán. Mã đơn hàng của bạn là '.$mahoadon . ".<br>";
                $mail->Body   .= 'Số điện thoại người mua: '.$sdt_nguoimua ."<br>";
                $mail->Body   .= 'Địa chỉ người mua: ' . $_POST['nhanguoimua'] . ", " . $_POST['duongnguoimua'] . ", Quận " . $_POST['xanguoimua'] . ", " . $_POST['tinhnguoimua'] . "<br>";
                $mail->Body   .= 'Tên sách: '.$tensach. "<br>";
                $mail->Body   .= 'Đơn giá: '.$giasach. " đ <br>";
                $mail->Body   .= 'Phí vận chuyển: '.$phivanchuyen ." đ <br>";
                $mail->Body   .= 'Ghi chú: '.$ghichu. "<br>";
                $mail->Body   .= 'Tổng số tiền thanh toán: '.$tongcong ." đ <br><br>";
                $mail->Body   .= 'Xem nội dung hóa đơn chi tiết trong theo dõi đơn hàng bán.';
                            
                $mail->send();

            } catch (Exception $e) {
                echo 'Không thể gửi xác nhận. Lỗi: ', $mail->ErrorInfo;
            }

        }
        else
            $ketquatrave = "Bạn đã mua sách thất bại.";

        //$ketquatrave = "Bạn đã mua sách thành công.";
    }
    else
        $ketquatrave = "Bạn đã mua sách thất bại";
    
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Trang xác nhận mua sách</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>


<body class="container" style="background-color: #F1F1F1">
    <div class="col-12 p-3">
        <h1 style="color: #f48225">MUA SÁCH</h1>
        <br><br>
        <h5><?php echo $ketquatrave; ?></h5>
        <br>
        <p>
            <a class="btn btn-warning" href="index.php" ><i class="fa fa-user"></i><b>Về Trang chủ</b></a>
        </p>
    </div>
    
</body>