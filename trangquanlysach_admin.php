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
    <script src="js/delete1.js"></script>
    <script src="js/delete.js"></script>
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
                <!-- Empty -->
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
            <!-- Quan ly sach -->
                <br>
                <br>
                <br>

                <h4 class="tieudetab"> TRANG QUẢN LÝ SÁCH </h4>



                <div class="col-xl-5 col-lg-5 col-md-11 col-sm-11 col-11" id="cottimkiem" style="float:right; margin-top:3.5%">
                    <form class="form-inline w-100" method="GET" action="trangquanlysach_admin.php">
                        <input class="form-control" id="search_book" name="search_book" type="text" placeholder="Tìm kiếm theo Tên Sách" aria-label="Search">
                    </form>
                </div>
                <?php
                    $trang = 1;

                    if(isset($_GET['page']))
                        $trang = $_GET['page'];
                ?>
                <div class="btn-group" >
                    <button type="button" class="btn btn-primary" onclick="checked_book_manager();">Chọn tất cả</button>
                    <button type="button" class="btn btn-primary" onclick="delete_book_manager(<?php echo $trang; ?>);">Xóa</button>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='trangthemsach.php?id=1'">Thêm</button>
                    
                
                                                
                </div>
                <br>
                <br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>STT</th>
                            <th width="250px">Tên sách</th>
                            <th width="200px">Tác giả</th>
                            <th width="200px">Thể loại</th>
                            <th width="200px">Người đăng</th>
                            <th width="180px">Tình trạng</th>
                            <th width="150px">Trạng thái</th>
                            <th width="130px">Chỉnh sửa</th>
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
                        $sql = "";
                        if (!isset($_GET['search_book']))
                            $sql = "SELECT * FROM sach LIMIT $page1,10";
                        else if(isset($_GET['search_book']) && $_GET['search_book'] == "")
                            $sql = "SELECT * FROM sach LIMIT $page1,10";
                        else{
                            $like = "%" . $_GET['search_book'] . "%";
                            $sql = "SELECT * FROM sach WHERE Ten_sach LIKE '$like' OR Tac_gia LIKE '$like' LIMIT $page1, 10";
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
                                        <input type="checkbox" value="radio" class="checked_book_manager" id="<?php echo $row['Ma_sach']; ?>checked_book_manager_id">
                                    </label>
                                </div>
                            </td>
                            
                            <?php
                            	// lấy tên từ id người dùng
                                $ma_nguoi_dang = $row['Ma_nguoi_dang'];
                                $duyet_sach = $row['Duyet_sach'];
                                $sql_nguoidang = "SELECT * FROM tai_khoan WHERE Ma_tai_khoan='$ma_nguoi_dang'";
                                $sql_nguoidang_query = mysqli_query($conn, $sql_nguoidang);
                                $get_nguoidang = mysqli_fetch_assoc($sql_nguoidang_query);
                                $nguoi_dang = $get_nguoidang['Ho_tai_khoan'] . " " . $get_nguoidang['Ten_tai_khoan'];
                            
                            //lấy tên thể loại từ id thể loại
                            
                                $ma_theloai = $row['Ma_the_loai'];
                                $ma_sach = $row['Ma_sach'];
                                $sql_theloai = "SELECT * FROM the_loai WHERE Ma_the_loai='$ma_theloai'";
                                $sql_theloai_query = mysqli_query($conn, $sql_theloai);
                                $get_theloai = mysqli_fetch_assoc($sql_theloai_query);
                                $the_loai = $get_theloai['Ten_the_loai'];
                            ?>
                            <td><?php echo $i ?></td>
                            <!-- Bo $row['Ma_sach'] -->
                            <td width="250px"><?php echo $row['Ten_sach'] ?></td>
                            <td width="200px"><?php echo $row['Tac_gia'] ?></td>
                            <td width="200px"><?php echo $the_loai ?></td>
                            <td width="200px"><?php echo $nguoi_dang ?></td>
                            <td width="180px">
                               <?php
                                   if ($row['Trang_thai_sach'] == 1)
                                        echo "Đã giao dịch";
                                    else echo "Chưa giao dịch";
                                ?>
                            </td>
                            <td width="150px">
                                <?php
                                    if ($duyet_sach == 1){
                                        // echo "Đã duyệt";
                                        echo '<button class="mota" style="background-color:green; color: #FFF;" onclick="window.location.href=\'#\'">Đã duyệt</button>';
                                    }
                                    else{
                                        if(isset($_GET['page']))
                                            echo '<button class="mota" style="background-color:#F37B1B; color: #FFF;" onclick="window.location.href=\'process.php?state=confirm_book&id=' . $ma_sach . '&page=' . $_GET['page'] . '\'">Chưa duyệt</button>';
                                        else
                                            echo '<button class="mota" style="background-color:#F37B1B; color: #FFF;" onclick="window.location.href=\'process.php?state=confirm_book&id=' . $ma_sach . '&page=1\'">Chưa duyệt</button>';

                                    }
                                ?>
                            </td>
                            <td width="120px">
                                <?php 
                                if(isset($_GET['page']))
                                    echo '<button class="mota" style="background-color:#F37B1B; color: #FFF;" onclick="window.location.href=\'process.php?state=modify_book&id=' . $ma_sach . '&page=' . $_GET['page'] . '\'">Chỉnh sửa</button>'; 
                                else
                                    echo '<button class="mota" style="background-color:#F37B1B; color: #FFF;" onclick="window.location.href=\'process.php?state=modify_book&id=' . $ma_sach . '&page=1\'">Chỉnh sửa</button>'; 

                                ?>
                            </td>
                            <!-- adminduyetsach.php chuyen thanh process.php? -->
                        
                        </tr>

                                   
                    <?php
                                
                            }
                        }
                        $sql1 = "SELECT * FROM sach ";

                        $result1 = mysqli_query($conn, $sql1);

                        $gioihan1 = mysqli_num_rows($result1);

                        $sotrang = ceil($gioihan1/10);

                        
                    for ($b = 1; $b <= $sotrang; $b++)
                    {
                        ?><a href="trangquantrivien.php?page=<?php echo $b; ?>" style = "text-decoration: none"></a> <?php
                    }

    
                    ?>

                    </tbody>
                </table>

                <div class="pagination">
                    <?php
                        for ($i = 1; $i <= $sotrang; $i++)
                        { ?>
                            <a href="trangquanlysach_admin.php?page=<?php echo $i; ?>" class="active"><?php echo $i; ?></a> 
                            <?php   
                        }
                    
                    ?>
                    
                </div>
            </div>

        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        
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