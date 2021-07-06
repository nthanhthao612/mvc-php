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
            <label for="formGroupExampleInput" class="form-label">Họ và tên đệm</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput6" name="hotendemgv" value="<?php echo $data['hotendemgv'];?>">
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Tên</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput1" name="tengv" value="<?php echo $data['tengv'];?>">
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Mã giáo viên</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput1" name="magv" value="<?php echo $data['magv'];?>" readonly>
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Mật khẩu</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput2" name="matkhau" value="<?php echo $data['matkhau'];?>">
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Mã môn</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput3" name="mamh" value="<?php echo $data['mamh'];?>">
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Năm vào trường</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput3" name="namgv" value="<?php echo $data['namgv'];?>">
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Giới tính</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput3" name="gioitinh" value="<?php echo $data['gioitinh'];?>">
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Ngày sinh</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput4" name="ngaysinh" value="<?php echo $data['ngaysinh'];?>">
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput5" name="diachi" value="<?php echo $data['diachi'];?>">
          </div>
          <button type="submit" class="btn btn-outline-primary" name="edit_teacher">submit</button>
        </form>
    </div>
  </div>
</body>
</html>