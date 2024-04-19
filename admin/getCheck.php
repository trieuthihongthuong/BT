<?php
session_start();
$mysqli = new mysqli("us-cluster-east-01.k8s.cleardb.net", "bb736c65a3f5c3", "e0b57694", "heroku_0dc7219a52593ef");
if($mysqli->connect_error) {
  exit('Không thể kết nối với database!');
}

$sql = 'UPDATE tblhoadon SET TinhTrang="Đã hoàn thành" , Email_NhanVien="'.$_SESSION['email'].'" WHERE MaHD= ?';

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $_GET['q']);
$stmt->execute();

$stmt->close();

$mysqli->close();

?>