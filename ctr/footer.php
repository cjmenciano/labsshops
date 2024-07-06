<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }
                
    toggle = !toggle;
});
</script>
<script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
<script src="assets/js/main.js"></script>
<script src="assets/js/modal.js"></script>
<script src="assets/js/validator.js"></script>
<script src="assets/js/validator.min.js"></script>
</body>
</html>