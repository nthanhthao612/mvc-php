<html>
<head>
  <title>Danh sach</title>
</head>
<body>
  <div id="main-body">
    <div id="main-function"></div>
    <div id="add-form">
      <form action="" method="POST">
          <!-- <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Mã khối</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput1" name="makhoi" value="<?php echo $data['makhoi'];?>" readonly>
          </div> -->
          <br>
          <br>
          <label for="makhoi">Mã Khối</label>&nbsp;&nbsp;
          <select name="makhoi" id="makhoi" readonly>
            <option value="<?php echo $data['makhoi'];?>">Khối <?php echo $data['makhoi'];?></option>
          </select>
          <br>
          <br>
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Mã Lớp</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput1" name="malop" value="<?php echo $data['malop'];?>" readonly>
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Mã giáo viên</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput1" name="magv" value="<?php echo $data['magv'];?>" >
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Nhóm môn</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput2" name="manm" value="<?php echo $data['manm'];?>" readonly>
          </div>
          <button type="submit" class="btn btn-outline-primary" name="edit_lop">submit</button>
        </form>
    </div>
  </div>
</body>
</html>