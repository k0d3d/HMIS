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
header("Location: casefile.php?patient=$_GET[patient]&msg=$msg");
} else {

$temp = $_POST["temperature"];
$pulse = $_POST["pulse"];
$blood = $_POST["bp"];
$respiration = $_POST["respiration"];




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
header("Location: casefile.php?patient=$_GET[patient]&msg=$msg");

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
header("Location: casefile.php?patient=$_GET[patient]&msg=$msg");
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
header("Location: casefile.php?patient=$_GET[patient]&msg=$msg");

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
              <h4> <i class="icon-calendar"></i> <span>TAKE VITAL SIGNS</span> </h4>
            </div>
            <div class="content ">
             <form class="form-horizontal" action="" method="post">
  <fieldset>
   
     <div class="control-group row-fluid">
      <!-- Username -->
      <label class="control-label span3"  for="keyword">Temperature</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientvtemp"; ?>" type="text" id="temperature" name="temperature" placeholder="" class="row-fluid">

      </div>
    </div>
	
	<div class="control-group row-fluid">
      <!-- Username -->
      <label class="control-label span3"  for="keyword">Pulse</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientvpulse"; ?>" type="text" id="pulse" name="pulse" placeholder="" class="row-fluid">

      </div>
    </div>
	
	<div class="control-group row-fluid">
      <!-- Username -->
      <label class="control-label span3"  for="keyword">Blood pressure</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientvblood"; ?>" type="text" id="bp" name="bp" placeholder="" class="row-fluid">

      </div>
    </div>
	
	<div class="control-group row-fluid">
      <!-- Username -->
      <label class="control-label span3"  for="keyword">Respiration</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientvresp"; ?>" type="text" id="respiration" name="respiration" placeholder="" class="row-fluid">

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
		  
	
        </div>
            <!-- End .span6 -->
        <div class="span6 ">
<div class="box paint color_2">
            <div class="title">
              <h4> <i class="icon-calendar"></i> <span>MEDICAL HISTORY</span> </h4>
            </div>
            <div class="content ">
             <form class="form-horizontal" action='' method="POST">
  <fieldset>
   
     <div class="control-group row-fluid">
      <!-- Username -->
      <label class="control-label span3"  for="username">Surname</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientsurname"; ?>" type="text" id="surname" name="surname" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Username -->
      <label class="control-label span3"  for="username">Other Names</label>
      <div class="controls span9">
        <input type="text" value = "<?php echo "$patientother"; ?>" id="othername" name="othername" placeholder="" class="row-fluid">

      </div>
    </div>
<div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="default-select">TYPE</label>
                  <div class="controls span9">
                    <select data-placeholder="Choose your favorite character..." class="chzn-select" id="type" name = "type">
                      <option value="<?php echo "$patienttype"; ?>"><?php echo "$patienttype"; ?></option>
                      <option value="PRIVATE">PRIVATE</option>
                      <option value="COMPANY">COMPANY</option>
                    </select>
                  </div>
                </div>
    <div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Company Number</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientcnumber"; ?>" type="text" id="cnumber" name="cnumber" placeholder="" class="row-fluid">
       
      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Telephone number</label>
      <div class="controls span9">
        <input value = "<?php echo "$patienttelenum"; ?>" type="text" id="tel" name="tel" placeholder="" class="row-fluid">

      </div>
    </div>
		<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Hospital number</label>
      <div class="controls span9">
        <input value = "<?php echo "$patienthospitalnumber"; ?>" type="text" id="hnumber" name="hnumber" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Company Name</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientcompany"; ?>" type="text" id="company" name="company" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Date of Birth</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientdob"; ?>" type="text" id="dob" name="dob" placeholder="" class="row-fluid">

      </div>
    </div>
<div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="default-select">GENDER</label>
                  <div class="controls span9">
                    <select data-placeholder="Choose your favorite character..." class="chzn-select" id="gender" name = "gender">
                      <option value="<?php echo "$patientgender"; ?>"><?php echo "$patientgender"; ?></option>
                      <option value="MALE">MALE</option>
                      <option value="FEMALE">FEMALE</option>
                    </select>
                  </div>
                </div>
				<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Height</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientheight"; ?>" type="text" id="height" name="height" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Weight</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientweight"; ?>" type="text" id="weight" name="weight" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Smoking</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientsmoking"; ?>" type="text" id="smoking" name="smoking" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Alcohol</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientalcohol"; ?>" type="text" id="alcohol" name="alcohol" placeholder="" class="row-fluid">

      </div>
    </div>
	
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Married</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientmarried"; ?>" type="text" id="married" name="married" placeholder="" class="row-fluid">

      </div>
    </div>
	
		
		<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Allergy</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientallergy"; ?>" type="text" id="allergy" name="allergy" placeholder="" class="row-fluid">

      </div>
    </div>
		<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Asthma</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientasthma"; ?>" type="text" id="asthma" name="asthma" placeholder="" class="row-fluid">

      </div>
    </div>
		<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Polio</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientpolio"; ?>" type="text" id="polio" name="polio" placeholder="" class="row-fluid">

      </div>
    </div>
		<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Ear disease</label>
      <div class="controls span9">
        <input value = "<?php echo "$patienteardisease"; ?>" type="text" id="eardisease" name="eardisease" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Veneral disease</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientveneraldisease"; ?>" type="text" id="patientveneraldisease" name="patientveneraldisease" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Heart disease</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientheartdisease"; ?>" type="text" id="patientheartdisease" name="patientheartdisease" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Sugery Undergone</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientsurgeryundergone"; ?>" type="text" id="patientsurgeryundergone" name="patientsurgeryundergone" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Kidney disease</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientkidney"; ?>" type="text" id="patientkidney" name="patientkidney" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Diabetes</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientdiabetes"; ?>" type="text" id="diabetes" name="diabetes" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">High Blood Pressure</label>
      <div class="controls span9">
        <input value = "<?php echo "$patienthbp"; ?>" type="text" id="patienthbp" name="patienthbp" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Epilepsy</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientepilepsy"; ?>" type="text" id="patientepilepsy" name="patientepilepsy" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Psychriatic Illness</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientpsychiatricillness"; ?>" type="text" id="psychriaticillness" name="psychriaticillness" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Bleeding disorder</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientbleedingdisorders"; ?>" type="text" id="bleedingdisorders" name="bleedingdisorders" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Major injuries</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientmajorinjuries"; ?>" type="text" id="patientmajorinjuries" name="patientmajorinjuries" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">TB</label>
      <div class="controls span9">
        <input value = "<?php echo "$patienttb"; ?>" type="text" id="tb" name="tb" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Additional Comments</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientadditionalcomments"; ?>" type="text" id="patientadditionalcomments" name="patientadditionalcomments" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Family Asthma</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientfasthma"; ?>" type="text" id="FamilyAsthma" name="FamilyAsthma" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Family Cardiac Disease</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientfcardiac"; ?>" type="text" id="FamilyCardiacDisease" name="FamilyCardiacDisease" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Family HBP</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientfhbp"; ?>" type="text" id="FamilyHbp" name="FamilyHbp" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Family TB</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientftb"; ?>" type="text" id="FamilyTB" name="FamilyTB" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Family Diabetes</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientfdiabetes"; ?>" type="text" id="FamilyDiabetes" name="FamilyDiabetes" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Family Cancer</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientfcancer"; ?>" type="text" id="FamilyCancer" name="FamilyCancer" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Family Psychiatric Illness</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientfpi"; ?>" type="text" id="FamilyPsychiatricIllness" name="FamilyPsychiatricIllness" placeholder="" class="row-fluid">

      </div>
    </div>
	<div class="control-group row-fluid">
      <!-- Password -->
      <label class="control-label span3"  for="Password">Family Any Other Diseases</label>
      <div class="controls span9">
        <input value = "<?php echo "$patientfaod"; ?>" type="text" id="FamilyAnyOtherDiseases" name="FamilyAnyOtherDiseases" placeholder="" class="row-fluid">

      </div>
    </div>
  <div class="control-group row-fluid">
  <div class="span3 visible-desktop"></div>
                  <div class="controls span9">
                    <button type="submit" name = "store" id = "store" class="btn btn-primary">Update</button>
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
<script type="text/javascript">
  /**** Specific JS for this page ****/
/* Todo Plugin */
var todo_data = [
{id: 1, title: "<i class='gicon-search icon-white'><\/i>Perform laboratory scan", isDone: false},
{id: 2, title: "<i class='gicon-briefcase icon-white'><\/i>Appointment with DIGYINC staff", isDone: true},
{id: 3, title: "<i class='gicon-heart icon-white'><\/i>Confirm that this template is awesome", isDone: false},
{id: 4, title: "<i class='gicon-thumbs-up icon-white'><\/i>Discharge Adeife Oteju", isDone: false},  
       
];


function Task(data) {
  this.title = ko.observable(data.title);
  this.isDone = ko.observable(data.isDone);
  this.isEditing = ko.observable(data.isEditing);

  this.startEdit = function (event) {
      console.log("editing");
      this.isEditing(true);
  }

  this.updateTask = function (task) {
      this.isEditing(false);
  }
}

function TaskListViewModel() {
          // Data
          var self = this;
          self.tasks = ko.observableArray([]);
          self.newTaskText = ko.observable();
          self.incompleteTasks = ko.computed(function() {
              return ko.utils.arrayFilter(self.tasks(), 
                function(task) { 
                  return !task.isDone() && !task._destroy;
              });
          });

          self.completeTasks = ko.computed(function(){
              return ko.utils.arrayFilter(self.tasks(), 
                function(task) { 
                  return task.isDone() && !task._destroy;
              });
          });

          // Operations
          self.addTask = function() {
              self.tasks.push(new Task({ title: this.newTaskText(), isEditing: false }));

              self.newTaskText("");

          };
          self.removeTask = function(task) { self.tasks.destroy(task) };

          self.removeCompleted = function(){
              self.tasks.destroyAll(self.completeTasks());
          };

          /* Load the data */
          var mappedTasks = $.map(todo_data, function(item){
              return new Task(item);
          });

          self.tasks(mappedTasks);      
      }

      ko.applyBindings(new TaskListViewModel());  
      //End Todo Plugin

      </script><script type="text/javascript">

      //Chart - Campaigns
      $(function () {
        var data_campaigns = [[1,10], [2,9], [3,8], [4,6], [5,5], [6,3], [7,9], [8,10],[9,12],[10,14],[11,15],[12,13],[13,11],[14,10],[15,9],[16,8],[17,12],[18,14],[19,16],[20,19],[21,20],[22,20],[23,19],[24,17],[25,15],[25,14],[26,12],[27,10],[28,8],[29,10],[30,12],[31,10], [32,9], [33,8], [34,6], [35,5], [36,3], [37,9], [38,10],[39,12],[40,14],[41,15],[42,13],[43,11],[44,10],[45,9],[46,8],[47,12],[48,14],[49,16],[50,12],[51,10], [52,9], [53,8], [54,6], [55,5], [56,3], [57,9], [58,10],[59,12],[60,14],[61,15],[62,13],[63,11],[64,10],[65,9],[66,8],[67,12],[68,14],[69,16]];
        var data_campaigns2 = [[1,12], [2,10], [3,9], [4,8], [5,8], [6,8], [7,8], [8,8],[9,9],[10,9],[11,10],[12,11],[13,12],[14,11],[15,10],[16,10],[17,9],[18,10],[19,11],[20,11],[21,12],[22,13],[23,14],[24,13],[25,12],[25,12],[26,11],[27,10],[28,9],[29,8],[30,7],[31,7], [32,8], [33,8], [34,7], [35,6], [36,6], [37,7], [38,8],[39,8],[40,9],[41,10],[42,11],[43,11],[44,12],[45,12],[46,11],[47,10],[48,9],[49,8],[50,8],[51,9], [52,10], [53,11], [54,12], [55,12], [56,12], [57,13], [58,13],[59,12],[60,11],[61,10],[62,9],[63,8],[64,7],[65,7],[66,6],[67,5],[68,4],[69,3]];

        var plot = $.plot($("#placeholder"),
            [ { data: data_campaigns, color:"rgba(0,0,0,0.2)", shadowSize:0, 
            bars: {
              show: true,
              lineWidth: 0,
              fill: true,

              fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] }
          }
      } , 
      { data: data_campaigns2, 

          color:"rgba(255,255,255, 0.4)", 
          shadowSize:0,
          lines: {show:true, fill:false}, points: {show:false},
          bars: {show:false}
      }  
      ],     
      {
        series: {
         bars: {show:true, barWidth: 0.6}
     },
     grid: { show:false, hoverable: true, clickable: false, autoHighlight: true, borderWidth:0   },
     yaxis: { min: 0, max: 20 }

 });
       
        function showTooltip(x, y, contents) {
            $('<div id="tooltip"><div class="date">12 Nov 2012<\/div><div class="title text_color_3">'+x/10+'%<\/div> <div class="description text_color_3">CTR<\/div><div class="title ">'+x*12+'<\/div><div class="description">Impressions<\/div><\/div>').css( {
                position: 'absolute',
                display: 'none',
                top: y - 125,
                left: x - 40,
                border: '0px solid #ccc',
                padding: '2px 6px',
                'background-color': '#fff',
                opacity: 10
            }).appendTo("body").fadeIn(200);
        }

        var previousPoint = null;
        $("#placeholder").bind("plothover", function (event, pos, item) {
            $("#x").text(pos.x.toFixed(2));
            $("#y").text(pos.y.toFixed(2));
            if (item) {
                if (previousPoint != item.dataIndex) {
                  previousPoint = item.dataIndex;
                  $("#tooltip").remove();
                  var x = item.datapoint[0].toFixed(2),
                  y = item.datapoint[1].toFixed(2);
                  showTooltip(item.pageX, item.pageY,
                    x);
              }
          }
      });

         //Fundraisers chart
         var data_fund = [[1,10], [2,9], [3,8], [4,6], [5,5], [6,3], [7,9], [8,10],[9,12],[10,14],[11,15],[12,13],[13,11],[14,10],[15,9],[16,8],[17,12],[18,14],[19,16],[20,19],[21,20],[22,20],[23,19],[24,17],[25,15],[25,14],[26,12],[27,10],[28,8],[29,10],[30,12],[31,10], [32,9], [33,8], [34,6], [35,5], [36,3], ];
         $.plot($("#placeholder2"),
           [ { data: data_fund, color:"#fff", shadowSize:0, 
           bars: {
              show: true,
              lineWidth: 0,
              fill: true,
              highlight: {
                opacity: 0.3
            },
            fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] }
        }
    } 
    ],     
    {
       series: {
         bars: {show:true, barWidth: 0.6}
     },
     grid: { show:false, hoverable: true, clickable: false, autoHighlight: true, borderWidth:0   },
     yaxis: { min: 0, max: 23 }

 });

         function showTooltip2(x, y, contents) {
          $('<div id="tooltip"><div class="title ">'+x*2+'</div><div class="description">Impressions</div></div>').css( {
            position: 'absolute',
            display: 'none',
            top: y - 58,
            left: x - 40,
            border: '0px solid #ccc',
            padding: '2px 6px',
            'background-color': '#fff',
            opacity: 10
        }).appendTo("body").fadeIn(200);
      }

      var previousPoint = null;
      $("#placeholder2").bind("plothover", function (event, pos, item) {
          $("#x").text(pos.x.toFixed(2));
          $("#y").text(pos.y.toFixed(2));
          if (item) {
            if (previousPoint != item.dataIndex) {
              previousPoint = item.dataIndex;
              $("#tooltip").remove();
              var x = item.datapoint[0].toFixed(2),
              y = item.datapoint[1].toFixed(2);
              showTooltip2(item.pageX, item.pageY,
                x);
          }
      }
  });
    //Envato chart
    $.plot($("#placeholder3"),
       [ { data: data_fund, color:"rgba(0,0,0,0.2)", shadowSize:0, 
       bars: {
          lineWidth: 0,
          fill: true,
          fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] }
      },
      lines: {show:false, fill:true}, points: {show:false} } 
  ],     
  {
   series: {
     bars: {show:true, barWidth: 0.6}
 },
 grid: { show:false, hoverable: true, clickable: false, autoHighlight: true, borderWidth:0   },
 yaxis: { min: 0, max: 23 }

});
    //Facebook chart
    $.plot($("#placeholder4"),
       [ { data: data_fund, color:"rgba(0,0,0,0.2)", shadowSize:0, 
       bars: {

          lineWidth: 0,
          fill: true,

          fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] }
      },
      lines: {show:false, fill:true}, points: {show:false}
  } 
  ],     
  {
   series: {
     bars: {show:true, barWidth: 0.6}
 },
 grid: { show:false, hoverable: true, clickable: false, autoHighlight: true, borderWidth:0   },
 yaxis: { min: 0, max: 23 }
});
    // End Fundraiser chart
});




</script>
</body>
</html>