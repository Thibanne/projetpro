
$(document).ready(function() {
  var canvas = document.createElement("canvas");
  document.body.appendChild(canvas);
  var ctx = canvas.getContext("2d");

  var W = window.innerWidth;
  var H = window.innerHeight;

  canvas.width = W;
  canvas.height = H;

  var w = window;
  var requestAnimFrame = w.requestAnimationFrame || w.webkitRequestAnimationFrame || w.msRequestAnimationFrame || w.mozRequestAnimationFrame;


  //colors
  var colors = ["#D5E0E533", "#D1E2E433", "#D4DDE233", "#D2E2E333", "#D1DEE433"];
  var colorCounter = 0;

  //array of particules
  var circles = [];

  //object particule
  function Shape() {

    this.init = function(x, y, radius, color) {
      this.x = x;
      this.y = y;
      this.radius = radius;
      this.color = color;

      if (colorCounter <= 4) {
        colorCounter++;
      } else {
        colorCounter = 0;
      }

      //velocity
      this.vx = Math.random() * 2;
      //vitesse neige
      // this.vy = 2 + Math.random() * 5;
      //vitesse pluie
      this.vy = 8 + Math.random() * 2;
    }

    this.draw = function() {
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.radius, 0, 2 * Math.PI, false);
      ctx.fillStyle = this.color;
      ctx.fill();
    }
  }

  for (var i = 0; i < 500; i++) {
    var circle = new Shape();
    // circle.init(Math.floor(Math.random() * W), Math.floor(Math.random() * H), taille général, colors[colorCounter])
    circle.init(Math.floor(Math.random() * W), Math.floor(Math.random() * H), 2, colors[colorCounter]);
    circles.push(circle);
  };


  function main() {
    update();
    render();
    requestAnimFrame(main);
  }

  function render() {
    for (var i = circles.length - 1; i >= 0; i--) {
      circles[i].draw();
    };
  }

  function update() {
    ctx.clearRect(0, 0, W, H);

    //reset particules
    for (var i = circles.length - 1; i >= 0; i--) {
      circles[i].x += circles[i].vx;
      circles[i].y += circles[i].vy;

      if (circles[i].x > W + circles[i].radius) {
        circles[i].x = 0 - circles[i].radius;
      } else if (circles[i].y > H + circles[i].radius) {
        circles[i].y = 0 - circles[i].radius;
      } else if (circles[i].y < 0 - circles[i].radius) {
        circles[i].y = H + circles[i].radius;
      } else if (circles[i].x < 0 - circles[i].radius) {
        circles[i].x = W + circles[i].radius;
      }

    };
  }

  main();
});
