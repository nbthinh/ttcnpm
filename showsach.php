<?php
    $i = 0;    

    //Tính giới hạn sách.
    $sql = "SELECT * FROM sach WHERE Duyet_sach=1 AND Ma_nguoi_dang=" . $_SESSION['mataikhoan'];

    $result = mysqli_query($conn, $sql);
    $gioihan = mysqli_num_rows($result);


    if (isset($_GET['thutusach']))    
        $i = $_GET['thutusach'];
        


    $sql = "SELECT * FROM sach WHERE Duyet_sach=1 AND Ma_nguoi_dang=" . $_SESSION['mataikhoan'] . " LIMIT " . $i . ",4";

    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0)
    {
        echo '<div class="row p-3" id="hangsach">';

        while($row = mysqli_fetch_array($result)) {
            echo 
            '
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 p-3 moikhung">    

                    <div class="row">

                        <div class="col-xl-10 col-lg-10 cotchuabaiviet" style="padding: 0px;">
                            <div class="card-100 text-center">
                                <div class="sach">
                                    <a href="xemthongtinsach.php?id='
                                    . $row['Ma_sach']
                                    .
                                    '">
                                    <img src="'
                                        .$row['Anh_bia']
                                        .
                                        '" alt="Không tìm thấy ảnh" style="width: 160px; height: 260px;">
                                    </a>
                                </div>
                                <div class="giasach"><a href="xemthongtinsach.php?id='
                                . $row['Ma_sach']
                                .
                                '"><img src="./image/shelf.png" alt="Không tìm thấy ảnh"></a></div>
                                <div class="card-body card-1">
                                    <h5 class="card-title text-center" style="height: 60px;"><a href="xemthongtinsach.php?id='
                                    . $row['Ma_sach']
                                    .
                                    '" class="mautuadechitiet"><b>'
                                    .$row['Ten_sach']
                                    .
                                    '</b></a></h5>
                                    <p class="maugia1"><b>'
                                    . number_format($row['Gia_sach'])
                                    .
                                    'đ</b></p>								
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-2 cotchuaiconchinhsua">
                            <a href="trangchinhsuasach.php?id='
                            .$row['Ma_sach']
                            .
                            '"><img src="./image/edit.png" alt="Không tìm thấy ảnh" width="40" height="40" style="padding-right: 0px;"></a>
                        </div>

                    </div>

                </div>

            ';
        }

        echo '</div>';

        if ($gioihan > 4)
        {
            if($i <= 0)
            {
                echo
                '
                <div class = "row text-right">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-3">
                        <button class="btn btn-primary" id="nutchuyen_4" name="nutchuyen_4" onclick="window.location.href=\'trangcanhan.php?thutusach='
                        . strval($i + 4)
                        .
                        '\'" style="color:white; text-decoration:none;">Sau</a></button>
                    </div>
                </div>                
                ';
            }
            elseif (($i + 4) > $gioihan)
            {
                echo '
                <div class = "row text-right">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-3">
                        <button class="btn btn-primary" id="nutchuyen_3" name="nutchuyen_3" onclick="window.location.href=\'trangcanhan.php?thutusach='
                        . strval($i - 4)
                        .
                        '\'">Trước</a></button>
                    </div>
                </div>
                ';                    
            }
            else
            {
                echo '
                <div class = "row text-right">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-3">
                        <button class="btn btn-primary" id="nutchuyen_3" name="nutchuyen_3" onclick="window.location.href=\'trangcanhan.php?thutusach='
                        . strval($i - 4)
                        .
                        '\'">Trước</a></button>
                        <button class="btn btn-primary" id="nutchuyen_4" name="nutchuyen_4" onclick="window.location.href=\'trangcanhan.php?thutusach='
                        . strval($i + 4)
                        .
                        '\'" style="color:white; text-decoration:none;">Sau</a></button>
                    </div>
                </div>
                ';                    
            }



        }

    }        
?>