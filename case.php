<?php 
define('INCLUDE_CHECK',1);
include 'coreengine.php';
hack_protect();


$identifystaff = mysql_query("select * from user where id='$_SESSION[staff_id]'");

$identifypatient = mysql_query("select * from patients where id='$_GET[patient]'");

$row = mysql_fetch_array($identifystaff);
$staffname = $row["staffname"];
$staffrole = strtoupper($row["role"]);

$patientrow = mysql_fetch_array($identifypatient);
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

if (isset($_GET['activate']))
{ 
$removefromwaitinglist = mysql_query("DELETE FROM waiting WHERE patientid ='$_GET[patient]'") or die ("Bad del query");
$reason = $_GET["reason"];
$timer = $_GET["timer"];
mysql_query("INSERT INTO `activity`
(`staffid`,`activity`,`date`,`patient`)
VALUES
('$_SESSION[staff_id]','Attended to $patientsurname $patientother, who was directed from the reception for $reason and had waited for $timer.','".date("U")."','$_GET[patient]')
");
}


if (isset($_POST['vital']))
{ 
function filter($arr) {
return array_map('mysql_real_escape_string', $arr);
}
$_POST = filter($_POST);


if(empty($_POST['temperature']) OR 
   empty($_POST['pulse']) OR 
   empty($_POST['bp']) OR  
   empty($_POST['respiration'])) {


$msg = urlencode("You have left important fields empty. Please start over.");
header("Location: case.php?patient=$_GET[patient]&msg=$msg");
} else {

$temp = $_POST["temperature"];
$pulse = $_POST["pulse"];
$blood = $_POST["bp"];
$respiration = $_POST["respiration"];




mysql_query("INSERT INTO `vitals`
(`patientid`,`temperature`,`pulse`,`blood`,`resp`,`date`,`staffid`)
VALUES
('$_GET[patient]','$temp','$pulse','$blood','$respiration','".date("U")."','$_SESSION[staff_id]')
");

mysql_query("UPDATE patients SET
			
			`temperature` = '$temp',
			`pulse` = '$pulse',
			`blood` = '$blood',
			`resp` = '$respiration'
			
                         
			 WHERE id='$_GET[patient]'
			") or die(mysql_error());
			
			
mysql_query("INSERT INTO `activity`
(`staffid`,`activity`,`date`,`patient`)
VALUES
('$_SESSION[staff_id]','Took vital signs for $patientsurname $patientother','".date("U")."','$_GET[patient]')
");


$msg = urlencode("Vital signs updated");
header("Location: profile.php?patient=$_GET[patient]&msg=$msg#vital");

	} 
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
header("Location: profile.php?patient=$_GET[patient]&msg=$msg");
} else {

$spatientsurname = $_POST["surname"];
$spatientother = $_POST["othername"];
$spatienttype = $_POST["type"];
$spatientcnumber = $_POST["cnumber"];
$spatienttelenum = $_POST["tel"];
$spatienthospitalnumber= $_POST["hnumber"];
$spatientcompany = $_POST["company"];
$spatientdob = $_POST["dob"];
$spatientgender = $_POST["gender"];
$spatientheight = $_POST["height"];
$spatientweight = $_POST["weight"];
$spatientsmoking = $_POST["smoking"];
$spatientalcohol = $_POST["alcohol"];
$spatientmarried = $_POST["married"];
$spatientallergy = $_POST["allergy"];
$spatientasthma = $_POST["asthma"];
$spatientpolio = $_POST["polio"];
$spatienteardisease = $_POST["eardisease"];
$spatientveneraldisease = $_POST["patientveneraldisease"];
$spatientheartdisease = $_POST["patientheartdisease"];
$spatientsurgeryundergone = $_POST["patientsurgeryundergone"];
$spatientkidney = $_POST["patientkidney"];
$spatientdiabetes = $_POST["diabetes"];
$spatienthbp = $_POST["patienthbp"];
$spatientepilepsy = $_POST["patientepilepsy"];
$spatientpsychiatricillness = $_POST["psychriaticillness"];
$spatientbleedingdisorders = $_POST["bleedingdisorders"];
$spatientmajorinjuries = $_POST["patientmajorinjuries"];
$spatienttb = $_POST["tb"];
$spatientadditionalcomments = $_POST["patientadditionalcomments"];
$spatientfasthma = $_POST["FamilyAsthma"];
$spatientfcardiac = $_POST["FamilyCardiacDisease"];
$spatientfhbp = $_POST["FamilyHbp"];
$spatientftb = $_POST["FamilyTB"];
$spatientfdiabetes = $_POST["FamilyDiabetes"];
$spatientfcancer = $_POST["FamilyCancer"];
$spatientffpi = $_POST["FamilyPsychiatricIllness"];
$spatientfaod = $_POST["FamilyAnyOtherDiseases"];




mysql_query("UPDATE patients SET
			
			`surname` = '$spatientsurname',
			`other` = '$spatientother',
			`type` = '$spatienttype',
			`cnumber` = '$spatientcnumber',
			`telenum` = '$spatienttelenum',
			`hospitalnumber` = '$spatienthospitalnumber',
			`company` = '$spatientcompany',
			`dob` = '$spatientdob',
			`gender` = '$spatientgender',
			`height` = '$spatientheight',
			`weight` = '$spatientweight',
			`smoking` = '$spatientsmoking',
			`alcohol` = '$spatientalcohol',
			`married` = '$spatientmarried',
			`allergy` = '$spatientallergy',
			`asthma` = '$spatientasthma',
			`polio` = '$spatientpolio',
			`ear disease` = '$spatienteardisease',
			`veneral disease` = '$spatientveneraldisease',
			`heart disease` = '$spatientheartdisease',
			`sugery undergone` = '$spatientsurgeryundergone',
			`kidney` = '$spatientkidney',
			`diabetes` = '$spatientdiabetes',
			`hbp` = '$spatienthbp',
			`epilepsy(fits)` = '$spatientepilepsy',
			`psychiatric illness` = '$spatientpsychiatricillness',
			`bleeding disorders` = '$spatientbleedingdisorders',
			`major injuries` = '$spatientmajorinjuries',
			`tb` = '$spatienttb',
			`Family Asthma` = '$spatientfasthma',
			`Family Cardiac Disease` = '$spatientfcardiac',
			`Family Hbp` = '$spatientfhbp',
			`Family TB` = '$spatientftb',
			`Family Diabetes` = '$spatientfdiabetes',
			`Family Cancer` = '$spatientfcancer',
			`Family Psychiatric Illness` = '$spatientfpi',
			`Family Any Other Diseases` = '$spatientfaod'
                         
			 WHERE id='$_GET[patient]'
			") or die(mysql_error());
			

mysql_query("INSERT INTO `activity`
(`staffid`,`activity`,`date`,`patient`)
VALUES
('$_SESSION[staff_id]','Updated medical record for $patientsurname $patientother','".date("U")."','$_GET[patient]')
");


$msg = urlencode("Patient record updated");
header("Location: profile.php?patient=$_GET[patient]&msg=$msg");

	} 
	 }
?>
<!DOCTYPE html>
<html class="sidebar_default no-js" lang="en">
<head>
<meta charset="utf-8">
<title>MEDICAL SOFTWARE</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="css/images/favicon.png">
<!-- Le styles -->
<link href="js/plugins/chosen/chosen/chosen.css" rel="stylesheet">
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
	   <form class="form-horizontal" action='' method="POST">
        <div class="box paint color_7">
          <div class="title">
            <h4> <i class="icon-book"></i><span>NEW PATIENT MEDICAL HISTORY</span> </h4>
          </div>
          <div class="content full">
            <section id="wizard">
              <div id="rootwizard">
                <div class="content row-fluid mb5">
                  <ul class="row-fluid fluid mb5">
                    <li class="span3"><a class="btn btn-default btn-large" href="#tab1" data-toggle="tab"><small>1.</small><strong> Patient Data</strong></a></li>
                    <li class="span3"><a class="btn btn-default btn-large" href="#tab2" data-toggle="tab"><small>2.</small> <strong>Personal History</strong></a></li>
                    <li class="span3"><a class="btn btn-default btn-large" href="#tab3" data-toggle="tab"><small>3.</small> <strong>Past / present illness</strong></a></li>
                    <li class="span3"><a class="btn btn-default btn-large" href="#tab4" data-toggle="tab"><small>4.</small> <strong>Family history</strong></a></li>
                  </ul>
                </div>
                <div class="tab-content content">
                  <div class="tab-pane" id="tab1">
                    
                      <fieldset>
                        <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Surname</label>
                          <div class="controls span9">
                           <input value = "<?php echo "$patientsurname"; ?>" type="text" id="surname" name="surname" placeholder="" class="row-fluid">
                           
                          </div>
                        </div>
                        <div class="control-group row-fluid"> 
                          <!-- Email -->
                          <label class="control-label span2"  for="Email">Other Names</label>
                          <div class="controls span9">
                            <input type="text" value = "<?php echo "$patientother"; ?>" id="othername" name="othername" placeholder="" class="row-fluid">

                          </div>
                        </div>
                        <div class="control-group row-fluid"> 
                          <!-- Password -->
                          <label class="control-label span2"  for="address">Date of birth</label>
                          <div class="controls span9">
                             <input type="text" name = "dob" id="datepicker2" value="<?php echo "$patientdob"; ?>" class="row-fluid">
                           
                          </div>
                        </div>
						<div class="form-row control-group row-fluid">
                  <label class="control-label span2" for="default-select">GENDER</label>
                  <div class="controls span9">
                    <select  class="chzn-select" id="gender" name = "gender">
                      <option value="<?php echo "$patientgender"; ?>"><?php echo "$patientgender"; ?></option>
                      <option value="MALE">MALE</option>
                      <option value="FEMALE">FEMALE</option>
                    </select>
                  </div>
                </div>
				<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span2"  for="Password">Height</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientheight"; ?>" type="text" id="height" name="height" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span2"  for="Password">Weight</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientweight"; ?>" type="text" id="weight" name="weight" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="form-row control-group row-fluid">
                  <label class="control-label span2" for="default-select">TYPE</label>
                  <div class="controls span9">
                    <select class="chzn-select" id="type" name = "type">
                      <option value="<?php echo "$patienttype"; ?>"><?php echo "$patienttype"; ?></option>
                      <option value="PRIVATE">PRIVATE</option>
                      <option value="COMPANY">COMPANY</option>
                    </select>
                  </div>
                </div>
    <div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span2"  for="Password">Company Number</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientcnumber"; ?>" type="text" id="cnumber" name="cnumber" placeholder="" class="row-fluid">
       
      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span2"  for="Password">Telephone number</label>
      <div class="controls span9">
        <input value = "<?php echo "$patienttelenum"; ?>" type="text" id="tel" name="tel" placeholder="" class="row-fluid">

      </div>
    </div>
		<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span2"  for="Password">Hospital number</label>
      <div class="controls span9">
        <input value = "<?php echo "$patienthospitalnumber"; ?>" type="text" id="hnumber" name="hnumber" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span2"  for="Password">Company Name</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientcompany"; ?>" type="text" id="company" name="company" placeholder="" class="row-fluid">

      </div>
    </div>
                      </fieldset>
                   
                  </div>
                  <div class="tab-pane" id="tab2">
                   
                      <fieldset>
              
                        <div class="form-row control-group row-fluid">
                          <label class="control-label span2">Smoking</label>
                          <div class="controls span9">
                            <select id="smoking" name="smoking">
                              <option value="<?php echo "$patientsmoking"; ?>"><?php echo "$patientsmoking"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						
						<div class="form-row control-group row-fluid">
                          <label class="control-label span2">Alcohol</label>
                          <div class="controls span9">
                            <select id="alcohol" name="alcohol">
                              <option value="<?php echo "$patientalcohol"; ?>"><?php echo "$patientalcohol"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						
						<div class="form-row control-group row-fluid">
                          <label class="control-label span2">Married</label>
                          <div class="controls span9">
                            <select id="married" name="married">
                              <option value="<?php echo "$patientmarried"; ?>"><?php echo "$patientmarried"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
                        <div class="control-group row-fluid"> 
                          <!-- Email -->
                          <label class="control-label span2"  for="destination">Allergy</label>
                          <div class="controls span9">
                            <input type="text" id="allergy" name="allergy" value="<?php echo "$patientallergy"; ?>" class="row-fluid">
                            
                          </div>
                        </div>
                       
                      </fieldset>
                   
                  </div>
                  <div class="tab-pane" id="tab3">
                   
                      <fieldset>
                       <div class="form-row control-group row-fluid">
                          <label class="control-label span2">Asthma</label>
                          <div class="controls span9">
                            <select id="asthma" name="asthma">
                              <option value="<?php echo "$patientasthma"; ?>"><?php echo "$patientasthma"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						<div class="form-row control-group row-fluid">
                          <label class="control-label span2">Polio</label>
                          <div class="controls span9">
                            <select id="polio" name="polio">
                              <option value="<?php echo "$patientpolio"; ?>"><?php echo "$patientpolio"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						<div class="form-row control-group row-fluid">
                          <label class="control-label span2">Ear disease</label>
                          <div class="controls span9">
                            <select id="eardisease" name="eardisease">
                              <option value="<?php echo "$patienteardisease"; ?>"><?php echo "$patienteardisease"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						<div class="form-row control-group row-fluid">
                          <label class="control-label span2">Veneral disease</label>
                          <div class="controls span9">
                            <select id="patientveneraldisease" name="patientveneraldisease">
                              <option value="<?php echo "$patientveneraldisease"; ?>"><?php echo "$patientveneraldisease"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						<div class="form-row control-group row-fluid">
                          <label class="control-label span2">Heart disease</label>
                          <div class="controls span9">
                            <select id="patientheartdisease" name="patientheartdisease">
                              <option value="<?php echo "$patientheartdisease"; ?>"><?php echo "$patientheartdisease"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						<div class="form-row control-group row-fluid">
                          <label class="control-label span2">Surgery Undergone</label>
                          <div class="controls span9">
                            <select id="patientsurgeryundergone" name="patientsurgeryundergone">
                              <option value="<?php echo "$patientsurgeryundergone"; ?>"><?php echo "$patientsurgeryundergone"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						<div class="form-row control-group row-fluid">
                          <label class="control-label span2">Kidney disease</label>
                          <div class="controls span9">
                            <select id="patientkidney" name="patientkidney">
                              <option value="<?php echo "$patientkidney"; ?>"><?php echo "$patientkidney"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						<div class="form-row control-group row-fluid">
                          <label class="control-label span2">Diabetes</label>
                          <div class="controls span9">
                            <select id="diabetes" name="diabetes">
                              <option value="<?php echo "$patientdiabetes"; ?>"><?php echo "$patientdiabetes"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						<div class="form-row control-group row-fluid">
                          <label class="control-label span2">High Blood Pressure</label>
                          <div class="controls span9">
                            <select id="patienthbp" name="patienthbp">
                              <option value="<?php echo "$patienthbp"; ?>"><?php echo "$patienthbp"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						<div class="form-row control-group row-fluid">
                          <label class="control-label span2">Epilepsy</label>
                          <div class="controls span9">
                            <select id="patientepilepsy" name="patientepilepsy">
                              <option value="<?php echo "$patientepilepsy"; ?>"><?php echo "$patientepilepsy"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						<div class="form-row control-group row-fluid">
                          <label class="control-label span2">Psychriatic Illness</label>
                          <div class="controls span9">
                            <select id="psychriaticillness" name="psychriaticillness">
                              <option value="<?php echo "$patientpsychiatricillness"; ?>"><?php echo "$patientpsychiatricillness"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						<div class="form-row control-group row-fluid">
                          <label class="control-label span2">Bleeding disorder</label>
                          <div class="controls span9">
                            <select id="bleedingdisorders" name="bleedingdisorders">
                              <option value="<?php echo "$patientbleedingdisorders"; ?>"><?php echo "$patientbleedingdisorders"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						<div class="form-row control-group row-fluid">
                          <label class="control-label span2">Major injuries</label>
                          <div class="controls span9">
                            <select id="patientmajorinjuries" name="patientmajorinjuries">
                              <option value="<?php echo "$patientmajorinjuries"; ?>"><?php echo "$patientmajorinjuries"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						<div class="form-row control-group row-fluid">
                          <label class="control-label span2">TB</label>
                          <div class="controls span9">
                            <select id="tb" name="tb">
                              <option value="<?php echo "$patienttb"; ?>"><?php echo "$patienttb"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span2"  for="Password">Additional Comments</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientadditionalcomments"; ?>" type="text" id="patientadditionalcomments" name="patientadditionalcomments" placeholder="" class="row-fluid">

      </div>
    </div>
                        
                      </fieldset>
                   
                  </div>
                  <div class="tab-pane" id="tab4">
                         
                      <fieldset>
                
						<div class="form-row control-group row-fluid">
                          <label class="control-label span2">Family Asthma</label>
                          <div class="controls span9">
                            <select id="FamilyAsthma" name="FamilyAsthma">
                              <option value="<?php echo "$patientfasthma"; ?>"><?php echo "$patientfasthma"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						<div class="form-row control-group row-fluid">
                          <label class="control-label span2">Family Cardiac Disease</label>
                          <div class="controls span9">
                            <select id="FamilyCardiacDisease" name="FamilyCardiacDisease">
                              <option value="<?php echo "$patientfcardiac"; ?>"><?php echo "$patientfcardiac"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						<div class="form-row control-group row-fluid">
                          <label class="control-label span2">Family HBP</label>
                          <div class="controls span9">
                            <select id="FamilyHbp" name="FamilyHbp">
                              <option value="<?php echo "$patientfhbp"; ?>"><?php echo "$patientfhbp"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
                        <div class="form-row control-group row-fluid">
                          <label class="control-label span2">Family TB</label>
                          <div class="controls span9">
                            <select id="FamilyTB" name="FamilyTB">
                              <option value="<?php echo "$patientftb"; ?>"><?php echo "$patientftb"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						
						 <div class="form-row control-group row-fluid">
                          <label class="control-label span2">Family Diabetes</label>
                          <div class="controls span9">
                            <select id="FamilyDiabetes" name="FamilyDiabetes">
                              <option value="<?php echo "$patientfdiabetes"; ?>"><?php echo "$patientfdiabetes"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						
						 <div class="form-row control-group row-fluid">
                          <label class="control-label span2">Family Cancer</label>
                          <div class="controls span9">
                            <select id="FamilyCancer" name="FamilyCancer">
                              <option value="<?php echo "$patientfcancer"; ?>"><?php echo "$patientfcancer"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						
						<div class="form-row control-group row-fluid">
                          <label class="control-label span2">Family Psychiatric Illness</label>
                          <div class="controls span9">
                            <select id="FamilyPsychiatricIllness" name="FamilyPsychiatricIllness">
                              <option value="<?php echo "$patientfpi"; ?>"><?php echo "$patientfpi"; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              
                            </select>
                            
                          </div>
                        </div>
						
						<div class="form-row control-group row-fluid">
                          <label class="control-label span2">Family Any Other Diseases</label>
                          <div class="controls span9">
						        <input value = "<?php echo "$patientfaod"; ?>" type="text" id="FamilyAnyOtherDiseases" name="FamilyAnyOtherDiseases" placeholder="" class="row-fluid">
                            
                            
                          </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                  <div class="description content">
                    <ul class="pager wizard mb5">
                      <li class="previous ">
					  
                        <i class="icon-caret-left"></i> Previous
                      <li class="next">
                        Next <i class="icon-caret-right"></i>
                      </li>
                      <li class="next finish" style="display:none;">
                        <button class="btn btn-success pull-right btn-large" type="submit" name = "store" id = "store">Finish</button>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
		
		<a name = "vital"></a>
		<div class="box paint color_7">
            <div class="title">
              <h4> <i class="icon-calendar"></i> <span>TAKE VITAL SIGNS</span> </h4>
            </div>
            <div class="content ">
             <form class="form-horizontal" action="" method="post">
  <fieldset>
   
     <div class="control-group row-fluid">
      <!-- Username -->
      <label class="control-label span3"  for="keyword">Temperature &deg;</label>
      <div class="controls span9">
        <input value = "" type="text" id="temperature" name="temperature" placeholder="" class="row-fluid">

      </div>
    </div>
	
	<div class="control-group row-fluid">
      <!-- Username -->
      <label class="control-label span3"  for="keyword">Pulse / MIN</label>
      <div class="controls span9">
        <input value = "" type="text" id="pulse" name="pulse" placeholder="" class="row-fluid">

      </div>
    </div>
	
	<div class="control-group row-fluid">
      <!-- Username -->
      <label class="control-label span3"  for="keyword">Blood pressure</label>
      <div class="controls span9">
        <input value = "" type="text" id="bp" name="bp" placeholder="" class="row-fluid">

      </div>
    </div>
	
	<div class="control-group row-fluid">
      <!-- Username -->
      <label class="control-label span3"  for="keyword">Respiration / MIN</label>
      <div class="controls span9">
        <input value = "" type="text" id="respiration" name="respiration" placeholder="" class="row-fluid">

      </div>
    </div>

  <div class="control-group row-fluid">
  <div class="span3 visible-desktop"></div>
                  <div class="controls span9">
                    <button name = "vital" type="submit" class="btn btn-primary">Save</button>
                  </div>
                </div>

 
   
  </fieldset>
</form>
            </div>
          </div>
          <!-- End .box --> 
        <!-- End .box --> 
        
      </div>
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
<script language="javascript" type="text/javascript" src="js/plugins/wysihtml5-0.3.0.min.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/bootstrap-wysihtml5.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/jquery.peity.min.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/textarea-autogrow.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/character-limit.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/jquery.maskedinput-1.3.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/chosen/chosen/chosen.jquery.min.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/bootstrap-datepicker.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/bootstrap-colorpicker.js"></script> 

<!-- Forms Wizard --> 
<script language="javascript" type="text/javascript" src="js/plugins/wizard-master/jquery.bootstrap.wizard.js"></script> 

<!-- Custom made scripts for this template --> 
<script src="js/scripts.js" type="text/javascript"></script> 
<script type="text/javascript">
  /**** Specific JS for this page ****/



 $(document).ready(function () {
       
        $('textarea.autogrow').autogrow();
        var elem = $("#chars");
        // $("#text").limiter(100, elem);
        // Mask plugin http://digitalbush.com/projects/masked-input-plugin/
        $("#mask-phone").mask("999-999-9999");
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

    $(document).ready(function() {
      $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
      var $total = navigation.find('li').length;
      var $current = index+1;
      var $percent = ($current/$total) * 100;
      $('#rootwizard').find('.bar').css({width:$percent+'%'});
      
      // If it's the last tab then hide the last button and show the finish instead
      if($current >= $total) {
        $('#rootwizard').find('.pager .next').hide();
        $('#rootwizard').find('.pager .finish').show();
        $('#rootwizard').find('.pager .finish').removeClass('disabled');
      } else {
        $('#rootwizard').find('.pager .next').show();
        $('#rootwizard').find('.pager .finish').hide();
      }
      
    }});
    // $('#rootwizard .finish').click(function() {
    //   alert('Finished! Starting over!');
    //   $('#rootwizard').find("a[href*='tab1']").trigger('click');
    // }); 
   
  }); 

</script>
</body>
</html>