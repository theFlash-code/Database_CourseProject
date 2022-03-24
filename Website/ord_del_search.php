<?php
    session_start();
?>
<?php
    include 'db_connect.php';
    $orderID = $_POST['orderID'];
    $sql = "SELECT FirstName, LastName, [Order].OrderID FROM Customer
    JOIN [Order] on Customer.CustomerID = [Order].CustomerID
    WHERE [Order].OrderID = '".$orderID."'";
    $query = sqlsrv_query($conn, $sql) or die("sql error".sqlsrv_errors());
    $row = sqlsrv_fetch_array($query);
    $Name = $row['FirstName'].$row['LastName'];
    $Orderid = $row['OrderID'];
    $_SESSION['deleteOrderid'] = $orderID;
    echo "<script>
            let del = confirm('確定要刪除 $Name 的訂單$Orderid 資料嗎?');
            if(del){
                document.location='ord_del_action.php';
            }else{
                document.location='ord_delete.php';
            }
        </script>";
    
        echo
        "訂單編碼: ".$row['OrderID']." ".
        "姓名: ".$row['FirstName']." ".$row['LastName']." "
        ;
?>