<?php
    //session_start();
?>
<meta charset="utf-8">

<link rel="stylesheet" href="header.css">
<link rel="stylesheet" href="../reset.css">

<header class="header">
    <nav>
        <ul>
            <a href="index.php" class="logo">黑將軍</a>
            <li><a href="index.php">首頁</a></li>
            <li class="dropbtn">
                <?php if(isset($_SESSION['loggedin']) && isset($_SESSION['isStaff'])):?>
                  <a href="#">訂單</a>
                <?php elseif(isset($_SESSION['loggedin'])):?>
                  <a href="#">訂購</a>
                <?php else:?>
                  <a href="#">查詢</a>
                <?php endif;?>
                <ul class="dropdown-container">
                  <?php if(isset($_SESSION['loggedin']) && isset($_SESSION['isStaff'])):?>
                    <li><a href="ord_delete.php" class="lili">刪除訂單</a></li>
                    <li><a href="stats_ord.php" class="lili">訂單統計</a></li>
                    <li><a href="all_ord.php" class="lili">訂單總表</a></li>
                  <?php elseif(isset($_SESSION['loggedin'])):?>
                    <li><a href="product.php" class="lili">訂購表單</a></li>
                    <li><a href="myorder.php" class="lili">我的訂單</a></li>
                  <?php endif; ?>
                    <li><a href="order_search.php" class="lili">查詢訂單</a></li>
                  
                </ul>
            </li>
            <?php if(isset($_SESSION['loggedin']) && isset($_SESSION['isStaff'])):?>
              
              
              <li class="dropbtn">
                  <a href="#">客戶</a>
                  <ul class="dropdown-container" >
                      <li><a href="search_cust.php" class="lili">客戶資料</a></li>
                      <li><a href="cust_ord.php" class="lili">客戶訂單</a></li>
                      <li><a href="all_cust.php" class="lili">客戶總表</a></li>
                  </ul>
              </li>
              <li class="dropbtn">
                  <a href="#">員工</a>
                  <ul class="dropdown-container" >
                      <li><a href="add_staff.php" class="lili">新增員工</a></li>
                      <li><a href="del_staff.php" class="lili">刪除員工</a></li>
                      <li><a href="all_staff.php" class="lili">員工總表</a></li>
                  </ul>
              </li>
              <li class="dropbtn">
                  <a href="#">帳號</a>
                  <ul class="dropdown-container" >
                      <li><a href="alter_staff_search.php" class="lili">修改密碼</a></li>
                      <li><a href="logout.php" class="logout-btn">登出</a></button></li>
                  </ul>
              </li>
              
            <?php elseif(isset($_SESSION['loggedin'])): ?>
              <li class="dropbtn">
                  <a href="#">帳號</a>
                  <ul class="dropdown-container" >
                  <li><a href="alter_cust_search.php" class="lili">修改資料</a></li>
                      <li><a href="logout.php" class="logout-btn">登出</a></button></li>
                  </ul>
              </li>
            <?php
              else:
            ?>
              <li><a href="info.php">聯絡資訊</a></li>
                <li class="dropbtn">
                  <a href="#">登入</a>
                  <ul class="dropdown-container" >
                      <li><button onclick="document.getElementById('id02').style.display='block'" style="width:auto;" class="blue">客戶登入</button></li>
                      <li><button onclick="document.getElementById('id03').style.display='block'" style="width:auto;" class="blue">註冊帳號</button></li>
                      <li><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="green">員工登入</button></li>
                  </ul>
                </li>

              
            <?php
              endif;
            ?>
        </ul>
    </nav>
</header>
<div id="id01" class="modal">
  
    <form class="modal-content animate" action="login.php" method="post">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
  
      <div class="container">
        <label for="uname"><b>員工姓名</b></label>
        <input type="text" placeholder="Enter ID" name="uname" required>
  
        <label for="pwd"><b>密碼</b></label>
        <input type="password" placeholder="Enter password" name="pwd" required>
          
        <button type="submit">Login</button>
      </div>
  
      <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      </div>
    </form>
  </div>
  
  <div id="id02" class="modal">
  
    <form class="modal-content animate" action="cust-login.php" method="post">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
  
      <div class="container">
        <label for="email"><b>E-mail</b></label>
        <input type="text" placeholder="Enter E-mail" name="email" required>
  
        <label for="pwd"><b>密碼</b></label>
        <input type="password" placeholder="Enter password" name="pwd" required>
          
        <button type="submit">Login</button>
      </div>
  
      <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      </div>
    </form>
  </div>
  <div id="id03" class="modal">
  
    <form class="modal-content animate" action="register.php" method="post">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
  
      <div class="container">
        <label for="FirstName"><b>名字</b></label>
        <input type="text" placeholder="Enter First Name" name="fname" required>
        <label for="LastName"><b>姓氏</b></label>
        <input type="text" placeholder="Enter Last Name" name="lname" required>
        <label for="Phone"><b>手機</b></label>
        <input type="text" placeholder="Enter phone number" name="phone" required>
        <label for="email"><b>E-mail</b></label>
        <input type="text" placeholder="Enter ID" name="email" required>
        <label for="Address"><b>地址</b></label>
        <input type="text" placeholder="Enter Address" name="address" required>
        <label for="Postcode"><b>郵遞區號</b></label>
        <input type="text" placeholder="Enter postcode" name="postcode" required>
        <label for="pwd"><b>密碼</b></label>
        <input type="password" placeholder="Enter password" name="pwd" required>
          
        <button type="submit">送出</button>
      </div>
  
      <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
      </div>
    </form>
  </div>
  <script>
    // Get the modal
    var modal = document.getElementById('id03');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
  </script>
  <script>
    // Get the modal
    var modal = document.getElementById('id02');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
  </script>

  <script>
  // Get the modal
  var modal = document.getElementById('id01');
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
  </script>
  