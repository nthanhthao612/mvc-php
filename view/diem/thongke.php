<html>
<head>
  <title>Danh sách</title>
</head>

<body>
  <div id="main-body">
    <div id="main-function">
      <h2>Thống kê theo xếp loại</h2>
      <form action="" method="get">
        <input type="hidden" name="action" value="statistic">
        <label for="makhoi">Khối</label>
        <select name="makhoi" id="makhoi">
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="0">Tất cả</option>
        </select>
        &nbsp;
        &nbsp;
        <label for="namhoc">Năm học</label>
        <input type="text" name="namhoc" id="namhoc">
        &nbsp;
        &nbsp;
        <label for="mahk">Học kì</label>
        <select name="mahk" id="mahk">
          <option value="1">1</option>
          <option value="2">2</option>
        </select>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="view-statistic-classify" value="Thống kê" class='btn btn-primary'>
      </form>
      <h2>Lựa chọn</h2>
      <form action="" method="get">
        <input type="hidden" name="action" value="statistic">
        <input type="hidden" name="action" value="statistic">
        <label for="makhoi">Khối</label>
        <select name="makhoi" id="makhoi">
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="0">Tất cả</option>
        </select>
        &nbsp;
        &nbsp;
        <label for="namhoc">Năm học</label>
        <input type="text" name="namhoc" id="namhoc">
        &nbsp;
        &nbsp;
        <label for="mahk">Học kì</label>
        <select name="mahk" id="mahk">
          <option value="1">1</option>
          <option value="2">2</option>
        </select>
        &nbsp;
        &nbsp;
        <input type="radio" name="minmax" id="minmax" value="min">
        <label for="minmax">Điểm TB cao nhất</label>
        <input type="radio" name="minmax" id="minmax" value="min">
        <label for="minmax">Điểm TB thấp nhất</label>
        &nbsp;
        &nbsp;
        <input type="submit" name="view-min-max" value="Tìm kiếm" class='btn btn-primary'>
      </form>
    </div>
    <?php
      if(isset($data1) AND $data1[0] != 0){
        echo "Xếp loại:      Số lượng";
        foreach($data1 as $value){
          echo $data1[0].'    '.$data1[2];
        }
      }
    ?>
  </div>
</body>
</html>