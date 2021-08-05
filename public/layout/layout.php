<!DOCTYPE html>
<html lang="en">
<head>   
</head>
<body>
    <nav id="nav">
        <div class="nav-bar-btn" id="menu-btn">
            <button type="button" class="btn btn-primary" id="btn-menu-display" class="nav-bar-btn"><i class="fas fa-bars"></i></button>
        </div>
        <div class="nav-bar-btn" id="banner">
            <a class="navbar-brand" href="#">Quản lý điểm học sinh</a>
        </div>
        <div class="nav-bar-btn" id="acc-area">
            <?php
                if($ss->checkLogin()== True){
                    $temp = $taikhoan->getInfoUser($ss->get('username'),$ss->get('privilege'));
                    echo "<span><b>Xin chào! ".$temp[2].'    '.$temp[0]."</b></span>";
                    echo '<span><a href="index.php?controller=logout" class="btn btn-primary"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a></span>';
                }
                else{
                    echo '<a href="index.php?controller=login" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Login</a>';
                }
                
            ?>
        </div>
    </nav>
    <div id="left-menu-area">
        <div class="left-menu-btn"><a href="index.php?controller=hoc-sinh&action="><i class="fas fa-address-card"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Học sinh</a></div>
        <div class="left-menu-btn"><a href="index.php?controller=diem&action="><i class="fas fa-book-open"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Điểm</a></div>
        <div class="left-menu-btn"><a href="index.php?controller=lop&action="><i class="fas fa-users"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lớp</a></div>
        <div class="left-menu-btn"><a href="index.php?controller=giao-vien&action="><i class="fas fa-user-tie"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Giáo viên</a></div>
  </div>
</body>
</html>

