<html>
<head>
  <title>Sửa điểm</title>
</head>
<body>
  <div id="main-body">
    <div id="main-function"></div>
    <div id="edit-form">
      <form action="" method="POST">
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Họ và tên đệm</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput2" value="<?php echo $data['hotendem'];?>" readonly>
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Tên</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput2" value="<?php echo $data['ten'];?>" readonly>
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Mã Học sinh</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput2" name="mahs" value="<?php echo $data['mahs'];?>" readonly>
          </div>
          <label for="mamh">Môn học</label>
          <select name="mamh" id="mamh">
          <?php
              echo '<option value="'.$data['mamh'].'">'.$data['tenmh'].'</option>';
          ?>
          </select>
          <br>
          <br>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Năm học</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput3" name="namhoc" value="<?php echo $data['namhoc'];?>" readonly>
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Học kì</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput3" name="mahk" value="<?php echo $data['mahk'];?>" readonly>
          </div>
          <div class="row">
            <div class="col">
              <label for="formGroupExampleInput2" class="form-label">Điểm miệng</label>
              <input type="text" class="form-control info-input-txb" id="formGroupExampleInput4" name="diemmieng" value="<?php echo $data['diemmieng'];?>">
            </div>
            <div class="col">
              <label for="formGroupExampleInput2" class="form-label">Điểm 15 phút</label>
              <input type="text" class="form-control info-input-txb" id="formGroupExampleInput5" name="diem15p" value="<?php echo $data['diem15p'];?>">
            </div>
            <div class="col">
              <label for="formGroupExampleInput2" class="form-label">Điểm 1 tiết </label>
              <input type="text" class="form-control info-input-txb" id="formGroupExampleInput6" name="diem1tiet" value="<?php echo $data['diem1tiet'];?>">
            </div>
            <div class="col">
              <label for="formGroupExampleInput2" class="form-label">Điểm thi học kỳ</label>
              <input type="text" class="form-control info-input-txb" id="formGroupExampleInput7" name="diemhk" value="<?php echo $data['diemhk'];?>">
            </div>
          </div>
          <button type="submit" class="btn btn-outline-primary" name="edit_diem">submit</button>
        </form>
    </div>
  </div>
</body>
</html>