<html>
<head>
  <title>Danh sach</title>
</head>

<body>
  <div id="main-body">
    <div id="main-function">
      <a href="index.php?controller=lop&action=add" class="btn btn-primary">Thêm</a>
      <div>
        <div id="filter-box" class="search-form">
          <form action="" method="GET">
              <input type="hidden" name="controller" value="lop">
              <input type="hidden" name="action" value="filter">
              <label for="makhoi">Chọn khối</label>
              <select name="makhoi" id="makhoi">
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>
              <label for="manm">Chọn Nhóm môn</label>
              <select name="manm" id="manm">
                <option value="A">Tự Nhiên</option>
                <option value="D">Xã Hội</option>
              </select>
              <button class="btn btn-primary" type='submit' class="btn btn-primary"><i class='fas fa-filter'></i>&nbsp;&nbsp;Lọc</button>
          </form>
        </div>
        <div id="search-box" class="search-form">
          <form action="" method="GET" >
            <input type="hidden" name="controller" value="lop">
            <input type="hidden" name="action" value="search">
            <input type="text" class="txt-input" name="search-value">
            <button class="btn btn-primary" type='submit'"><i class="fas fa-search"></i>&nbsp;&nbsp;Tìm kiếm</button>
          </form>
        </div>
      </div>
    </div>
    <div id="main-content">
      <table class="table">
      <thead>
          <tr>
            <th scope="col">Khối</th>
            <th scope="col">Mã lớp</th>
            <th scope="col">Họ tên đệm </th>
            <th scope="col">Tên</th>
            <th scope="col">Nhóm môn</th>
            <th scope="col">Sĩ số</th>
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
              <th scope="row"><?php echo $value['makhoi'];?></th>
              <th scope="row"><?php echo $value['malop'];?></th>
              <th scope="row"><?php echo $value['hotendemgv'];?></th>
              <th scope="row"><?php echo $value['tengv']; ?></th>
              <th scope="row"><?php echo $value['tennm']; ?></th>
              <th scope="row"><?php echo $lop->countFigure($value['malop'])[0];?></th>
              <td>
                  <a href="index.php?controller=lop&action=edit&malop=<?php echo $value['malop'];?>" class="btn btn-primary">Sửa</a>
                  <a href="index.php?controller=lop&action=delete&malop=<?php echo $value['malop'];?>" class="btn btn-primary">Xóa</a>
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