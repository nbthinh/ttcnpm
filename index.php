<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Trang chủ</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="./style/style_trangchu.css">   
        <link rel="stylesheet" href="./style/style_popup.css">
        <link rel="stylesheet" href="./style/style_wowslider.css">
        <link rel="shortcut icon" type="image/png" href="./image/bklogo.png"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script type="text/javascript" src="js/jquery1.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/wowslider.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="js/superfish.js"></script>
    </head>
    <body>
        <header>
            <?php
            include('header.php');
            ?>
        </header>
        
        <section>
            <div class="container">

                <div class="row chieucao">

                    <!-- Begin Slider -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">

                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <a href="index.php"><img class="d-block" src="./image/welcome.png" alt="First slide" height="100%" width="100%"></a>
                              </div>
                              <div class="carousel-item">
                                <a href="trangdanhsach.php"><img class="d-block" src="./image/sach.png" alt="Second slide" height="100%" width="100%"></a>
                              </div>
                              <div class="carousel-item">
                                <a href="trangbaiviet.php"><img class="d-block" src="./image/baiviet.png" alt="Third slide" height="100%" width="100%"></a>
                              </div>
                              <div class="carousel-item">
                                <a href="trangtrogiup.php"><img class="d-block" src="./image/trogiup.png" alt="Fourth slide" height="100%" width="100%"></a>
                              </div>
                            </div>
                        </div> -->
                        <?php
                        include ('slider.php');
                        ?>
                    </div>
                    <!-- End Slider -->

                </div>
                <br>
                <br>
                <!-- Tựa Đề -->
                <div class="row text-center">
                    <div class="col tuadesachtuongtu">
                        <h1 style="display: inline" class="mautuadechitiet sachtuongtu"><b> ~ SÁCH HẤP DẪN ~ </b></h1>
                    </div>
                </div>
                <!-- End Tựa Đề -->

                <div class="row p-3 hangsach">
                <?php
                    include('showsachrenhat.php');
                ?>
                </div>

                <!-- Tựa Đề -->
                <div class="row text-center">
                    <div class="col tuadesachtuongtu">
                        <h1 style="display: inline" class="mautuadechitiet sachtuongtu"><b> ~ SÁCH MỚI NHẤT ~ </b></h1>
                    </div>
                </div>
                <!-- End Tựa Đề -->

                <div class="row p-3 hangsach">
                    <?php
                        include('showsachmoinhat.php');
                    ?>
                </div>

                <!-- Tựa Đề -->
                <div class="row text-center">
                    <div class="col tuadesachtuongtu">
                        <h1 style="display: inline" class="mautuadechitiet sachtuongtu"><b> ~ BÀI VIẾT MỚI ~ </b></h1>
                    </div>
                </div>
                <!-- End Tựa Đề -->

                <div class="row p-3">
                <?php
                    include('showbaivietmoinhat.php');
                ?>
                    <!-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 p-3"> 
                        <div class="baiviet">
                            <a href="trangchitietbaiviet.html"><img src="./image/hinhbaiviet.png" alt="Không tìm thấy ảnh"></a>
                            <h4 class = "text-center"><a href="trangchitietbaiviet.php" class="mautuadechitiet"><b>Tóm tắt sách: Hành trình về phương Đông</b></a></h4>
                        </div>						
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 p-3">
                        <div class="baiviet">
                            <a href="trangchitietbaiviet.html"><img src="./image/hinhbaiviet.png" alt="Không tìm thấy ảnh"></a>
                            <h4 class = "text-center"><a href="trangchitietbaiviet.php" class="mautuadechitiet"><b>Tóm tắt sách: Hành trình về phương Đông</b></a></h4>
                        </div>	
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 p-3">
                        <div class="baiviet">
                            <a href="trangchitietbaiviet.html"><img src="./image/hinhbaiviet.png" alt="Không tìm thấy ảnh"></a>
                            <h4 class = "text-center"><a href="trangchitietbaiviet.php" class="mautuadechitiet"><b>Tóm tắt sách: Hành trình về phương Đông</b></a></h4>
                        </div>	
                    </div> -->
                </div>
            </div>
        </section>

        <footer>

            <?php
                include('footer.php')
            ?>

        </footer>
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
    </body>
</html>