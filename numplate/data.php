<?php
require_once('connection.php');
    // require_once('login.php');
    // if($sql1 == true){

    // $query = "SELECT * FROM tbl_masuk where nipy = '$nipy' ORDER BY time DESC";
    $query = "SELECT * FROM tbl_masuk ORDER BY time DESC";
    $sql   = mysqli_query($db_connect, $query);
    if($sql){

        $result = array();
        while ($row = mysqli_fetch_array($sql)){
            array_push($result,array(
                'nama' => $row['nama_pemilik'],
                'nomer_plat' => $row['nomer_plat'],
                'time' => $row ['time']
            ));
        }
        echo json_encode (array('history_masuk'=>$result));
    // }
}
?>