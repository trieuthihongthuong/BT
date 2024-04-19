<?php
    $q = $_REQUEST["q"];
    $hint = "";
    if($q != ""){
        $mysqli = mysqli_connect("us-cluster-east-01.k8s.cleardb.net", "bb736c65a3f5c3", "", "heroku_0dc7219a52593ef");
        $query = "SELECT Email FROM tbltaikhoan where email='".$q."'";
        $query_run = mysqli_query($mysqli,$query);
        
            if(mysqli_num_rows($query_run) == 0){
                $hint="Tài khoản không tồn tài";
            }
            else
            {
                $hint="";
            }
        echo $hint;
            
    }
    
?>