jQuery(function($) {
var suga = document.getElementById('suga');
$('#suga').mouseover(function() {
    suga.style.border = '7px solid #353A40';
    setTimeout(() =>suga.style.animationPlayState = 'paused',200);
    
});
$('#suga').mouseout(function() {
    suga.style.border = '2px solid #353A40';
    setTimeout(() =>suga.style.animation= "spin 3s linear infinite",200);
});
});