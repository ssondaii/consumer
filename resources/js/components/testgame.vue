<template>
	<div>
		test game
	</div>
</template>
<script>
	export default{
		data(){
			return{

			}
		},
		mounted(){
			var ctx = canvasElement.getContext("2d");
            // Clear the canvas
            ctx.clearRect(0, 0, 300, 150);
            // Insert stuff into canvas
            ctx.fillStyle = "black";
            ctx.font = "20px Georgia";
            ctx.fillText(binding.value, 10, 50);
		},
		methods:{
			mousedown(e){
				var vm = this
				var rect = vm.canvas.getBoundingClientRect();
				var x = e.clientX - rect.left;
				var y = e.clientY -rect.top;

				vm.isDrawing = true;
				vm.startX = x;
				vm.startY = y;
				vm.points.push({
					x: x,
					y: y
				});
			},
			mousemove(e){
				var vm = this
				var rect = vm.canvas.getBoundingClientRect();
				var x = e.clientX - rect.left;
				var y = e.clientY -rect.top;

				if(vm.isDrawing){
					vm.context.beginPath();
					vm.context.moveTo(vm)
				}
			}
		}
	};
</script>
<style>
	
</style>