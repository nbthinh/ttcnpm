<?php
    // Process here
    session_start();
    $state = $_GET['state'];
    include("connect.php");
    if ($state == "delete_book"){
        $id_ch = $_GET['id'];
        $page = $_GET['page'];
        $id_resolution = explode('_', $id_ch);
        for ($i = 0 ; $i < sizeof($id_resolution); $i++){
            $ma_sach = $id_resolution[$i];
            $sql = "DELETE FROM sach WHERE Ma_sach='$ma_sach'";
            $sql_query = mysqli_query($conn, $sql);
        }
        mysqli_close($conn);

        $link = "Location: trangquanlysach_admin.php?page=" . $page;
        header($link);
    }
    else if ($state == "delete_user"){
        $id_ch = $_GET['id'];
        $id_resolution = explode('_', $id_ch);
        for ($i = 0 ; $i < sizeof($id_resolution); $i++){
            $ma_user = $id_resolution[$i];
            $sql = "DELETE FROM tai_khoan WHERE Ma_tai_khoan='$ma_user'";
            $sql_query = mysqli_query($conn, $sql);
        }
        mysqli_close($conn);



        echo '
            <br/><br/>
            <h2>Đã xóa những người dùng đã chọn, click vào <a href="trangquantrivien.php">Link sau đây</a> để trở lại trang QTV</h2>
        ';        
    }
    else if ($state == "delete_story"){
        $id_ch = $_GET['id'];
        $page = $_GET['page'];
        $id_resolution = explode('_', $id_ch);
        for ($i = 0 ; $i < sizeof($id_resolution); $i++){
            $ma_bai_viet = $id_resolution[$i];
            $sql = "DELETE FROM bai_viet WHERE Ma_bai_viet='$ma_bai_viet'";
            $sql_query = mysqli_query($conn, $sql);
        }
        mysqli_close($conn);

        $link = "Location: trangquanlybaiviet_admin.php?page=" . $page;
        header($link);
    }
    else if ($state == "modify_book"){
        $ma_sach = $_GET['id'];
        $page = $_GET['page'];

        $sql = 'UPDATE sach SET Duyet_sach=0 WHERE Ma_sach=' . $ma_sach;
        $sql_query = mysqli_query($conn, $sql);

        $link = "Location: trangchinhsuasach.php?id=" . $ma_sach . "&page=" . $page;
        header($link);
    }
    else if ($state == "modify_user"){
        $ma_tai_khoan = $_GET['id'];
        $link = "Location: chinhsuathongtinnguoidung.php?id=$ma_tai_khoan";
        header($link);
    }
    else if ($state == "modify_story"){
        $ma_bai_viet = $_GET['id'];
        $page = $_GET['page'];

        $sql = 'UPDATE bai_viet SET Kiem_duyet_bai_viet=0 WHERE Ma_bai_viet=' . $ma_bai_viet;
        $sql_query = mysqli_query($conn, $sql);

        $link = "Location: chinhsuabaiviet.php?id=" . $ma_bai_viet . "&page=" . $page;
        header($link);
    }
    else if ($state == "modify_order"){
        $ma_don_hang = $_GET['id'];
        $link = "Location: chinhsuadonhang.php?id=$ma_bai_viet";
        header($link);
    }
    else if ($state == "confirm_story"){
        $id_ch = $_GET['id'];
        $page = $_GET['page'];
        $id_resolution = explode('_', $id_ch);
        for ($i = 0 ; $i < sizeof($id_resolution); $i++){
            $ma_bai_viet = $id_resolution[$i];
            $sql = "SELECT * FROM bai_viet WHERE Ma_bai_viet='$ma_bai_viet'";
            $sql_query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($sql_query);
            if($row['Kiem_duyet_bai_viet'] == 0){
                $sql_confirm = "UPDATE bai_viet SET Kiem_duyet_bai_viet='1' WHERE Ma_bai_viet='$ma_bai_viet'";
                $sql_confirm_query = mysqli_query($conn, $sql_confirm);
            }
        }

        mysqli_close($conn);
        $link = "Location: trangquanlybaiviet_admin.php?page=" . $page;
        header($link);
    }
    else if ($state == "confirm_book"){
        $id_ch = $_GET['id'];
        $page = $_GET['page'];
        $id_resolution = explode('_', $id_ch);
        for ($i = 0 ; $i < sizeof($id_resolution); $i++){
            $ma_sach = $id_resolution[$i];
            $sql = "SELECT * FROM sach WHERE Ma_sach='$ma_sach'";
            $sql_query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($sql_query);
            if($row['Duyet_sach'] == 0){
                $sql_confirm = "UPDATE sach SET Duyet_sach='1' WHERE Ma_sach='$ma_sach'";
                $sql_confirm_query = mysqli_query($conn, $sql_confirm);
            }
        }

        mysqli_close($conn);
        $link = "Location: trangquanlysach_admin.php?page=" . $page;
        header($link);

    }
?>