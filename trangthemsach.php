<?php
    include('connect.php');

    $theloai = "";

    $idtaikhoan = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Trang thêm sách</title>
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
                    <h1 class="text-center tieude mt-3">THÊM SÁCH</h1>

                    <?php
                        $sql = "SELECT * FROM the_loai";
                        $result = mysqli_query($conn, $sql);
                    ?>

                    <form method="POST" action="themsach.php?id= <?php echo $idtaikhoan; ?>" enctype="multipart/form-data">

                        <div class="form-group text-left">
                            <label class="label_book_in4" for="tensach">Tên sách</label>
                            <input type="text" style="display: inline;" class="form-control" id="tensach" name="tensach" required>
                            <label class="label_book_in4" for="giasach">Giá</label>
                            <input type="text" style="display: inline;" class="form-control" id="giasach" name="giasach" required>
                        </div>

                        <div class="form-group text-left">
                            <label class="label_book_in4" for="tentacgia">Tên tác giả</label>
                            <input type="text" style="display: inline;" class="form-control" id="tentacgia" name="tentacgia" required>
                            <label class="label_book_in4" for="theloai">Thể loại</label>
                            <select class="form-control" style="display: inline;" id="theloai" name="theloai" required>
                                <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
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
                                    <input type="file" style="display: inline;" id="anhbia_1" name="anhbia_1" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <label class="label_book_in4" for="anhchitiet_1">Ảnh chi tiết 1</label>
                                    <input type="file" style="display: inline;" id="anhchitiet_1" name="anhchitiet_1" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <label class="label_book_in4" for="anhchitiet_2">Ảnh chi tiết 2</label>
                                    <input type="file" style="display: inline;" id="anhchitiet_2" name="anhchitiet_2" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-left">
                            <label class="label_book_in4" for="mota">Mô tả</label>
                            <textarea id="mota" name="mota" minlength="50" required></textarea>
                        </div>

                        <div class="form-group text-left">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-sm-12 col-md-3 col-12"></div>
                                <div class="col-xl-3 col-lg-3 col-sm-12 col-md-3 col-12">
                                    <?php
                                        if ($idtaikhoan == 1){
                                            echo '<button type="button" name="huy" data-dismiss="modal" class="btn btn-primary btn-block background_color_and_width bg_color_and_width nutpopup_1" onclick="window.location.href=\'trangquantrivien.php\'"><b>HỦY</b></button>';
                                        }
                                        else{
                                            echo '<button type="button" name="huy" data-dismiss="modal" class="btn btn-primary btn-block background_color_and_width bg_color_and_width nutpopup_1" onclick="window.location.href=\'trangcanhan.php\'"><b>HỦY</b></button>';
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