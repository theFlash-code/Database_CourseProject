<?php
    session_start();
    include 'db_connect.php';
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
                <form class="modal-content animate" action="alter_staff_action.php" method="post">
                    <?php
                        $id = $_SESSION['id'];
                        $sql = "SELECT * FROM Staff WHERE StaffID = '$id'";
                        $query = sqlsrv_query($conn, $sql) or die ("sql error".sqlsrv_errors());
                        while($row=sqlsrv_fetch_array($query)):
                    ?>
                    <div class="container">
                        <label for="StaffName" style="font-size: 20px"><b>名字: <?php echo $row['StaffName']?></b></label><br><br><br>
                        <label for="pwd"><b>密碼</b></label>
                        <input type="text" placeholder="Enter password" name="pwd" required value="<?php echo $row['Password']?>">
                        
                        <button type="submit">送出</button>
                    </div>
                        
                    
                    <?php endwhile;?>
                </form>
            </div>
        </main>
        <?php include 'footer/footer.html'; ?> 

    </body>
