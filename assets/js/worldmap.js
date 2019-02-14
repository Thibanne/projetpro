// info mise a jour en permance
var mapW;
var mapH;
var x;
var y;
var w;
var h;
var xw;
var yh;
var initPosX;
var initPosY;

// mis a jour uniquement en mousedown pour connaitre
// la distance entre le clic de la souris sur l'image
// et les bord haut gauche de l'image.
// Ceci permet de déplacer l'image et la souris
// avec toujours la meme distance
var currentPosX;
var currentPosY;

// valeur pour la molette de la souris
var newW;
var newH;
var newX;
var newY;

function bouton(id, percentX, percentY){
  var pixelx = parseInt(((window.imgw)*percentX));
  var pixely = parseInt(((window.imgh)*percentY));
  $(id).css('margin-left', pixelx+'px')
  $(id).css('margin-top', pixely+'px')
}

function cssData(){
  window.mapW = parseInt($('.worldmap-container').css('width'));
  window.mapH = parseInt($('.worldmap-container').css('height'));

  window.x = parseInt($('.worldmap-container #worldmap-div').css('margin-left'));
  window.y = parseInt($('.worldmap-container #worldmap-div').css('margin-top'));
  window.w = parseInt($('.worldmap-container #worldmap-div').css('width'));
  window.h = parseInt($('.worldmap-container #worldmap-div').css('height'));
  window.xw = x + w;
  window.yh = y + h;

  window.imgx = parseInt($('.worldmap-container #worldmap-div #worldmap-img').css('margin-left'));
  window.imgy = parseInt($('.worldmap-container #worldmap-div #worldmap-img').css('margin-top'));
  window.imgw = parseInt($('.worldmap-container #worldmap-div #worldmap-img').css('width'));
  window.imgh = parseInt($('.worldmap-container #worldmap-div #worldmap-img').css('height'));
  bouton('#lieu0', 0.16, 0.48);
  bouton('#lieu1', 0.18, 0.43);
}

$( function() {
  // met à jour toutes les données css concernant le container et l'image
  cssData();
  var isDrag = false;
  $(".worldmap-container").on('wheel', function(event){
    if (w-10 > mapW && h-10 > mapH) {
      if(event.originalEvent.deltaY < 0){
        newW = w + 10;
        newH = h + 10;
        newX = x - 5;
        newY = y - 5;
      }else {
        if( x > (mapW-w)){
          newW = w - 10 ;
        }
        if( y > (mapH-h)){
          newH = h - 10;
        }
        if(x > 0){
          newX = 0;
        }else{
          newX = x + 5;
        }
        if(y > 0){
          newY = 0;
        }else{
          newY = y + 5;
        }
      }
      parseInt($('.worldmap-container #worldmap-div').css('margin-left', newX+'px'));
      parseInt($('.worldmap-container #worldmap-div').css('margin-top', newY+'px'));
      parseInt($('.worldmap-container #worldmap-div').css('width', newW+'px'));
      parseInt($('.worldmap-container #worldmap-div').css('height', newH+'px'));

      // met à jour toutes les données css concernant le container et l'image
      cssData();

      if( x < (mapW-w)){
        $('.worldmap-container #worldmap-div').css( 'margin-left', ((mapW-w))+'px' ) ;
        isDrag = false;
      }

    }else{
      parseInt($('.worldmap-container #worldmap-div').css('margin-left', '-11px'));
      parseInt($('.worldmap-container #worldmap-div').css('margin-top', '-11px'));
      parseInt($('.worldmap-container #worldmap-div').css('width', (mapW+11)+'px'));
      parseInt($('.worldmap-container #worldmap-div').css('height', (mapH+11)+'px'));

      // met à jour toutes les données css concernant le container et l'image
      cssData();
    }
  });

  $( ".worldmap-container #worldmap-div" ).mousedown(function(event){
    var decalx = parseInt($('.worldmap-container #worldmap-div').css('margin-left'));
    var decaly = parseInt($('.worldmap-container #worldmap-div').css('margin-top'));
    isDrag = true;
    // calcule la distance entre la position du curseur et l'image
    initPosX = (event.pageX-decalx);
    initPosY = (event.pageY-decaly);

    return false;
  });
  $('.worldmap-container').on('mouseup mouseleave', function() {
    isDrag = false;
  });
  $('.worldmap-container').mousemove(function(event){
    // met à jour toutes les données css concernant le container et l'image
    cssData();

    if(isDrag){
      // la distance est deja calculé pour comprendre que la souris reste a la bonne
      // distance du bord haut gauche de l'image ce qui correspond a initPosX.
      // Maintenant grace au deplacment de la souris l'image aussi
      // ce déplace avec toujours la meme distance entre les bord haut gauche et le curseur de la souris
      currentPosX = -(initPosX - event.pageX);
      $('.worldmap-container #worldmap-div').css( 'margin-left', currentPosX+'px' )

      if(x > 0){
        $('.worldmap-container #worldmap-div').css( 'margin-left', '0px' )
        isDrag = false;
      }
      // taille du container plus petite que limage.
      // ce qui fait une valeur négatif.
      // si x recule de trop en dessous de cette limite alors c'est
      // que le bord right de limage devient inferieur au bord right du container
      if( x < (mapW-w)){
        $('.worldmap-container #worldmap-div').css( 'margin-left', ((mapW-w))+'px' ) ;
        isDrag = false;
      }

      // fait l'action du drag.
      // l'action prend en compte la derniere position de l'image grace a initposy
      // qui corespond a la position de l'image lorsque le drag est fini
      currentPosY = -(initPosY - event.pageY);
      $('.worldmap-container #worldmap-div').css( 'margin-top', currentPosY+'px' ) ;

      if(y > 0){
        $('.worldmap-container #worldmap-div').css( 'margin-top', '0px' )
        isDrag = false;
      }

      // meme chose que plus haut pour if( x < (mapW-w)){
      if( y < (mapH-h)){
        $('.worldmap-container #worldmap-div').css( 'margin-top', -(h-mapH)+'px' ) ;
        isDrag = false;
      }
    }
  })
} );
