<?php
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
        if (isset($_POST['dangky']))
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

            // //cách đơn giản
            // $hodk           = $_POST['hodk'];
            // $tendk          = $_POST['tendk'];
            // $emaildk        = $_POST['emaildk'];
            // $dienthoaidk    = $_POST['dienthoaidk'];
            // $matkhaudk      = $_POST['matkhaudk'];
            // $xacnhanmk      = $_POST['xacnhanmk'];

            $data['hodk']           = isset($_POST['hodk']) ? $_POST['hodk'] : '';
            $data['tendk']          = isset($_POST['tendk']) ? $_POST['tendk'] : '';
            $data['emaildk']        = isset($_POST['emaildk']) ? $_POST['emaildk'] : '';
            $data['dienthoaidk']    = isset($_POST['dienthoaidk']) ? $_POST['dienthoaidk'] : '';
            $data['matkhaudk']      = isset($_POST['matkhaudk']) ? md5($_POST['matkhaudk']) : '';
            $data['xacnhanmk']      = isset($_POST['xacnhanmk']) ? md5($_POST['xacnhanmk']) : '';


            //Validate các trường bị blank hoặc không đúng định dạng hoặc mật khẩu không trùng khớp
            // Kiểm tra định dạng dữ liệu
            //chưa nhập họ
            if (empty($data['hodk'])){
                $error['hodk'] = 'Chưa nhập họ <br>';
            }
            else if (!is_name($data['hodk'])){
                $error['hodk'] = 'Họ không đúng định dạng <br>';
            }

            //chưa nhập tên
            if (empty($data['tendk'])){
                $error['tendk'] = 'Chưa nhập tên <br>';
            }
            else if (!is_name($data['tendk'])){
                $error['tendk'] = 'Tên không đúng định dạng <br>';
            }

            //chưa nhập email
            if (empty($data['emaildk'])){
                $error['emaildk'] = 'Chưa nhập email <br>';
            }
            //hoặc email không đúng định dạng
            else if (!is_email($data['emaildk'])){
                $error['emaildk'] = 'Email không đúng định dạng <br>';
            }

            //chưa nhập điện thoại
            if (empty($data['dienthoaidk'])){
                $error['dienthoaidk'] = 'Chưa nhập điện thoại <br>';
            }
            //hoặc điện thoại không đúng định dạng
            else if (!is_phone($data['dienthoaidk'])){
                $error['dienthoaidk'] = 'Điện thoại không đúng định dạng <br>';
            }

            //chưa nhập mật khẩu
            if (empty($data['matkhaudk'])){
                $error['matkhaudk'] = 'Chưa nhập mật khẩu đăng ký <br>';
            }

            //chưa nhập xác nhận mật khẩu
            if (empty($data['xacnhanmk'])){
                $error['xacnhanmk'] = 'Chưa nhập xác nhận mật khẩu đăng ký <br>';
            }
            //hoặc mật khẩu không trùng khớp
            else if (strcmp($data['xacnhanmk'],$data['matkhaudk'])!=0){
                $error['xacnhanmk'] = 'Mật khẩu không trùng khớp <br>';
            }

            if ($error){
                echo "<h5>Có lỗi trong quá trình nhập dữ liệu. <br></h5>";
                echo "<h5>Đăng ký không thành công.</h5>";
            }
            //Không có lỗi trong quá trình nhập
            else if (!$error){
                //Validate email đã tồn tại trong database
                // Kết nối CSDL
                $conn = mysqli_connect($server, $user, $pass, $database);
                mysqli_set_charset($conn, 'UTF8');

                
                //Kiểm tra kết nối
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                //echo "Connected successfully <br>";
                
                // mysqli_set_charset($conn, "utf8");

                // Kiểm tra email có tồn tại hay không
                $sql = "SELECT * FROM tai_khoan WHERE email = '$data[emaildk]'";
                
                // Thực thi câu truy vấn
                $result = mysqli_query($conn, $sql);
                
                // Nếu kết quả trả về lớn hơn 1 thì nghĩa là email đã tồn tại
                if (mysqli_num_rows($result) > 0)
                {
                    // Sử dụng javascript để thông báo
                    //echo '<script language="javascript">alert("Thông tin đăng nhập bị sai"); window.location="register.php";</script>';
                    echo "<h5>Email đã tồn tại. <br></h5>";
                    echo "<h5>Đăng ký không thành công.</h5>";

                    //đóng kết nối
                    mysqli_close($conn);
                    
                }
                else {
                    // Ngược lại thì thêm bình thường
                    $sql = "INSERT INTO tai_khoan (Ho_tai_khoan,Ten_tai_khoan,Email,SDT_tai_khoan,Mat_khau_tai_khoan,Kiem_duyet_tai_khoan) VALUES ('$data[hodk]','$data[tendk]','$data[emaildk]','$data[dienthoaidk]', '$data[matkhaudk]', 0)";
                    
                    if (mysqli_query($conn, $sql)){
                        //echo '<script language="javascript">alert("Đăng ký thành công"); window.location="register.php";</script>';
                        echo "<h5>Đăng ký thành công. <br></h5>";
                        echo "<h5>Đăng nhập để bắt đầu.</h5>";
                        $success = 1;    
                    }
                    else {
                        //echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="register.php";</script>';
                        echo "Error: " . $sql . "" . mysqli_error($conn);
                        echo "<h5>Đăng ký không thành công.</h5>";
                    }

                    //đóng kết nối
                    mysqli_close($conn);
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
                echo '<a class="btn btn-warning" href="dangky.php"><i class="fa fa-user"></i><b>Trở lại</b></a>';
            ?>
        </p>
    </div>
</body>

</html>