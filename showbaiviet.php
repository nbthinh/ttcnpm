<?php
    $i = $j = 0;

    $sql = "SELECT * FROM bai_viet WHERE Kiem_duyet_bai_viet=1 AND Ma_tai_khoan='" . $_SESSION['mataikhoan'] . "'";

    $result = mysqli_query($conn, $sql);

    $gioihan = mysqli_num_rows($result);

    if (isset($_GET['thutusach']))    
        $j = $_GET['thutusach'];

    if (isset($_GET['thutubaiviet']))    
    {
        if ($_GET['thutubaiviet'] >= 0 && $_GET['thutubaiviet'] < $gioihan)
            $i = $_GET['thutubaiviet'];
    }
    

    $sql = "SELECT * FROM bai_viet WHERE Kiem_duyet_bai_viet=1 AND Ma_tai_khoan='" . $_SESSION['mataikhoan'] . "' LIMIT " . $i . ",3";

    $result = mysqli_query($conn, $sql);

    echo '<div class="row p-3" id="hangbaiviet">';

    if (mysqli_num_rows($result) > 0)
    {

        while($row = mysqli_fetch_array($result)) {
            echo 
            '
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 p-3 cotchobaiviet"> 

            <div class="row hangchobaiviet">

                <div class="col-xl-10 col-lg-10 cotchuabaiviet" style="padding: 0px;">

                    <div class="baiviet text-center">
                        <a href="trangchitietbaiviet.php?mabaiviet='
                        . $row['Ma_bai_viet']
                        .
                        '"><img src="'
                        .$row['Anh_bai_viet']
                        .
                        '" class="hinhchuabaiviet" alt="Không tìm thấy ảnh" style="max-width: 250px; max-height: 150px; vertical-align: midddle;"></a>
                        <h4 class = "text-center"><a href="trangchitietbaiviet.php?mabaiviet='
                        . $row['Ma_bai_viet']
                        .
                        '" class="mautuadechitiet"><b>'
                        .$row['ten_bai_viet']
                        .
                        '</b></a></h4>
                    </div>	
            
                </div>

                <div class="col-xl-2 col-lg-2 cotchuaiconchinhsua">
                    <a href="chinhsuabaiviet.php?id='
                    .$row['Ma_bai_viet']
                    .
                    '"><img src="./image/edit.png" alt="Không tìm thấy ảnh" width="40" height="40" style="padding: 0px;"></a>
                </div>

            </div>
        </div>
            ';
        }

        echo '</div>';

        if ($gioihan > 3)
        {
            if($i == 0)
            {
                echo '
                <div class = "row text-right">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-3">
                        <button class="btn btn-primary" id="nutchuyen_4" name="nutchuyen_4" onclick="window.location.href=\'trangcanhan.php?thutubaiviet='
                        . strval($i + 3)
                        .
                        '&thutusach='
                        . strval($j)
                        .
                        '\'" style="color:white; text-decoration:none;">Sau</a></button>
                    </div>
                </div>
                ';        
            }
            elseif (($i + 3) >= $gioihan)
            {
                echo '
                <div class = "row text-right">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-3">
                        <button class="btn btn-primary" id="nutchuyen_3" name="nutchuyen_3" onclick="window.location.href=\'trangcanhan.php?thutubaiviet='
                        . strval($i - 3)
                        .
                        '&thutusach='
                        . strval($j)
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
                        <button class="btn btn-primary" id="nutchuyen_3" name="nutchuyen_3" onclick="window.location.href=\'trangcanhan.php?thutubaiviet='
                        . strval($i - 3)
                        .
                        '&thutusach='
                        . strval($j)
                        .
                        '\'">Trước</a></button>
                        <button class="btn btn-primary" id="nutchuyen_4" name="nutchuyen_4" onclick="window.location.href=\'trangcanhan.php?thutubaiviet='
                        . strval($i + 3)
                        .
                        '&thutusach='
                        . strval($j)
                        .
                        '\'" style="color:white; text-decoration:none;">Sau</a></button>
                    </div>
                </div>
                ';    
            }
        }

    }
    else
    {

    }
    
    echo '</div>';
    

?>