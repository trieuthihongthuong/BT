<?php

    if (isset( $_GET['button']) && isset( $_GET['hovaten'])
    && isset( $_GET['matkhau']) && isset( $_GET['email']) && isset( $_GET['gioitinh']) ) {

    $hovaten = $_GET['hovaten'];
    $email = $_GET['email'];
    $matkhau = $_GET['matkhau'];
    $gioitinh = $_GET['gioitinh'];
    if ($gioitinh == 0)
    $gioitinh = 'nam';
    else $gioitinh = 'nữ';

    $conn = mysqli_connect("us-cluster-east-01.k8s.cleardb.net","bb736c65a3f5c3","e0b57694","heroku_0dc7219a52593ef");
    $sql = "select email,matkhau from tbltaikhoan";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
         if ( $matkhau == $row['matkhau'] && $email == $row['email']) {
                header('location: register.php?404');
            }
        }


    $conn = mysqli_connect('localhost','root','','webdb');
    $sql = "insert into tblthongtin
    VALUES ('$hovaten','$email','$gioitinh')";


    $conn->query($sql);

        
    $sql = "insert into tbltaikhoan
        VALUES ('$email','$matkhau','khachhang',0)";  

    if ($conn->query($sql) === TRUE) {
        header('location: register.php?hoanthanh');
    } else {
        header('location: register.php?thatbai');
    }

    $conn->close();

    }
?>