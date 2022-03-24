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
                <form class="modal-content animate" action="alter_cust_action.php" method="post">
                    <?php
                        $id = $_SESSION['id'];
                        $sql = "SELECT * FROM Customer WHERE CustomerID = '$id'";
                        $query = sqlsrv_query($conn, $sql) or die ("sql error".sqlsrv_errors());
                        while($row=sqlsrv_fetch_array($query)):
                    ?>
                    <div class="container">
                        <label for="FirstName"><b>名字</b></label>
                        <input type="text" placeholder="Enter First Name" name="fname" required value="<?php echo $row['FirstName']?>">
                        <label for="LastName"><b>姓氏</b></label>
                        <input type="text" placeholder="Enter Last Name" name="lname" required value="<?php echo $row['LastName']?>">
                        <label for="Phone"><b>手機</b></label>
                        <input type="text" placeholder="Enter phone number" name="phone" required value="<?php echo $row['Phone']?>">
                        <label for="email"><b>E-mail</b></label>
                        <input type="text" placeholder="Enter ID" name="email" required value="<?php echo $row['Email']?>">
                        <label for="Address"><b>地址</b></label>
                        <input type="text" placeholder="Enter Address" name="address" required value="<?php echo $row['Address']?>">
                        <label for="Postcode"><b>郵遞區號</b></label>
                        <input type="text" placeholder="Enter postcode" name="postcode" required value="<?php echo $row['Postcode']?>">
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
