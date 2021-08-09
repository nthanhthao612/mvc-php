<html>
<head>
  <title>Sửa giáo viên bộ môn</title>
</head>
<body>
  <div id="main-body">
    <div id="main-function"></div>
    <div id="edit-form">
      <h3>Sửa giáo viên bộ môn cho lớp <?php echo $_GET['malop'];?></h3>
      <br>
      <form action="" method="post">
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Mã lớp</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput1" name="malop" value="<?php echo $_GET['malop'];?>" readonly>
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Tên giáo viên</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput2" name="" value="<?php echo $data['hotendemgv'].' '.$data['tengv'];?>" readonly>
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Mã giáo viên</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput2" name="magv" value="<?php echo $_GET['magv'];?>">
          </div>
          <label for="mamh">Môn dạy</label>
          <select name="mamh" id="mamh">
            <option value="<?php echo $data['mamh'];?>"><?php echo $data['tenmh'];?></option>
          </select>
          <br>
          <br>
          <button type="submit" class="btn btn-outline-primary" name="edit_subteacher">submit</button>
        </form>
    </div>
  </div>
</body>
</html>