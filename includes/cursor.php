<div class="cursor"></div>
<div class="cursor2"></div>

<script>

  var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);

  var cursor = document.querySelector(".cursor");
  var cursor2 = document.querySelector(".cursor2");

  if(isSafari){ 
  /*alert('Is safari');*/
  //Do something
  cursor.style.display="none";

} else {
  /*alert('Is other browser');*/

  document.addEventListener("mousemove", function(e) {
    cursor.style.cssText = cursor2.style.cssText = "left: " + e.clientX + "px; top: " + e.clientY + "px;";
  });
}
</script>