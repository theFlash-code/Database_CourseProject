<?php
    session_start();
    include 'db_connect.php';
?>
<?php
    $staffID = $_POST['staffID'];
    $sql = "SELECT * FROM Staff WHERE StaffID = '".$staffID."'";
    $query = sqlsrv_query($conn, $sql) or die("sql error".sqlsrv_errors());
    $row = sqlsrv_fetch_array($query);
    $Name = $row['StaffName'];
    $_SESSION['deleteStaffid'] = $staffID;
    if($row){
        echo "<script>
                let del = confirm('確定要刪除編號$staffID , $Name 的資料嗎?');
                if(del){
                    document.location='del_staff_action.php';
                }else{
                    document.location='del_staff.php';
                }
            </script>";
    }else{
        echo "<script> alert('Error!'); document.location='del_staff.php';</script>";
    }
    
?>