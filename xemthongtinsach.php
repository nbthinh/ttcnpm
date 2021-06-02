<?php
include('connect.php');

session_start();

$idsach = $_GET['id'];

//Kiểm tra có tài khoản đăng nhập chưa và có phải sách của chủ tài khoản không.
$kiemtradangnhap = $kiemtrasach = 0;
if(isset($_SESSION['mataikhoan']))
{
    $kiemtradangnhap = 1;

    $sql_1 = "SELECT * FROM sach WHERE Ma_sach=" . $idsach;
    $result_1 = mysqli_query($conn, $sql_1);

    if (mysqli_num_rows($result_1) > 0) {
        while($row_1 = mysqli_fetch_assoc($result_1)) {
            if($row_1['Ma_nguoi_dang'] == $_SESSION['mataikhoan'])            
                $kiemtrasach = 1;            
        }
    }


}




//Gán giá trị cho các biến show ở pop-up.


$sql = "SELECT * FROM sach WHERE Ma_sach=" . $idsach;
$result = mysqli_query($conn, $sql);

$tensach = $tentacgia = $theloai = $nguoidang = $giasach = $mota = $anhbia = $anhchitiet_1 = $anhchitiet_2 = "";
$matheloai = $manguoidang = "";

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
        $tensach = $row['Ten_sach'];
        $tentacgia = $row['Tac_gia'];
        $matheloai = $row['Ma_the_loai'];
        $manguoidang = $row['Ma_nguoi_dang'];
        $giasach = $row['Gia_sach'];
        $anhbia = $row['Anh_bia'];
        $anhchitiet_1 = $row['Anh_chi_tiet_1'];
        $anhchitiet_2 = $row['Anh_chi_tiet_2'];
        $mota = $row['Mo_ta'];

    }
}

//Lấy thể loại từ bảng the_loai.
$sql = "SELECT * FROM the_loai WHERE Ma_the_loai=" . $matheloai;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $theloai = $row['Ten_the_loai'];
    }
}

//Lấy tên người đăng từ bảng tai_khoan.
$sql = "SELECT * FROM tai_khoan WHERE Ma_tai_khoan=" . $manguoidang;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $nguoidang = $row['Ho_tai_khoan'] . " " . $row['Ten_tai_khoan'];
    }
}

//Kiểm tra bài viết đã được kiểm duyệt chưa.
$sql = "SELECT * FROM sach WHERE Ma_sach=" . $idsach;
$result = mysqli_query($conn, $sql);

$trangthaisach = 0;

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $trangthaisach = $row['Trang_thai_sach'];
    }
}








