<?php
include('connect.php');

session_start();
if (!isset( $_SESSION['ten'])){
    echo "<h1>Trang cá nhân không tồn tại</h1>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Trang cá nhân</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="./style/style_trangcanhan.css">   
        <link rel="stylesheet" href="./style/style_popup.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="./image/bklogo.png"/>
    </head>
    <body>
        <header>
            <?php
            include('header.php');
            ?>
        </header>
                

        <section>
            <div class="container">

                <div class="row hang1" id="body_background" style="padding: 0px;">

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 khungtrai" id="left_frame">

                        <div class="row"  id="avatar_frame">
                            <div class="col-sm-12 text-center">
                                <img src="image/avatar.JPG" alt="Không có hình" id="avatar">
                            </div>
                        </div>

                        <div class="row" id="name_frame">
                            <div class="col-12">
                                <div id="hoten">
                                    <?php
                                        echo "".$_SESSION['ho']." ".$_SESSION['ten'];
                                    ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 text-center khunggiua">

                        <!-- Thong tin tai khoan -->
                        <div class="row" id="sub_title_1">

                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12 text-center" id="t_tin_ca_nhan">THÔNG TIN CÁ NHÂN</div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12 text-center" id="icon_1" >
                                <a href="trangthongtincanhan.php">
                                    <img src="image/editbackground.PNG" alt="icon" id="icon_width_height">
                                </a>
                            </div>

                        </div>

                        <div class="row mt-2 in4_frame">

                            <div class="col-md-12 col-sm-12 thongtincanhan text-left">
                                <br>
                                <?php
                                    echo "<b>Email: </b>" .$_SESSION['email']."<br><br>";
                                    echo "<b>Điện thoại: </b>" . $_SESSION['dienthoai']."<br><br>";
                                    if ($_SESSION['quanhuyen'] != null){
                                        echo "<b>Địa chỉ: </b>" .$_SESSION['sonha']." ".$_SESSION['duong'] ." Quận " .$_SESSION['quanhuyen']. " ".$_SESSION['thanhpho']. " <br>" ;
                                    }
                                    else if ($_SESSION['quanhuyen'] == null){
                                        echo "<b>Địa chỉ: </b>" .$_SESSION['sonha']." ".$_SESSION['duong'] . " ".$_SESSION['thanhpho']. " <br>" ;
                                    }       
                                ?>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 org_base khungphai">

                        <div class="row center-block mt-3 btn_edit" style="background-color: #EF8645; margin: auto; padding: 0px;">
                            <button type="button" class="btn btn-warning btn-block maubutton" onclick="window.location.href='trangthemsach.php?id=<?php echo $_SESSION['mataikhoan']; ?>'"><b class="font_color">THÊM SÁCH</b></button>
                        </div>

                        <div class="row center-block mt-3 btn_edit" style="background-color: #EF8645;margin: auto; padding: 0px;">
                            <button type="button" class="btn btn-warning btn-block maubutton" onclick="window.location.href='trangthongtinbaiviet.php?matk=<?php echo $_SESSION['mataikhoan']; ?>'"><b class="font_color">THÊM BÀI VIẾT</b></button>
                        </div>

                        <div class="row center-block mt-3 btn_edit" style="background-color: #EF8645;margin: auto; padding: 0px;">
                            <button type="button" class="btn btn-warning btn-block maubutton" data-toggle="modal" data-target="#theodoidonhangban_moi"><b class="font_color">THEO DÕI ĐH BÁN</b></button>
                        </div>

                        <div class="row center-block mt-3 btn_edit" style="background-color: #EF8645;margin: auto; padding:0px;">
                            <button type="button" class="btn btn-warning btn-block maubutton" data-toggle="modal" data-target="#theodoidonhangmua_moi"><b class="font_color">THEO DÕI ĐH MUA</b></button>
                        </div>

                    </div>                    
                </div> 

                <div class="row mt-5 book_pos">
                    <div class="col-12">
                        <div class="center_text_html font_40px color_D2691E" style="color: #D2691E;">~ SÁCH ĐÃ ĐĂNG ~</div>
                    </div>
                </div>

                <?php
                    include('showsach.php');
                ?>

                <!-- Tựa Đề -->
                <div class="row text-center">
                    <div class="col" id="tuadesachtuongtu">
                        <h1 style="display: inline" class="mautuadechitiet" id="sachtuongtu"><b> ~ BÀI VIẾT ĐÃ ĐĂNG ~ </b></h1>
                    </div>
                </div>
                <!-- End Tựa Đề -->

                <?php
                    include('showbaiviet.php');
                ?>
            </div>
        
        </section>

        <footer>

            <?php
                include('footer.php')
            ?>


        </footer>
    




        

    <div id="theodoidonhangban_moi" class="modal fade" role="dialog">
        <div class="modal-dialog donhang_pop_up">
      
          <!-- Modal content-->
            <div class="modal-content kichthuocdonhang_pop_up">
                <div class="modal-header header_base_new">
                    <h4 class="modal-title buy_sell_title_new">THEO DÕI ĐƠN HÀNG BÁN</h4>
                </div>
                <div class="modal-body donhang_modal_body_new"> <!-- Vô phần nội dung chính, form -->
                    <div style="overflow-y: scroll; max-height: 400px;">
                        <?php
                            include('showdonhangban.php');
                        ?>
                    </div>

                    <div class="row margin_0px mt-2">
                        <div class="col-4"></div>
                        <div class="col-4 padding_left_close_button">
                            <button type="button" class="btn btn-warning btn-lg btn-block org_base_pop_up btn_text_pop_up width_height_align nutdong_popup" data-dismiss="modal" data-toggle="modal">ĐÓNG</button>
                        </div>
                        <div class="col-4"></div>
                    </div>

                </div>
            </div>
      
        </div>
    </div>

    <div id="theodoidonhangmua_moi" class="modal fade" role="dialog">
            <div class="modal-dialog donhang_pop_up">
          
              <!-- Modal content-->
                <div class="modal-content kichthuocdonhang_pop_up">
                    <div class="modal-header header_base_new">
                        <h4 class="modal-title buy_sell_title_new">THEO DÕI ĐƠN HÀNG MUA</h4>
                    </div>
                    <div class="modal-body donhang_modal_body_new"> <!-- Vô phần nội dung chính, form -->
                        <div style="overflow-y: scroll; max-height: 400px;">
                            <?php
                                include('showdonhangmua.php');
                            ?>
                        </div>

                        <div class="row margin_0px mt-2">
                            <div class="col-4"></div>
                            <div class="col-4 padding_left_close_button">
                                <button type="button" class="btn btn-warning btn-lg btn-block org_base_pop_up btn_text_pop_up width_height_align nutdong_popup" data-dismiss="modal" data-toggle="modal">ĐÓNG</button>
                            </div>
                            <div class="col-4"></div>
                        </div>
    
                    </div>
                </div>
          
            </div>
        </div>


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
    </body>
</html>