<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'ourbooks';
$table = 'baiviet';

    // Kết nối
    $conn = mysqli_connect($server,$user,$pass,$database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_set_charset($conn, "utf8");

    #bài viết mới nhất
    $sql= "SELECT * FROM bai_viet WHERE Kiem_duyet_bai_viet=1 ORDER BY Ma_bai_viet DESC LIMIT 3";
    $result = mysqli_query($conn, $sql);

    $mangresult = array();

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {
            $idbaiviet = $row['Ma_bai_viet'];
            array_push($mangresult,$idbaiviet);
            
        }
    }
    
    
    $gioihan = mysqli_num_rows($result);    

    for ($i = 0;$i < $gioihan;$i++)
    {
        $searchid = (int)$mangresult[$i];
        $sql= "SELECT * FROM bai_viet WHERE Kiem_duyet_bai_viet=1 AND Ma_bai_viet = $searchid";
        $result = mysqli_query($conn, $sql);
        $anhbaiviet = $tenbaiviet = "";
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
                $idbaiviet = $row['Ma_bai_viet'];
                $anhbaiviet = $row['Anh_bai_viet'];
                $tenbaiviet = $row['ten_bai_viet'];
            }
        }
    
        echo '
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 p-3"> 
            <div class="baiviet" style="text-align: center; width: 320px; height: 210px>
                <a href="trangchitietbaiviet.php?id='.$idbaiviet.'"><img src="'.$anhbaiviet.'" alt="Không tìm thấy ảnh" style="max-width: 300px; max-height: 180px"></a>
                <h4 class = "text-center"><a href="trangchitietbaiviet.php?mabaiviet='.$idbaiviet.'" class="mautuadechitiet">
                <b>'.$tenbaiviet.'</b></a></h4>
            </div>						
        </div>
        ';

    }

?>