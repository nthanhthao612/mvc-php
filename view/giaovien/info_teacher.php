<html>
<head>
  <title>Danh sach</title>
</head>

<body>
  <div id="main-body">
    <div id="main-function">
      <a href="index.php?controller=giao-vien&action=edit&magv=<?php echo $data['magv'];?>" class="btn btn-primary">Sửa</a>
      <?php
        if($ss->get('privilege')=='admin'){
          echo '<a href="index.php?controller=giao-vien&action=delete&magv=<?php echo '.$data['magv'].';?>" class="btn btn-primary">Xóa</a>';
        }
      ?>
    </div>
    <div id="main-content">
    <table class="table">
        <thead>
          <tr>
            <th scope="col"><h3>Họ và tên</h3></th>
            <th scope="row"><h2><?php echo $data['hotendemgv'].' '.$data['tengv'];?></th></h2>
          </tr>
          <tr>
            <th scope="col">Mã học sinh</th>
            <th scope="row"><h3><?php echo $data['magv'];?></th></h3>
          </tr>
          <tr>
            <th scope="col">Môn dạy</th>
            <th scope="row"><?php echo $data['tenmh'];?></th>
          </tr>
          <tr>
            <th scope="col">Năm vào dạy</th>
            <th scope="row"><?php echo $data['namgv'];?></th>
          </tr>
          <tr>
            <th scope="col">Giới tính</th>
            <th scope="row"><?php echo $data['gioitinh'];?></th>
          </tr>
          <tr>
            <th scope="col">Ngày sinh</th>
            <th scope="row"><?php echo $data['ngaysinh'];?></th>
          </tr>
          <tr>
            <th scope="col">Địa chỉ</th>
            <th scope="row"><?php echo $data['diachi'];?></th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
  <!--                            MAIN content                     -->
  <!--                            MAIN content                     -->
  <!--                            MAIN content                     -->
  <!--                            MAIN content                     -->
  
</body>

</html>