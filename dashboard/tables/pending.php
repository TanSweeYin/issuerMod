<?php
$host ="localhost";
$user = "root";
$passw = "";
$db = "digitalid";
$conn = new mysqli($host,$user,$passw,$db);


if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    $ok = false;
}else{
    $sql = "select * from userapplication where applicationstatus ='Verifying' ";

    $result = mysqli_query($conn, $sql);
   // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $data = array();
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            /*$code_base64 = $row['image'] ;
            $code_base64 = str_replace('data:image/jpeg;base64,','',$code_base64);
            $row = base64_decode($code_base64);
           // $image= imagecreatefromstring($decode);
            if(!$image){
                die ('base 64 value is not a valid image');
            }
            else{
               // header('Content-Type: image/jpeg');                
               // imagejpeg($image);
               // imagedestroy($image);     
            }*/
            
            $data[] = $row;
        }
    //echo json_encode($data);
    //prevent empty data table error invalid json response.
    if(!empty($data)){
        echo json_encode($data);
    }else{
        echo json_encode(array('data'=>''));
    }
    }
?>