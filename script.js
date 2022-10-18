var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("scrollnav").style.top = "0";
    document.getElementById("suga").style.top = "70px";
    document.getElementById("scrollfoot").style.bottom = "0";
  } else {
    document.getElementById("scrollnav").style.top = "-52px";
    document.getElementById("suga").style.top = "18px";
    document.getElementById("scrollfoot").style.bottom = "-40px";
  }
  prevScrollpos = currentScrollPos;
}
