function changeSound(elem) {
  var sound = $("#" + elem).val();
  $("#" + elem).parent("div").prev("div").children("input").val(sound);
}
//用户调整讲话的音量 输入框
function change(elem) {
  var sound = $("input[name=" + elem + "]").val();
  $("#" + elem).val(sound);
}
