
<?php
require_once('connection.php');
    $query = "SELECT 
    laporan_masuk.no_plat,
    date_format(laporan_masuk.waktu, '%d-%m-%Y') as tanggal,
    date_format(laporan_masuk.waktu, '%H:%i') as waktu_masuk,
    date_format(laporan_keluar.waktu, '%H:%i') as waktu_keluar 
    from laporan_masuk LEFT JOIN laporan_keluar 
    ON laporan_masuk.no_plat = laporan_keluar.no_plat
    ORDER BY laporan_masuk.waktu";
    $sql   = mysqli_query($db_connect, $query);
    if($sql){

        $result = array();
        while ($row = mysqli_fetch_array($sql)){
            array_push($result,array(
                'nomer_plat' => $row['no_plat'],
                'tanggal' => $row['tanggal'],
                'waktu_masuk' => $row ['waktu_masuk'],
                'waktu_keluar' => $row ['waktu_keluar']
            ));
        }
        echo json_encode (array('history_masuk'=>$result));
}
?>