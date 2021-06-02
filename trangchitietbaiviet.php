<?php
    session_start();
    $mabaiviet = $_GET['mabaiviet'];
    include("connect.php");
    $sql_baiviet = "SELECT * FROM bai_viet WHERE Kiem_duyet_bai_viet=1 AND Ma_bai_viet='$mabaiviet'";
    $sql_baiviet_query = mysqli_query($conn, $sql_baiviet);
    $row = mysqli_fetch_assoc($sql_baiviet_query);
    if (isset($_GET['inc_view'])){
        $soluotview = (int)$row['luot_view'];
        $soluotview++;
        $sql_inc_view = "UPDATE bai_viet SET luot_view='$soluotview' WHERE Kiem_duyet_bai_viet=1 AND Ma_bai_viet=$mabaiviet";
        $sql_inc_view_query = mysqli_query($conn, $sql_inc_view);
        $link = "Location: trangchitietbaiviet.php?mabaiviet=$mabaiviet";
        header($link);
        exit();
    }
    $mataikhoan = $row['Ma_tai_khoan'];
    $ngaydang = $row['Ngay_dang_bai_viet'];
    $tensach = $row['ten_sach'];
    $tenbaiviet = $row['ten_bai_viet'];
    $anhbaiviet = $row['Anh_bai_viet'];
    $thanbaiviet = $row['Mo_ta_bai_viet'];
    $sql_tendaydu = "SELECT * FROM tai_khoan WHERE Ma_tai_khoan='$mataikhoan'";
    $sql_tendaydu_query = mysqli_query($conn, $sql_tendaydu);
    $row_bai_viet = mysqli_fetch_assoc($sql_tendaydu_query);
    $tendaydu = $row_bai_viet['Ho_tai_khoan'] . " " . $row_bai_viet['Ten_tai_khoan'];
    $sql_bvtt = "SELECT * FROM bai_viet WHERE Kiem_duyet_bai_viet=1 AND Ma_bai_viet <> $mabaiviet ORDER BY luot_view DESC LIMIT 3";
    $sql_bvtt_query = mysqli_query($conn, $sql_bvtt);
    $num_row = mysqli_num_rows($sql_bvtt_query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Trang chi tiết bài viết</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="./style/style_chitietbaiviet.css">   
        <link rel="stylesheet" href="./style/style_popup.css">
        <link rel="stylesheet" href="./style/style_trangcanhan.css">   
        <link rel="shortcut icon" type="image/png" href="./image/bklogo.png"/>
    </head>
    <body>
        <header>
        <?php
            include('header.php');
        ?>
        </header>

        <section>
            <div class="container" id="containerchua">

                <div class="row" id="hinhnenchitietbaiviet">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <div class="row" id="hangtieudetomtat">

                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">

                                <div class="row bopadding" id="hangtieudebaiviet">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 bopadding text-center">
                                        <h1 class="mautuadechitiet text-center" id="tieudebaivietchitiet"><b><?php echo $tenbaiviet; ?></b></h1>
                                    </div>
                                </div>

                                <div class="row text-center" id="chinhthongtinbaiviet">

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                        <p class="mauchobaiviet" style="font-size: 19px">
                                            <b>Ngày đăng: <?php echo strval(date('d/m/Y', strtotime($ngaydang))); ?> </b>
                                        </p>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                        <p class="mauchobaiviet" style="font-size: 19px">
                                            <b>Người đăng: <?php echo $tendaydu; ?> </b>
                                        </p>
                                    </div>

                                </div>

                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 text-center" id="cotchuaanh">
                                <img src="<?php echo $anhbaiviet; ?>" alt="Không tìm thấy ảnh" id="hinhanhbaivietchitiet" style="max-width: 90%; max-height: 250px;">
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" >

                                <p id="noidungbaivietchitiet" style="font-size: 16.5px">
                                    <?php echo $thanbaiviet; ?>
                                </p>

                            </div>


                        </div>

                    </div>

                </div>
                <br>
                <br>
            </div>

            <div class="container">

                <!-- Tựa Đề -->
                <div class="row text-center">
                    <div class="col" id="tuadesachtuongtu">
                        <h1 style="display: inline" class="mautuadechitiet" id="sachtuongtu"><b> ~ BÀI VIẾT TƯƠNG TỰ ~ </b></h1>
                    </div>
                </div>
                <!-- End Tựa Đề -->
                <?php ?>

                <div class="row p-3">
                    <?php
                        while($row = mysqli_fetch_assoc($sql_bvtt_query)){
                            $hinhanh = $row['Anh_bai_viet'];
                            $tenbaiviet = $row['ten_bai_viet'];
                            $mabaiviet = $row['Ma_bai_viet'];
                            echo '
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 p-3">
                                    <div class="baiviet text-center">
                                        <a href="trangchitietbaiviet.php?mabaiviet='. $mabaiviet .'">
                                            <img src="' . $hinhanh . '" alt="Không tìm thấy ảnh" style="max-width: 400px; max-height: 210px; vertical-align: midddle;">
                                        </a>
                                        <h4 class = "text-center"><a href="trangchitietbaiviet.php?mabaiviet='. $mabaiviet .'" class="mautuadechitiet"><b>' . $tenbaiviet . '</b></a></h4>
                                    </div>
                                </div>
                            ';
                        }
                    ?>
                </div>
            </div>
        </section>

        <footer>
            <?php
                include('footer.php')
            ?>


        </footer>
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
    </body>
</html>