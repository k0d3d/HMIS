<?php
define('INCLUDE_CHECK',1);
include 'coreengine.php';
hack_protect();

$identifystaff = mysql_query("select * from user where id='$_SESSION[staff_id]'");


$row = mysql_fetch_array($identifystaff);
$staffname = $row["staffname"];
$staffrole = strtoupper($row["role"]);

$identifypatient = mysql_query("select * from patients where id='$_GET[patient]'");

$condition = "Yes";

$patientrow = mysql_fetch_array($identifypatient);
$patientid = $patientrow["id"];
$patientsurname = $patientrow["surname"];
$patientother = $patientrow["other"];
$patienttype = $patientrow["type"];
$patientcnumber = $patientrow["cnumber"];
$patienttelenum = $patientrow["telenum"];
$patienthospitalnumber= $patientrow["hospitalnumber"];
$patientcompany = $patientrow["company"];
$patientdob = $patientrow["dob"];
$patientgender = $patientrow["gender"];
$patientheight = $patientrow["height"];
$patientweight = $patientrow["weight"];
$patientsmoking = $patientrow["smoking"];
$patientalcohol = $patientrow["alcohol"];
$patientmarried = $patientrow["married"];
$patientallergy = $patientrow["allergy"];
$patientasthma = $patientrow["asthma"];
$patientpolio = $patientrow["polio"];
$patienteardisease = $patientrow["ear disease"];
$patientveneraldisease = $patientrow["veneral disease"];
$patientheartdisease = $patientrow["heart disease"];
$patientsurgeryundergone = $patientrow["sugery undergone"];
$patientkidney = $patientrow["kidney"];
$patientdiabetes = $patientrow["diabetes"];
$patienthbp = $patientrow["hbp"];
$patientepilepsy = $patientrow["epilepsy(fits)"];
$patientpsychiatricillness = $patientrow["psychiatric illness"];
$patientbleedingdisorders = $patientrow["bleeding disorders"];
$patientmajorinjuries = $patientrow["major injuries"];
$patienttb = $patientrow["tb"];
$patientadditionalcomments = $patientrow["additional comments"];
$patientfasthma = $patientrow["Family Asthma"];
$patientfcardiac = $patientrow["Family Cardiac Disease"];
$patientfhbp = $patientrow["Family Hbp"];
$patientftb = $patientrow["Family TB"];
$patientfdiabetes = $patientrow["Family Diabetes"];
$patientfcancer = $patientrow["Family Cancer"];
$patientfpi = $patientrow["Family Psychiatric Illness"];
$patientfaod = $patientrow["Family Any Other Diseases"];
$patientvtemp = $patientrow["temperature"];
$patientvpulse = $patientrow["pulse"];
$patientvblood = $patientrow["blood"];
$patientvresp = $patientrow["resp"];
$patientdoctorcomments = $patientrow["doctorcomments"];
$patientdoctorcommentsb = $patientrow["doctorcommentsb"];
$patientdoctorcommentsc = $patientrow["doctorcommentsc"];
$patientdoctorcommentsd = $patientrow["doctorcommentsd"];

