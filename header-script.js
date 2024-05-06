// *************************************
// 簡易スマホチェック
// ※ jQuery のプロパティに登録
// *************************************
jQuery.isMobile = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));

// *************************************
// toastr.options
// *************************************
toastr.options={
  "closeButton":false,
  "debug":false,
  "newestOnTop":false,
  "progressBar":false,
  "positionClass":"toast-bottom-center",
  "preventDuplicates":false,
  "onclick":null,
  "showDuration":"300",
  "hideDuration":"1000",
  "timeOut":"3000",
  "extendedTimeOut":"1000",
  "showEasing":"swing",
  "hideEasing":"linear",
  "showMethod":"fadeIn",
  "hideMethod":"fadeOut"
};

// *************************************
// PCにおける表示位置
// *************************************
if ( !$.isMobile ) {
  toastr.options.positionClass = "toast-top-center";
}

// *************************************
// カメラ用変数
// *************************************
// カメラ用 video 要素(DOM オブジェクト)
var camera;
var canvas;

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
