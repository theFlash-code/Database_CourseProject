<?php
    session_start();
    include 'db_connect.php';

    $staffID = $_SESSION['deleteStaffid'];
    unset($_SESSION['deleteStaffid']);
    $sql = "DELETE FROM Staff WHERE StaffID = '".$staffID."'";
    $query = sqlsrv_query($conn, $sql) or die("sql error".sqlsrv_errors());
    if(sqlsrv_rows_affected($query)>0){
        echo "<script>alert('Success!'); document.location='del_staff.php';</script>";
    }else{
        echo "<script>alert('Error!'); document.location='del_staff.php';</script>";
    }
    
?>