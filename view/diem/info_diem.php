
<html>
<head>
  <title>Thông tin điểm</title>
</head>

<body>
  <div id="main-body">
    <div id="main-function">
    </div>
    <div id="main-content">
    <?php
      if($data[0] != 0){
        echo '<br>';
        echo '<h2> Họ và tên: '.$data[0]['hotendem'].' '.$data[0]['ten'].'</h2>';
        echo '<br>';
        echo '<h3> Mã học sinh: '.$data[0]['mahs'].'</h3>';
        echo '<br>';
        echo '<h3> lớp: '.$data[0]['malop'].'</h3>';
        echo '<br>';
        echo '<h3> Năm: '.$data[0]["nam"].' '.'Học kì: '.' '.$data[0]["mahk"].'</h3>';
        echo '<br>';
      }
    ?>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Mã môn học</th>
            <th scope="col">Điểm miệng</th>
            <th scope="col">Điểm 15 phút</th>
            <th scope="col">Điểm 1 tiết</th>
            <th scope="col">Điểm học kỳ</th>
            <th scope="col">Điểm trung bình</th>
          </tr>
        </thead>
          <tbody>
              <?php
                if($data[0]== 0){
                  echo '<tr><th scope="row">Không có dữ liệu hiện thị</th></tr>';
                }
                else{
                  foreach($data as $value)
                  {
              ?>
              <tr>
                <th scope="row"><?php echo $value['tenmh'];?> </th>
                <th scope="row"><?php echo $value['diemmieng']; ?> </th>
                <th scope="row"><?php echo $value['diem15p']; ?> </th>
                <th scope="row"><?php echo $value['diem1tiet']; ?> </th>
                <th scope="row"><?php echo $value['diemhk']; ?> </th>
                <th scope="row"><?php echo $value['diemtb']; ?> </th>
              </tr>
              <?php
                    }
                  }
                ?>
          </tbody>
      </table>
      <table class="table">
        <thead>
            <tr>
              <th scope="col">Tổng kết</th>
              <th scope="col">Điểm trung bình học kì: <?php echo $tongket['diemtk'];?></th>
              <th scope="col">Xếp loại: <?php echo $tongket['xeploai'];?></th>
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