?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Trang xem thông tin sách</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="./style/style_chitietsach.css">   
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
            <div class="container padding" id="containerchua">

                <div class="row" id="khungchuagiua">

                    <!-- Begin Slider -->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12" id="khungchuaslide">

                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img class="d-block" src="<?php echo $anhbia; ?>" alt="First slide" height="360px" width="100%">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block" src="<?php echo $anhchitiet_1; ?>" alt="Second slide" height="360px" width="100%">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block" src="<?php echo $anhchitiet_2; ?>" alt="Third slide" height="360px" width="100%">
                              </div>
                            </div>
                            <div class="carousel-indicators">
                                <div data-target="#carouselExampleIndicators" data-slide-to="0" class="active" style="width: 33%;">
                                    <img class="d-block" src="<?php echo $anhbia; ?>" alt="First slide" height="100px" width="100%" style="margin: 0px; float: left;">
                                </div>

                                <div data-target="#carouselExampleIndicators" data-slide-to="1" style="width: 33%;">
                                    <img class="d-block" src="<?php echo $anhchitiet_1; ?>" alt="First slide" height="100px" width="100%" style="margin: 0px; float: left;">
                                </div>

                                <div data-target="#carouselExampleIndicators" data-slide-to="2" style="width: 33%;">
                                    <img class="d-block" src="<?php echo $anhchitiet_2; ?>" alt="First slide" height="100px" width="100%" style="margin: 0px; float: left;">
                                </div>

                                <div style="clear: both;"></div>            
                            </div>

                          </div>
                                
                    </div>
                    <!-- End Slider -->

                    <!-- Begin Nội Dung Sách -->
                    <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">

                        <div class="row" id="tuadesach">
                            <img src="./image/codanhdau.png" alt="Không tìm thấy ảnh" id="danhdau">
                            <p class="mautuade" id="tensachdacbiet" style="width: 90%; font-size: 51px;"><b><?php echo $tensach; ?></b></p>
                        </div>

                        <div class="row" id="hangnoidung1">

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-center">
                                <h4 class="mautacgia canhgiua cochudidong">
                                    Tác giả: <?php echo $tentacgia; ?>
                                </h4>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-center">
                                <h4 class="mautheloai canhgiua cochudidong" id="theloaisach">
                                    Thể loại: <?php echo $theloai; ?>
                                </h4>
                            </div>

                        </div>

                        <div class="row" id="hangnoidung2">

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-center">
                                <h5 class="canhgiua cochudidong" id="nguoidang">
                                    Người đăng: <?php echo $nguoidang; ?>
                                </h5>
                            </div>
                
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-center">
                            </div>
                                        
                        </div>

                        <div class="row text-center" id="hangnoidung3" >

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <p class="maugia" id="cochugia"><b><?php echo number_format($giasach);  ?>đ</b></p>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <button type="button" class="btn btn-danger maunutchonmua canhgiua" id="chonmua">CHỌN MUA</button>
                            </div>

                            <!-- pop-up đặt mua -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog" id="khungchuapopup_sach">
                              
                                  <div class="modal-content" id="popupdonhang_sach">
                                    <div class="modal-header">
                                      <h4 class="modal-title">THÔNG TIN ĐƠN HÀNG</h4>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                            include('xulydonhang.php');
                                        ?>
                                        <form action="ketquadonhang.php" method="POST" id="formhoadon">
                                            <div class="form-group text-left">
                                                <label class="kichcochuID" for="idnguoiban"><b>ID người bán</b></label>
                                                <input type="text" style="display: inline;" class="form-control" name="idnguoiban" id="idnguoiban" value="<?php echo $idnguoiban; ?>" readonly="readonly">
                                            </div>

                                            <div class="form-group text-left">
                                                <input type="text" style="display: inline;" class="form-control" name="tennguoiban" id="tennguoiban" placeholder="Họ Tên" value="<?php echo $hoten_nguoiban; ?>" readonly="readonly">
                                                <input type="text" style="display: inline;" class="form-control" name="nhanguoiban" id="nhanguoiban" placeholder="Số Nhà" value="<?php echo $sonha_nguoiban; ?>" readonly="readonly">
                                                <input type="text" style="display: inline;" class="form-control" name="duongnguoiban" id="duongnguoiban" placeholder="Đường" value="<?php echo $duong_nguoiban; ?>" readonly="readonly">
                                            </div>

                                            <div class="form-group text-left">
                                                <input type="text" style="display: inline;" class="form-control" name="sdtnguoiban" id="sdtnguoiban" placeholder="Số điện thoại" value="<?php echo $sdt_nguoiban; ?>" readonly="readonly">
                                                <input type="text" style="display: inline;" class="form-control" name="xanguoiban" id="xanguoiban" placeholder="Quận/Huyện" value="<?php echo $quanhuyen_nguoiban; ?>" readonly="readonly">
                                                <select style="display: inline;" class="form-control" name="tinhnguoiban" id="tinhnguoiban" disabled>
                                                    <option><?php echo $thanhpho_nguoiban; ?></option>
                                                    <?php
                                                        $sql = "SELECT * FROM tinhthanhpho WHERE ten_tp <> '" . $thanhpho_nguoiban . "'";
                                                        $result = mysqli_query($conn, $sql);

                                                        if (mysqli_num_rows($result) > 0)
                                                        {
                                                            while($row = mysqli_fetch_array($result)) {
                                                                echo
                                                                '
                                                                <option>'
                                                                . $row['ten_tp']
                                                                .
                                                                '</option>
                                                                ';
                                                            }
                                                        }
                                                    
                                                    ?>
                                                </select>
                                            </div>
    
                                            <div class="form-group text-left">
                                                <label class="kichcochuID" for="idnguoimua"><b>ID người mua</b></label>
                                                <input type="text" style="display: inline;" class="form-control" name="idnguoimua" id="idnguoimua" value="<?php echo $idnguoimua; ?>" readonly="readonly">
                                            </div>

                                            <div class="form-group text-left">
                                                <input type="text" style="display: inline;" class="form-control" name="tennguoimua" id="tennguoimua" placeholder="Họ Tên" value="<?php echo $hoten_nguoimua; ?>" readonly="readonly">
                                                <input type="text" style="display: inline;" class="form-control" name="nhanguoimua" id="nhanguoimua" placeholder="Số Nhà" value="<?php echo $sonha_nguoimua; ?>" readonly="readonly">
                                                <input type="text" style="display: inline;" class="form-control" name="duongnguoimua" id="duongnguoimua" placeholder="Đường" value="<?php echo $duong_nguoimua; ?>" readonly="readonly">
                                            </div>

                                            <div class="form-group text-left">
                                                <input type="text" style="display: inline;" class="form-control" name="sdtnguoimua" id="sdtnguoimua" placeholder="Số điện thoại" value="<?php echo $sdt_nguoimua; ?>" readonly="readonly">
                                                <input type="text" style="display: inline;" class="form-control" name="xanguoimua" id="xanguoimua" placeholder="Quận/Huyện" value="<?php echo $quanhuyen_nguoimua; ?>" readonly="readonly">
                                                <select style="display: inline;" class="form-control" name="tinhnguoimua" id="tinhnguoimua" disabled>
                                                    <option><?php echo $thanhpho_nguoimua; ?></option>
                                                    <?php
                                                        $sql = "SELECT * FROM tinhthanhpho WHERE ten_tp <> '" . $thanhpho_nguoimua . "'";
                                                        $result = mysqli_query($conn, $sql);

                                                        if (mysqli_num_rows($result) > 0)
                                                        {
                                                            while($row = mysqli_fetch_array($result)) {
                                                                echo
                                                                '
                                                                <option>'
                                                                . $row['ten_tp']
                                                                .
                                                                '</option>
                                                                ';
                                                            }
                                                        }
                                                    
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group text-left">
                                                <label class="kichcochuID" for="iddonhang"><b>ID đơn hàng</b></label>
                                                <input type="text" style="display: inline;" class="form-control" name="iddonhang" id="iddonhang" value="<?php echo $idhoadon; ?>" readonly="readonly">
                                            </div>

                                            <div class="form-group text-left">
                                                <label for="thanhtoan">Hình thức thanh toán</label>
                                                <select class="form-control" name="thanhtoan" id="thanhtoan" style="display: inline;" disabled>
                                                    <option selected="selected">Thanh toán bằng tiền mặt khi nhận hàng</option>
                                                </select>
                                                <label id="labelidsach" for="idsach">ID Sách</label>
                                                <input type="text" style="display: inline;" class="form-control" name="idsach" id="idsach" value="<?php echo $idsach; ?>" readonly="readonly">
                                            </div>

                                            <div class="form-group text-left">
                                                <label id="labelngaydathang" for="ngaydathang">Ngày đặt hàng</label>
                                                <input type="date" style="display: inline;" class="form-control" name="ngaydathang" id="ngaydathang" value="<?php echo $ngaydathang; ?>" readonly="readonly">
                                                <label id="labeltensach" for="tensach_1">Tên sách</label>
                                                <input type="text" style="display: inline;" class="form-control" name="tensach" id="tensach_1" value="<?php echo $tensach; ?>" readonly="readonly">
                                            </div>

                                            <div class="row chinhhangpopup" id="hangcuoicung">

                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" id="cotghichu">

                                                    <div class="form-group text-left">
                                                        <label for="ghichu">Ghi chú</label><br>
                                                        <textarea cols="40" rows="5" class="form-control" name="ghichu" id="ghichu" readonly="readonly"></textarea>
                                                    </div>

                                                </div>

                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" id="cotchuadongia">

                                                    <div class="form-group text-left">
                                                        <label class="labeldongia" for="dongia">Đơn giá</label>
                                                        <input type="text" name="dongia" id="dongia" style="display: inline;" class="form-control" value="<?php echo $giasach; ?>" readonly="readonly">
                                                        đồng
                                                    </div>

                                                    <div class="form-group text-left">
                                                        <label class="labeldongia" for="phivanchuyen">Phí vận chuyển</label>
                                                        <input type="text" name="phivanchuyen" id="phivanchuyen" style="display: inline;" class="form-control"  readonly="readonly">
                                                        đồng    
                                                    </div>

                                                    <div class="form-group text-left">
                                                        <label class="labeldongia" for="tongcong">Tổng Cộng</label>
                                                        <input type="text" name="tongcong" id="tongcong" style="display: inline;" class="form-control" readonly="readonly">
                                                        đồng        
                                                    </div>

                                                </div>

                                            </div>
    
                                            <div class="row">

                                                <div class="col">

                                                    <div class="form-group text-left">

                                                        <button type="button" name="chinhsua" class="btn" id="nutchinhsua"><img id="anhnutchinhsua" src="./image/edit.png" alt="Không tìm thấy ảnh"></button>
                                                        <button type="button" name="huy" id="nutpopup_1" data-dismiss="modal" class="btn btn-primary" ><b>HỦY</b></button>
                                                        <button type="button" name="xacnhan" id="nutpopup_2" class="btn btn-primary"><b>XÁC NHẬN</b></button>
                                                                
                                                    </div>
                
                                                </div>

                                            </div>
                                        </form>

                                    </div>
                                  </div>
                              
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <p class="mautuade1 canhgiua"><b>MÔ TẢ</b></p>
                                <p class="canhgiua" id="noidungmotasach">
                                    <?php
                                        echo $mota;
                                    ?>
                                </p>
                            </div>
                        </div>
                            
                    </div>
                    <!-- End Nội Dung Sách -->

                </div>
                <br>
                <br>
                <!-- Tựa Đề -->
                <div class="row text-center">

                    <div class="col" id="tuadesachtuongtu">
                        <h1 style="display: inline" class="mautuadechitiet" id="sachtuongtu"><b> ~ SÁCH TƯƠNG TỰ ~ </b></h1>
                    </div>

                </div>
                <!-- End Tựa Đề -->

                <div class="row p-3" id="hangsach">

                    <?php 
                        include('showsachtuongtu.php');
                    ?>
            
                </div>
            </div>
        </section>

        <footer>

            <?php
                include('footer.php')
            ?>

        </footer>

        <script type="text/javascript">
            $(document).ready(function(){
                var array_tp = {
                    "Thành phố Hà Nội":[21.027705, 105.834475],
                    "Tỉnh Hà Giang": [22.797441, 104.968666],
                    "Tỉnh Cao Bằng": [22.654672, 106.296789],
                    "Tỉnh Bắc Kạn": [22.140958, 105.849540],
                    "Tỉnh Tuyên Quang": [21.794875, 105.224676],
                    "Tỉnh Lào Cai": [22.480312, 103.986488],
                    "Tỉnh Điện Biên": [21.389303, 102.991081],
                    "Tỉnh Lai Châu": [22.382984, 103.487974],
                    "Tỉnh Sơn La": [21.331218, 103.934545],
                    "Tỉnh Yên Bái": [21.717208, 104.892500],
                    "Tỉnh Hoà Bình": [20.823004, 105.335580],
                    "Tỉnh Thái Nguyên": [21.584241, 105.830991],
                    "Tỉnh Lạng Sơn": [21.850225, 106.773164],
                    "Tỉnh Quảng Ninh": [20.971165, 107.004035],
                    "Tỉnh Bắc Giang": [21.279389, 106.206865],
                    "Tỉnh Phú Thọ": [21.350524, 105.352489],
                    "Tỉnh Vĩnh Phúc": [21.305923, 105.605577],
                    "Tỉnh Bắc Ninh": [21.178706, 106.074826],
                    "Tỉnh Hải Dương": [20.931433, 106.299101],
                    "Thành phố Hải Phòng": [20.846834, 106.680380],
                    "Tỉnh Hưng Yên": [20.655951, 106.062790],
                    "Tỉnh Thái Bình": [20.446580, 106.355735],
                    "Tỉnh Hà Nam": [20.533726, 105.914386],
                    "Tỉnh Nam Định": [20.438575, 106.164546],
                    "Tỉnh Ninh Bình": [20.248563, 105.967980],
                    "Tỉnh Thanh Hóa": [19.787611, 105.804387],
                    "Tỉnh Nghệ An": [18.667981, 105.675948],
                    "Tỉnh Hà Tĩnh": [18.355795, 105.902869],
                    "Tỉnh Quảng Bình": [17.460685, 106.577155],
                    "Tỉnh Quảng Trị": [16.810948, 107.059771],
                    "Tỉnh Thừa Thiên Huế": [16.462042, 107.582049],
                    "Thành phố Đà Nẵng": [16.054917, 108.203617],
                    "Tỉnh Quảng Nam": [15.569533, 108.481120],
                    "Tỉnh Quảng Ngãi": [15.109361, 108.812013],
                    "Tỉnh Bình Định": [13.784042, 109.245372],
                    "Tỉnh Phú Yên": [13.102972, 109.286249],
                    "Tỉnh Khánh Hòa": [12.242148, 109.184465],
                    "Tỉnh Ninh Thuận": [11.578990, 108.975742],
                    "Tỉnh Bình Thuận": [10.991430, 108.303357],
                    "Tỉnh Kon Tum": [14.348079, 108.013170],
                    "Tỉnh Gia Lai": [13.966595, 108.065516],
                    "Tỉnh Đắk Lắk": [12.658552, 108.017018],
                    "Tỉnh Đắk Nông": [11.999618, 107.715114],
                    "Tỉnh Lâm Đồng": [11.573523, 107.827166],
                    "Tỉnh Bình Phước": [11.534288, 106.929670],
                    "Tỉnh Tây Ninh": [11.335836, 106.133466],
                    "Tỉnh Bình Dương": [10.981138, 106.654936],
                    "Tỉnh Đồng Nai": [10.962211, 106.919703],
                    "Tỉnh Bà Rịa - Vũng Tàu": [10.471966, 107.183850],
                    "Thành phố Hồ Chí Minh":[10.819372, 106.607349],
                    "Tỉnh Long An": [10.532841, 106.406763],
                    "Tỉnh Tiền Giang": [10.381155, 106.364129],
                    "Tỉnh Bến Tre": [10.242042, 106.385804],
                    "Tỉnh Trà Vinh": [9.949804, 106.348605],
                    "Tỉnh Vĩnh Long": [10.243086, 105.954649],
                    "Tỉnh Đồng Tháp": [10.454509, 105.664700],
                    "Tỉnh An Giang": [10.362198, 105.423912],
                    "Tỉnh Kiên Giang": [10.011212, 105.151630],
                    "Thành phố Cần Thơ": [10.045003, 105.745898],
                    "Tỉnh Hậu Giang": [9.774329, 105.449357],
                    "Tỉnh Sóc Trăng": [9.599861, 105.992268],
                    "Tỉnh Bạc Liêu": [9.290406, 105.703937],
                    "Tỉnh Cà Mau": [9.152073, 105.194342]
                    };
                if($('#nhanguoimua').val() == '' && $('#duongnguoimua').val() == '' && $('#xanguoimua').val() == '' && $('#tinhnguoimua').val() == '')                
                    $('#nutpopup_2').attr("disabled", true);

                $('#nhanguoimua').change(function(){
                    $('#duongnguoimua').change(function(){
                        $('#xanguoimua').change(function(){
                            $('#tinhnguoimua').change(function(){
                                $('#nutpopup_2').attr("disabled", false);                        
                            });                                                    
                        });
                    });                    
                });
                

                var vido_ban = 0, kinhdo_ban = 0, vido_mua = 0, kinhdo_mua = 0, khoangcach = 0, chiphi = 0, tongcong = 0;

                <?php
                    $idsach = $_GET['id'];

                    //Lấy thông tin người bán từ bảng tai_khoan và thông tin sách từ bảng sach.
                    $sql = "SELECT * FROM sach WHERE Ma_sach=" . $idsach;
                    $result = mysqli_query($conn, $sql);
                
                    $giasach = "";
                
                    if (mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_array($result)) {
                            $giasach = $row['Gia_sach'];
                        }
                    }
                
                ?>

                var giathanh = <?php echo $giasach ?>;

                var thanhpho_nguoiban = $('#tinhnguoiban').val();

                for(var key in array_tp)
                {
                    if(key === thanhpho_nguoiban)
                    {
                        vido_ban = array_tp[key][0];
                        kinhdo_ban = array_tp[key][0];
                    }
                }

                var thanhpho_nguoimua = $('#tinhnguoimua').val();

                for(var key in array_tp)
                {
                    if(key === thanhpho_nguoimua)
                    {
                        vido_mua = array_tp[key][0];
                        kinhdo_mua = array_tp[key][0];
                    }
                }

                khoangcach = distance(vido_ban,kinhdo_ban,vido_mua,kinhdo_mua);
                chiphi = khoangcach*50;
                tongcong = giathanh + chiphi;
                $('#phivanchuyen').val(chiphi);
                $('#tongcong').val(tongcong);

                

                var kiemtradangnhap = <?php echo $kiemtradangnhap; ?>;
                if(kiemtradangnhap == 0)                
                    $('#chonmua').click(function() {
                        window.location.href="dangnhap.php";
                    });
                else
                {
                    $('#chonmua').attr("data-toggle","modal");
                    $('#chonmua').attr("data-target","#myModal");
                }
                
                var kiemtrasach = <?php echo $kiemtrasach; ?>;
                if(kiemtrasach == 1)
                    $('#chonmua').attr("disabled", true);

                var trangthaisach = <?php echo $trangthaisach; ?>;
                if(trangthaisach == 1)
                {
                    $('#chonmua').attr("disabled", true);
                    $("#chonmua").text("ĐÃ BÁN");
                }

                var tensach = $("#tensachdacbiet").text();
                if(tensach.length >= 26)                
                    $('#tensachdacbiet').css("font-size", "33px");   

                $("#nutchinhsua").click(function() {                    

                    $('#tennguoimua').prop('readonly', false);
                    $('#nhanguoimua').prop('readonly', false);
                    $('#duongnguoimua').prop('readonly', false);
                    $('#sdtnguoimua').prop('readonly', false);
                    $('#phuongnguoimua').prop('readonly', false);
                    $('#xanguoimua').prop('readonly', false);
                    $("#tinhnguoimua").removeAttr('disabled');

                    $("#thanhtoan").removeAttr('disabled');

                    $('#ngaydathang').prop('readonly', false);
                    $('#ghichu').prop('readonly', false);

                });
                            
                $('#nutpopup_2').click(function(){
                    $("#tinhnguoiban").removeAttr('disabled');
                    $("#tinhnguoimua").removeAttr('disabled');
                    $("#thanhtoan").removeAttr('disabled');
                    $("#formhoadon").submit();
                });

                $('#tinhnguoimua').change(function() {
                    var vido_ban = 0, kinhdo_ban = 0, vido_mua = 0, kinhdo_mua = 0, khoangcach = 0, chiphi = 0, tongcong = 0;

                    var giathanh = <?php echo $giasach ?>;

                    var thanhpho_nguoiban = $('#tinhnguoiban').val();

                    for(var key in array_tp)
                    {
                        if(key === thanhpho_nguoiban)
                        {
                            vido_ban = array_tp[key][0];
                            kinhdo_ban = array_tp[key][0];
                        }
                    }

                    var thanhpho_nguoimua = $('#tinhnguoimua').val();

                    for(var key in array_tp)
                    {
                        if(key === thanhpho_nguoimua)
                        {
                            vido_mua = array_tp[key][0];
                            kinhdo_mua = array_tp[key][0];
                        }
                    }

                    khoangcach = distance(vido_ban,kinhdo_ban,vido_mua,kinhdo_mua);

                    //Cần xem lại chi phí.
                    if(khoangcach == 0)
                        chiphi = 0;
                    else
                        chiphi = khoangcach*20;

                    if(giathanh > 200000)
                        chiphi = 0;
                        
                    tongcong = giathanh + chiphi;
                    $('#phivanchuyen').val(chiphi);
                    $('#tongcong').val(tongcong);

                });

            });

            function distance(lat1,lon1,lat2,lon2) {
                var R = 6371; 
                var dLat = (lat2-lat1) * Math.PI / 180;
                var dLon = (lon2-lon1) * Math.PI / 180;
                var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                    Math.cos(lat1 * Math.PI / 180 ) * Math.cos(lat2 * Math.PI / 180 ) *
                    Math.sin(dLon/2) * Math.sin(dLon/2);
                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
                var d = R * c;
                return Math.round(d);
            }



        </script>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
    </body>
</html>