if (isset($_GET['activate']))
{ 
$removefromwaitinglist = mysql_query("DELETE FROM doctorwaiting WHERE patientid ='$_GET[patient]'") or die ("Bad del query");
$timer = $_GET["timer"];
mysql_query("INSERT INTO `activity`
(`staffid`,`activity`,`date`,`patient`)
VALUES
('$_SESSION[staff_id]','Attended to $patientsurname $patientother, who was directed from the nursing station by $_GET[nursename] and had waited for $_GET[timer].','".date("U")."','$_GET[patient]')
");
}

$rs_all = mysql_query("select staffid,date from activity where activity ='Took vital signs for $patientsurname $patientother' ORDER BY ID DESC LIMIT 1") or die(mysql_error());
$all = mysql_fetch_array($rs_all);
$timer = relativeTime($all['date']);
$date = $all["date"];
$stafftookvital = $all["staffid"];
$identifystaffvital = mysql_query("select * from user where id='$stafftookvital'");
$staffvitalarray = mysql_fetch_array($identifystaffvital);
$staffvitalname = $staffvitalarray["staffname"];

 if (isset($_POST['confirm']))
{ 
function filter($arr) {
return array_map('mysql_real_escape_string', $arr);
}
$_POST = filter($_POST);



if(empty($_POST['doctorcomments']) OR 
   empty($_POST['doctorcommentsb']) OR 
   empty($_POST['doctorcommentsc'])) {


$msg = urlencode("You have left important fields empty. Please start over.");
header("Location: docview.php?patient=$_GET[patient]&msg=$msg&type=red");
} else {

$doctorcomments = mysql_real_escape_string($_POST['doctorcomments']);
$doctorcommentsb = mysql_real_escape_string($_POST['doctorcommentsb']);
$doctorcommentsc = mysql_real_escape_string($_POST['doctorcommentsc']);
$doctorcommentsd = mysql_real_escape_string($_POST['doctorcommentsd']);


mysql_query("INSERT INTO `patientassesment`
(`patientid`,`presenting`,`history`,`physical`,`plan`,`date`,`staffid`)
VALUES
('$_GET[patient]','$doctorcomments','$doctorcommentsb','$doctorcommentsc','$doctorcommentsd','".date("U")."','$_SESSION[staff_id]')
");


mysql_query("UPDATE patients SET
			
			`doctorcomments` = '$doctorcomments',
			`doctorcommentsb` = '$doctorcommentsb',
			`doctorcommentsc` = '$doctorcommentsc',
			`doctorcommentsd` = '$doctorcommentsd'
			WHERE id='$_GET[patient]'
			") or die(mysql_error());


mysql_query("INSERT INTO `activity`
(`staffid`,`activity`,`date`,`patient`)
VALUES
('$_SESSION[staff_id]','Updated SOAP for $patientsurname $patientother.','".date("U")."','$_GET[patient]')
");

$msg = urlencode("Your assesment has been recorded.");
header("Location: docview.php?patient=$_GET[patient]&msg=$msg&type=green");

	} 
	 }
$getlaboratoryresults = mysql_query("select * from labresults WHERE `patientid` = '$_GET[patient]' order by id DESC") or die(mysql_error());

$getassesmenthistory = mysql_query("select * from patientassesment WHERE `patientid` = '$_GET[patient]' order by id DESC") or die(mysql_error());
?>

<!DOCTYPE html>
<html class="sidebar_default no-js" lang="en">
<head>
<meta charset="utf-8">
<title>Casefile - <?php echo "$patientsurname"; ?> - <?php echo "$patientother"; ?></title>
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
<script type="text/javascript">
window.onload = function() {
  document.getElementById("doctorcomments").focus();
};

</script>
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
    </div>
    <div id="main_container">
		<?php	
      if (isset($_GET['msg'])) {

	  $msg = mysql_real_escape_string($_GET['msg']);
	  $color = mysql_real_escape_string($_GET['type']);
	  



echo "<h1><font color = \"$color\">$msg</font></h1>";}

else echo "";
				?>
      <div class="row-fluid">
        <div class="span3">
          <div class="title">
            <div class="row-fluid legend">
              <h1> <?php echo "$patientsurname"; ?> <?php echo "$patientother"; ?> / <?php echo "$patienthospitalnumber"; ?></h1>
			<h4>
			  Gender: <?php echo "$patientgender"; ?>
			  </h4>
			<h4>
			  D.O.B: <?php echo "$patientdob"; ?>
			  </h4>
			 <h4>
			  Height: <?php echo "$patientheight"; ?>cm - Weight: <?php echo "$patientweight"; ?>kg
			  </h4>
            </div>
          </div>
          <!-- End .title -->
		  
		  
                 <div class="content">
            <div class="row-fluid well well-small"> <img class="row-fluid" src="img/sample_avatar_big.jpg"> </div>
            <ul class="nav nav-tabs dark nav-stacked">
			
              <li><a href="prescribe.php?patient=<?php echo "$patientid"; ?>"><i class="icon-ok"></i> Rx</a></li>
              <li><a href="labrefer.php?patient=<?php echo "$patientid"; ?>"><i class="gicon-wrench"></i> Investigations</a></li>

              <li><a href="#"><i class="gicon-th-list"></i> Admit</a></li>
              <li><a href="#"><i class="icon-info-sign"></i> Refer to admin</a></li>
              <li><a href="doctor.php"><i class="icon-warning"></i> Exit patient file</a></li>
   
              
            </ul>
          </div>
          <!-- End .content --> 
        </div>
        <!-- End .span3 -->
        
        <div class="span9">
    
		  
                  <div class="span6">
           <div class="box paint color_11">
            <div class="title">
              <h4> <i class="icon-tasks"></i> <span>Comments</span> </h4>
            </div>
            <div class="content top">
              <form class="form-horizontal" action="" method = "POST">
               
                <div class="form-row control-group row-fluid">
                 <label class="control-label span2"  for="username">Presenting complain</label>
                  <div class="controls span9">
                    <textarea rows="6" cols = "6" class="row-fluid autogrow" name="doctorcomments" id="doctorcomments" placeholder="Start typing"></textarea>
                  </div>
                </div>
				
				 <div class="form-row control-group row-fluid">
                  <label class="control-label span2"  for="username">History of complain</label>
                  <div class="controls span9">
                    <textarea rows="6" cols = "6" class="row-fluid autogrow" name="doctorcommentsb" id="doctorcommentsb" placeholder="Start typing"></textarea>
                  </div>
                </div>
				
				
		 <div class="form-row control-group row-fluid">
                  <label class="control-label span2"  for="username">Physical examination</label>
                  <div class="controls span9">
                    <textarea rows="6" cols = "6" class="row-fluid autogrow" name="doctorcommentsc" id="doctorcommentsc" placeholder="Start typing"></textarea>
                  </div>
                </div>
				
				 <div class="form-row control-group row-fluid">
                  <label class="control-label span2"  for="username">Plan</label>
                  <div class="controls span9">
                    <textarea rows="6" cols = "6" class="row-fluid autogrow" name="doctorcommentsd" id="doctorcommentsd" placeholder="Start typing"></textarea>
                  </div>
                </div>
                
                <div class="control-group row-fluid">
                 <div class="span3 visible-desktop"></div>
                  <div class="controls span5">
                    <button type="submit" name = "confirm" id = "confirm" class="btn btn-primary">Save report</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
		   
        </div>
        <!-- End .span6 -->
         <div class="span6">
          <div class="box paint_hover">
            <div class="title">
  
            <h3> <i class="icon-user"></i> <span>Patient summary</span> </h3>
            </div>
            <div class="content"> 
			<?php if($patientsmoking == $condition){ ?>
			<p>Smoking: <?php echo "$patientsmoking"; ?></p>
			<?php } ?>
			
			<?php if($patientalcohol == $condition){ ?>
			<p>Alcohol: <?php echo "$patientalcohol"; ?></p>
			<?php } ?>
			
			<?php if($patientmarried == $condition){ ?>
			<p>Married: <?php echo "$patientmarried"; ?></p>
			<?php } ?>
			
			
			<p>Allergies: <?php echo "$patientallergy"; ?></p>
			
			
			<?php if($patientasthma == $condition){ ?>
			<p>Asthma: <?php echo "$patientasthma"; ?></p>
			<?php } ?>
			
			<?php if($patientpolio == $condition){ ?>
			<p>Polio: <?php echo "$patientpolio"; ?></p>
			<?php } ?>
			
			<?php if($patienteardisease == $condition){ ?>
			<p>Ear disease: <?php echo "$patienteardisease"; ?></p>
			<?php } ?>
			
			<?php if($patientveneraldisease == $condition){ ?>
			<p>Veneral disease: <?php echo "$patientveneraldisease"; ?></p>
			<?php } ?>
			
			<?php if($patientheartdisease == $condition){ ?>
			<p>Heart disease: <?php echo "$patientheartdisease"; ?></p>
			<?php } ?>
			 </div>
          </div>
          <!-- End .box --> 
		  
		  <div class="box paint_hover">
            <div class="title">
  
            <h3> <i class="icon-info-sign"></i> <span>Vital signs</span> </h3>
            </div>
			
            <div class="content"> 
			<p>Updated <?php echo date("m/d/y h:i:s a", $date); ?> by <?php echo "$staffvitalname"; ?></p>
<p>Last temperature taken: <?php echo "$patientvtemp"; ?> &deg;</p>
			<p>Last Pulse: <?php echo "$patientvpulse"; ?> / min</p>
			<p>Last Blood pressure: <?php echo "$patientvblood"; ?></p>
			<p>Last Respiration: <?php echo "$patientvresp"; ?> / min</p>			 </div>
          </div>
          <!-- End .box --> 
		 
		       <div class="box paint color_16">
            <div class="title">
  
            <h3> <i class="icon-info-sign"></i> <span>Patient lab results</span> </h3>
            </div>
            <div class="content"> 
			 <?php while ($frow1 = mysql_fetch_array($getlaboratoryresults)) {?>
				<?php
				$rid1 = $frow1['id'];
				$labguy = $frow1['labguyid'];
				$diagnosis = $frow1['clinicaldiagnosis'];
				$time1 = relativeTime($frow1['date']);
				
				$identifydoctor = mysql_query("select * from user where id='$labguy'");

$doctorow = mysql_fetch_array($identifydoctor);
$doctorname = $doctorow["staffname"];
?>
			<p>
			<a href = "labresults.php?id=<?php echo "$rid1"; ?>"><?php echo "$diagnosis"; ?></a> - <?php echo "$time1"; ?> by <?php echo "$doctorname"; ?>
			</p>
  <?php } ?>
			</div>
          </div>
		  
		  <div class="box paint color_16">
            <div class="title">
  
            <h3> <i class="icon-info-sign"></i> <span>Assesment history</span> </h3>
            </div>
            <div class="content"> 
			 <?php while ($arow1 = mysql_fetch_array($getassesmenthistory)) {?>
				<?php
				$rid1 = $arow1['id'];
				$staffid = $arow1['staffid'];
				$presenting = $arow1['presenting'];
				$history = $arow1['history'];
				$physical = $arow1['physical'];
				$plan = $arow1['plan'];
				$time1 = relativeTime($arow1['date']);
				
				$identifydoctor = mysql_query("select * from user where id='$staffid'");

$doctorow = mysql_fetch_array($identifydoctor);
$doctorname = $doctorow["staffname"];
?>
			<p>
			Presenting complain: <?php echo "$presenting"; ?>
			<br />
			History of complain: <?php echo "$history"; ?>
			<br />
			Physical assesment: <?php echo "$physical"; ?>
			<br />
			Plan: <?php echo "$plan"; ?>
			<br />
			<?php echo "$time1"; ?> by Doctor <?php echo "$doctorname"; ?>
			</p>
  <?php } ?>
			</div>
          </div>
          <!-- End .box --> 
		
        </div>
        <!-- End .span6 --> 
		
		
		
          
        </div>
        <!-- End .span9 --> 
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
<script src="js/plugins/enquire.min.js" type="text/javascript"></script> 
<!-- <![endif]-->
<script language="javascript" type="text/javascript" src="js/plugins/jquery.sparkline.min.js"></script> 
<script src="js/plugins/excanvas.compiled.js" type="text/javascript"></script> 
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
<script language="javascript" type="text/javascript" src="js/plugins/textarea-autogrow.js"></script> 

<!-- Flot charts --> 
<script language="javascript" type="text/javascript" src="js/plugins/flot/jquery.flot.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/flot/jquery.flot.stack.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/flot/jquery.flot.pie.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/flot/jquery.flot.resize.js"></script> 

<!-- Data tables --> 
<script type="text/javascript" language="javascript" src="js/plugins/datatables/js/jquery.dataTables.js"></script> 

<!-- Task plugin --> 
<script language="javascript" type="text/javascript" src="js/plugins/knockout-2.0.0.js"></script> 

<!-- Custom made scripts for this template --> 
<script src="js/scripts.js" type="text/javascript"></script> 
<script type="text/javascript">
  /**** Specific JS for this page ****/
 $(document).ready(function () {
      
        $('textarea.autogrow').autogrow();
        var elem = $("#chars");
        $("#text").limiter(100, elem);
        // Mask plugin http://digitalbush.com/projects/masked-input-plugin/
        $("#mask-phone").mask("(999) 999-9999");
        $("#mask-date").mask("99-99-9999");
        $("#mask-int-phone").mask("+33 999 999 999");
        $("#mask-tax-id").mask("99-9999999");
        $("#mask-percent").mask("99%");
        // Editor plugin https://github.com/jhollingworth/bootstrap-wysihtml5/
        $('#editor1').wysihtml5({
          "image": false,
          "link": false
          });
        // Chosen select plugin
        $(".chzn-select").chosen({
          disable_search_threshold: 10
        });
        // Datepicker
        $('#datepicker1').datepicker({
          format: 'mm-dd-yyyy'
        });
        $('#datepicker2').datepicker();
        $('.colorpicker').colorpicker()
        $('#colorpicker3').colorpicker();
    });



</script>
</body>
</html>