<html>
<head>
  <title>Danh sach</title>
</head>
<body>
  <div id="main-body">
    <div id="main-function"></div>
    <div id="edit-form">
      <form action="" method="post">
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Họ và tên đệm</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput6" name="hotendemgv">
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Tên</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput1" name="tengv">
          </div>
          <label for="mamh">Môn học</label>
          <select name="mamh" id="mamh">
          <?php
            foreach($subject AS $value){
              echo '<option value="'.$value['mamh'].'">'.$value['tenmh'].'</option>';
            }
          ?>
          </select>
          <br>
          <br>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Năm vào trường</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput3" name="namgv">
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Giới tính</label>
            <br>
            <input type="radio" name="gioitinh" id="male" value="1">
            <label for="male">Nam</label>
            <br>
            <input type="radio" name="gioitinh" id="female" value="0">
            <label for="female">Nữ</label>
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control info-input-txb" id="formGroupExampleInput4" name="ngaysinh">
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput5" name="diachi">
          </div>
          <button type="submit" class="btn btn-outline-primary" name="add_teacher">submit</button>
        </form>
    </div>
  </div>
</body>
</html>