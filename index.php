<?php
define('INCLUDE_CHECK',1);

include 'coreengine.php';

change_page();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	
	If(empty($_POST['passcode'])) {
	
		
		
	$msg = urlencode("Please enter passcode");
header("Location: index.php?msg=$msg&type=red");
	} else {

		

		
		$accesscode = $_POST["passcode"];

		
		$query = mysql_query("SELECT id FROM user
					   WHERE accesscode = '" . $accesscode . "'
					  ") or die(mysql_error());

		
		list($staff_id) = mysql_fetch_row($query);

		
		
		if(empty($staff_id)) {

			
$msg = urlencode("Invalid passcode entered");
header("Location: index.php?msg=$msg&type=red");
		} else {
 
$_SESSION['staff_id'] = $staff_id;
setcookie("icookie", $_SESSION['staff_id'], time()+60*60*24*100, "/");


header('location: home.php');
		}		
	
	}

} 
?>
<!DOCTYPE html>
<html class="no-js login" lang="en">
<head>
<meta charset="utf-8">
<title>INTEGRA-HEALTH MEDICAL SOFTWARE</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="css/images/favicon.png">
<!-- Le styles -->
<link href="css/twitter/bootstrap.css" rel="stylesheet">
<link href="css/base.css" rel="stylesheet">
<link href="css/twitter/responsive.css" rel="stylesheet">
<link href="css/jquery-ui-1.8.23.custom.css" rel="stylesheet">
<script src="js/plugins/modernizr.custom.32549.js"></script>
<script type="text/javascript">
function formSubmit()
{
     document.getElementById("loginspace").submit();
}
</script>
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->

</head>

<body>
<div id="login_page"> 
  <!-- Login page -->
  <div id="login">
    <div class="row-fluid fluid">
      <div class="span5"> <img src="img/hospital.ico" /> </div>
      <div class="span7">
        <div class="title">
          <span class="name">NEW IKEJA HOSPITAL</span>
		  <?php	
      if (isset($_GET['msg'])) {

	  $msg = mysql_real_escape_string($_GET['msg']);
$instance = mysql_real_escape_string($_GET['type']);


echo " <span class=\"subtitle\"><font color = \"red\">$msg</font></span>";}

else echo "<span class=\"subtitle\">ENTER PASSCODE TO BEGIN</span>";
				?>
          
        </div>
        <form class="form-search row-fluid" action = "" method = "post" id = "loginspace">
          <div class="input-append row-fluid fluid">
            <input type="password" class="row-fluid search-query" placeholder="Passcode" name = "passcode" id = "passcode">
            <a onClick="formSubmit()" class="btn color_4" id = "gobutton">Go</a> </div>
			<br />
			
        </form>
      </div>
	 
    </div>
  </div>
  <!-- End #login --> 
  <!-- <img src="img/ajax-loader.gif"> --> 
</div>
<!-- End #loading --> 

<!-- Le javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<!-- Flip effect on login screen --> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script> 
<script type="text/javascript" src="js/plugins/jquerypp.custom.js"></script> 
<script type="text/javascript" src="js/plugins/jquery.bookblock.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script> 
<script type="text/javascript">

      $(function() {
        var Page = (function() {

          var config = {
              $bookBlock: $( '#bb-bookblock' ),
              $navNext  : $( '#bb-nav-next' ),
              $navPrev  : $( '#bb-nav-prev' ),
              $navJump  : $( '#bb-nav-jump' ),
              bb        : $( '#bb-bookblock' ).bookblock( {
                speed       : 800,
                shadowSides : 0.8,
                shadowFlip  : 0.7
              } )
            },
            init = function() {

              initEvents();
              
            },
            initEvents = function() {

              var $slides = config.$bookBlock.children(),
                  totalSlides = $slides.length;

              // add navigation events
              config.$navNext.on( 'click', function() {
              $("#arrow_register").fadeOut();
              $(".not-member").slideUp();
              $(".already-member").slideDown();
                config.bb.next();
                return false;

              } );

              config.$navPrev.on( 'click', function() {

                 $(".not-member").slideDown();
                $(".already-member").slideUp();
                config.bb.prev();
                return false;

              } );

              config.$navJump.on( 'click', function() {
                
                config.bb.jump( totalSlides );
                return false;

              } );
              
              // add swipe events
              $slides.on( {

                'swipeleft'   : function( event ) {
                
                  config.bb.next();
                  return false;

                },
                'swiperight'  : function( event ) {
                
                  config.bb.prev();
                  return false;
                  
                }

              } );

            };

            return { init : init };

        })();

        Page.init();

      });
    </script> 
<script type='text/javascript'>
 
    $(window).load(function() {
     $('#loading1').fadeOut();
    });
      $(document).ready(function() {
           $("input:checkbox, input:radio, input:file").uniform();


      $('[rel=tooltip]').tooltip();
      $('body').css('display', 'none');
      $('body').fadeIn(500);

      $("#logo a, #sidebar_menu a:not(.accordion-toggle), a.ajx").click(function() {
        event.preventDefault();
        newLocation = this.href;
        $('body').fadeOut(500, newpage);
        });
        function newpage() {
        window.location = newLocation;
        }
      });
      
    

    </script>
</body>
</html>
