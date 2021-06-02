<?php
    //Lấy giá sách hiện tại.
    $masach = $_GET['id'];
    $sql = "SELECT * FROM sach WHERE Duyet_sach=1 AND Ma_sach=" . $masach;
    $result = mysqli_query($conn, $sql);
    $giasachhientai = 0;
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {
            $giasachhientai = $row['Gia_sach'];
        }
    }

    //Lấy giá sách tương tự.
    $sql= "SELECT * FROM sach WHERE Duyet_sach=1 AND  Ma_sach!=" . $masach;
    $result = mysqli_query($conn, $sql);

    $mangchenhlech = array();

    $idsach = $giasach = 0;

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {
            $idsach = $row['Ma_sach'];
            $giasach = $row['Gia_sach'];

            $mangchua = array($idsach => abs($giasach - $giasachhientai));

            $mangchenhlech += $mangchua;
        }
    }

    asort($mangchenhlech);

    $gioihan = mysqli_num_rows($result);

    if($gioihan > 4)
        $gioihan = 4;


    for ($i = 0;$i < $gioihan;$i++)
    {
        $idsach = key($mangchenhlech);
        next($mangchenhlech);
        $sql = "SELECT * FROM sach WHERE Duyet_sach=1 AND Ma_sach=" . $idsach;
        $result = mysqli_query($conn, $sql);
        $anhbia = $tensach = $giasach = "";
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
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