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

  toastr.error( "カメラを使用できません");

  $("#camera")
    .prop({ 
      "loop" : true, "muted" : true, "controls" : true,
      "src" : "TriggerRally.mp4"
    })
    .css({"border": "solid 1px #000"});

}