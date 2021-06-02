<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'ourbooks';
$table = 'sach';

    // Kết nối
    $conn = mysqli_connect($server,$user,$pass,$database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_set_charset($conn, "utf8");

    #sách rẻ nhất
    $sql= "SELECT * FROM sach WHERE Duyet_sach=1 ORDER BY Gia_sach ASC LIMIT 4";
    $result = mysqli_query($conn, $sql);

    $mangresult = array();

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {
            $idsach = $row['Ma_sach'];
            array_push($mangresult,$idsach);
            
        }
    }
    
    
    $gioihan = mysqli_num_rows($result);
    
    for ($i = 0;$i < $gioihan;$i++)
    {
        $searchid = (int)$mangresult[$i];
        $sql= "SELECT * FROM sach WHERE Duyet_sach=1 AND Ma_sach = $searchid";
        $result = mysqli_query($conn, $sql);
        $anhbia = $tensach = $giasach = "";
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
                $idsach = $row['Ma_sach'];
                $anhbia = $row['Anh_bia'];
                $tensach = $row['Ten_sach'];
                $giasach = $row['Gia_sach'];
            }
        }    


        echo 
        '
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 p-3">
                        
            <div class="card-100 text-center">
                <div class="sach"><a href="xemthongtinsach.php?id='
                . $idsach
                .
                '"><img src="'
                . $anhbia
                .
                '" alt="Không tìm thấy ảnh" style="width: 160px; height: 260px;"></a></div>
                <div class="giasach"><a href="xemthongtinsach.php?id='
                . $idsach
                .
                '"><img src="./image/shelf.png" alt="Không tìm thấy ảnh"></a></div>
                <div class="card-body card-1">
                    <h5 class="card-title text-center" style="height: 60px;"><a href="xemthongtinsach.php?id='
                    . $idsach
                    .
                    '" class="mautuadechitiet"><b>'
                    . $tensach
                    .
                    '</b></a></h5>
                    <p class="maugia1"><b>'
                    . number_format($giasach)
                    .
                    'đ</b></p>								
                </div>

            </div>
                
        </div>
        ';

    }

?>