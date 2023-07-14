<?php
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$resource = array_shift($request);

switch ($resource) {
    case 'getdata':
        $id = $_GET['id'];

        //disini bisa dilakukan query ke database untuk mencari data $id

        if ($id == '1') {
            $misal_array_hasil_dari_database = array('nama' => 'joko', 'alamat' => 'magetan', 'nohp' => '788666');

            $respon = array('status' => true, 'message' => 'Data ditemukan', 'data' => $misal_array_hasil_dari_database);
            http_response_code(200);
        }else{
            $respon = array('status' => false, 'message' => 'Data tidak ditemukan', 'data' => $nama);
            http_response_code(404);
        }

        echo json_encode($respon);
    break;
    
    case 'insertdata':
        $id = $_POST['id'];
        $nama = $_POST['nama'];

        //disini bisa dilakukan query insert ke database

        $data = array('id' => $id, 'nama' => $nama);

        if ($id !== '') {
            $respon = array('status' => true, 'message' => 'Berhasil insert data', 'data' => $data);
            http_response_code(200);
        }else{
            $respon = array('status' => false, 'message' => 'Gagal insert data', 'data' => $data);
            http_response_code(404);
        }

        echo json_encode($respon);
    break;
    
    default:
        $respon = array('status' => false, 'message' => 'page not found');
        http_response_code(404);
        echo json_encode($respon);
    break;
}

?>
