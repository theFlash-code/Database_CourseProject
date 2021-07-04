<?php
    session_start();
    include 'db_connect.php'
?>
<?php
    $staffName = $_POST['sname'];
    $pwd = $_POST['pwd'];

    $sql = "INSERT INTO Staff VALUES ('$staffName', '$pwd')";
    $query = sqlsrv_query($conn, $sql) or die("sql error".sqlsrv_errors());
    if(sqlsrv_rows_affected($query)>0){
        echo "<script>alert('Success!'); document.location='index.php';</script>";
    }else{
        echo "<script>alert('Error!'); document.location='product.php';</script>";
    }
?>