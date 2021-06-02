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
                <h4 class="tieudetab"> TRANG QUẢN LÝ ĐƠN HÀNG </h4>



                <div class="col-xl-5 col-lg-5 col-md-11 col-sm-11 col-11" id="cottimkiem" style="float:right; margin-top:2.2%">
                    <form class="form-inline w-100" id="otimkiem" method="GET" action="trangquanlydonhang_admin.php">
                        <input class="form-control" id="search_order" name="search_order" type="text" placeholder="Tìm kiếm theo Tên Sách" aria-label="Search">
                    </form>
                </div>


                
                <br>
                <br>
                <div>
                    <table class="table table-hover" style=" font-size: 14px">
                        <thead>
                            <tr>
                                <th></th>
                                <th>STT</th>
                                <th>Mã ĐH</th>
                                <th>Ngày ĐH</th>
                        
                                <th>Tên sách</th>
                                <th>Người bán</th>
                                <th>SDT bán</th>
                                <th>Người mua</th>
                                <th>SDT mua</th>

                                <th>Địa chỉ nhận</th>
                                <th>Ghi chú</th>
                                <th>Thành tiền</th>
                                <th>Phí vận chuyển</th>
                                <th>Tổng cộng</th>
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
                                $page1 = ($page*6)-6;
                            }
                            $sql = "";
                            if (!isset($_GET['search_order']))
                                $sql = "SELECT * FROM hoa_don LIMIT $page1,6";
                            else if(isset($_GET['search_order']) && $_GET['search_order'] == ""){
                                $sql = "SELECT * FROM hoa_don LIMIT $page1,6";
                            }
                            else{
                                $like = "%" . $_GET['search_order'] . "%";
                                $sql = "SELECT * FROM hoa_don WHERE Ten_sach LIKE '$like' LIMIT $page1,6";
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
                                            <input type="checkbox" value="radio" class="checked_manage_order" id="<?php echo $row['Ma_hoa_don']; ?>checked_manage_order">
                                        </label>
                                    </div>
                                </td>
                                <td><?php echo $i  ?></td>
                                <td><?php echo $row['Ma_hoa_don']  ?></td>
                                <td><?php echo $row['Ngay_dat_hang']  ?></td>
                                
                                <td><?php echo $row['Ten_sach']  ?></td>
                                <?php
                            // lấy tên từ id người mua
                                $Ma_nguoi_mua = $row['Ma_nguoi_mua'];
                                $sql_nguoimua = "SELECT * FROM tai_khoan WHERE Ma_tai_khoan='$Ma_nguoi_mua'";
                                $sql_nguoimua_query = mysqli_query($conn, $sql_nguoimua);
                                $get_nguoimua = mysqli_fetch_assoc($sql_nguoimua_query);
                                $nguoi_mua = $get_nguoimua['Ho_tai_khoan'] . " " . $get_nguoimua['Ten_tai_khoan'];
                            
                            // lấy tên từ id người bán
                            
                                $Ma_nguoi_ban = $row['Ma_nguoi_ban'];
                                $sql_nguoiban = "SELECT * FROM tai_khoan WHERE Ma_tai_khoan='$Ma_nguoi_ban'";
                                $sql_nguoiban_query = mysqli_query($conn, $sql_nguoiban);
                                $get_nguoiban = mysqli_fetch_assoc($sql_nguoiban_query);
                                $nguoi_ban = $get_nguoiban['Ho_tai_khoan'] . " " . $get_nguoiban['Ten_tai_khoan'];
                            ?>
                                <td><?php echo $nguoi_ban ?></td>
                                <td><?php echo $row['SDT_nguoi_ban']  ?></td>
                                <td><?php echo $nguoi_mua ?></td>
                                <td><?php echo $row['SDT_nguoi_mua']  ?></td>
                                <td><?php echo $row['Dia_chi_nhan']  ?></td>
                                <td><?php echo $row['Ghi_chu']  ?></td>
                                <td><?php echo $row['Gia_sach']  ?></td> 
                                <!-- Sua Thanh_tien thanh Gia_sach -->
                                <td><?php echo $row['Phi_van_chuyen']  ?></td>
                                <td><?php echo $row['Tong_cong']  ?></td>
                            </tr>
                            
                        <?php
                                
                                }
                            }
                            $sql1 = "SELECT * FROM hoa_don ";

                            $result1 = mysqli_query($conn, $sql1);

                            $gioihan1 = mysqli_num_rows($result1);

                            $sotrang = ceil($gioihan1/6);

                            
                            for ($b = 1; $b <= $sotrang; $b++)
                            {
                                ?><a href="trangquantrivien.php?page=<?php echo $b; ?>" ></a> <?php
                            }

    
                        ?>

                        </tbody>
                    </table>
                </div>
                <div class="pagination">
                    <?php
                        for ($i = 1; $i <= $sotrang; $i++)
                        { ?>
                            <a href="trangquanlydonhang_admin.php?page=<?php echo $i; ?>" class="active"><?php echo $i; ?></a> 
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