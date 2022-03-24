<?php
    session_start();
    include 'db_connect.php'
?>
<?php
    $id = $_SESSION['id'];
    $sname = $_SESSION['name'];
    $pwd = $_POST['pwd'];

    $sql = "UPDATE Staff SET
    StaffName = '$sname',
    Password = '$pwd'
    WHERE StaffID = '$id'
    ";
    $query = sqlsrv_query($conn, $sql) or die("sql error".sqlsrv_errors());
    if(sqlsrv_rows_affected($query)){
        echo "<script>alert('Success!'); </script>";
    }else{
        echo "<script>alert('Error!'); document.location='alter_cust_search.php';</script>";
    }
?>

<!DOCTYPE html>
<html>
    <header>
        <meta charset="utf-8">
        <title>黑將軍饅頭</title>
        
        <style><?php include 'footer/footer.css'; ?></style>
        <link rel="stylesheet" href="data_table.css">
        <style><?php include 'header/solid_header.css'; ?></style>
        <link rel="stylesheet" href="reset.css">
        <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Kanit:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
        
    </header>
    
    <body>
        <?php include 'header/header.php'; ?>
        <main>
            <div class="search">
                <form class="modal-content animate" >
                    <?php
                        $id = $_SESSION['id'];
                        $sql = "SELECT * FROM Staff WHERE StaffID = '$id'";
                        $query = sqlsrv_query($conn, $sql) or die ("sql error".sqlsrv_errors());
                        while($row=sqlsrv_fetch_array($query)):
                    ?>
                    
                    
                    <div class="container">
                        <div style="font-size: 20px; line-height: 10px;">
                            <h3>修改成功!</h3><br><br>
                        </div>
                        <label for="StaffName" style="font-size: 20px"><b>名字: <?php echo $row['StaffName']; ?></b></label><br><br>
                        <label for="pwd"><b>密碼</b></label>
                        <label><?php echo $row['Password']; ?></label><br><br>
                        
                    </div>
                    
                    <?php endwhile;?>
                </form>
                
            </div>
        </main>
        <?php include 'footer/footer.html'; ?> 

    </body>