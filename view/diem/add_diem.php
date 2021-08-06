<html>
<head>
  <title>Thêm Điểm</title>
</head>
<body>
  <div id="main-body">
    <div id="main-function"></div>
    <div id="edit-form">
      <form action="" method="POST">
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Năm học</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput3" name="namhoc">
          </div>
          <label for="hocki">Chọn học kì</label>
          <select name="mahk" id="hocki">
            <option value="1">học kì 1</option>
            <option value="2">học kì 2</option>
          </select>
          <br>
          <br>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Mã Học sinh</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput2" name="mahs" value="<?php if(isset($_GET['mahs'])){echo $_GET['mahs'];}else {echo '';}?>">
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
            <label for="formGroupExampleInput2" class="form-label">Mã giáo viên</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput3" name="magv">
          </div>
          <div class="row">
            <div class="col">
              <label for="formGroupExampleInput2" class="form-label">Điểm miệng</label>
              <input type="text" class="form-control info-input-txb" id="formGroupExampleInput4" name="diemmieng" >
            </div>
            <div class="col">
              <label for="formGroupExampleInput2" class="form-label">Điểm 15 phút</label>
              <input type="text" class="form-control info-input-txb" id="formGroupExampleInput5" name="diem15p" >
            </div>
            <div class="col">
              <label for="formGroupExampleInput2" class="form-label">Điểm 1 tiết </label>
              <input type="text" class="form-control info-input-txb" id="formGroupExampleInput6" name="diem1tiet" >
            </div>
            <div class="col">
              <label for="formGroupExampleInput2" class="form-label">Điểm thi học kỳ</label>
              <input type="text" class="form-control info-input-txb" id="formGroupExampleInput7" name="diemhk" >
            </div>
          </div>
          <button type="submit" class="btn btn-outline-primary" name="add_diem">submit</button>
        </form>
    </div>
  </div>
</body>
</html> 