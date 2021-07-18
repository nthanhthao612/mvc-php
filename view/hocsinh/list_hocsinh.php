<html>
<head>
  <title>Danh sach</title>
</head>

<body>
  <div id="main-body">
    <div id="main-function">
      <?php
        $malop = '';
        if(isset($_GET['malop']))
        {
          $malop = $_GET['malop'];
        }
        if($ss->checkLogin()){
          echo "<a href='index.php?controller=hoc-sinh&action=add&malop='".$malop." class='btn btn-primary'>Thêm</a>";
        }
      ?>
      <div>
        <div id="filter-box" class="search-form">
          <form action="" method="GET">
              <input type="hidden" name="controller" value="hoc-sinh">
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
              <input type="submit" value="lọc" class="btn btn-primary">
          </form>
        </div>
        <div id="search-box" class="search-form">
          <form action="" method="GET" >
            <input type="hidden" name="controller" value="hoc-sinh">
            <input type="hidden" name="action" value="search">
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
            <th scope="col">Họ và tên đệm</th>
            <th scope="col">Tên</th>
            <th scope="col">Lớp</th>
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
              <th scope="row"><?php echo $value['hotendem'];?> </th>
              <th scope="row"><?php echo $value['ten'];?> </th>
              <th scope="row"><?php echo $value['malop'];?> </th>
              <td>
                  <a href="index.php?controller=hoc-sinh&action=info&mahs=<?php echo $value['mahs'];?>" class="btn btn-primary">Xem</a>
                  <a href="index.php?controller=hoc-sinh&action=edit&mahs=<?php echo $value['mahs'];?>" class="btn btn-primary">Sửa</a>
                  <a href="index.php?controller=hoc-sinh&action=delete&mahs=<?php echo $value['mahs'];?>&malop=<?php echo $value['malop'];?>" class="btn btn-primary">Xóa</a>
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