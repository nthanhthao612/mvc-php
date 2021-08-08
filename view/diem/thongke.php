<html>
<head>
  <title>Danh sách xếp loại theo lớp</title>
</head>

<body>
  <div id="main-body">
    <h1>Lớp: <?php echo $data[0]['malop'];?></h1>
    <h2>Năm học: <?php echo $data[0]['namhoc'];?></h2>
    <h2>Học kì: <?php echo $data[0]['mahk'];?></h2>
    <h2>Môn học: <?php echo $data1[0]['tenmh'];?></h2>
    <br>
    <?php
      if($ss->checkLogin()==TRUE){
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
        <div id="subject" class="search-form">
          <form action="" method="GET">
              <br>
              <input type="hidden" name="controller" value="diem">
              <input type="hidden" name="action" value="subject">
              <input type="hidden" name="malop" value="<?php echo $_GET['malop'];?>">
              <input type="hidden" name="mahk" value="<?php echo $_GET['mahk'];?>">
              <input type="hidden" name="namhoc" value="<?php echo $_GET['namhoc'];?>">
              <label for="mahk">Chọn Môn</label>
              <select name="mamh" id="mamh">
              <?php
                foreach($subject as $value){
                  echo '<option value="'.$value['mamh'].'">'.$value['tenmh'].'</option>';
                }
              ?>
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
            <input type="text" class="txt-input" name="search-value">
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
            <th scope="col">Họ và tên đệm</th>
            <th scope="col">Tên</th>
            <th scope="col">Điểm miệng</th>
            <th scope="col">Điểm 15 phút</th>
            <th scope="col">Điểm 1 tiết</th>
            <th scope="col">Điểm học kì</th>
            <th scope="col">Trung bình môn</th>
            <th scope="col">Chức năng</th>
          </tr>
        </thead>
        <tbody>
            <?php
              if($data1[0] == 0){
                echo '<tr><th scope="row">Không có dữ liệu hiện thị</th></tr>';
              }
              else{
                foreach($data1 as $value)
                {
            ?>
            <tr>
              <th scope="row"><?php echo $value['mahs'];?> </th>
              <th scope="row"><?php echo $value['hotendem']; ?> </th>
              <th scope="row"><?php echo $value['ten']; ?> </th>
              <th scope="row"><?php echo $value['diemmieng'];?></th>
              <th scope="row"><?php echo $value['diem15p'];?></th>
              <th scope="row"><?php echo $value['diem1tiet'];?></th>
              <th scope="row"><?php echo $value['diemhk'];?></th>
              <th scope="row"><?php echo $value['diemtb'];?></th>
              <td>
              <a href="index.php?controller=diem&action=edit&mahs=<?php echo $value['mahs'];?>&mamh=<?php echo $value['mamh'];?>&mahk=<?php echo $value['mahk'];?>&malop=<?php echo $value['malop'];?>&namhoc=<?php echo $value['namhoc'];?>" class="btn btn-primary">Sửa</a>
                    <a href="index.php?controller=diem&action=delete&mahs=<?php echo $value['mahs'];?>&mamh=<?php echo $value['mamh'];?>&mahk=<?php echo $value['mahk'];?>&malop=<?php echo $value['malop'];?>&namhoc=<?php echo $value['namhoc'];?>" class="btn btn-primary">Xóa</a>
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