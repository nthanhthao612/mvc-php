<html>
<head>
  <title>Danh sach</title>
</head>

<body>
  <div id="main-body">
    <div id="main-function">
      <a href="index.php?controller=diem&action=add" class="btn btn-primary">Thêm</a>
      <div>
        <div id="filter-box" class="search-form">
          <form action="" method="GET">
              <input type="hidden" name="controller" value="diem">
              <input type="hidden" name="action" value="filter-detail">
              <input type="hidden" name="malop" value="<?php echo $_GET['malop'];?>">
              <input type="hidden" name="mahk" value="<?php echo $_GET['mahk'];?>">
              <label for="mahk">Chọn xếp loại</label>
              <select name="xeploai" id="xeploai">
                <option value="Giỏi">Giỏi</option>
                <option value="Khá">Khá</option>
                <option value="Trung Bình">Trung Bình</option>
                <option value="Chưa xếp loại">Chưa xếp loại</option>
              </select>
              <input type="submit" value="lọc" class="btn btn-primary">
          </form>
        </div>
        <div id="search-box" class="search-form">
          <form action="" method="GET" >

            <input type="hidden" name="controller" value="diem">
            <input type="hidden" name="action" value="search-detail">
            <input type="hidden" name="malop" value="<?php echo $_GET['malop'];?>">
            <input type="hidden" name="mahk" value="<?php echo $_GET['mahk'];?>">
            <input name="search-value">
            <button class="btn btn-primary" type='submit'">Search</button>
          </form>
        </div>
      </div>
    </div>
    <div id="main-content">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Mã học sinh</th>
            <th scope="col">Họ và tên  đệm</th>
            <th scope="col">Tên</th>
            <th scope="col">Lớp</th>
            <th scope="col">Xếp loại</th>
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
              <th scope="row"><?php echo $value['mahs'];?> </th>
              <th scope="row"><?php echo $value['hotendem']; ?> </th>
              <th scope="row"><?php echo $value['ten']; ?> </th>
              <th scope="row"><?php echo $value['malop']; ?> </th>
              <th scope="row"><?php echo $value['xeploai'];?></th>
              <td>
              <a href="index.php?controller=diem&action=info&mahs=<?php echo $value['mahs'];?>&mahk=<?php echo $_GET['mahk'];?>" class="btn btn-primary">Xem chi tiết điểm</a>
                  <a href="index.php?controller=hoc-sinh&action=info&mahs=<?php echo $value['mahs'];?>" class="btn btn-primary">Thông tin</a>
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