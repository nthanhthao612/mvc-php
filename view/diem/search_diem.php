<html>
<head>
  <title>Thống kê</title>
</head>
<body>
  <div id="main-body">  
    <div id="main-function">
      <div>
        <div id="filter-box" class="search-form">
          <form action="" method="GET">
              <input type="hidden" name="controller" value="diem">
              <input type="hidden" name="action" value="filter">
              <label for="makhoi">Chọn khối</label>
              <select name="makhoi" id="makhoi">
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>
              <label for="mahk">Chọn học kì</label>
              <select name="mahk" id="hocki">
                <option value="1">học kì 1</option>
                <option value="2">học kì 2</option>
              </select>
              <label for="nam">Năm học</label>
              <input type="text" name="namhoc" >
              <button class="btn btn-primary" type='submit' class="btn btn-primary"><i class='fas fa-filter'></i>&nbsp;&nbsp;Lọc</button>
          </form>
        </div>
        <div id="search-box" class="search-form">
          <form action="" method="GET" >
            <input type="hidden" name="controller" value="diem">
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
            <th scope="col">Sĩ số</th>
            <th scope="col">Năm học</th>
            <th scope="col">Học kì</th>
            <th scope="col">Giỏi</th>
            <th scope="col">Khá</th>
            <th scope="col">Trung bình</th>
            <th scope="col">Chưa xếp loại</th>
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
                    <th scope="row"><?php echo $value['malop']; ?></th>
                    <th scope="row"><?php echo $lop->countFigure($value['malop'])[0]; ?></th>
                    <th scope="row"><?php echo $value['namhoc']; ?></th>
                    <th scope="row"><?php echo $value['mahk']; ?></th>
                    <th scope="row"><?php echo $diem->countClassify($value['malop'],$value['mahk'],'Giỏi')[0];?></th>
                    <th scope="row"><?php echo $diem->countClassify($value['malop'],$value['mahk'],'Khá')[0];?></th>
                    <th scope="row"><?php echo $diem->countClassify($value['malop'],$value['mahk'],'Trung bình')[0];?></th>
                    <th scope="row"><?php echo $diem->countClassify($value['malop'],$value['mahk'],'Chưa xếp loại')[0];?></th>
                    <td>
                        <a href="index.php?controller=diem&action=list-detail&malop=<?php echo $value['malop'];?>&mahk=<?php echo $value['mahk'];?>&namhoc=<?php echo $value['namhoc'];?>" class="btn btn-primary">Xem danh sách</a>
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