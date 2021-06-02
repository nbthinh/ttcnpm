<?php
    $idnguoimua = $_SESSION['mataikhoan'];

    //Lấy thông tin người mua từ bảng tai_khoan.
    $sql = "SELECT * FROM tai_khoan WHERE Ma_tai_khoan=" . $idnguoimua;
    $result = mysqli_query($conn, $sql);

    $hoten_nguoimua = $sdt_nguoimua = $sonha_nguoimua = $duong_nguoimua = $quanhuyen_nguoimua = $thanhpho_nguoimua = "";
    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result)) {
            $hoten_nguoimua = $row['Ho_tai_khoan'] . " " . $row['Ten_tai_khoan'];
            $sdt_nguoimua = $row['SDT_tai_khoan'];
            $sonha_nguoimua = $row['So_nha'];
            $duong_nguoimua = $row['Duong'];
            $quanhuyen_nguoimua = $row['Quan_Huyen'];
            $thanhpho_nguoimua = $row['Thanh_pho'];
        }
    }

    $idsach = $_GET['id'];

    //Lấy thông tin người bán từ bảng tai_khoan và thông tin sách từ bảng sach.
    $sql = "SELECT * FROM sach WHERE Ma_sach=" . $idsach;
    $result = mysqli_query($conn, $sql);

    $idnguoiban = $tensach = $giasach = "";

    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result)) {
            $idnguoiban = $row['Ma_nguoi_dang'];
            $tensach = $row['Ten_sach'];
            $giasach = $row['Gia_sach'];
        }
    }

    $sql = "SELECT * FROM tai_khoan WHERE Ma_tai_khoan=" . $idnguoiban;
    $result = mysqli_query($conn, $sql);


    $hoten_nguoiban = $sdt_nguoiban = $sonha_nguoiban = $duong_nguoiban = $quanhuyen_nguoiban = $thanhpho_nguoiban = "";
    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result)) {
            $hoten_nguoiban = $row['Ho_tai_khoan'] . " " . $row['Ten_tai_khoan'];
            $sdt_nguoiban = $row['SDT_tai_khoan'];
            $sonha_nguoiban = $row['So_nha'];
            $duong_nguoiban = $row['Duong'];
            $quanhuyen_nguoiban = $row['Quan_Huyen'];
            $thanhpho_nguoiban = $row['Thanh_pho'];
        }
    }

    //Lấy ngày đặt hàng mặc định.
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ngaydathang = date("Y-m-d");

    //Tạo id đơn hàng.
    $sql = "SELECT * FROM hoa_don ORDER BY Ma_hoa_don DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $idhoadon = "";
    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result)) {
            $idhoadon = $row['Ma_hoa_don'] + 1;
        }
    }
    else
        $idhoadon = 1;

?>