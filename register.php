<?php
    session_start();
    include 'db_connect.php'
?>
<?php
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $postcode = $_POST['postcode'];
    $pwd = $_POST['pwd'];

    $sql = "INSERT INTO Customer VALUES ('$firstname','$lastname', '$phone', '$email', '$address', '$postcode', '$pwd')";
    $query = sqlsrv_query($conn, $sql) or die("sql error".sqlsrv_errors());
    if(sqlsrv_rows_affected($query)>0){
        echo "<script>alert('Success!'); document.location='index.php';</script>";
    }else{
        echo "<script>alert('Error!'); document.location='product.php';</script>";
    }
?>