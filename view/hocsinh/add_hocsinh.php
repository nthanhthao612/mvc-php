<html>
<head>
  <title>Danh sach</title>
</head>
<body>
  <div id="main-body">
    <div id="edit-form">
      <?php
        if(isset($_GET['malop']))
        {
          $malop = $_GET['malop'];
        }
      ?>
      <form action="" method="post">
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Họ và tên đệm</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput6" name="hotendem">
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Tên</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput1" name="ten">
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Mã lớp</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput2" value="<?php if(isset($malop)){echo $malop;}else {echo '';}?>" name="malop">
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Năm Vào học</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput3" name="nam">
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Giới tính</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput3" name="gioitinh">
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Ngày sinh</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput4" name="ngaysinh">
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput5" name="diachi">
          </div>
          <button type="submit" class="btn btn-outline-primary" name="add_hocsinh">submit</button>
        </form>
    </div>
  </div>
</body>
</html>