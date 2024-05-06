<?php 

$pc_min_width = 480;
$base_size_w = 480;
$base_size_h = 360;

?>
<!DOCTYPE html>
<html>
<head>
<meta content="width=device-width initial-scale=1.0 minimum-scale=1.0 maximum-scale=1.0 user-scalable=no" name="viewport">
<title>Camera Test</title>

<!-- 外部ライブラリ参照  -->
<?php require_once("header-lib.html") ?>

<!-- レスポンシブ定義 -->
<style>
<?php require_once("header-style-responsive.css") ?>
</style>

<script>
// グローバル定義
<?php require_once("header-script.js") ?>

// jQuery のイベント定義
$(function(){

<?php require_once("header-jquery.js") ?>

});

// 関数定義
<?php require_once("header-function.js") ?>
</script>

</head>
<body>
<h1 class="alert alert-primary">コピーと保存<input id="copy" type="button" value="copy" class="btn btn-primary ms-4"><input id="save" type="button" value="保存" class="btn btn-primary ms-1"></h1>
  
<div id="main" class="m-4">

  <video id="camera" autoplay playsinline></video>
  <canvas id="canvas" width="<?= $base_size_w ?>" height="<?= $base_size_h ?>"></canvas>
  
</div>

<div id="qrcode"></div>
</body>
</html>

<?//php phpinfo() ?>