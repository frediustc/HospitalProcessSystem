<footer class="main-footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <p>Your company &copy; 2017-2019</p>
      </div>
      <div class="col-sm-6 text-right">
        <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
      </div>
    </div>
  </div>
</footer>
</div>
<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.cookie.js"> </script>
<script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/charts-home.js"></script>
<script src="js/front.js"></script>
<script src="js/jquery-birthday-picker.js"></script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
<!---->
<script>
(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
e=o.createElement(i);r=o.getElementsByTagName(i)[0];
e.src='//www.google-analytics.com/analytics.js';
r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
ga('create','UA-XXXXX-X');ga('send','pageview');
</script>

<script type="text/javascript">
    $("#birthdayPicker").birthdayPicker();
    $('#labChck').change(function(e){
        if($('#labChck:checked').length > 0){
            $('#noteBox').fadeOut();
        }
        else {
            $('#noteBox').fadeIn();
        }
    });
</script>
</body>
</html>
