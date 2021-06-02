<?php
    $j = 0;

    $sql = "SELECT * FROM sach WHERE Duyet_sach=1 ";

    $result = mysqli_query($conn, $sql);

    $gioihan = mysqli_num_rows($result);



    if (isset($_GET['thutu']))    
        $j = $_GET['thutu'];

    

    $sql = "SELECT * FROM sach WHERE Duyet_sach=1 LIMIT " . $j . " ,12";

    $result = mysqli_query($conn, $sql);

    $i = 0;

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

    if ($gioihan > 12)
    {
        if(($j + 12) >= $gioihan)
        {
            echo 
            '
            <div class="row">
                <div class="col text-right marginright20">
                    <button type="button" class="btn btn1 btn-warning" style="width: 90px" onclick="window.location.href=\'trangdanhsach.php?thutu='
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
                    <button type="button" class="btn btn1 btn-warning" style="width: 90px" onclick="window.location.href=\'trangdanhsach.php?thutu='
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
                    <button type="button" class="btn btn1 btn-warning" style="width: 90px" onclick="window.location.href=\'trangdanhsach.php?thutu='
                    . strval($j - 12)
                    .
                    '\'">Trước</a></button>
                    <button type="button" class="btn btn1 btn-warning" style="width: 90px" onclick="window.location.href=\'trangdanhsach.php?thutu='
                    . strval($j + 12)
                    .
                    '\'">Sau</a></button>
                </div>
            </div>
            ';
        }
    }
    


?>