<html>
<head>
  <title>Danh sach</title>
</head>
<body>
  <div id="main-body">
    <div id="main-function"></div>
    <div id="add-form">
      <form action="" method="POST">
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Mã học sinh</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput1" name="mahs" value="<?php echo $data['mahs'];?>" readonly>
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Họ và tên đệm</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput1" name="hotendem" value="<?php echo $data['hotendem'];?>" >
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Tên</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput1" name="ten" value="<?php echo $data['ten'];?>" >
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Mã lớp</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput2" name="malop" value="<?php echo $data['malop'];?>">
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Giới tính</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput3" name="gioitinh" value="<?php echo $data['gioitinh'];?>">
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Năm vào học</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput3" name="gioitinh" value="<?php echo $data['nam'];?>" readonly>
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Ngày sinh</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput4" name="ngaysinh" value="<?php echo $data['ngaysinh'];?>">
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput5" name="diachi" value="<?php echo $data['diachi'];?>">
          </div>
          <button type="submit" class="btn btn-outline-primary" name="edit_hocsinh">submit</button>
        </form>
    </div>
  </div>
</body>
</html>