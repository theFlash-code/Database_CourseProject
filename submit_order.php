<?php
    session_start();
    include 'db_connect.php'
?>
<?php
    $ID = $_SESSION['id'];
    $orders = $_SESSION['orders'];
    $orderinfo = $_SESSION['orderinfo'];
    $date = date("Y-m-d");
    $shippedDate = date('m-d-Y',strtotime($date . "+3 days"));

    $insert_ord = "INSERT INTO [Order] VALUES ('".$orderinfo['packCount']."', '".$orderinfo['cost']."', '$date','$shippedDate', '$ID', '".$orderinfo['discount']."')";
    $insert_ord_qry = sqlsrv_query($conn, $insert_ord) or die("sql error".sqlsrv_errors());

    $sql = "SELECT * FROM Product";
    $query = sqlsrv_query($conn, $sql) or die("sql error".sqlsrv_errors());
    $i = 0;

    while($row = sqlsrv_fetch_array($query)){
        $i += 1;
        $quantity = $orders[$i-1];
        if($quantity > 0){
            $insert_detail = "INSERT INTO Order_Product VALUES
            ((SELECT MAX([Order].OrderID) FROM [Order]) , '$i', '$quantity')";
            $insert_det_qry = sqlsrv_query($conn, $insert_detail) or die("sql error".sqlsrv_errors());
        }
    }
    unset($_SESSION['orders']);
    unset($_SESSION['orderinfo']);
    if(sqlsrv_rows_affected($query)>0){
        echo "<script>alert('Success!'); document.location='index.php';</script>";
    }else{
        echo "<script>alert('Error!'); document.location='product.php';</script>";
    }
?>