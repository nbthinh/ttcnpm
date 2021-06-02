<?php
    session_start();
    include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Trang bài viết</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="./style/style_trangbaiviet.css">   
        <link rel="stylesheet" href="./style/style_popup.css">
        <link rel="shortcut icon" type="image/png" href="./image/bklogo.png"/>
    </head>
    <body>
        <header>
            <?php
            include('header.php');
            ?>
        </header>

        <section>
            <!--
                Ta sẽ truy vấn tất cả các bài viết với id của người dùng đang đăng nhập rồi cho hiển thị ra màn hình
                Ta sẽ chia ra làm 2 cột trên màn hình bằng cách: col-xl-6, col-lg-6, col-md-12, col-sm-12, col-12
                Ma_tai_khoan = mataikhoan đã được lưu vào SESSION ở phần xử lý đăng nhập
                // mysqli_fetch_assoc => Tham chiếu từng hàng truy vấn được
                // Truy vấn từng hàng CSDL để show ra trang html
            -->
            <div class="container" style="padding-left:0px">
                <?php
                    if (!isset($_GET['off'])){ $offset = 0; }
                    else{
                        // Xử lý offset bài viết
                        // Lấy off POST
                        if ($_GET['off'] <= 0){ $offset = 0; }
                        else { $offset=(int)$_GET['off']; }
                    }

                    //Tính giới hạn.
                    $sql="SELECT * FROM bai_viet WHERE Kiem_duyet_bai_viet=1";
                    $query = mysqli_query($conn, $sql);
                    $gioihan = mysqli_num_rows($query);                    

                    $sql="SELECT * FROM bai_viet WHERE Kiem_duyet_bai_viet=1 LIMIT $offset, 6;";
                    $query = mysqli_query($conn, $sql);
                    $num_row = mysqli_num_rows($query);


                    for ($row1 = mysqli_fetch_assoc($query), $row2 = mysqli_fetch_assoc($query) ;
                    $row1 != NULL ; 
                    $row1 = mysqli_fetch_assoc($query), $row2 = mysqli_fetch_assoc($query)){


                        //Lấy người đăng từ bảng tai_khoan.
                        $mataikhoan1 = $row1['Ma_tai_khoan'];

                        $sql_1 = "SELECT * FROM tai_khoan WHERE Ma_tai_khoan='$mataikhoan1'";
                        $query_1 = mysqli_query($conn, $sql_1);

                        $getin4_1 = mysqli_fetch_assoc($query_1);

                        $nguoidang1 = $getin4_1['Ho_tai_khoan'] . " " . $getin4_1['Ten_tai_khoan'];



                        // Type Code Generation here
                        $row1_ = "";
                        if (strlen($row1['Mo_ta_bai_viet']) <= 100)
                            $row1_ = $row1['Mo_ta_bai_viet'] . "...";
                        else {
                                $row1_ = substr($row1['Mo_ta_bai_viet'], 0, 100);
                                $j = 0;

                                for($i = strlen($row1_) - 1;$i > 0;$i--)
                                {
                                    if($i == strlen($row1_) - 1)
                                    {
                                        $j++;
                                        continue;
                                    }

                                    if($row1_[$i] == " ")  
                                        break;
                                    
                                    $j++;
                                }

                                $row1_ = substr($row1_, 0, - $j);
                                $row1_ = $row1_ . "...";
                            }

                        echo '<div class="row p-3">';
                        echo '
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card-100 text-center p-3">
                                    <h5 class="card-title text-center mautuadechitiet" style="width: 100%; height: 56px;"><b>'
                                    .
                                    mb_strtoupper($row1['ten_bai_viet'],"UTF-8")
                                    .
                                    '</b></h5>
                                    <div class="row">
                                        <h6 class="col-4 text-left" style="color:#f2ca52"> ' 
                                        . 'Ngày: '
                                        . strval(date('d/m/Y', strtotime($row1["Ngay_dang_bai_viet"])))
                                        .
                                    '
                                    <h6 class="col-8 text-right" style="color:#f2ca52"> Người đăng: ' .
                                    $nguoidang1
                                    . 
                                    '
                                    </div>
                                    <div class="baiviet">
                                        <a href="trangchitietbaiviet.php?inc_view=1&mabaiviet='
                                        . $row1['Ma_bai_viet']
                                        .
                                        '">
                                            <img src="'. $row1['Anh_bai_viet'] .
                                        '
                                        " alt="Ko tìm thấy ảnh" style="max-width: 400px; max-height: 210px; vertical-align: midddle;">
                                        </a>
                                    </div>
                                    <div class="card-body text-left" style="height: 140px">
                                        <p>'. $row1_ .
                                    '</p>
                                    </div>
                                    <button type="button" class="btn btn-warning nutxemthem" style="color: white" onclick="window.location.href=\'trangchitietbaiviet.php?inc_view=1&mabaiviet=' . $row1['Ma_bai_viet'] . '\'">Xem thêm</button>
                                </div>
                            </div>
                        ';
                        if ($row2 != NULL){
                            $row2_ = "";
                            if (strlen($row2['Mo_ta_bai_viet']) <= 100) 
                                $row2_ = $row2['Mo_ta_bai_viet'] . "..";
                            else {
                                $row2_ = substr($row2['Mo_ta_bai_viet'], 0, 100);
                                $j = 0;

                                for($i = strlen($row2_) - 1;$i > 0;$i--)
                                {
                                    if($i == strlen($row2_) - 1)
                                    {
                                        $j++;
                                        continue;
                                    }

                                    if($row2_[$i] == " ")  
                                        break;
                                    
                                    $j++;
                                }

                                $row2_ = substr($row2_, 0, - $j);
                                $row2_ = $row2_ . "...";

                            }

                            $mataikhoan2 = $row2['Ma_tai_khoan'];
                            $sql_2 = "SELECT * FROM tai_khoan WHERE Ma_tai_khoan='$mataikhoan2'";
                            $query_2 = mysqli_query($conn, $sql_2);
                            $getin4_2 = mysqli_fetch_assoc($query_2);
                            $nguoidang2 = $getin4_2['Ho_tai_khoan'] . " " . $getin4_2['Ten_tai_khoan'];
                            echo '
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card-100 text-center p-3">
                                    <h5 class="card-title text-center mautuadechitiet" style="width: 100%; height: 56px;"><b>'
                                    .
                                    mb_strtoupper($row2['ten_bai_viet'],"UTF-8")
                                    .
                                    '</b></h5>
                                    <div class="row">
                                        <h6 class="col-4 text-left" style="color:#f2ca52"> '
                                        . 'Ngày: ' 
                                        . strval(date('d/m/Y', strtotime($row2["Ngay_dang_bai_viet"])))
                                        .
                                    '
                                    <h6 class="col-8 text-right" style="color:#f2ca52"> Người đăng: ' .
                                    $nguoidang2
                                    . 
                                    '
                                    </div>
                                    <div class="baiviet">
                                        <a href="trangchitietbaiviet.php?inc_view=1&mabaiviet='
                                        . $row2['Ma_bai_viet']
                                        .
                                        '">
                                            <img src="'. $row2['Anh_bai_viet'] .
                                        '
                                        " alt="Ko tìm thấy ảnh" style="max-width: 400px; max-height: 210px; vertical-align: midddle;">
                                        </a>
                                    </div>
                                    <div class="card-body text-left" style="height: 140px">
                                        <p>'. $row2_ .
                                    '</p>
                                    </div>
                                    <button type="button" class="btn btn-warning nutxemthem" style="color: white" onclick="window.location.href=\'trangchitietbaiviet.php?inc_view=1&mabaiviet=' . $row2['Ma_bai_viet'] . '\'">Xem thêm</button>

                                    <!--
                                    <a href="trangchitietbaiviet.php?mabaiviet='
                                    . $row2['Ma_bai_viet']
                                    .
                                    '" class="btn btn-warning nutxemthem" role="button" style="color:white">Xem thêm</a> -->
                                </div>
                            </div>
                            ';
                        }
                        echo '</div>';
                    }

                    if ($num_row >= 6) {
                        if($offset == 0)
                        {
                            echo '
                            <div class="row">
                                <div class="col text-right marginright20">
                                    <button type="button" onclick="window.location.href=\'trangbaiviet.php?off='. strval($offset + 6) .'\'" class="btn btn1 btn-warning" style="width: 90px">Sau</button>
                                </div>  
                            </div>
                            ';
                        }
                        elseif (($offset + 6) >= $gioihan)
                        {
                            echo '
                            <div class="row">
                                <div class="col text-right marginright20">
                                    <button type="button" onclick="window.location.href=\'trangbaiviet.php?off='. strval($offset - 6) .'\'" class="btn btn1 btn-warning" style="width: 90px">Trước</button>
                                </div>  
                            </div>
                            ';    
                        }
                        else
                        {
                            echo '
                            <div class="row">
                                <div class="col text-right marginright20">
                                    <button type="button" onclick="window.location.href=\'trangbaiviet.php?off='. strval($offset - 6) .'\'" class="btn btn1 btn-warning" style="width: 90px">Trước</button>
                                    <button type="button" onclick="window.location.href=\'trangbaiviet.php?off='. strval($offset + 6) .'\'" class="btn btn1 btn-warning" style="width: 90px">Sau</button>
                                </div>  
                            </div>
                            ';
                        }
                    }
                    else {
                        echo '
                        <div class="row">
                            <div class="col text-right marginright20">
                                <button type="button" onclick="window.location.href=\'trangbaiviet.php?off='. strval($offset - 6) .'\'" class="btn btn1 btn-warning" style="width: 90px">Trước</button>
                            </div>  
                        </div>
                        ';
                    }
                ?>
                
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