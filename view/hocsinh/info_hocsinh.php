<html>
<head>
  <title>Thông tin</title>
</head>

<body>
  <div id="main-body">
    <div id="main-function">
      <a href="index.php?controller=hoc-sinh&action=edit&mahs=<?php echo $data['mahs'];?>" class="btn btn-primary">Sửa</a>
      <!-- <a href="index.php?controller=hoc-sinh&action=delete&mahs=<?php echo $data['mahs'];?>&malop=<?php echo $data['malop'];?>" class="btn btn-primary">Xóa</a> -->
    </div>
    <div id="main-content">
    <table class="table">
        <thead>
          <tr>
            <th scope="col"><h2>Họ và tên</h2></th>
            <th scope="row"><h2><?php echo $data['hotendem'].' '.$data['ten'];?></h2></th>
          </tr>
          <tr>
            <th scope="col"><h3>Mã học sinh</h3></th>
            <th scope="row"><h3><?php echo $data['mahs'];?></h3></th>
          </tr>
          <tr>
            <th scope="col">Lớp</th>
            <th scope="row"><?php echo $data['malop'];?></th>
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