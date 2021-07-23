
<div class="cursor"></div>
<div class="cursor2"></div>

<script>

var cursor = document.querySelector(".cursor");
var cursor2 = document.querySelector(".cursor2");
document.addEventListener("mousemove",function(e){
  e.preventDefault();
  cursor.style.cssText = cursor2.style.cssText = "left: " + e.screenX + "px; top: " + e.screenY + "px;";
});
</script>