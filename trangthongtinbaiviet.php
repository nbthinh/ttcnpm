<?php
    $mataikhoan = $_GET['matk'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Trang thêm bài viết</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
         
        <link rel="stylesheet" href="./style/style_popup.css">   
        <link rel="stylesheet" href="./style/style_chinhsuabaiviet.css">

        <link rel="shortcut icon" type="image/png" href="./image/bklogo.png"/>
    </head>
    <body>
        <div class="container" id="edit_container">
            <div class="row">
                <!-- <div class="col-1"></div> -->
                <div class="col-12">
                    <h1 class="text-center tieude mt-3">THÊM BÀI VIẾT</h1>
                    <form action="thembaiviet.php?id=<?php echo $mataikhoan; ?>" method="POST" enctype="multipart/form-data">

                        <div class="form-group text-left">
                            <label class="label_book_in4" for="tenbaiviet">Tên bài viết</label>
                            <input type="text" style="display: inline;" class="form-control" id="tenbaiviet" name="tenbaiviet" required>
                        </div>
                        <div class="form-group text-left">
                            <label class="label_book_in4" for="tensach_thembaiviet">Tên sách</label>
                            <input type="text" style="display: inline;" class="form-control" id="tensach_thembaiviet" name="tensach_thembaiviet" required>
                            <label class="label_book_in4" for="ngaydang">Ngày đăng</label>
                            <input type="date" style="display: inline;" class="form-control" id="ngaydang" name="ngaydang" required>
                            <label class="label_book_in4" for="anhbia_thembaiviet">Ảnh bìa</label>
                            <input type="file" style="display: inline;" id="anhbia_thembaiviet" name="anhbia_thembaiviet" required>
                        </div>
                        <div class="form-group text-left">
                            <label class="label_book_in4" for="mota_thembaiviet">Mô tả</label>
                            <textarea id="mota_thembaiviet" pattern="[a-zA-Z0-9~!@#$%^&*[]()_+{}|\;:<>/?]{50,100}" name="mota_thembaiviet" required></textarea>
                        </div>
                        
                        <div class="form-group text-left">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-sm-12 col-md-3 col-12"></div>
                                <div class="col-xl-3 col-lg-3 col-sm-12 col-md-3 col-12">
                                    <?php
                                        if ($mataikhoan == "1"){
                                            echo '<button type="button" name="huy" onclick="window.location.href=\'trangquantrivien.php\'" class="btn btn-primary btn-block background_color_and_width bg_color_and_width nutpopup_1"><a href="trangcanhan.php" style="color: white; text-decoration:none;"><b>HỦY</b></a></button>';
                                        }
                                        else{
                                            echo '<button type="button" name="huy" onclick="window.location.href=\'trangcanhan.php\'" class="btn btn-primary btn-block background_color_and_width bg_color_and_width nutpopup_1"><a href="trangcanhan.php" style="color: white; text-decoration:none;"><b>HỦY</b></a></button>';
                                        }
                                    ?>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-12 col-md-3 col-12">
                                    <button type="submit" name="xacnhan" class="btn btn-primary btn-block background_color_and_width bg_color_and_width nutpopup_2"><b>LƯU</b></button>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-12 col-md-3 col-12"></div>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- <div class="col-2"></div> -->
            </div>

            <!-- <div class="row">
                <?php echo $ketquatrave; ?>
            </div> -->
        </div>
    </body>
</html>
