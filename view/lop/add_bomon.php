<html>
<head>
  <title>Thêm giáo viên bộ môn cho lớp</title>
</head>
<body>
  <div id="main-body">
    <div id="main-function"></div>
    <div id="edit-form">
      <h3>Thêm giáo viên bộ môn cho lớp <?php echo $_GET['malop'];?></h3>
      <br>
      <form action="" method="post">
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Mã lớp</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput1" name="malop" value="<?php echo $_GET['malop'];?>">
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Mã giáo viên</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput2" name="magv">
          </div>
          <button type="submit" class="btn btn-outline-primary" name="add_subteacher">submit</button>
        </form>
    </div>
  </div>
</body>
</html>