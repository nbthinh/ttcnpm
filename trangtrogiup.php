<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Trang trợ giúp</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="./style/style_trangtrogiup.css">   
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
            <div class="container t_show" style="color:#260a07">
                <br>
                <h1>CÂU HỎI THƯỜNG GẶP</h1> <br><br>
                <h4 id="timkiemsach"><u>Cách tìm kiếm sách</u></h4><br>
                <h4 id="muasach"><u>Cách mua sách</u></h4><br>
                <h4 id="taotaikhoan"><u>Cách tạo tài khoản</u></h4><br>
                <h4 id="chinhsuataikhoan"><u>Cách chỉnh sửa tài khoản</u></h4><br>
                <h4 id="khoiphucmatkhau"><u>Cách khôi phục mật khẩu</u></h4> <br>
                <h4 id="themsach"><u>Cách thêm sách</u></h4><br>
                <h4 id="thembaiviet"><u>Cách thêm bài viết</u></h4><br>
                <h4 id="xemthongtinsach"><u>Cách chỉnh sửa sách</u></h4><br>
                <h4 id="xemthongtinbaiviet"><u>Cách chỉnh sửa bài viết</u></h4><br>
                <h4 id="theodoidonhang"><u>Cách theo dõi đơn hàng</u></h4><br><br>
                <h4>Bất cứ lúc nào bạn có câu hỏi đến chúng tôi, 
                    xin vui lòng liên hệ <span style="font-weight:bold" >contactourbooks@gmail.com</span>
                    để được hướng dẫn và giải đáp chi tiết.
                </h4>
                <br>
            </div>
        </section>

        <footer>
            <?php
            include('footer.php')
            ?>
        </footer>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 

        <button class="btn btn-danger d_close" style="display: none">X</button>
        <div class="d_toggle1 dpopup" style="display: none;padding: 25px;">
            <h4>Cách tìm kiếm sách</h4>
            <br>
            <p>Khách hàng có thể tìm kiếm sách theo tên hoặc theo thể loại <br>
            <h6>Tìm kiếm theo tên:</h6>
            Gõ tên sách vào ô tìm kiếm sách rồi nhấn nút tìm kiếm <br>
            <img src="./trogiup/timkiem.PNG" width="500px"> <br>
            Kết quả tìm kiếm sẽ xuất hiện <br>
            <img src="./trogiup/ketquatimkiem.PNG" width="500px"> <br><br>
            <h6>Tìm kiếm theo thể loại: </h6>
            Nhấn vào nút 3 gạch ngang trên thanh định hướng sẽ hiện ra danh sách thể loại sách<br>
            Nhấn chọn thể loại cần tìm <br>
            <img src="./trogiup/timkiemtheloai.PNG" width="500px"> <br>
            Kết quả tìm kiếm sẽ hiển thị tất cả sách thuộc thể loại đó <br>
            <img src="./trogiup/ketquatheloai.PNG" width="500px"> <br>
            </p>
        </div>

        <div class="d_toggle2 dpopup" style="display: none;padding: 25px;">
            <h4>Cách mua sách</h4>
            <br>
            <p>Nhấn chọn vào quyển sách cần mua <br>
            Thông tin chi tiết gồm tác giả, thể loại, giá tiền của quyển sách sẽ xuất hiện <br>
            <img src="./trogiup/thongtinsach.PNG" width="500px"> <br>
            Nếu khách hàng muốn mua sách thì nhấn vào nút chọn mua <br>
            Lưu ý nút chọn mua không kích hoạt khi sách đã được bán <br>
            Sau khi nhấn chọn mua thì thông tin đơn hàng sẽ xuất hiện <br>
            Người mua có thể tùy chỉnh thông tin cá nhân của mình gồm địa chỉ và số điện thoại nhận bằng cách nhấn vào nút chỉnh sửa <br>
            <img src="./trogiup/donhang.PNG" width="500px"> <br>
            Nếu đã đồng ý với đơn hàng thì nhấn xác nhận để tiến hành đặt hàng <br>
            Nếu không đồng ý bấm hủy để quay trở về <br>
            </p>
        </div>

        <div class="d_toggle3 dpopup" style="display: none;padding: 25px;">
            <h4>Cách tạo tài khoản</h4>
            <br>
            <p>Để có thể mua sách, thêm sách, thêm bài viết, khách hàng cần tạo cho mình một tài khoản <br>
            Nhấn vào nút đăng ký một cửa sổ đăng ký sẽ hiện ra <br>
            <img src="./trogiup/taotaikhoan.PNG" width="500px"> <br>
            Người dùng nhập đầy đủ các thông tin cá nhân bắt buộc gồm: họ, tên, số điện thoại, email để tạo tài khoản <br>
            Nếu đã đồng ý với thông tin thì nhấn xác nhận để tạo tài khoản <br>
            Nếu không đồng ý bấm hủy để quay trở về <br>
            Nếu tạo tài khoản thành công thì sẽ có màn hình xác nhận <br>
            <img src="./trogiup/taotaikhoanthanhcong.PNG" width="500px"> <br>
            Nếu tạo tài khoản chưa thành công cần quay lại để nhập đúng thông tin theo định dạng <br>
            <img src="./trogiup/taotaikhoankhongthanhcong.PNG" width="500px"> <br>
            </p>
        </div>

        <div class="d_toggle4 dpopup" style="display: none;padding: 25px;">
            <h4>Cách chỉnh sửa tài khoản</h4>
            <br>
            <p>Đăng nhập vào tài khoản cá nhân <br>
            Nhấn vào nút tài khoản ở góc phải màn hình <br>
            Trang thông tin tài khoản sẽ hiện ra <br>
            <img src="./trogiup/trangcanhan.PNG" width="500px"> <br>
            Người dùng có thể tùy chỉnh thông tin cá nhân bằng cách nhấn nút chỉnh sửa tài khoản<br>
            <img src="./trogiup/chinhsuataikhoan.PNG" width="500px"> <br>
            Nếu đã đồng ý với thông tin đã nhập thì nhấn chỉnh sửa <br>
            </p>
        </div>

        <div class="d_toggle5 dpopup" style="display: none;padding: 25px;">
            <h4>Cách khôi phục mật khẩu</h4>
            <br>
            <p>Vào trang đăng nhập <br>
            Nhấn vào nút Quên mật khẩu <br>
            Màn hình quên mật khẩu sẽ xuất hiện <br>
            <img src="./trogiup/quenmatkhau.PNG" width="500px"> <br>
            Nhập địa chỉ email đăng ký. Mật khẩu mới sẽ được gửi đến email để khôi phục tài khoản <br>
            <img src="./trogiup/guimatkhau.PNG" width="500px"> <br>
            Nếu email nhập vào chưa có tài khoản sẽ hiện ra thông báo lỗi và quay về trang đăng ký <br>
            <img src="./trogiup/khongguimatkhau.PNG" width="500px"> <br>     
            </p>
        </div>

        <div class="d_toggle6 dpopup" style="display: none;padding: 25px;">
            <h4>Cách thêm sách</h4>
            <br>
            <p>Đăng nhập vào tài khoản cá nhân <br>
            Nhấn vào nút tài khoản ở góc phải màn hình <br>
            Trang thông tin tài khoản sẽ hiện ra <br>
            <img src="./trogiup/trangcanhan.PNG" width="500px"> <br>
            Người dùng có thể đăng sách của mình bằng cách nhấn nút thêm sách <br>
            Giao diện thêm sách sẽ hiện ra và người dùng điền đầy đủ thông tin <br>
            <img src="./trogiup/taomoisach.PNG" width="500px"> <br>
            Nếu đã đồng ý với thông tin sách đã đăng thì nhấn lưu để thêm sách <br>
            Nếu không đồng ý bấm hủy để quay trở về <br>
            </p>
        </div>

        <div class="d_toggle7 dpopup" style="display: none;padding: 25px;">
            <h4>Cách thêm bài viết</h4>
            <br>
            <p>Đăng nhập vào tài khoản cá nhân <br>
            Nhấn vào nút tài khoản ở góc phải màn hình <br>
            Trang thông tin tài khoản sẽ hiện ra <br>
            <img src="./trogiup/trangcanhan.PNG" width="500px"> <br>
            Người dùng có thể đăng bài viết của mình bằng cách nhấn nút thêm bài viết <br>
            Giao diện thêm bài viết sẽ hiện ra và người dùng điền đầy đủ thông tin <br>
            <img src="./trogiup/taomoibaiviet.PNG" width="500px"> <br>
            Nếu đã đồng ý với thông tin bài viết đã đăng thì nhấn lưu để thêm bài viết <br>
            Nếu không đồng ý bấm hủy để quay trở về <br>     
            </p>
        </div>

        <div class="d_toggle8 dpopup" style="display: none;padding: 25px;">
            <h4>Cách chỉnh sửa sách</h4>
            <br>
            <p>Đăng nhập vào tài khoản cá nhân <br>
            Nhấn vào nút tài khoản ở góc phải màn hình <br>
            Trang thông tin tài khoản sẽ hiện ra <br>
            <img src="./trogiup/trangcanhan.PNG" width="500px"> <br>
            Người dùng có thể chỉnh sửa sách đã đăng bằng cách nhấn vào nút chỉnh sửa bên cạnh sách <br>
            Giao diện thông tin sách được chọn sẽ hiện ra và người dùng có thể chỉnh sửa lựa chọn của mình <br>
            <img src="./trogiup/chinhsuasach.PNG" width="500px"> <br>
            Nếu đã đồng ý với thông tin sách đã sửa thì nhấn lưu để chỉnh sửa sách <br>
            Nếu không đồng ý bấm hủy để quay trở về <br>     
            </p>
        </div>

        <div class="d_toggle9 dpopup" style="display: none;padding: 25px;">
            <h4>Cách chỉnh sửa bài viết</h4>
            <br>
            <p>Đăng nhập vào tài khoản cá nhân <br>
            Nhấn vào nút tài khoản ở góc phải màn hình <br>
            Trang thông tin tài khoản sẽ hiện ra <br>
            <img src="./trogiup/trangcanhan.PNG" width="500px"> <br>
            Người dùng có thể chỉnh sửa sách đã đăng bằng cách nhấn vào nút chỉnh sửa bên cạnh sách <br>
            Giao diện thông tin bài viết được chọn sẽ hiện ra và người dùng có thể chỉnh sửa lựa chọn của mình <br>
            <img src="./trogiup/chinhsuabaiviet.PNG" width="500px"> <br>
            Nếu đã đồng ý với thông tin bài viết đã sửa thì nhấn lưu để chỉnh sửa bài viết <br>
            Nếu không đồng ý bấm hủy để quay trở về <br>          
            </p>
        </div>

        <div class="d_toggle10 dpopup" style="display: none;padding: 25px;">
            <h4>Cách theo dõi đơn hàng</h4>
            <br>
            <p>Đăng nhập vào tài khoản cá nhân <br>
            Nhấn vào nút tài khoản ở góc phải màn hình <br>
            Trang thông tin tài khoản sẽ hiện ra <br>
            <img src="./trogiup/trangcanhan.PNG" width="500px"> <br>
            <h6>Theo dõi đơn hàng bán: </h6>
            Nhấn nút theo dõi đơn hàng bán để xem thông tin về đơn hàng sách người dùng là người bán <br>
            Nhấn nút đóng nếu muốn đóng bảng thông tin <br>
            <img src="./trogiup/theodoidonhangban.PNG" width="500px"> <br>
            <h6>Theo dõi đơn hàng mua: </h6>
            Nhấn nút theo dõi đơn hàng bán để xem thông tin về đơn hàng sách người dùng là người mua <br>
            Nhấn nút đóng nếu muốn đóng bảng thông tin <br> 
            <img src="./trogiup/theodoidonhangmua.PNG" width="500px"> <br>
            </p>
        </div>

        <script>
            $(".t_show h4#timkiemsach").click(function(){
                $(".d_toggle1").show();
                $(".d_close").show();
            });

            $(".t_show h4#muasach").click(function(){
                $(".d_toggle2").show();
                $(".d_close").show();
            });

            $(".t_show h4#taotaikhoan").click(function(){
                $(".d_toggle3").show();
                $(".d_close").show();
            });

            $(".t_show h4#chinhsuataikhoan").click(function(){
                $(".d_toggle4").show();
                $(".d_close").show();
            });

            $(".t_show h4#khoiphucmatkhau").click(function(){
                $(".d_toggle5").show();
                $(".d_close").show();
            });

            $(".t_show h4#themsach").click(function(){
                $(".d_toggle6").show();
                $(".d_close").show();
            });

            $(".t_show h4#thembaiviet").click(function(){
                $(".d_toggle7").show();
                $(".d_close").show();
            });

            $(".t_show h4#xemthongtinsach").click(function(){
                $(".d_toggle8").show();
                $(".d_close").show();
            });

            $(".t_show h4#xemthongtinbaiviet").click(function(){
                $(".d_toggle9").show();
                $(".d_close").show();
            });

            $(".t_show h4#theodoidonhang").click(function(){
                $(".d_toggle10").show();
                $(".d_close").show();
            });
            
            $(".d_close").click(function(){
                $(".d_toggle1").hide();
                $(".d_toggle2").hide();
                $(".d_toggle3").hide();
                $(".d_toggle4").hide();
                $(".d_toggle5").hide();
                $(".d_toggle6").hide();
                $(".d_toggle7").hide();
                $(".d_toggle8").hide();
                $(".d_toggle9").hide();
                $(".d_toggle10").hide();
                $(".d_close").hide();
            });
        </script>

    </body>
</html>