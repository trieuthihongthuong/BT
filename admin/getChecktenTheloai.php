<?php
    $q = $_REQUEST["p"];
    $hint = "";
    if($q != ""){
        $mysqli = mysqli_connect("us-cluster-east-01.k8s.cleardb.net", "bb736c65a3f5c3", "", "heroku_0dc7219a52593ef");
        $query = "SELECT tenTheLoai FROM tbltheloai where tenTheLoai='".$q."'";
        $query_run = mysqli_query($mysqli,$query);
        
        while($result = mysqli_fetch_array($query_run) ){
        
            if($q == $result['tenTheLoai']){
                $hint="Trùng tên thể loại!"; break;
            }else{
                $hint="";
            }
        
        }
        echo $hint;
            
    }  
?>