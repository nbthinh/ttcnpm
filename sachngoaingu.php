<?php
session_start();
// Thiết lập charset utf8
header('Content-Type: text/html; charset=utf-8');
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'ourbooks';
$table = 'sach';
?>
<?php
// Turn off all error reporting
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Trang học ngoại ngữ</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="./style/style_timkiem.css">   
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
            <div class="container" id="containerchua">            
                
                <?php
               
                if (true) 
                {
                    $sql = "SELECT * FROM sach WHERE Duyet_sach=1 AND Ma_the_loai = 4";
                        
                    
                    // Kết nối
                    $conn = mysqli_connect($server,$user,$pass,$database);
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    mysqli_set_charset($conn, "utf8");
                    // Thực thi câu truy vấn
                    $result = mysqli_query($conn, $sql);
                    // Đếm số dòng trả về trong sql.
                    $total_records = mysqli_num_rows($result);

                    if ($total_records ==0){
                        echo'
                        <div class="row text-center">
                            <div class="col" id="tuadesachtuongtu">
                            <h1 style="display: inline" class="mautuadechitiet" id="sachtuongtu">~ SÁCH NGOẠI NGỮ ~</h1>
                            </div>
                        </div>
                        ';
                    }

                    else if ($total_records > 0) {
                    // Dùng $num để đếm số dòng trả về.
                    echo '
                    <div class="row text-center">
                        <div class="col" id="tuadesachtuongtu">
                        <h1 style="display: inline" class="mautuadechitiet" id="sachtuongtu"> ~ SÁCH NGOẠI NGỮ ~</h1>
                        </div>
                    </div>
                    ';
                    
                
                    

                    //----------------------------------
                    $j = 0;
                    $i = 0;

                    if (isset($_GET['thutu']))    
                        $j = $_GET['thutu'];

                    $sql = "SELECT * FROM sach WHERE Duyet_sach=1 AND Ma_the_loai = 4 LIMIT " . $j . " ,12";
                    $result = mysqli_query($conn, $sql);
                    
                    //----------------------------------
                    if (mysqli_num_rows($result) > 0) {
                        $soluonghang =  mysqli_num_rows($result);
                        while($row = mysqli_fetch_array($result)) {
                            if ($i%4 == 0)
                                echo '<div class="row p-3 hangsach">';
                
                
                            echo 
                            '
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 p-3"> 
                                <div class="card-100 text-center">
                                    <div class="sach">
                                        <a href="xemthongtinsach.php?id='
                                        . $row['Ma_sach']
                                        .
                                        '">
                                            <img src="'
                                            . $row['Anh_bia']
                                            .
                                            '" alt="Không tìm thấy ảnh" style="width: 160px; height: 260px;">
                                        </a>
                                    </div>
                                    <div class="giasach"><a href="xemthongtinsach.php?id='
                                    . $row['Ma_sach']
                                    .
                                    '"><img src="./image/shelf.png" alt="Không tìm thấy ảnh"></a></div>
                                    <div class="card-body card-100">
                                        <h5 class="card-title text-center" style="height: 60px;"><a href="xemthongtinsach.php?id='
                                        . $row['Ma_sach']
                                        .
                                        '" class="mautuadechitiet"><b>'
                                        . $row['Ten_sach']
                                        .
                                        '</b></a></h5>
                                        <p class="maugia1"><b>'
                                        . number_format($row['Gia_sach'])
                                        .
                                        'đ
                                        </b></p>								
                                    </div>
                                </div>
                            </div>
                            ';
                
                            if ($i%4 == 3 || $i == $soluonghang - 1)
                                echo '</div>';
                            
                            $i++;
                        }
                    }
                
                    //------------------------------
                    if ($total_records > 12)
                    {
                        echo $total_records;
                        if(($j + 12) >= $total_records)
                        {
                            echo 
                            '
                            <div class="row">
                                <div class="col text-right marginright20">
                                    <button type="button" class="btn btn1 btn-warning" style="width: 90px" onclick="window.location.href=\'sachngoaingu.php?thutu='
                                    . strval($j - 12)
                                    .
                                    '\'">Trước</a></button>
                                </div>
                            </div>
                
                            ';
                        }
                        elseif($j <= 0)
                        {
                            echo
                            '
                            <div class="row">
                                <div class="col text-right marginright20">
                                    <button type="button" class="btn btn1 btn-warning" style="width: 90px" onclick="window.location.href=\'sachngoaingu.php?thutu='
                                    . strval($j + 12)
                                    .
                                    '\'">Sau</a></button>
                                </div>
                            </div>
                            ';
                        }
                        else
                        {
                            echo 
                            '
                            <div class="row">
                                <div class="col text-right marginright20">
                                    <button type="button" class="btn btn1 btn-warning" style="width: 90px" onclick="window.location.href=\'sachngoaingu.php?thutu='
                                    . strval($j - 12)
                                    .
                                    '\'">Trước</a></button>
                                    <button type="button" class="btn btn1 btn-warning" style="width: 90px" onclick="window.location.href=\'sachngoaingu.php?thutu='
                                    . strval($j + 12)
                                    .
                                    '\'">Sau</a></button>
                                </div>
                            </div>
                            ';
                        }
                    }
                }
                    
                }
            ?>
                
                
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