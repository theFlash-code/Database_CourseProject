<?php
    session_start();
?>
<?php 
    include_once 'db_connect.php';
    //$con_query = sqlsrv_query($conn, )
    
    $srvName = "DESKTOP-AQMRNL0\SQLEXPRESS";
    $con = new PDO("sqlsrv:Server=$srvName ;Database=SELL_408530008", "CCU02", "1234");
    $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


    $sql = 'SELECT * FROM Staff WHERE StaffName = :uname';
    $stmt = $con->prepare($sql);
    
    $stmt->execute(['uname'=>$_POST['uname']]);

    $data = $stmt->fetchAll();
    $data_count = $stmt->rowCount();
    
    
    if($data_count > 0){
        $row = $data[0];
        $name = $_POST['uname'];
        if($_POST['pwd'] === $row->Password){
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['isStaff'] = TRUE;
            $_SESSION['name'] = $_POST['uname'];
            $_SESSION['id'] = $row->StaffID;
            echo 'Welcome '.$name.'!<br/>';
            echo "<script> alert('Login Success!'); document.location='index.php'</script>";
        }else{
            echo "<script> alert('Login failed! Incorrect name or password~'); document.location='index.php'</script>";
        }
    }else{
        echo "<script> alert('Login failed! Account does not exist!'); document.location='index.php'</script>";
    }
?>
