jQuery(function($) {
    $('#uhvacen').hide();
    $('#blood').hide();
    $('#slice').hide();
    var suga = document.getElementById('sugaIgra');
    var blood = document.getElementById('blood');
    var slice = document.getElementById('slice');
    var tekst = document.getElementById('IgraText');
    var brojac = document.getElementById('IgraBrojac');
    var uhvacen = document.getElementById('uhvacen');
    var tajmer = document.getElementById('tajmer');
    var upis = document.getElementById('upis');
    var vreme = 0;
    var counter = 0;
    var width = suga.offsetWidth;
    var height = suga.offsetHeight;
    brojac.innerHTML = 'Uhvati još:'+' '+ (100 - counter);

    var hDisplay = 0;
    var mDisplay = 0;
    var sDisplay = 0;

    function secondsToHms(br) {
        br = Number(br);
        var h = Math.floor(br / 3600);
        var m = Math.floor(br % 3600 / 60);
        var s = Math.floor(br % 3600 % 60);
    
        if(h<10)    hDisplay = '0'+ h;     else    hDisplay = h;
        if(m<10)    mDisplay = '0'+ m;     else    mDisplay = m;
        if(s<10)    sDisplay = '0'+ s;     else    sDisplay = s;

        return hDisplay + ':' + mDisplay + ':' + sDisplay; 
    }

    var tajmerVreme = setInterval(() =>{ 
        if(counter<100){
            vreme++ 
            tajmer.innerHTML = secondsToHms(vreme);
        }
        else   
            clearInterval(tajmerVreme);
    }, 1000);

    $(document).ready(function(e) {
        function goUp() {
            $("#sugaIgra").animate({
            top: '50%'
          }, 500, function() {
            goDown();
          });
        }
        function goDown() {
            $("#sugaIgra").animate({
            top: '50%'
          }, 500, function() {
            goUp();
          });
        }
        goUp();
        function rand(){
            var dWidth = $(document).width() - 100,
                    dHeight = $(document).height() - 100,
                    nextX = Math.floor(Math.random() * dWidth),
                    nextY = Math.floor(Math.random() * dHeight);
                    $("#sugaIgra").animate({ left: nextX + 'px', top: nextY + 'px' });      
        }
        setInterval(() =>{rand()}, (800-(counter*8)));
    });

    $('#sugaIgra').mouseover(function() {
        var x = suga.offsetLeft;
        var y = suga.offsetTop;
        uhvacen.style.left=x + "px";
        uhvacen.style.top=y + "px";
        blood.style.left=x + "px";
        blood.style.top=y + "px";
        slice.style.left=x + "px";
        slice.style.top=y + "px";
        counter++;
        $('#sugaIgra').hide();
        $('#slice').show();
        $('#blood').show();
        $('#uhvacen').show();
        changeText();
        changeSize();
        if(counter<100) setTimeout(() =>$('#sugaIgra').show(), 300);
        if(counter<101) setTimeout(() =>$('#slice').hide(), 300);
        if(counter<101) setTimeout(() =>$('#uhvacen').hide(), 600);
        if(counter<101) setTimeout(() =>$('#blood').hide(), 400);
        if(counter>99) {
            setTimeout(() =>{upis.style.display = "block";}, 200);
            document.getElementById('vreme').value = vreme;

        }
    });

    $('#sugaIgra').mouseout(function() {
        if(document.getElementById("scrollnav").style.top == "-52px")
        $(this).animate({ right: '1%', top: '18px', position: 'relative' });
        else
        $(this).animate({ right: '1%', top: '70px', position: 'relative' });
		});

    function changeSize() {
        suga.style.width = width - counter+'px';
        suga.style.height = height - counter+'px';
        uhvacen.style.width = width - counter+'px';
        uhvacen.style.height = height - counter+'px';
        blood.style.width = width - counter+'px';
        blood.style.height = height - counter+'px';
        slice.style.width = width - counter+'px';
        slice.style.height = height - counter+'px';
    }

    function changeText() {
        brojac.innerHTML = 'Uhvati još:'+' '+ (100 - counter);
        if(counter>9){   
            tekst.innerHTML = "Izgleda da možeš &#128562;";
        }
        if(counter>19){   
            tekst.innerHTML = "Bravo!";
            tekst.style.color = "blue";
        }
        if(counter>29){   
            tekst.innerHTML = "Odlično!";
        }
        if(counter>39){   
            tekst.innerHTML = "Super!";
            tekst.style.color = "orange";
        }
        if(counter>49){   
            tekst.innerHTML = "Ekstra!";
        }
        if(counter>59){   
            tekst.innerHTML = "WOW!";
            tekst.style.color = "orangered";
        }
        if(counter>69){   
            tekst.innerHTML = "Neverovatno!";
        }
        if(counter>79){   
            tekst.innerHTML = "KAKO!?";
            tekst.style.color = "red";
        }
        if(counter>89){   
            tekst.innerHTML = "Nemoguće!!";
        }
        if(counter>99){
            tajmer.innerHTML = '';
            tekst.style.color = "green";
            tekst.innerHTML = "Prešli ste igricu, svaka čast!!! 👏🤩😎";
            brojac.style.color = "green";
            brojac.style.fontSize = "xx-large";
            brojac.innerHTML = "Vaše vreme je" + ' ' + secondsToHms(vreme);
        }
    }

    var dots = [],
    mouse = {
      x: 0,
      y: 0
    };
    var Dot = function() {
    this.x = 0;
    this.y = 0;
    this.node = (function(){
        var n = document.createElement("div");
        n.className = "trail";
        document.body.appendChild(n);
        return n;
    }());
    };
    Dot.prototype.draw = function() {
    this.node.style.left = (this.x -3) + "px";
    this.node.style.top = (this.y -3) + "px";
    };
    for (var i = 0; i < 35; i++) {
    var d = new Dot();
    dots.push(d);
    }
    function draw() {
    var x = mouse.x,
        y = mouse.y;
    
    dots.forEach(function(dot, index, dots) {
        var nextDot = dots[index + 1] || dots[0];
        
        dot.x = x;
        dot.y = y;
        dot.draw();
        x += (nextDot.x - dot.x) * .03;
        y += (nextDot.y - dot.y) * .03;
    });
    }

    addEventListener("mousemove", function(event) {
    mouse.x = event.pageX;
    mouse.y = event.pageY;
    });

    function animate() {
    draw();
    requestAnimationFrame(animate);
    
    }
    animate();
    
});

