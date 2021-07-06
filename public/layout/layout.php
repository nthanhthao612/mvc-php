<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav-bar">
        <button type="button" class="btn btn-primary" id="btn-menu-display"><i class="fas fa-bars"></i></button>
        <div class="container-fluid">
        <a class="navbar-brand" href="#">Quản lý học sinh</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
        <div class="logout-btn-area">
            <?php
                if($ss->checkLogin()== True){
                    echo '<a href="index.php?controller=logout" class="btn btn-primary">Logout</a>';
                }
                else{
                    echo '<a href="index.php?controller=login" class="btn btn-primary">Login</a>';
                }
                
            ?>
        </div>
    </nav>
    <div id="left-menu-area">
        <div class="left-menu-btn"><a href="index.php?controller=hoc-sinh&action=">Thông tin</a></div>
        <div class="left-menu-btn"><a href="index.php?controller=diem&action=">Điểm</a></div>
        <div class="left-menu-btn"><a href="index.php?controller=lop&action=" >Lớp</a></div>
        <div class="left-menu-btn"><a href="index.php?controller=giao-vien&action=">Giáo viên</a></div>
  </div>
</body>
</html>

