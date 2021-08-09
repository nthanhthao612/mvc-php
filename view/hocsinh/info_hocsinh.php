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
      <br><br>
      <h5>Kết quả học tập</h5>
      <table class="table">
        <thead>
        <th scope="col">Năm học</th>
            <th scope="col">Học kì</th>
            <th scope="col">Điểm tổng kết</th>
            <th scope="col">Xếp loại</th>
            <th scope="col">Chức năng</th>
          <?php
            if(!isset($diem_tmp)){
              echo "Không có dữ liệu hiển thị";
            }
            else
              foreach($diem_tmp AS $value){
          ?>
              <tr>
              <th scope="row"><?php echo $value['namhoc'];?> </th>
              <th scope="row"><?php echo $value['mahk'];?> </th>
              <th scope="row"><?php echo $value['diemtk'];?> </th>
              <th scope="row"><?php echo $value['xeploai'];?> </th>
              <td>
                <a href="index.php?controller=diem&action=info&mahs=<?php echo $value['mahs'];?>&mahk=<?php echo $value['mahk'];?>&malop=&namhoc=<?php echo $value['namhoc'];?>" class="btn btn-primary">Xem chi tiết</a>
              </td>
            </tr>
          <?php
              }
          ?>
        </thead>
      </table>
    </div>
  </div>
</body>

</html>