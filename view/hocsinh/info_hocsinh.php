<html>
<head>
  <title>Danh sach</title>
</head>

<body>
  <div id="main-body">
    <div id="main-function">
      <a href="index.php?controller=hoc-sinh&action=edit&mahs=<?php echo $data['mahs'];?>" class="btn btn-primary">Sửa</a>
      <a href="index.php?controller=hoc-sinh&action=delete&mahs=<?php echo $data['mahs'];?>" class="btn btn-primary">Xóa</a>
    </div>
    <div id="main-content">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Mã học sinh</th>
            <th scope="col">Họ và tên đệm</th>
            <th scope="col">Tên</th>
            <th scope="col">Lớp</th>
            <th scope="col">Giới tính</th>
            <th scope="col">Ngày sinh</th>
            <th scope="col">Địa chỉ</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <th scope="row"><?php echo $data['mahs'];?></th>
              <td><?php echo $data['hotendem']; ?></td>
              <td><?php echo $data['ten']; ?></td>
              <td><?php echo $data['malop']; ?></td>
              <td><?php echo $data['gioitinh']; ?></td>
              <td><?php echo $data['ngaysinh']; ?></td>
              <td><?php echo $data['diachi']; ?></td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
  <!--                            MAIN content                     -->
  <!--                            MAIN content                     -->
  <!--                            MAIN content                     -->
  <!--                            MAIN content                     -->
  
</body>

</html>