<?php
    session_start();

    include 'db_connect.php';
    $orderID = $_SESSION['deleteOrderid'];
    unset($_SESSION['deleteOrderid']);
    $sql = "DELETE FROM Order_Product WHERE OrderID = '".$orderID."'
    DELETE FROM [Order] WHERE OrderID = '".$orderID."'";
    $query = sqlsrv_query($conn, $sql) or die("sql error".sqlsrv_errors());
    if(sqlsrv_rows_affected($query)>0){
        echo "<script>alert('Success!'); document.location='ord_delete.php';</script>";
    }else{
        echo "<script>alert('Error!'); document.location='ord_delete.php';</script>";
    }
    
?>