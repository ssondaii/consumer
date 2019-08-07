<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>DUONG-GAME STUDIO</title>
    <style>
    	* { padding: 0; margin: 0; }
    	canvas { background: #eee; display: block; margin: 0 auto; }
    </style>
</head>
<body>

<!-- game se render toan bo vao canvaas -->
<canvas id="myCanvas" width="480" height="320"></canvas>

<script>
	// Code JavaScript
	var canvas = document.getElementById("myCanvas");
	var ctx = canvas.getContext("2d");

	//ball
	var x = canvas.width/2;
	var y = canvas.height-30;
	var dx = 2;
	var dy = -2;
	var ballRadius = 10;

	//paddle
	var paddleHeight = 10;
	var paddleWidth = 75;
	var paddleX = (canvas.width - paddleWidth)/2;

	//key listener
	var rightPressed = false;
	var leftPressed = false;
	document.addEventListener("keydown", keyDownHandler, false);
	document.addEventListener("keyup", keyUpHandler, false);

	function keyDownHandler(e) {
	    if(e.keyCode == 39) {
	        rightPressed = true;
	    }
	    else if(e.keyCode == 37) {
	        leftPressed = true;
	    }
	}

	function keyUpHandler(e) {
	    if(e.keyCode == 39) {
	        rightPressed = false;
	    }
	    else if(e.keyCode == 37) {
	        leftPressed = false;
	    }
	}

	//score
	var score = 0;

	function increaseScore(){
		score += 100;
	}

	// ctx.beginPath();
	// ctx.rect(20, 40, 50, 50);
	// ctx.fillStyle = "#FF0000";
	// ctx.fill();
	// ctx.closePath();

	// ctx.beginPath();
	// ctx.arc(240, 160, 20, 0, Math.PI*2, false);
	// ctx.fillStyle = "green";

	// ctx.fill();
	// ctx.closePath();
	// 
	function drawScore(){
		ctx.beginPath();
	    ctx.font = "30px Arial";
		ctx.fillText(score, 10, 50);
	    ctx.closePath();
	}

	function drawBall(){
		ctx.beginPath();
	    ctx.arc(x, y, ballRadius, 0, Math.PI*2);
	    ctx.fillStyle = "#0095DD";
	    ctx.fill();
	    ctx.closePath();
	}

	function drawPaddle(){
		ctx.beginPath();
		ctx.rect(paddleX+5, canvas.height-paddleHeight, paddleWidth-10, paddleHeight);
		ctx.fillStyle = "#0095DD";
    	ctx.fill();
		ctx.closePath();
	}

	function draw(){
		ctx.clearRect(0, 0, canvas.width, canvas.height);

		drawScore();
		
		drawBall();
		

		if(x + dx > canvas.width-ballRadius || x + dx < ballRadius) {
			increaseScore();
		    dx = -dx;
		}
		if(y + dy < ballRadius) {
			increaseScore();
		    dy = -dy;
		} else if(y + dy > canvas.height-ballRadius) {
		    if(x > paddleX && x < paddleX + paddleWidth) {
		    	increaseScore();
		        dy = -dy;
		    }
		    else {
		    	document.location.reload();
		        alert("GAME OVER");
		        
		    }
		}

		x += dx;
	    y += dy;

		drawPaddle();

		if(rightPressed && paddleX < canvas.width-paddleWidth) {
		    paddleX += 7;
		}
		else if(leftPressed && paddleX > 0) {
		    paddleX -= 7;
		}
	    
	}
	setInterval(draw, 10);

</script>

</body>
</html>