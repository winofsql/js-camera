<?php 


?>
<!DOCTYPE html>
<html>
<head>
<meta content="width=device-width initial-scale=1.0 minimum-scale=1.0 maximum-scale=1.0 user-scalable=no" name="viewport">
<title>Camera Test</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js"></script>
<style>

#camera {
  border: 1px solid #000000;
}
  
/* PC */
@media screen and ( min-width:480px ) {
  #camera {
    width: 480px;
    height: 360px
  }
  #qrcode {
    display: block;
  }
}
/* スマホ */
@media screen and ( max-width:479px ) {
  #camera {
    width: 100%;
  }
  #qrcode {
    display: none;
  }
}
</style>
<script>
// *************************************
// 簡易スマホチェック
// *************************************
jQuery.isMobile = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));
toastr.options={"closeButton":false,"debug":false,"newestOnTop":false,"progressBar":false,"positionClass":"toast-bottom-center","preventDuplicates":false,"onclick":null,"showDuration":"300","hideDuration":"1000","timeOut":"3000","extendedTimeOut":"1000","showEasing":"swing","hideEasing":"linear","showMethod":"fadeIn","hideMethod":"fadeOut"};
if ( !$.isMobile ) {
  toastr.options.positionClass = "toast-top-center";
}
// *************************************
// カメラ用変数
// *************************************
// カメラ用 video 要素(DOM オブジェクト)
var camera;

// スマホフロントカメラ用
var options_front = {
  audio: true,
  video: { 
    facingMode: "user" 
  }
};

// スマホ背面カメラ用
var options_back = {
  audio: true,
  video: { 
    facingMode: "environment"
  }
};
  
$(function(){

  // DOM オブジェクト
  camera = $("#camera").get(0);

  // 背面カメラ開始
  startCamera( options_back );

  // **************************************
  // このページ自身の QRコードの表示
  // **************************************
  $('#qrcode')
    .css({ "margin" : "20px 20px 20px 20px" })
    .qrcode({width: 160,height: 160,text: location.href });

});


// *************************************
// カメラ参照
// *************************************
function startCamera( options ) {

  // カメラ表示
  navigator.mediaDevices.getUserMedia(options)
  .then(function(stream){
    // カメラのストリームを表示
    camera.srcObject = stream;
    console.dir("ストリーム開始");
  })
  .catch(function(err){
    // ブラウザで使用を拒否した場合等( 動画で代替 )
    errorVideo();
  });

}

// *************************************
// 動画で代替
// *************************************
function errorVideo() {

  toastr.error( "WebRTC を使用できません");

  $("#camera")
    .prop({ 
      "loop" : true, "muted" : true, "controls" : true,
      "src" : "TriggerRally.mp4"
    });

}
</script>
</head>
<body>
<h1 class="alert alert-primary">カメラの表示( 無い場合は動画 )</h1>
  
<div id="main" class="m-4">

  <video id="camera" autoplay playsinline></video>

</div>

<div id="qrcode"></div>
</body>
</html>

<?//php phpinfo() ?>