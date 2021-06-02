<?php
// Khởi tạo session
session_start();
$flag = 0;
$admin = 0;
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
    <title>Trang xác nhận đăng nhập</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="./style/style_dangnhap.css"/>
</head>

<body class="container" style="background-color: #F1F1F1">
    <div class="col-12 p-3">
        <h1 style="color: #f48225">ĐĂNG NHẬP</h1>
        <br><br>
        <?php
        // Vì tên button submit là do-register nên ta sẽ kiểm tra nếu
        // tồn tại key này trong biến toàn cục $_POST thì nghĩa là người 
        // dùng đã click register(submit)
        if (isset($_POST['dangnhap']))
        {
            // Code PHP xử lý validate
            $error = array();
            $data = array();
            // Lấy thông tin
            // Để an toàn thì ta dùng hàm mssql_escape_string để
            // chống hack sql injection
            // $username   = isset($_POST['username']) ? mysql_escape_string($_POST['username']) : '';
            // $password   = isset($_POST['password']) ? md5($_POST['password']) : '';
            // $email      = isset($_POST['email'])    ? mysql_escape_string($_POST['email']) : '';
            // $phone      = isset($_POST['phone'])    ? mysql_escape_string($_POST['phone']) : '';
            // $level      = isset($_POST['level'])    ? (int)$_POST['level'] : '';

            $data['emaildn']        = isset($_POST['emaildn']) ? $_POST['emaildn'] : '';
            $data['matkhaudn']      = isset($_POST['matkhaudn']) ? md5($_POST['matkhaudn']) : '';

            //Validate các trường bị blank hoặc không đúng định dạng hoặc mật khẩu không trùng khớp
            // Kiểm tra định dạng dữ liệu
            //chưa nhập email
            if (empty($data['emaildn'])){
                $error['emaildn'] = 'Chưa nhập email <br>';
            }
            //hoặc email không đúng định dạng
            else if (!is_email($data['emaildn'])){
                $error['emaildn'] = 'Email không đúng định dạng <br>';
            }

            //chưa nhập mật khẩu
            if (empty($data['matkhaudn'])){
                $error['matkhaudn'] = 'Chưa nhập mật khẩu đăng ký <br>';
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
                $sql = "SELECT * FROM tai_khoan WHERE Email = '$data[emaildn]' AND Mat_khau_tai_khoan = '$data[matkhaudn]'";

                // Thực thi câu truy vấn
                $result = mysqli_query($conn, $sql);

                // Nếu kết quả trả về bằng 0 thì nghĩa là email chưa tồn tại
                if (mysqli_num_rows($result) == 0)
                {
                    echo "<h5>Email hoặc mật khẩu không đúng. Vui lòng kiểm tra lại.</h5>";
                    //exit;
                }
                else
                {
                    //Lấy dòng tìm được trong database ra
                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    
                    // //So sánh 2 mật khẩu có trùng khớp hay không
                    // if ($data['matkhaudn'] != $row['password']) {
                    //     echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
                    //     exit;
                    // }

                    $_SESSION['thutu'] = 0; //Phần này mình bổ sung thêm.
                    $_SESSION['mataikhoan'] = $row['Ma_tai_khoan']; //Phần này mình bổ sung thêm.                    
                    $_SESSION['ho'] = $row['Ho_tai_khoan'];
                    $_SESSION['ten'] = $row['Ten_tai_khoan'];
                    $_SESSION['email'] = $row['Email'];
                    $_SESSION['dienthoai'] = $row['SDT_tai_khoan'];
                    $_SESSION['matkhau'] = $row['Mat_khau_tai_khoan'];
                    $_SESSION['sonha'] = $row['So_nha'];
                    $_SESSION['duong'] = $row['Duong'];
                    $_SESSION['quanhuyen'] = $row['Quan_Huyen'];
                    $_SESSION['thanhpho'] = $row['Thanh_pho'];
                    $flag = 1;

                    echo "<h5>Bạn đã đăng nhập thành công.</h5>";
                    //echo "<br>";
                    //echo "<a href='index.php'>Về trang chủ</a>";

                    if($_SESSION['email']== 'admin@gmail.com' && $_SESSION['matkhau']== md5('admin'))
                        $admin = 1;
                }
            }
        }
        ?>
        <br>
        <p>
            <?php
            if ($admin == 1)
                echo '<a class="btn btn-warning" href="trangquantrivien.php" ><i class="fa fa-user"></i><b>Về Trang Quản Trị Viên</b></a>';
            if ($flag==1 && $admin == 0)
                echo '<a class="btn btn-warning" href="index.php" ><i class="fa fa-user"></i><b>Về Trang Chủ</b></a>';
            if ($flag==0 && $admin == 0)
                echo '<a class="btn btn-warning" href="dangnhap.php"><i class="fa fa-user"></i><b>Trở lại</b></a>';
            ?>
        </p>
    </div>
</body>

</html>