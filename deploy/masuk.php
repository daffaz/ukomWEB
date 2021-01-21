<?php
include('koneksi.php');
$query = "SELECT tbl_kelurahan.nama AS 'kelurahan', count(*) as 'banyak' FROM tbl_pasien JOIN tbl_kelurahan ON tbl_pasien.id_kelurahan = tbl_kelurahan.id GROUP BY kelurahan";
$result = $koneksi->query($query);
$arrai = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $arrayItem = [];
        $arrayItem['label'] = $row['kelurahan'];
        $arrayItem['value'] = $row['banyak'];
        array_push($arrai, $arrayItem);
    }
}
$koneksi->close();
header('Content-type: application/json');
//output the return value of json encode using the echo function.
echo json_encode($arrai);
