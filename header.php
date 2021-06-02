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
                    if (!isset( $_SESSION['ten']))
                        echo'<a href="dangky.php" style="color: #fff"><b>ĐĂNG KÝ</b></a>';
                    else if ($_SESSION['ten'] == 'admin')
                        echo'<a href="trangquantrivien.php" style="color: #fff"><b>TÀI KHOẢN</b></a>';
                    else
                        echo'<a href="trangcanhan.php" style="color: #fff"><b>TÀI KHOẢN</b></a>';
                ?>
                </a
            ></button>
            <button class="btn nutdangnhap maunen chunutlon">
                <a style="color: white; text-decoration: none;">
                <?php
                    if (!isset( $_SESSION['ten']))
                        echo '<a href="dangnhap.php" style="color: #fff"><b>ĐĂNG NHẬP</b></a>';
                    else
                        echo '<a href="dangxuat.php" style="color: #fff"><b>ĐĂNG XUẤT</b></a>';
                ?>
                </a>
            </button>
        </div>
    
    </div>
    
    <div class="row height100" id="hangmenu">
                
        <!-- Begin Menu Button -->
        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1" id="cotmenu">
            <div class = "text-right">
                <button class="btn btn-outline-light w-50" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bars fa-2x" style="color: #f48225"></i>
                </button>            

                <div class="dropdown-menu menudropdown" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item maunen" href="sachvanhoc.php">Sách Văn Học</a>
                    <a class="dropdown-item maunen" href="sachkinhte.php">Sách Kinh Tế</a>
                    <a class="dropdown-item maunen" href="sachkynangsong.php">Sách Kỹ Năng Sống</a>
                    <a class="dropdown-item maunen" href="sachngoaingu.php">Sách Ngoại Ngữ</a>
                    <a class="dropdown-item maunen" href="sachthamkhao.php">Sách Tham Khảo</a>
                    <!-- <a class="dropdown-item maunen" href="#">Sách Giáo Khoa</a> -->
                    <!-- <a class="dropdown-item maunen" href="#">Truyện Tranh</a> -->
                </div>
            </div>
                                        
        </div>
        <!-- End Menu Button -->
                        
        <!-- Begin Search Bar -->
        <div class="col-xl-6 col-lg-6 col-md-11 col-sm-11 col-11" id="cottimkiem">

            <form class="form-inline w-100" id="otimkiem" action="trangtimkiem.php" method="post">
                <input class="form-control" id="otextsearch" type="text" placeholder="Tìm kiếm sách" aria-label="Search" name="timkiemsach">
                <button class="btn btn-outline-dark" id="iconsearch" name="timkiem">
                    <i class="fas fa-search" aria-hidden="true"></i>
                </button>
            </form>                        
        </div>
        <!-- End Search Bar -->
    
        <!-- Begin Navigation Bar -->
        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12" id="cotdieuhuong">

            <nav class="navbar navbar-expand-lg" id="thanhdieuhuong">
                <div class="collapse navbar-collapse" id="collapsedieuhuong">
                    <ul class="navbar-nav" id="danhsachlink">
                        <li class="nav-item btn-primary kichthuocmenu text-center" id="trangchu">
                            <a class="nav-link text-dark" href="index.php"><b class="menudidong">TRANG CHỦ</b></a>
                        </li>
                        <li class="nav-item btn-primary kichthuocmenu text-center" id="trangchu_1">
                            <a class="nav-link text-light" href="trangdanhsach.php"><b class="menudidong">SÁCH</b></a>
                        </li>
                        <li class="nav-item btn-primary kichthuocmenu text-center" id="trangchu_2">
                            <a class="nav-link text-light" href="trangbaiviet.php"><b class="menudidong">BÀI VIẾT</b></a>
                        </li>
                        <li class="nav-item btn-primary kichthuocmenu text-center" id="trangchu_3">
                            <a class="nav-link text-light" href="trangtrogiup.php"><b class="menudidong">TRỢ GIÚP</b></a>
                        </li>
                        <!-- <li class="nav-item btn-primary kichthuocmenu text-center" id="trangchu_4">
                            <a class="nav-link text-light" href="trangcanhan.php"><b class="menudidong">TÀI KHOẢN</b></a>
                        </li> -->
                    </ul>
                </div>                            
                        
                <div class="text-right right-block" id="nutmenudidong">
                    <button class="btn btn-outline-light" type="button" id="thanhgach" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bars fa-2x" style="color: #f48225;"></i>
                    </button>            

                    <div class="dropdown-menu menudropdown" aria-labelledby="thanhgach">
                        <a class="dropdown-item text-dark" href="index.php" id="trangchu_5">Trang chủ</a>
                        <a class="dropdown-item text-light" href="trangdanhsach.php" id="trangchu_6">Sách</a>
                        <a class="dropdown-item text-light" href="trangbaiviet.php" id="trangchu_7">Bài viết</a>
                        <a class="dropdown-item text-light" href="trangtrogiup.php" id="trangchu_8">Trợ giúp</a>
                        <!-- <a class="dropdown-item text-light" href="trangcanhan.php" id="trangchu_9">Tài khoản</a> -->
                    </div>
                </div>

            </nav>
        </div>
        <!-- End Navigation Bar -->
    
    </div>
            
</div>