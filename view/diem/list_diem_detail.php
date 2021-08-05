<html>
<head>
  <title>Danh sách xếp loại theo lớp</title>
</head>

<body>
  <div id="main-body">
    <h1>Lớp: <?php echo $data[0]['malop'];?></h1>
    <h2>Năm học: <?php echo $data[0]['namhoc'];?></h2>
    <h2>Học kì: <?php echo $data[0]['mahk'];?></h2>
    <br>
    <?php
      if($ss->checkLogin()==TRUE){
        echo '<a href="index.php?controller=diem&action=add&malop='.$malop.'" class="btn btn-primary">Thêm</a>&emsp;';
        echo '<a href="index.php?controller=diem&action=add-list&malop='.$malop.'" class="btn btn-primary">Thêm với file Excel</a>';
      }
    ?>
    <br>
    <div id="main-function">
      <div>
        <div id="filter-box" class="search-form">
          <form action="" method="GET">
              <br>
              <input type="hidden" name="controller" value="diem">
              <input type="hidden" name="action" value="filter-detail">
              <input type="hidden" name="malop" value="<?php echo $_GET['malop'];?>">
              <input type="hidden" name="mahk" value="<?php echo $_GET['mahk'];?>">
              <input type="hidden" name="namhoc" value="<?php echo $_GET['namhoc'];?>">
              <label for="mahk">Chọn xếp loại</label>
              <select name="xeploai" id="xeploai">
                <option value="Giỏi">Giỏi</option>
                <option value="Khá">Khá</option>
                <option value="Trung Bình">Trung Bình</option>
                <option value="Chưa xếp loại">Chưa xếp loại</option>
              </select>
              <button class="btn btn-primary" type='submit' class="btn btn-primary"><i class='fas fa-filter'></i>&nbsp;&nbsp;Lọc</button>
          </form>
        </div>
        <div id="search-box" class="search-form">
          <form action="" method="GET" >
            <input type="hidden" name="controller" value="diem">
            <input type="hidden" name="action" value="search-detail">
            <input type="hidden" name="malop" value="<?php echo $_GET['malop'];?>">
            <input type="hidden" name="mahk" value="<?php echo $_GET['mahk'];?>">
            <input type="hidden" name="namhoc" value="<?php echo $_GET['namhoc'];?>">
            <input name="search-value">
            <button class="btn btn-primary" type='submit'"><i class="fas fa-search"></i>&nbsp;&nbsp;Tìm kiếm</button>
          </form>
          <br>
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
              <th scope="row"><?php echo $value['xeploai'];?></th>
              <td>
                  <a href="index.php?controller=diem&action=info&mahs=<?php echo $value['mahs'];?>&mahk=<?php echo $_GET['mahk'];?>&malop=<?php echo $_GET['malop'];?>&namhoc=<?php echo $_GET['namhoc'];?>" class="btn btn-primary">Xem chi tiết điểm</a>
                  <a href="index.php?controller=hoc-sinh&action=info&mahs=<?php echo $value['mahs'];?>&malop=<?php echo $_GET['malop'];?>" class="btn btn-primary">Thông tin</a>
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