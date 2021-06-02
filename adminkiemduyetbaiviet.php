<?php
    include('connect.php');
    session_start();
    $idbaiviet = $_GET['id'];
    $tenbaiviet = $tensach = $ngaydang = $anhbia = $mota = $ketquatrave = "";


    if(isset($_POST['xacnhan']))
    {
        $tenbaiviet = $_POST['tenbaiviet'];
        $tensach = $_POST['tensach_thembaiviet'];
        $ngaydang = $_POST['ngaydang'];
        $mota = $_POST['mota_thembaiviet'];
        echo $_FILES['anhbia_thembaiviet']['name'];
        if ( isset($_FILES['anhbia_thembaiviet']['tmp_name']))
        {
            echo "Da toi day";
            $anhbia = $_FILES['anhbia_thembaiviet']['tmp_name'];
            $noichua = './image/'.$_FILES['anhbia_thembaiviet']['name'];
    
            move_uploaded_file($anhbia, $noichua);  
            
            $sql = "UPDATE bai_viet SET Anh_bai_viet='" . $noichua . "' WHERE Ma_bai_viet=" . $idbaiviet;

            $result = mysqli_query($conn, $sql);
    
            if ($result) 
            {
                $ketquatrave = 'Bạn đã sửa bài viết thành công';
            }
            else
            {
                $ketquatrave = 'Bạn đã sửa bài viết thất bại';
            }
    
        }



        $sql = "UPDATE bai_viet SET ten_sach='" . $tensach . "',ten_bai_viet='" . $tenbaiviet . "',Ngay_dang_bai_viet='" . $ngaydang . "',Mo_ta_bai_viet='" . $mota . "' WHERE Ma_bai_viet=" . $idbaiviet;

        $result = mysqli_query($conn, $sql);

        if ($result) 
        {
            $ketquatrave = 'Bạn đã sửa bài viết thành công';
        }
        else
        {
            $ketquatrave = 'Bạn đã sửa bài viết thất bại';
        }



    }
    else
    {
        $sql = "SELECT * FROM bai_viet WHERE Ma_bai_viet=" . $idbaiviet;

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result)) {
                $tenbaiviet = $row['ten_bai_viet'];
                $tensach = $row['ten_sach'];
                $ngaydang = $row['Ngay_dang_bai_viet'];
                $mota = $row['Mo_ta_bai_viet'];
                $kiemduyet = $row['Kiem_duyet_bai_viet'];
            }

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Trang chỉnh sửa bài viết</title>
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
                    <h1 class="text-center tieude mt-3">XEM MÔ TẢ BÀI VIẾT</h1>
                    <form action="process.php?state=confirm_story&id=<?php echo $idbaiviet; ?>" method="POST" enctype="multipart/form-data">

                        <div class="form-group text-left">
                            <label class="label_book_in4" for="tenbaiviet">Tên bài viết</label>
                            <input type="text" style="display: inline;" class="form-control" id="tenbaiviet" name="tenbaiviet" value="<?php echo $tenbaiviet; ?>">
                        </div>
                        <div class="form-group text-left">
                            <label class="label_book_in4" for="tensach_thembaiviet">Tên sách</label>
                            <input type="text" style="display: inline;" class="form-control" id="tensach_thembaiviet" name="tensach_thembaiviet" value="<?php echo $tensach; ?>">
                            <label class="label_book_in4" for="ngaydang">Ngày đăng</label>
                            <input type="date" style="display: inline;" class="form-control" id="ngaydang" name="ngaydang" value="<?php echo $ngaydang; ?>">
                            <label class="label_book_in4" for="anhbia_thembaiviet">Ảnh bìa</label>
                            <input type="file" style="display: inline;" id="anhbia_thembaiviet" name="anhbia_thembaiviet">
                        </div>
                        <div class="form-group text-left">
                            <label class="label_book_in4" for="mota_thembaiviet">Mô tả</label>
                            <textarea id="mota_thembaiviet" name="mota_thembaiviet"><?php echo $mota; ?></textarea>
                        </div>
                        <div class="form-group text-left">
                            <label class="label_book_in4" for="tenbaiviet">
                                <b>Trạng thái bài viết:</b>
                                <?php
                                    if ($kiemduyet == 0){
                                        echo "Chưa được kiểm duyệt";
                                    }
                                    else{
                                        echo "Đã được kiểm duyệt";
                                    }
                                ?>
                            </label>
                        </div>
                        
                        <div class="form-group text-left">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-sm-12 col-md-3 col-12"></div>
                                <div class="col-xl-3 col-lg-3 col-sm-12 col-md-3 col-12">
                                    <?php
                                        if ($_SESSION['email'] == "admin@gmail.com"){
                                            echo '<button type="button" name="huy" onclick="window.location.href=\'trangquantrivien.php\'" class="btn btn-primary btn-block background_color_and_width bg_color_and_width nutpopup_1"><a href="trangquantrivien.php" style="color: white; text-decoration:none;"><b>TRỞ VỀ</b></a></button>';
                                        }
                                        else{
                                            echo '<button type="button" name="huy" onclick="window.location.href=\'trangcanhan.php\'" class="btn btn-primary btn-block background_color_and_width bg_color_and_width nutpopup_1"><a href="trangcanhan.php" style="color: white; text-decoration:none;"><b>TRỞ VỀ</b></a></button>';
                                        }
                                    ?>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-12 col-md-3 col-12">
                                    <button type="submit" name="xacnhan" class="btn btn-primary btn-block background_color_and_width bg_color_and_width nutpopup_2"><b>DUYỆT BÀI VIẾT</b></button>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-12 col-md-3 col-12"></div>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- <div class="col-2"></div> -->
            </div>

        </div>
    </body>
</html>
