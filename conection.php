<?php 

$Server="localhost";
$Username="root";
$Password="";
$Dbname="employee";

$conn=mysqli_connect($Server,$Username,$Password,$Dbname);

if($conn){
    // echo " Connect";
}
else{
    echo "Connect Field";
}

?>