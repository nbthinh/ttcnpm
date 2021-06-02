<?php
    include('connect.php');
    session_start();
    $idsach = $_GET['id'];
    $tensach = $gia = $tentacgia = $theloai = $anhbia = $anhchitiet = $mota = "";
    $matacgia = $matheloai = "";

    $page = "";
    if(isset($_GET['page']))
        $page = "&page=" . $_GET['page'];


    $sql = "SELECT * FROM sach WHERE Ma_sach=" . $idsach;

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result)) {
            $tensach = $row['Ten_sach'];
            $gia = $row['Gia_sach'];
            $tentacgia = $row['Tac_gia'];
            $matheloai = $row['Ma_the_loai'];
            $mota = $row['Mo_ta'];
        }

    }

    //Lấy tên thể loại từ bảng the_loai

    $sql = "SELECT * FROM the_loai WHERE Ma_the_loai=" . $matheloai;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result)) {
            $theloai = $row['Ten_the_loai'];
        }
    }







    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Trang chỉnh sửa sách</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="./style/style_chinhsuabaiviet.css">   
        <link rel="stylesheet" href="./style/style_popup.css">   

        <link rel="shortcut icon" type="image/png" href="./image/bklogo.png"/>
    </head>
    <body>
        <div class="container" id="edit_container">
            <div class="row">
                <div class="col">
                    <h1 class="text-center tieude mt-3">CHỈNH SỬA SÁCH</h1>

                    <?php
                        $sql = "SELECT * FROM the_loai";
                        $result = mysqli_query($conn, $sql);

                    ?>

                    <form method="POST" action="ketquachinhsuasach.php?id=<?php echo $idsach; ?><?php echo $page; ?>" enctype="multipart/form-data">

                        <div class="form-group text-left">
                            <label class="label_book_in4" for="tensach">Tên sách</label>
                            <input type="text" style="display: inline;" class="form-control" id="tensach" name="tensach" value="<?php echo $tensach; ?>" required>
                            <label class="label_book_in4" for="giasach">Giá</label>
                            <input type="text" style="display: inline;" class="form-control" id="giasach" name="giasach" value="<?php echo $gia; ?>" required>
                        </div>

                        <div class="form-group text-left">
                            <label class="label_book_in4" for="tentacgia">Tên tác giả</label>
                            <input type="text" style="display: inline;" class="form-control" id="tentacgia" name="tentacgia" value="<?php echo $tentacgia; ?>" required>
                            <label class="label_book_in4" for="theloai">Thể loại</label>
                            <select class="form-control" style="display: inline;" id="theloai" name="theloai" required>
                                <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            if ($row['Ten_the_loai'] == $theloai)
                                                echo "<option selected>" . $row['Ten_the_loai'] . "</option>";
                                            else
                                                echo "<option>" . $row['Ten_the_loai'] . "</option>";
                                        }
                                    }
                                ?>

                            </select>
                        </div>

                        <div class="form-group text-left">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <label class="label_book_in4" for="anhbia_1">Ảnh bìa</label>
                                    <input type="file" style="display: inline;" id="anhbia_1" name="anhbia_1">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <label class="label_book_in4" for="anhchitiet_1">Ảnh chi tiết 1</label>
                                    <input type="file" style="display: inline;" id="anhchitiet_1" name="anhchitiet_1">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <label class="label_book_in4" for="anhchitiet_2">Ảnh chi tiết 2</label>
                                    <input type="file" style="display: inline;" id="anhchitiet_2" name="anhchitiet_2">
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-left">
                            <label class="label_book_in4" for="mota">Mô tả</label>
                            <textarea id="mota" name="mota" minlength="50" required><?php echo $mota; ?></textarea>
                        </div>

                        <div class="form-group text-left">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-sm-12 col-md-3 col-12"></div>
                                <div class="col-xl-3 col-lg-3 col-sm-12 col-md-3 col-12">
                                    <?php 
                                        if ($_SESSION['email'] == "admin@gmail.com"){
                                            echo '<button type="button" name="huy" data_dismiss="modal" class="btn btn-primary btn-block background_color_and_width bg_color_and_width nutpopup_1" onclick=\'window.location.href="trangquanlysach_admin.php?page=' . $_GET['page'] . '"\'><b>HỦY</b></button>';
                                        }
                                        else{
                                            echo '<button type="button" name="huy" data_dismiss="modal" class="btn btn-primary btn-block background_color_and_width bg_color_and_width nutpopup_1" onclick=\'window.location.href="trangcanhan.php"\'><b>HỦY</b></button>';
                                        }
                                    ?>
                                    <!-- <button type="button" name="huy" data-dismiss="modal" class="btn btn-primary btn-block background_color_and_width bg_color_and_width nutpopup_1" onclick="window.location.href='trangcanhan.php'"><b>HỦY</b></button> -->
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-12 col-md-3 col-12">
                                    <button type="submit" name="xacnhan" class="btn btn-primary btn-block background_color_and_width bg_color_and_width nutpopup_2"><b>LƯU</b></button>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-12 col-md-3 col-12"></div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </body>
</html>