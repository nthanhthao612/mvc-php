<html>
<head>
  <title>Danh sach</title>
</head>
<body>
  <div id="main-body">
    <div id="main-function"></div>
    <div id="edit-form">
      <form action="" method="post">
          <br>
          <br>
          <label for="manm">Nhóm môn</label>
          <select name="manm" id="manm">
            <option value="A">Tự nhiên</option>
            <option value="D">Xã hội</option>
          </select>
          <br>
          <br>
          <label for="makhoi">Mã Khối</label>&nbsp;&nbsp;
          <select name="makhoi" id="makhoi">
            <option value="10">Khối 10</option>
            <option value="11">Khối 11</option>
            <option value="12">Khối 12</option>
          </select>
          <br>
          <br>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Mã lớp</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput2" name="malop">
          </div>
          <div class="mb-3 ">
            <label for="formGroupExampleInput2" class="form-label">Mã giáo viên</label>
            <input type="text" class="form-control info-input-txb" id="formGroupExampleInput2" name="magv">
          </div>
          
          <button type="submit" class="btn btn-outline-primary" name="add_lop">submit</button>
        </form>
    </div>
  </div>
</body>
</html>