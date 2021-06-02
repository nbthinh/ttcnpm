<?php

$manguoimua = $_SESSION['mataikhoan'];    

$sql = "SELECT * FROM hoa_don WHERE Ma_nguoi_mua=" . $manguoimua;
$result = mysqli_query($conn, $sql);

$iddonhang = $ngaydathang = $tensach = $hotennguoiban = $diachi = $sdt = $hinhthuc = $ghichu = $dongia = $phivanchuyen = $tongcong = "";
$manguoiban = "";
if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result)) {
        $manguoiban = $row['Ma_nguoi_ban'];
        //Lấy họ tên người bán trong bảng tai_khoan.
        $sql_1 = "SELECT * FROM tai_khoan WHERE Ma_tai_khoan=" . $manguoiban;
        $result_1 = mysqli_query($conn, $sql_1);

        $hotennguoiban = "";
        if (mysqli_num_rows($result_1) > 0)
        {
            while($row_1 = mysqli_fetch_array($result_1)) {
                $hotennguoiban = $row_1['Ho_tai_khoan'] . " " . $row_1['Ten_tai_khoan'];
            }
        }

        echo
        '
        <div class="row margin_0px khungdonhang">
            <div class="col-12">
                <div class="row donhang_title_pop_up">ID ĐƠN HÀNG: '
                . $row['Ma_hoa_don']
                .                     
                '</div>

                <div class="row" id="canhhanghoadonmua">
                    <div class="col-xl-1 col-lg-1 col-md-4 col-sm-4 col-4 font_size_12px" >
                        <div class="row cottieude">Ngày đặt hàng</div>
                        <div class="row">'
                        . strval(date('d/m/Y', strtotime($row["Ngay_dat_hang"])))
                        .
                        '</div>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-4 col-sm-4 col-4 font_size_12px" >
                        <div class="row cottieude">Tên sách</div>
                        <div class="row">'
                        . $row['Ten_sach']
                        .
                        '</div>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-4 col-sm-4 col-4 font_size_12px" >
                        <div class="row cottieude">Họ tên người bán</div>
                        <div class="row">'
                        . $hotennguoiban
                        .
                        '</div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-4 font_size_12px" >
                        <div class="row cottieude">Địa chỉ gửi</div>
                        <div class="row">'
                        . $row['Dia_chi_nhan']
                        .
                        '</div>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-4 col-sm-4 col-4 font_size_12px" >
                        <div class="row cottieude">SĐT người bán</div>
                        <div class="row">'
                        . $row['SDT_nguoi_mua']
                        .
                        '</div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-4 font_size_12px" >
                        <div class="row cottieude">Hình thức thanh toán</div>
                        <div class="row">'
                        . $row['Hinh_thuc']
                        .
                        '</div>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-4 col-sm-4 col-4 font_size_12px" >
                        <div class="row cottieude">Ghi chú</div>
                        <div class="row">'
                        . $row['Ghi_chu']
                        .
                        '</div>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-4 col-sm-4 col-4 font_size_12px" >
                        <div class="row cottieude">Đơn giá</div>
                        <div class="row">'
                        . number_format($row['Gia_sach'])
                        .
                        '</div>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-4 col-sm-4 col-4 font_size_12px" >
                        <div class="row cottieude">Phí vận chuyển</div>
                        <div class="row">'
                        . number_format($row['Phi_van_chuyen'])
                        .
                        '</div>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-4 col-sm-4 col-4 font_size_12px" >
                        <div class="row cottieude">Tổng cộng</div>
                        <div class="row">'
                        . number_format($row['Tong_cong'])
                        .
                        '</div>
                    </div>
                </div>






            </div>
        </div>
        ';
    }
}    
?>