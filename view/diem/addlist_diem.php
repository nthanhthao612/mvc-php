<?php
  if(isset($_POST['submit'])){
    if(isset($_FILES['excel']['name'])){
      {
        // echo '<h1>'.$file.'</h1>';
        // echo '<h1>'.$file.'</h1>';
        // echo '<h1>'.$file.'</h1>';
        // echo '<h1>'.$file.'</h1>';
        // $objReader = PHPExcel_IOFactory::createReaderForFile($file);
        // $objReader->setLoadSheetOnly('Sheet1');
        // $objExcel = $objReader->load($file);
        // $sheetData = $objExcel->getActiveSheet()->toArray('null',true,true,true,true);  
        // print_r($sheetData);
        $excel = SimpleXLSX::parse($_FILES['excel']['tmp_name']);
        echo '<h1>a</h1>';
        echo '<h1>a</h1>';
        echo '<h1>a</h1>';
        echo '<h1>a</h1>';
        // var_dump($excel);
        // echo '<pre>';print_r($excel->rows());
        foreach($excel->rows() as $value){
          echo $value[0];
          echo $value[1];
          echo $value[2];
        }
        for($i = 0;$i<count($excel->sheetNames());$i++){
          echo $excel->sheetNames()[$i];
        }
      }
    }
  }
?>
<html>
<head>
  <title>Danh sach</title>
</head>
<body>
  <div id="main-body">
    <div id="main-function"></div>
    <div id="edit-form" style="margin-top: 50px">
        <form action="" method="POST" enctype="multipart/form-data">
          <input type="file" name="excel">
          <button type="submit" name="submit">Submit</button>
        </form>
    </div>
  </div>
</body>
</html> 