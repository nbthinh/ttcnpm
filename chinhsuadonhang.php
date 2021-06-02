<?php
    include('connect.php');

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Trang xem thông tin sách</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Jquery -->
        <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
        <!-- Main Style Css -->
        <link rel="stylesheet" href="./style/style_dangky.css"/>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="./style/style_chitietsach.css">   
        <!-- <link rel="stylesheet" href="./style/style_popup.css"> -->
        <link rel="shortcut icon" type="image/png" href="./image/bklogo.png"/>
    </head>
    <body class="form-v4">
    	<div class="page-content">
	    	<div class="form-v4-content">
                <?php
                    //include('xulydonhang.php');
                ?>
                <form action="ketquadonhang.php" method="POST" id="formhoadon" class="text-center">
                    <h2>CHỈNH SỬA ĐƠN HÀNG</h2>

                    <div class="form-group text-left">
                        <label class="kichcochuID" for="idnguoiban"><b>ID người bán</b></label>
                        <input type="text" style="display: inline;" class="form-control" name="idnguoiban" id="idnguoiban" value="" readonly="readonly">
                    </div>

                    <div class="form-group text-left">
                        <input type="text" style="display: inline;" class="form-control" name="tennguoiban" id="tennguoiban" placeholder="Họ Tên" value="" readonly="readonly">
                        <input type="text" style="display: inline;" class="form-control" name="nhanguoiban" id="nhanguoiban" placeholder="Số Nhà" value="" readonly="readonly">
                        <input type="text" style="display: inline;" class="form-control" name="duongnguoiban" id="duongnguoiban" placeholder="Đường" value="" readonly="readonly">
                    </div>

                    <div class="form-group text-left">
                        <input type="text" style="display: inline;" class="form-control" name="sdtnguoiban" id="sdtnguoiban" placeholder="Số điện thoại" value="" readonly="readonly">
                        <input type="text" style="display: inline;" class="form-control" name="phuongnguoiban" id="phuongnguoiban" placeholder="Phường/Xã" value="" readonly="readonly">
                        <input type="text" style="display: inline;" class="form-control" name="xanguoiban" id="xanguoiban" placeholder="Quận/Huyện" value="" readonly="readonly">
                        <select style="display: inline;" class="form-control" name="tinhnguoiban" id="tinhnguoiban" disabled>
                        </select>
                    </div>

                    <div class="form-group text-left">
                        <label class="kichcochuID" for="idnguoimua"><b>ID người mua</b></label>
                        <input type="text" style="display: inline;" class="form-control" name="idnguoimua" id="idnguoimua" value="" readonly="readonly">
                    </div>

                    <div class="form-group text-left">
                        <input type="text" style="display: inline;" class="form-control" name="tennguoimua" id="tennguoimua" placeholder="Họ Tên" value="" readonly="readonly">
                        <input type="text" style="display: inline;" class="form-control" name="nhanguoimua" id="nhanguoimua" placeholder="Số Nhà" value="" readonly="readonly">
                        <input type="text" style="display: inline;" class="form-control" name="duongnguoimua" id="duongnguoimua" placeholder="Đường" value="" readonly="readonly">
                    </div>

                    <div class="form-group text-left">
                        <input type="text" style="display: inline;" class="form-control" name="sdtnguoimua" id="sdtnguoimua" placeholder="Số điện thoại" value="" readonly="readonly">
                        <input type="text" style="display: inline;" class="form-control" name="phuongnguoimua" id="phuongnguoimua" placeholder="Phường/Xã" value="" readonly="readonly">
                        <input type="text" style="display: inline;" class="form-control" name="xanguoimua" id="xanguoimua" placeholder="Quận/Huyện" value="" readonly="readonly">
                        <select style="display: inline;" class="form-control" name="tinhnguoimua" id="tinhnguoimua" disabled>

                        </select>
                    </div>

                    <div class="form-group text-left">
                        <label class="kichcochuID" for="iddonhang"><b>ID đơn hàng</b></label>
                        <input type="text" style="display: inline;" class="form-control" name="iddonhang" id="iddonhang" value="" readonly="readonly">
                    </div>

                    <div class="form-group text-left">
                        <label for="thanhtoan">Hình thức thanh toán</label>
                        <select class="form-control" name="thanhtoan" id="thanhtoan" style="display: inline;" disabled>
                            <option>Thanh toán bằng tiền mặt khi nhận hàng</option>
                        </select>
                        <label id="labelidsach" for="idsach">ID Sách</label>
                        <input type="text" style="display: inline;" class="form-control" name="idsach" id="idsach" value="" readonly="readonly">
                    </div>

                    <div class="form-group text-left">
                        <label id="labelngaydathang" for="ngaydathang">Ngày đặt hàng</label>
                        <input type="date" style="display: inline;" class="form-control" name="ngaydathang" id="ngaydathang" value="" readonly="readonly">
                        <label id="labeltensach" for="tensach_1">Tên sách</label>
                        <input type="text" style="display: inline;" class="form-control" name="tensach" id="tensach_1" value="" readonly="readonly">
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
                                <input type="text" name="dongia" id="dongia" style="display: inline;" class="form-control" value="" readonly="readonly">
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
                                <button type="button" name="huy" id="nutpopup_1" class="btn btn-primary" ><b>HỦY</b></button>
                                <button type="button" name="xacnhan" id="nutpopup_2" class="btn btn-primary"><b>XÁC NHẬN</b></button>
                                        
                            </div>

                        </div>

                    </div>
                </form>
                </div>
        </div>



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
                        chiphi = 11000;
                    else
                        chiphi = khoangcach*50;

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