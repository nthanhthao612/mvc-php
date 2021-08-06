<html>
<head>
  <title>Danh sach</title>
</head>
<body>
  <div id="main-body">
    <div id="main-function">
      
    </div>
    <div id="main-content">
    <h2>Lớp <?php echo $_GET['malop'];?></h2>
    <br>
    <h4>Sĩ số: <?php echo $lop->countFigure($_GET['malop'])[0];?></h4>
    <br>
    <h4>Giáo viên bộ môn</h4>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Môn dạy</th>
            <th scope="col">Giáo viên phụ trách</th>
            <th scope="col">Chức năng</th>
          </tr>
        </thead>
        <tbody>
            <?php
              if($data[0] == 0){
                echo '<tr><th scope="row">Không có dữ liệu hiện thị</th></tr>';
              }
              else{
                foreach($data as $value)
                {
            ?>
            <tr>
              <th scope="row"><?php echo $value['tenmh'];?></th>
              <?php
                if(!isset($value['hotendemgv']) AND !isset($value['tengv'])){
                  $value['hotendemgv'] = '';
                  $value['tengv'] = '';
                }
              ?>
              <th scope="row"><?php echo $value['hotendemgv']. " ".$value['tengv'];?></th>
              <td>
                  <a href="index.php?controller=lop&action=edit-subteacher&malop=<?php echo $value['malop'];?>&magv=<?php echo $value['magv'];?>&mamh=<?php echo $value['mamh'];?>" class="btn btn-primary">Sửa</a>
                  <a href="index.php?controller=giao-vien&action=info&magv=<?php echo $value['magv'];?>" class="btn btn-primary">Thông tin</a>
              </td>
            </tr>
            <?php
                  }
              }
              ?>
        </tbody>
      </table>

    </div>
  </div> 
</body>

</html>