<?php 
define('INCLUDE_CHECK',1);
include 'coreengine.php';
hack_protect();


$identifystaff = mysql_query("select * from user where id='$_SESSION[staff_id]'");

$row = mysql_fetch_array($identifystaff);
$staffname = $row["staffname"];
$staffrole = strtoupper($row["role"]);
$reception = "RECEPTION";
$nurse = "NURSE";
$doctor = "DOCTOR";
$administrator = "ADMINISTRATOR";
$laboratory = "LABORATORY";

if($staffrole == $nurse){
header("Location: nursing.php");
}

if($staffrole == $administrator){
header("Location: adminportal.php");
}

if($staffrole == $doctor){
header("Location: doctor.php");
}

if($staffrole == $laboratory){
header("Location: labwaiting.php");
}

if (isset($_POST['store']))
{ 
function filter($arr) {
return array_map('mysql_real_escape_string', $arr);
}
$_POST = filter($_POST);



if(empty($_POST['surname']) OR 
   empty($_POST['othername']) OR 
   empty($_POST['type']) OR  
   empty($_POST['tel']) OR 
   empty($_POST['hnumber']) ) {


$msg = urlencode("You have left important fields empty. Please start over.");
header("Location: reception.php?msg=$msg&type=red");
} else {

$surname = mysql_real_escape_string($_POST['surname']);
$othername = mysql_real_escape_string($_POST['othername']);
$type = mysql_real_escape_string($_POST['type']);
$cnumber = mysql_real_escape_string($_POST['cnumber']);
$tel = mysql_real_escape_string($_POST['tel']);
$hnumber = mysql_real_escape_string($_POST['hnumber']);

$rs_duplicate = mysql_query("select count(*) as total from patients where hospitalnumber = '$hnumber'") or die(mysql_error());
list($total) = mysql_fetch_row($rs_duplicate);

if ($total > 0)
{
$msg = urlencode("Patient record already exists");
header("Location: reception.php?msg=$msg&type=red");
exit();
}



$sql_insert = "INSERT into `patients`
  			(`surname`,`other`,`type`,`cnumber`,`telenum`,`date`,`hospitalnumber`)
		    VALUES
		    ('$surname','$othername','$type','$cnumber','$tel','".date("U")."','$hnumber')
			";

mysql_query($sql_insert) or die("Insertion Failed:" . mysql_error()); 
$user_id = mysql_insert_id();  

mysql_query("INSERT INTO `activity`
(`staffid`,`activity`,`date`,`patient`)
VALUES
('$_SESSION[staff_id]','Added a medical record for $surname $othername with hospital number $hnumber to the medical records','".date("U")."','$user_id')
");

header("Location: search.php?keyword=$hnumber&new=New");

	} 
	 }
?>
<!DOCTYPE html>
<html class="sidebar_default  no-js" lang="en">
<head>
<meta charset="utf-8">
<title>MEDICAL SOFTWARE</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="css/images/favicon.png">
<!-- Le styles -->
<link href="css/twitter/bootstrap.css" rel="stylesheet">
<link href="css/base.css" rel="stylesheet">
<link href="css/twitter/responsive.css" rel="stylesheet">
<link href="css/jquery-ui-1.8.23.custom.css" rel="stylesheet">
<script src="js/plugins/modernizr.custom.32549.js"></script>
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
</head>

<body>
<div id="loading"><img src="img/ajax-loader.gif"></div>
<div id="responsive_part">
  <div class="logo"> <a href="index.html"><span>MEDISOFT</span><span class="icon"></span></a> </div>
  <ul class="nav responsive">
    <li>
      <button class="btn responsive_menu icon_item" data-toggle="collapse" data-target=".overview"> <i class="icon-reorder"></i> </button>
    </li>
  </ul>
</div>
<!-- Responsive part -->

<div id="sidebar" class="">
  <div class="scrollbar">
    <div class="track">
      <div class="thumb">
        <div class="end"></div>
      </div>
    </div>
  </div>
  <div class="viewport ">
    <div class="overview collapse">
      <div class="search row-fluid container">
        <h2>Search</h2>
        <form class="form-search" method = "GET" action = "search.php">
          <div class="input-append">
            <input type="text" class=" search-query" name = "keyword" placeholder="">
            <button class="btn_search color_4">Search</button>
          </div>
        </form>
      </div>
      <ul id="sidebar_menu" class="navbar nav nav-list container full">
        <li class="accordion-group active color_4"> <a class="dashboard " href="index.php"><img src="img/menu_icons/dashboard.png"><span>Dashboard</span></a> </li>
        <li class="accordion-group color_7"> <a class="accordion-toggle widgets collapsed " data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse1"> <img src="img/menu_icons/forms.png"><span>Records</span></a>
          <ul id="collapse1" class="accordion-body collapse">
            <li><a href="">Medical</a></li>
<li><a href="">People</a></li>
            <li><a href="">Activity</a></li>
            
          </ul>
        </li>
        
        
      </ul>
      <div class="menu_states row-fluid container ">
        <h2 class="pull-left">People records</h2>
        <div class="options pull-right">
          <button id="menu_state_1" class="color_4" rel="tooltip" data-state ="sidebar_icons" data-placement="top" data-original-title="MEDICAL STAFF">1</button>
          <button id="menu_state_2" class="color_4 active" rel="tooltip" data-state ="sidebar_default" data-placement="top" data-original-title="PATIENTS">2</button>
          <button id="menu_state_3" class="color_4" rel="tooltip" data-placement="top" data-state ="sidebar_hover" data-original-title="NON MEDICAL STAFF">3</button>
        </div>
      </div>
      <!-- End sidebar_box --> 
      
    </div>
  </div>
</div>
<div id="main">
  <div class="container">
    <div class="header row-fluid">
      <div class="logo"> <a href="index.php"><span>MEDISOFT</span><span class="icon"></span></a> </div>
      <div class="top_right">
        <ul class="nav nav_menu">
          <li class="dropdown"> <a class="dropdown-toggle administrator" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
            <div class="title"><span class="name"><?php echo "$staffname"; ?></span><span class="subtitle"><?php echo "$staffrole"; ?> - <?php echo date('d M Y'); ?></span></div>
            <span class="icon"><img src="img/thumbnail_george.jpg"></span></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
              <li><a href=""><i class=" icon-user"></i> My Profile</a></li>
              <li><a href=""><i class=" icon-cog"></i>Settings</a></li>
              <li><a href="logout.php"><i class=" icon-unlock"></i>Log Out</a></li>
              <li><a href=""><i class=" icon-flag"></i>Help</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- End top-right --> 
    </div>
    <div id="main_container">
	<?php	
      if (isset($_GET['msg'])) {

	  $msg = mysql_real_escape_string($_GET['msg']);
$instance = mysql_real_escape_string($_GET['type']);


echo "<div class=\"box paint color_7\">
            <div class=\"title\">
              <h4> <i class=\"icon-calendar\"></i> <span>CONFIRMATION MESSAGE</span> </h4>
            </div>
            <div class=\"content\">
             
  <fieldset>
   
     <div class=\"control-group row-fluid\">
      <!-- Username -->
      <label class=\"control-label span3\"  for=\"keyword\">$msg</label>
          </div>
	


 
   
  </fieldset>

            </div>
          </div>";}

else echo "";
				?>
      <div class="row-fluid">
 <div class="span6 ">

		  
		  <div class="box paint color_7">
            <div class="title">
              <h4> <i class="icon-calendar"></i> <span>SEARCH RECORD</span> </h4>
            </div>
            <div class="content ">
             <form class="form-horizontal" action="search.php" method="get">
  <fieldset>
   
     <div class="control-group row-fluid">
      <!-- Username -->
      <label class="control-label span3"  for="keyword">Keywords</label>
      <div class="controls span9">
        <input type="text" id="keyword" name="keyword" placeholder="" class="row-fluid">

      </div>
    </div>
	

  <div class="control-group row-fluid">
  <div class="span3 visible-desktop"></div>
                  <div class="controls span9">
                    <button name = "go" type="submit" class="btn btn-primary">Search</button>
                  </div>
                </div>

 
   
  </fieldset>
</form>
            </div>
          </div>
          <!-- End .box --> 
        </div>
            <!-- End .span6 -->
        <div class="span6 ">
<div class="box paint color_2">
            <div class="title">
              <h4> <i class="icon-calendar"></i> <span>ADD PATIENT</span> </h4>
            </div>
            <div class="content ">
             <form class="form-horizontal" action='' method="POST">
  <fieldset>
   
     <div class="control-group row-fluid">
      <!-- Username -->
      <label class="control-label span3"  for="username">Surname</label>
      <div class="controls span9">
        <input type="text" id="surname" name="surname" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Username -->
      <label class="control-label span3"  for="username">Other Names</label>
      <div class="controls span9">
        <input type="text" id="othername" name="othername" placeholder="" class="row-fluid">

      </div>
    </div>
<div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="default-select">TYPE</label>
                  <div class="controls span9">
                    <select data-placeholder="Choose your favorite character..." class="chzn-select" id="type" name = "type">
                      <option value=""></option>
                      <option value="PRIVATE">PRIVATE</option>
                      <option value="COMPANY">COMPANY</option>
                    </select>
                  </div>
                </div>
    <div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Company Number</label>
      <div class="controls span9">
        <input type="text" id="cnumber" name="cnumber" placeholder="" class="row-fluid">
       
      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Telephone number</label>
      <div class="controls span9">
        <input type="text" id="tel" name="tel" placeholder="" class="row-fluid">

      </div>
    </div>
		<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Hospital number</label>
      <div class="controls span9">
        <input type="text" id="hnumber" name="hnumber" placeholder="" class="row-fluid">

      </div>
    </div>
  <div class="control-group row-fluid">
  <div class="span3 visible-desktop"></div>
                  <div class="controls span9">
                    <button type="submit" name = "store" id = "store" class="btn btn-primary">Register</button>
                  </div>
                </div>

 
   
  </fieldset>
</form>
            </div>
          </div>
          <!-- End .box --> 
        </div>
            <!-- End .span6 -->
            
      </div>
      <!-- End .row-fluid --> 
    </div>
    <!-- End #container --> 
  </div>
  <div id="footer">
    <p> &copy; MEDICAL SOFTWARE - 2013. POWERED BY INTEGRAHEALTH</p>
    
</div>
<div class="background_changer dropdown">
  <div class="dropdown" id="colors_pallete"> <a data-toggle="dropdown" data-target="drop4" class="change_color"></a>
    <ul  class="dropdown-menu pull-left" role="menu" aria-labelledby="drop4">
      <li><a data-color="color_0" class="color_0" tabindex="-1">1</a></li>
      <li><a data-color="color_1" class="color_1" tabindex="-1">1</a></li>
      <li><a data-color="color_2" class="color_2" tabindex="-1">2</a></li>
      <li><a data-color="color_3" class="color_3" tabindex="-1">3</a></li>
      <li><a data-color="color_4" class="color_4" tabindex="-1">4</a></li>
      <li><a data-color="color_5" class="color_5" tabindex="-1">5</a></li>
      <li><a data-color="color_6" class="color_6" tabindex="-1">6</a></li>
      <li><a data-color="color_7" class="color_7" tabindex="-1">7</a></li>
      <li><a data-color="color_8" class="color_8" tabindex="-1">8</a></li>
      <li><a data-color="color_9" class="color_9" tabindex="-1">9</a></li>
      <li><a data-color="color_10" class="color_10" tabindex="-1">10</a></li>
      <li><a data-color="color_11" class="color_11" tabindex="-1">10</a></li>
      <li><a data-color="color_12" class="color_12" tabindex="-1">12</a></li>
      <li><a data-color="color_13" class="color_13" tabindex="-1">13</a></li>
      <li><a data-color="color_14" class="color_14" tabindex="-1">14</a></li>
      <li><a data-color="color_15" class="color_15" tabindex="-1">15</a></li>
      <li><a data-color="color_16" class="color_16" tabindex="-1">16</a></li>
      <li><a data-color="color_17" class="color_17" tabindex="-1">17</a></li>
      <li><a data-color="color_18" class="color_18" tabindex="-1">18</a></li>
      <li><a data-color="color_19" class="color_19" tabindex="-1">19</a></li>
      <li><a data-color="color_20" class="color_20" tabindex="-1">20</a></li>
      <li><a data-color="color_21" class="color_21" tabindex="-1">21</a></li>
      <li><a data-color="color_22" class="color_22" tabindex="-1">22</a></li>
      <li><a data-color="color_23" class="color_23" tabindex="-1">23</a></li>
      <li><a data-color="color_24" class="color_24" tabindex="-1">24</a></li>
      <li><a data-color="color_25" class="color_25" tabindex="-1">25</a></li>
    </ul>
  </div>
</div>
<!-- End .background_changer -->
</div>
<!-- /container --> 

<!-- Le javascript
    ================================================== --> 
<!-- General scripts --> 
<script src="js/jquery.js" type="text/javascript"> </script> 
<!--[if !IE]> -->
<!--[if !IE]> -->
<script src="js/plugins/enquire.min.js" type="text/javascript"></script> 
<!-- <![endif]-->
<!-- <![endif]-->
<!--[if lt IE 7]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script>
<![endif]-->
<script language="javascript" type="text/javascript" src="js/plugins/jquery.sparkline.min.js"></script> 
<script src="js/plugins/excanvas.compiled.js"></script>
<script src="js/bootstrap-transition.js" type="text/javascript"></script> 
<script src="js/bootstrap-alert.js" type="text/javascript"></script> 
<script src="js/bootstrap-modal.js" type="text/javascript"></script> 
<script src="js/bootstrap-dropdown.js" type="text/javascript"></script> 
<script src="js/bootstrap-scrollspy.js" type="text/javascript"></script> 
<script src="js/bootstrap-tab.js" type="text/javascript"></script> 
<script src="js/bootstrap-tooltip.js" type="text/javascript"></script> 
<script src="js/bootstrap-popover.js" type="text/javascript"></script> 
<script src="js/bootstrap-button.js" type="text/javascript"></script> 
<script src="js/bootstrap-collapse.js" type="text/javascript"></script> 
<script src="js/bootstrap-carousel.js" type="text/javascript"></script> 
<script src="js/bootstrap-typeahead.js" type="text/javascript"></script> 
<script src="js/bootstrap-affix.js" type="text/javascript"></script> 
<script src="js/fileinput.jquery.js" type="text/javascript"></script> 
<script src="js/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script> 
<script src="js/jquery.touchdown.js" type="text/javascript"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/jquery.tinyscrollbar.min.js"></script> 
<script language="javascript" type="text/javascript" src="js/jnavigate.jquery.min.js"></script> 
<script language="javascript" type="text/javascript" src="js/jquery.touchSwipe.min.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/jquery.peity.min.js"></script> 

<!-- Flot charts --> 
<script language="javascript" type="text/javascript" src="js/plugins/flot/jquery.flot.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/flot/jquery.flot.resize.js"></script> 

<!-- Data tables --> 
<script type="text/javascript" language="javascript" src="js/plugins/datatables/js/jquery.dataTables.js"></script> 

<!-- Task plugin --> 
<script language="javascript" type="text/javascript" src="js/plugins/knockout-2.0.0.js"></script> 

<!-- Custom made scripts for this template --> 
<script src="js/scripts.js" type="text/javascript"></script> 

</body>
</html>