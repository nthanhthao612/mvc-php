<html>
<head>
  <title>Danh sach</title>
</head>

<body>
  <div id="main-body">
    <div id="main-function">
      <a href="index.php?controller=giao-vien&action=edit&magv=<?php echo $data['magv'];?>" class="btn btn-primary">Sửa</a>
      <a href="index.php?controller=giao-vien&action=delete&magv=<?php echo $data['magv'];?>" class="btn btn-primary">Xóa</a>
    </div>
    <div id="main-content">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Mã giáo viên</th>
            <th scope="col">Họ và tên</th>
            <th scope="col">Môn dạy</th>
            <th scope="col">Năm vào</th>
            <th scope="col">Giới tính</th>
            <th scope="col">Ngày sinh</th>
            <th scope="col">Địa chỉ</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <th scope="row"><?php echo $data['magv'];?></th>
              <td><?php echo $data['hotendemgv'].' '.$data['tengv']; ?></td>
              <td><?php echo $data['tenmh']; ?></td>
              <td><?php echo $data['namgv']; ?></td>
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