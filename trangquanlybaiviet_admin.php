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
                <h4 class="tieudetab"> TRANG QUẢN LÝ BÀI VIẾT</h4>



                <div class="col-xl-5 col-lg-5 col-md-11 col-sm-11 col-11" id="cottimkiem" style="float:right; margin-top:2.2%">
                    <form class="form-inline w-100" id="otimkiem" method="GET" action="trangquanlybaiviet_admin.php">
                        <input class="form-control" id="search_story" name="search_story" type="text" placeholder="Tìm kiếm theo Bài Viết" aria-label="Search">
                    </form>
                </div>

                <?php
                    $trang = 1;
                    
                    if(isset($_GET['page']))
                        $trang = $_GET['page'];
                    
                ?>

                <div class="btn-group">
                    <button type="button" class="btn btn-primary" onclick="checked_manage_story();">Chọn tất cả</button>
                    <button type="button" class="btn btn-primary" onclick="delete_story_manager(<?php echo $trang; ?>);">Xóa</button>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='trangthongtinbaiviet.php?matk=1'">Thêm</button>
                </div>
                <br>
                <br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>STT</th>
                            <th width="120px">Ngày đăng</th>
                            <th>Tên bài viết</th>
                            <th>Tên sách</th>
                            <th width="120px">Trạng thái</th>
                            <th width="150px">Chỉnh sửa</th>
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
                        if (!isset($_GET['search_story']))
                            $sql = "SELECT * FROM bai_viet LIMIT $page1,10";
                        else if (isset($_GET['search_story']) && $_GET['search_story'] == ""){
                            $sql = "SELECT * FROM bai_viet LIMIT $page1,10";
                        }
                        else{
                            $like = "%" . $_GET['search_story'] . "%";
                            $sql = "SELECT * FROM bai_viet WHERE ten_bai_viet LIKE '$like' OR ten_sach LIKE '$like' LIMIT $page1,8";
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
                                        <input type="checkbox" value="radio" class="checked_manage_story" id="<?php echo $row['Ma_bai_viet']; ?>checked_manage_story">
                                    </label>
                                </div>
                            </td>

                            

                            <td><?php echo "$i" ?></td>
                            <td width="120px"><?php echo $row['Ngay_dang_bai_viet'] ?></td>
                            <td><?php echo $row['ten_bai_viet'] ?></td>
                            <td><?php echo $row['ten_sach'] ?></td>
                            <td width="150px">
                                <?php
                                    if ($row['Kiem_duyet_bai_viet'] == 1)
                                        echo '<button class="mota" style="background-color:green; color: #FFF;" onclick="window.location.href=\'#\'">Đã duyệt</button>';
                                    else
                                    {
                                        if(isset($_GET['page']))
                                            echo '<button class="mota" style="background-color:#F37B1B; color: #FFF;" onclick="window.location.href=\'process.php?state=confirm_story&id='. $row['Ma_bai_viet'] .'&page=' . $_GET['page'] . '\'">Chưa duyệt</button>';
                                        else
                                            echo '<button class="mota" style="background-color:#F37B1B; color: #FFF;" onclick="window.location.href=\'process.php?state=confirm_story&id='. $row['Ma_bai_viet'] .'&page=1\'">Chưa duyệt</button>';
                                    }
                                ?>
                            </td>
                            <td width="150px">
                                <?php
                                    $id_bv = $row['Ma_bai_viet'];
                                    if(isset($_GET['page']))
                                        echo '<button class="mota" style="background-color:#F37B1B; color: #FFF;" onclick="window.location.href=\'process.php?state=modify_story&id='. $id_bv . '&page=' . $_GET['page'] . '\'">Chỉnh sửa</button>';
                                    else
                                        echo '<button class="mota" style="background-color:#F37B1B; color: #FFF;" onclick="window.location.href=\'process.php?state=modify_story&id='. $id_bv . '&page=1\'">Chỉnh sửa</button>';
                                    ?>
                            </td>
                        </tr>
                       
                    
                    <?php
                                
                            }
                        }
                        $sql1 = "SELECT * FROM bai_viet ";

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
                            <a href="trangquanlybaiviet_admin.php?page=<?php echo $i; ?>" class="active"><?php echo $i; ?></a> 
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