<html>
<head>
  <title>Danh sach</title>
</head>

<body>
  <div id="main-body">
    <div id="main-function">
      <?php
        if($ss->get('username')=='admin'){
          echo '<a href="index.php?controller=giao-vien&action=add" class="btn btn-primary">Thêm</a>';
        }
      ?>
      <div>
        <div id="filter-box" class="search-form">
        <form action="" method="GET">
              <input type="hidden" name="controller" value="giao-vien">
              <input type="hidden" name="action" value="filter">
              <label for="makhoi">Năm vào</label>
              <input type="text" name="namgv" id="namgv">
              <label for="manm">Chọn Nhóm môn</label>
              <select name="manm" id="manm">
                <option value="A">Tự Nhiên</option>
                <option value="D">Xã Hội</option>
                <option value="T">Tự chọn</option>
                <option value="">-None-</option>
              </select>
              <button class="btn btn-primary" type='submit' class="btn btn-primary"><i class='fas fa-filter'></i>&nbsp;&nbsp;Lọc</button>
          </form>
        </div>
        <div id="search-box" class="search-form">
          <form action="" method="GET" >
            <input type="hidden" name="controller" value="giao-vien">
            <input type="hidden" name="action" value="search">
            <input type="text" class="txt-input" name="search-value" value="">
            <button class="btn btn-primary" type="submit" ><i class="fas fa-search"></i>&nbsp;&nbsp;Tìm kiếm</button>
          </form>
        </div>
      </div>
    </div>
    <div id="main-content">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Mã giáo viên</th>
            <th scope="col">Họ và tên Đệm</th>
            <th scope="col">Tên</th>
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
              <th scope="row"><?php echo $value['magv'];?> </th>
              <th scope="row"><?php echo $value['hotendemgv'].' '.$value['tengv'];?> </th>
              <th scope="row"><?php echo $value['tenmh'];?> </th>
              <td>
                  <a href="index.php?controller=giao-vien&action=info&magv=<?php echo $value['magv'];?>" class="btn btn-primary">Xem</a>
                  <a href="index.php?controller=giao-vien&action=delete&magv=<?php echo $value['magv'];?>" class="btn btn-primary">Xóa</a>
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