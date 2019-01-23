function reducteurPX(parent, reductionPX, percent){
  var parentW = $(parent).width();
  parentW = parentW - reductionPX;
  var percent = parseInt(percent);
  percent = percent / 100;
  var result = parseInt(parentW * percent);
  return result;
}
