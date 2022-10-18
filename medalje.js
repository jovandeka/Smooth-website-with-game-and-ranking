jQuery(function($) {
    
    var medalja1 = document.getElementById('medalja1');
    var medalja2 = document.getElementById('medalja2');
    var medalja3 = document.getElementById('medalja3');

    var red1 = document.getElementById('red1');
    var red2 = document.getElementById('red2');
    var red3 = document.getElementById('red3');

    setTimeout(() => {
        red1.style.fontSize = "x-large";
        red1.style.fontWeight = "bolder";
        medalja1.innerHTML = '🥇';
    }, 1000);
    setTimeout(() => {
        red2.style.fontSize = "large";
        red2.style.fontWeight = "bold";
        medalja2.innerHTML = '🥈';
    }, 2000);
    setTimeout(() => {
        red3.style.fontSize = "large";
        red3.style.fontWeight = "bold";
        medalja3.innerHTML = '🥉';
    }, 3000);
    
    
});