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
                                echo'<a href="trangquantrivien.php" style="color: #fff"><b>ADMIN</b></a>';
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


            <div>

                <br>
                <br>
                <br>
                <h4 class="tieudetab"> TRANG QUẢN LÝ NGƯỜI DÙNG</h4>



                <div class="col-xl-5 col-lg-5 col-md-11 col-sm-11 col-11" id="cottimkiem" style="float:right; margin-top:2.2%">
                    <form class="form-inline w-100" id="otimkiem" method="GET" action="trangquanlynguoidung_admin.php">
                        
                        <input class="form-control" id="search_user" name="search_user" type="text" placeholder="Tìm kiếm theo Họ Tên" aria-label="Search">

                    </form>
                </div>



                <!-- <div class="btn-group">
                    <button type="button" class="btn btn-primary" onclick="checked_manage_user();">Chọn tất cả</button>
                    <button type="button" class="btn btn-primary" onclick="delete_user_manager();">Xóa</button>
                    <button type="button" class="btn btn-primary" onclick="modify_manage_user();">Chỉnh sửa</button>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='dangky.php'">Thêm</button>

                </div>
                <br> -->
                <br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>STT</th>
                            <th>ID Người Dùng</th>
                            <th>Họ</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Số nhà</th>
                            <th>Đường</th>
                            <th>Quận Huyện</th>
                            <th>Thành phố</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include("connect.php");
                        $j = 0;

                        if(isset($_GET['page']))
                            $page = $_GET['page'];
                        else
                            $page = "";

                        if($page == "" || $page == "1")
                        {
                            $page1 = 0;
                        }
                        else
                        {
                            $page1 = ($page*10)-10;
                        }
                        $sql="";
                        if(!isset($_GET['search_user']))
                            $sql = "SELECT * FROM tai_khoan LIMIT $page1,10";
                        else if(isset($_GET['search_user']) && $_GET['search_user'] == "")
                            $sql = "SELECT * FROM tai_khoan LIMIT $page1,10";
                        else{
                            $like = "%" . $_GET['search_user'] . "%";
                            $sql = "SELECT * FROM tai_khoan WHERE Ten_tai_khoan LIKE '$like' OR Ho_tai_khoan LIKE '$like' OR Ma_tai_khoan LIKE '$like' LIMIT $page1,12";
                        }

                        $result = mysqli_query($conn, $sql);
                    
                        $gioihan = mysqli_num_rows($result);
                    
                            if($gioihan > 0 ){
                                $i = 0;
                                while($row= mysqli_fetch_array($result)){
                                   
                                    $i++ ;
                    
                    ?>
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="radio" class="checked_manage_user" id="<?php echo $row['Ma_tai_khoan']; ?>checked_manage_user">
                                    </label>
                                </div>
                            </td>
                            <td><?php echo "$i" ?></td>
                            <td><?php echo $row['Ma_tai_khoan'] ?></td>
                            <td><?php echo $row['Ho_tai_khoan'] ?></td>
                            <td><?php echo $row['Ten_tai_khoan'] ?></td>
                            <td><?php echo $row['Email'] ?></td>
                            <td><?php echo $row['So_nha'] ?></td>
                            <td><?php echo $row['Duong'] ?></td>
                            <td><?php echo $row['Quan_Huyen'] ?></td>
                            <td><?php echo $row['Thanh_pho'] ?></td>
                        </tr>
                        

                    <?php
                                
                            }
                        }
                        $sql1 = "SELECT * FROM tai_khoan ";

                        $result1 = mysqli_query($conn, $sql1);

                        $gioihan1 = mysqli_num_rows($result1);

                        $sotrang = ceil($gioihan1/10);

                        
                    for ($b = 1; $b <= $sotrang; $b++)
                    {
                        ?><a href="trangquantrivien.php?page=<?php echo $b; ?>" ></a> <?php
                    }

    
                    ?>
                    </tbody>
                </table>

                <div class="pagination">
                    <?php
                        for ($i = 1; $i <= $sotrang; $i++)
                        { ?>
                            <a href="trangquanlynguoidung_admin.php?page=<?php echo $i; ?>" class="active"><?php echo $i; ?></a> 
                            <?php   
                        }
                    
                    ?>
                    
                </div>

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