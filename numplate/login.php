<?php

    //tangkap data yang dikirim dari android
    require_once('connection.php');
    $nipy = $_POST["post_nipy"];
    $password = $_POST["post_password"];

    //proses periksa nipy dan password di database
    $query = "SELECT * FROM akun where nipy = '$nipy' AND password = '$password'";
    $sql1   = mysqli_query($db_connect, $query);
    $data = mysqli_fetch_assoc($sql1);



    // if($sql1 == true){
    //     echo json_encode(array('logged in'));
    // }


    if($data){
        echo json_encode(
            array(
                'response' => true,
                'data' => array(
                    "nipy" => $data["nipy"],
                    "nama" => $data["nama"],
                    "no_plat" => $data["no_plat"]
                )
            )   
        );
    }else{
        echo json_encode(
            array(
                'response' => false,
                'data' => null
            )
        );
    }
    header('Content-Type: application/json')

?>