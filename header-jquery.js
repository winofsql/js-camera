  // DOM オブジェクト
  camera = $("#camera").get(0);
  canvas = $("#canvas").get(0);
  
  // 背面カメラ開始
  startCamera( options_back );
  
  // *************************************
  // Canvas へコピー
  // *************************************
  $("#copy").on( "click", function(){
  
    var ctx = canvas.getContext('2d');
  
    canvas.width = camera.getBoundingClientRect().width;
    canvas.height = camera.getBoundingClientRect().height;
  
    // カメラから キャンバスに静止画を描く
    ctx.drawImage(camera, 0, 0, canvas.width, canvas.height);
  
  });

  // *************************************
  // Canvas の画像を保存
  // *************************************
  $("#save").on( "click", function(){
  
    var jpeg = canvas.toDataURL("image/jpeg")	// JPEG
    var download = $("<a></a>").appendTo("body").css("display","none");
    download.prop({"href" : jpeg, "download": "canvas.jpg" });
    download.get(0).click();
    download.remove();
  
  });

    // **************************************
  // このページ自身の QRコードの表示
  // **************************************
  $('#qrcode')
    .css({ "margin" : "20px 20px 20px 20px" })
    .qrcode({width: 160,height: 160,text: location.href });
