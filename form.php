<?php

include_once("conection.php");


?>

<?php
if (isset($_POST['search_data'])) {
    $search = $_POST['search'];
    $quary = "SELECT * FROM form WHERE id='$search'";
    $data = mysqli_query($conn, $quary);

    $result = mysqli_fetch_assoc($data);
    // $name=$result['emp_name'];
    // echo $name;


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style1.css" rel="stylesheet">
</head>

<body>
    <div class="center">
        <form action="#" method="post">
            <h1>Employee Data Entry Automatic Softwere</h1>
            <div class="form">
                <input type="text" class="textfield" placeholder="Search ID" name="search" value="<?php if (isset($_POST['search_data'])){echo $result['id'];} ?>">
                <input type="text" class="textfield" placeholder="Employee Name" name="emp_name"  value="<?php if (isset($_POST['search_data'])){echo $result['emp_name'];} ?>">
                <select name="gender" id="" class="textfield">
                    <Option value =" NoT Select Gender"> Select Gender</Option>
                    <Option value ="Male" 
                    <?php 

                    if(isset($result)){
                     if($result['emp_gender'] == 'Male' )
                    {
                    echo "selected";
                    }}
                    ?> 
                    >Male </Option>

                    <Option value="Female" <?php 
                     if(isset($result)){
                    if($result['emp_gender'] == 'Female' ){
                        echo "selected";}} ?> > Female </Option>
                    <Option value="others" <?php  if(isset($result)){ if($result['emp_gender'] == 'Others' ){
                        echo "selected";

                    } }?>> Others</Option>
                </select>
                <input type="text" class="textfield" placeholder="Email Address" name="email"  value="<?php if(isset($_POST['search_data'])){echo $result['emp_email'];}?>">
                <select name="dept" id="" class="textfield">
                    <Option value="Not Select Department"> Select Department </Option>
                    <Option value="IT" <?php  if(isset($result)){ if($result['emp_dept'] == 'IT' ){
                        echo "selected";}} ?>> IT</Option>
                    <Option value="Accounts" <?php   if(isset($result)){if($result['emp_dept'] == 'Accounts' ){
                        echo "selected";} }?>> Accounts</Option>
                    <Option value="HR" <?php  if(isset($result)){ if($result['emp_dept'] == 'HR' ){
                        echo "selected";}} ?>> HR</Option>
                    <Option value="Business Devlopment" <?php  if(isset($result)){ if($result['emp_dept'] == 'Business Devlopment' ){
                        echo "selected";} }?>> Business Devlopment</Option>
                    <Option value="Marketing" <?php  if(isset($result)){ if($result['emp_dept'] == 'Marketing' ){
                        echo "selected";}} ?>> Marketing</Option>
                </select>
                <textarea name="address" id="" placeholder="Address" class="textarea"><?php if(isset($_POST['search_data'])){
                    echo $result['emp_add'];
                } ?></textarea>
                <input type="submit" value="Search" name="search_data" class="btn"  style="background-color: #FA6775">
                <input type="submit" value="Save" name="save" class="btn" style="background-color:green">
                <input type="submit" value="Update" name="update" class="btn" style="background-color:orange">
                <input type="submit" value="Delete" name="delete" onclick="return checkbox()" class="btn" style="background-color:Red">
                <input type="reset" value="Clean" class="btn" style="background-color:blue">

            </div>
        </form>
    </div>
</body>

</html>
<script> 

    function checkbox(){
        return confirm ('Are You Sure Want To Delete');
    }
</script>
<?php

if (isset($_POST['save'])) {
    $name =    $_POST['emp_name'];
    $gender =  $_POST['gender'];
    $email =   $_POST['email'];
    $dept =    $_POST['dept'];
    $address = $_POST['address'];

    $query = "INSERT INTO form (emp_name,emp_gender,emp_email,emp_dept,	emp_add)
             VALUES ( '$name','$gender', '$email', '$dept','$address')";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script> alert(' Data Saved In to Database') </script>";
    } else {
       
        echo " <script> alert(' field to Saved In to Database') </script>";
    }
}
?>

<?php 
if(isset($_POST['delete'])){
    $id=$_POST['search'];
    $quary="DELETE  FROM form WHERE id='$id' ";
    $data=mysqli_query($conn,$quary);

    if($data){
        echo "Data Delete Succsefully";
    }else{
        echo "Data Not Delete";
    }

}


?>
<?php 

if(isset($_POST['update'])){
    $id =    $_POST['search'];
    $name =    $_POST['emp_name'];
    $gender =  $_POST['gender'];
    $email =   $_POST['email'];
    $dept =    $_POST['dept'];
    $address = $_POST['address'];

    $quary="UPDATE form SET emp_name='$name',emp_gender=' $gender',emp_email='$email',emp_dept='$dept',emp_add='$address' WHERE id='$id'";
    
   $data=mysqli_query($conn,$quary);
   if($data){
    echo "<script> alert(' Record Update In to Database') </script>";
} else {
   
    echo " <script> alert(' field to Update In to Database') </script>";
}



}

?>