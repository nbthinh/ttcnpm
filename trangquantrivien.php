<?php
session_start();
if (!isset( $_SESSION['ten'])){
    echo "<h1>Trang quản trị viên không tồn tại</h1>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang quản trị viên</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/modify.js"></script>
    <script src="js/modify1.js"></script>
    <script src="js/checked1.js"></script>
    <script src="js/delete.js"></script>
    <script src="js/delete1.js"></script>
    <script src="js/confirm.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style_quantri.css">
    <link rel="stylesheet" href="./style/style_popup.css">
    <link rel="shortcut icon" type="image/png" href="./image/bklogo.png"/>
</head>

<body>
    <header>
        <div class="container-fluid background" id="hangheader">
            
            <div class="row height100" id="hanglogo">
                        
                <div class="col-xl-1 col-lg-1 col-md-3 col-sm-3 col-3 text-center">
                    <img src="./image/logo.png" id="logo" alt="Không tìm thấy ảnh">
                </div>
            
                <div class="col-xl-7 col-lg-6 col-md-9 col-sm-9 col-9">
                    <h1 class="mauchu" id="tieude"><b>OURBOOKS</b></h1>
                </div>
            
                <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12 col-12">
                    <button class="btn nutdangnhap maunen chunutlon">
                        <a style="color: white; text-decoration: none;">
                        <?php
                            if (isset( $_SESSION['email']))
                                //echo'<a href="dangky.php" style="color: #fff"><b>ĐĂNG KÝ</b></a>';
                                echo'<a href="index.php" style="color: #fff"><b>TRANG CHỦ</b></a>';
                            //else 
                                //echo'<a href="trangcanhan.php" style="color: #fff"><b>TÀI KHOẢN</b></a>';
                                
                        ?>
                        </a>
                    </button>
                    <button class="btn nutdangnhap maunen chunutlon">
                        <a style="color: white; text-decoration: none;">
                        <?php
                            if (isset( $_SESSION['email']))
                                //echo '<a href="dangnhap.php" style="color: #fff"><b>ĐĂNG NHẬP</b></a>';
                                echo '<a href="dangxuat.php" style="color: #fff"><b>ĐĂNG XUẤT</b></a>';
                            //else
                                //echo '<a href="dangxuat.php" style="color: #fff"><b>ĐĂNG XUẤT</b></a>';
                               
                        ?>
                        </a>
                    </button>
                </div>
            
            </div>
            
            <div class="row height100" id="hangmenu">
                
            </div>
                    
        </div>
            
    </header>
        


    <section>
        <div class="container">

            <div class="tab" style="margin-left: 25%">
                <button class="tablinks" onclick="window.location.href='trangquanlysach_admin.php'">QUẢN LÝ SÁCH</button>
                <button class="tablinks" onclick="window.location.href='trangquanlynguoidung_admin.php'">QUẢN LÝ NGƯỜI DÙNG</button>
                <button class="tablinks" onclick="window.location.href='trangquanlybaiviet_admin.php'">QUẢN LÝ BÀI VIẾT</button>
                <button class="tablinks" onclick="window.location.href='trangquanlydonhang_admin.php'">QUẢN LÝ ĐƠN HÀNG</button>
                
				<div style="clear:both;"></div>
            </div>

        </div>








    </section>

    <footer>
        <?php
            include('footer.php')
        ?>


    </footer>

    <script type="text/javascript">
        var buttons = document.getElementsByClassName('tablinks');
        var contents = document.getElementsByClassName('tabcontent');
        function showContent(id) {
            for (var i = 0; i < contents.length; i++) {
                contents[i].style.display = 'none';
            }
            var content = document.getElementById(id);
            content.style.display = 'block';
        }
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].addEventListener("click", function () {
                var id = this.textContent;
                for (var i = 0; i < buttons.length; i++) {
                    buttons[i].classList.remove("active");
                }
                this.className += " active";
                showContent(id);
            });
        }
        showContent('PHP');
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


</body>

</html>