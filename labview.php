<?php
define('INCLUDE_CHECK',1);
include 'coreengine.php';
hack_protect();

$identifystaff = mysql_query("select * from user where id='$_SESSION[staff_id]'");


$row = mysql_fetch_array($identifystaff);
$staffname = $row["staffname"];
$staffrole = strtoupper($row["role"]);

$identifyrequest = mysql_query("select * from labrequest where id='$_GET[id]'");

$requestrow = mysql_fetch_array($identifyrequest);


$identifydoctor = mysql_query("select * from user where id='$requestrow[doctorid]'");

$doctorrow = mysql_fetch_array($identifydoctor);
$doctorname = $doctorrow["staffname"];

$identifypatient = mysql_query("select * from patients where id='$requestrow[patientid]'");

$patientrow = mysql_fetch_array($identifypatient);
$patientid = $patientrow["id"];
$patientsurname = $patientrow["surname"];
$patientother = $patientrow["other"];
$patientgender = $patientrow["gender"];
$patientcompany = $patientrow["company"];

if (isset($_POST['confirm']))
{ 
function filter($arr) {
return array_map('mysql_real_escape_string', $arr);
}
$_POST = filter($_POST);




if(empty($_POST['diagnosis'])) {


$msg = urlencode("You have left important fields empty. Please start over.");
header("Location: labrefer.php?patient=$_GET[patient]&msg=$msg&type=red");
} else {

mysql_query("INSERT INTO `labwaiting`
(`patientid`,`doctorid`,`timer`)
VALUES
('$patientid','$_SESSION[staff_id]','".date("U")."')
");

$diagnosis = $_POST["diagnosis"];
$request = $_POST["request"];
$specimen = $_POST["specimen"];
$labno = $_POST["labno"];
$totalbilirubin = isset($_POST["totalbilirubin"]);
$directbilirubin = isset($_POST["directbilirubin"]);
$sgot = isset($_POST["sgot"]);
$sgpt = isset($_POST["sgpt"]);
$alkphosphatase = isset($_POST["alkphosphatase"]);
$totalprotein = isset($_POST["totalprotein"]);
$acidphos = isset($_POST["acidphos"]);
$amylase = isset($_POST["amylase"]);
$calcium = isset($_POST["calcium"]);
$phosphorus = isset($_POST["phosphorus"]);
$hrpp = isset($_POST["2hrpp"]);
$oralgtt = isset($_POST["oralgtt"]);
$fastinglevel = isset($_POST["fastinglevel"]);
$thirtyminutes = isset($_POST["30minutes"]);
$sixtyminutes = isset($_POST["60minutes"]);
$ninetyminutes = isset($_POST["90minutes"]);
$onetwentyminutes = isset($_POST["120minutes"]);
$gluctoptest = isset($_POST["gluctoptest"]);
$glycosylatedhb = isset($_POST["glycosylatedhb"]);
$urea = isset($_POST["urea"]);
$creatine = isset($_POST["creatine"]);
$uricacid = isset($_POST["uricacid"]);
$cholesterol = isset($_POST["cholesterol"]);
$triglyceride = isset($_POST["triglyceride"]);
$hdlliproteins = isset($_POST["hdlliproteins"]);
$albumin = isset($_POST["albumin"]);
$ldh = isset($_POST["ldh"]);
$cpk = isset($_POST["cpk"]);
$sodiumna = isset($_POST["sodiumna"]);
$potassiumk = isset($_POST["potassiumk"]);
$chloridecl = isset($_POST["chloridecl"]);
$bicarbonate = isset($_POST["bicarbonate"]);
$csfglucose = isset($_POST["csfglucose"]);
$csfprotein = isset($_POST["csfprotein"]);
$serumglobulin = isset($_POST["serumglobulin"]);
$albuminglobulinratio = isset($_POST["albuminglobulinratio"]);
$urinalysis = isset($_POST["urinalysis"]);
$haemoglobin = isset($_POST["haemoglobin"]);
$heamatocritpcv = isset($_POST["heamatocritpcv"]);
$wbccount = isset($_POST["wbccount"]);
$polymneutrophils = isset($_POST["polymneutrophils"]);
$lymphocytes = isset($_POST["lymphocytes"]);
$eosinophils = isset($_POST["eosinophils"]);
$monocytes = isset($_POST["monocytes"]);
$basophils = isset($_POST["basophils"]);
$directcoombs = isset($_POST["directcoombs"]);
$indirectcoombs = isset($_POST["indirectcoombs"]);
$heafmantouxtest = isset($_POST["heafmantouxtest"]);
$hiv12screening = isset($_POST["hiv12screening"]);
$vdrl = isset($_POST["vdrl"]);
$pregnancytest = isset($_POST["pregnancytest"]);
$rheumatoidfactor = isset($_POST["rheumatoidfactor"]);
$hepatitisbantigen = isset($_POST["hepatitisbantigen"]);
$asotitre = isset($_POST["asotitre"]);
$microfilara = isset($_POST["microfilara"]);
$skinsnip = isset($_POST["skinsnip"]);
$skinscrapping = isset($_POST["skinscrapping"]);
$esr = isset($_POST["esr"]);
$rbccount = isset($_POST["rbccount"]);
$mchc = isset($_POST["mchc"]);
$mcv = isset($_POST["mcv"]);
$reticulocytescount = isset($_POST["reticulocytescount"]);
$platetetcount = isset($_POST["platetetcount"]);
$sicklingtest = isset($_POST["sicklingtest"]);
$hbgenotype = isset($_POST["hbgenotype"]);
$bloodgroup = isset($_POST["bloodgroup"]);
$psa = isset($_POST["psa"]);
$lecells = isset($_POST["lecells"]);
$bleedingtime = isset($_POST["bleedingtime"]);
$clottingtime = isset($_POST["clottingtime"]);
$prothrombintime = isset($_POST["prothrombintime"]);
$hpyloriqualitative = isset($_POST["hpyloriqualitative"]);
$hpyloriquantative = isset($_POST["hpyloriquantative"]);
$stoolap = isset($_POST["stoolap"]);
$mucus = isset($_POST["mucus"]);
$blood = isset($_POST["blood"]);
$ova = isset($_POST["ova"]);
$cysts = isset($_POST["cysts"]);
$protozoa = isset($_POST["protozoa"]);
$fecal = isset($_POST["fecal"]);
$stoolcultureyielded = isset($_POST["stoolcultureyielded"]);
$wetprep = isset($_POST["wetprep"]);
$puscells = isset($_POST["puscells"]);
$yeastcells = isset($_POST["yeastcells"]);
$hvsepithcells = isset($_POST["hvsepithcells"]);
$rbchpf = isset($_POST["rbchpf"]);
$hvsbacteria = isset($_POST["hvsbacteria"]);
$tvaginatis = isset($_POST["tvaginatis"]);
$hvscultureyielded = isset($_POST["hvscultureyielded"]);
$ciproflaxin = isset($_POST["ciproflaxin"]);
$pefloxacom = isset($_POST["Pefloxacom"]);
$amoxycillin = isset($_POST["Amoxycillin"]);
$ceftriazone = isset($_POST["Ceftriazone"]);
$rochephin = isset($_POST["Rochephin"]);
$ampicillin = isset($_POST["Ampicillin"]);
$cloxacillin = isset($_POST["Cloxacillin"]);
$chloramphenicol = isset($_POST["Chloramphenicol"]);
$erythromicin = isset($_POST["Erythromicin"]);
$gentamycin = isset($_POST["Gentamycin"]);
$nitrofuration = isset($_POST["Nitrofuration"]);
$ofloxacin = isset($_POST["Ofloxacin"]);
$streptomycin = isset($_POST["Streptomycin"]);
$zennat = isset($_POST["Zennat"]);
$floxacin = isset($_POST["Floxacin"]);
$tetracyclin = isset($_POST["Tetracyclin"]);
$urinecolourmcs = isset($_POST["urinecolourmcs"]);
$urinalappearance = isset($_POST["urinalappearance"]);
$microscopy = isset($_POST["microscopy"]);
$puscellshpt = isset($_POST["puscellshpt"]);
$mcsepithcells = isset($_POST["mcsepithcells"]);
$casts = isset($_POST["casts"]);
$crystals = isset($_POST["crystals"]);
$rbc = isset($_POST["rbc"]);
$mcsbacteria = isset($_POST["mcsbacteria"]);
$yeastscell = isset($_POST["yeastscell"]);
$trichomonasvaginalis = isset($_POST["trichomonasvaginalis"]);
$mcscultureyielded = isset($_POST["mcscultureyielded"]);
$throatswab = isset($_POST["throatswab"]);
$earswab = isset($_POST["earswab"]);
$pusswab = isset($_POST["pusswab"]);
$woundswab = isset($_POST["woundswab"]);
$Urethralswab = isset($_POST["Urethralswab"]);

$sql_insert = "INSERT into `labrequest`
        (`patientid`,`clinicaldiagnosis`,`request`,`specimen`,`lab no`,`Haemoglobin`,`Heamatocrit pcv`,`Wbc count`,`Polym neutrophils`,`Lymphocytes`,`Eosinophils`,`Basophils`,`Monocytes`,`Direct coombs`,`Indirect coombs`,`Heaf/mantoux test`,`Hiv 1+2 screening`,`Vdrl/khan/tpha/rpr`,`Pregnancy test`,`Rheumatoid factor`,
		`Hepatitis b antigen`,`Aso titre`,`Microfilara`,`Skin snip`,`Skin scrapping`,`Esr`,`Rbc count`,`M.c.h.c`,`M.c.v`,`Reticulocytes count`,`Platetet count`,`Sickling test`,`Hb genotype`,`Blood group`,`Psa`,`L.e cells`,`Bleeding time`,`Clotting time`,`Prothrombin time`,`H.pylori qualitative`,
		`H.pylori quantative`,`Total bilirubin`,`Direct bilirubin`,`Sgot`,`Sgpt`,`Alk phosphatase`,`Total protein`,`Acid phos`,`Amylase`,`Calcium`,`Phosphorus`,`Sodium(na)`,`Potassium(k)`,`Chloride(cl)`,`Bicarbonate`,`Csf glucose`,`Csf protein`,
		`Serum globulin`,`ALbumin/globulin ratio`,`2hr pp`,`Oral g.t.t`,`Fasting level`,`30minutes`,`60minutes`,`90minutes`,`120minutes`,`Gluc top. test. (g.t.t)`,`Gyclosylated hb`,
		`Urea`,`Creatine`,`Uric acid`,`Cholesterol`,`Trigclyceride`,`H.d.l liproteins l.d.l`,`Albumin`,`Ldh`,`Cpk`,`Stool appearance`,`Mucus`,`Blood`,`Ova`,`Cysts`,`Protozoa`,`Faecal occult blood`,`Stool Culture yielded`,`Wet prep`,`Pus cells`,`Yeast cells`,`Epith cells`,`Rbc/hpf`,`Hvs Bacteria`,`T.vaginatis`,
		`Hvs Culture yielded`,`Ciproflaxin(cpx)`,`Pefloxacom(pet)`,`Amoxycillin(amx)`,`Ceftriazone(cef)`,`Rochephin(cro)`,`Ampicillin`,`Cloxacillin`,`Chloramphenicol(chl)`,`Erythromicin(ery)`,`Gentamycin(gen)`,`Nitrofuration(nit)`,`Ofloxacin(ofl)`,`Streptomycin(str)`,`Zennat`,`Floxacin (Fx)`,`Tetracyclin`,`Urine colour`,
		`Appearance`,`Microscopy`,`Puscells/hpt`,`Mcs Epith cells`,`Casts`,`Crystals`,`Rbc`,`Mcs Bacteria`,`Yeasts cell`,`Trichomonas vaginalis`,`Mcs Culture yielded`,`Throat swab`,`Ear swab`,`Pus swab`,`Wound swab`,`Urethral swab`,`Urinalysis`,`date`,`doctorid`)
        VALUES
        ('$patientid','$diagnosis','$request','$specimen','$labno','$haemoglobin','$heamatocritpcv','$wbccount','$polymneutrophils','$lymphocytes','$eosinophils','$basophils','$monocytes','$directcoombs','$indirectcoombs','$heafmantouxtest','$hiv12screening','$vdrl','$pregnancytest','$rheumatoidfactor',
		'$hepatitisbantigen','$asotitre','$microfilara','$skinsnip','$skinscrapping','$esr','$rbccount','$mchc','$mcv','$reticulocytescount','$platetetcount','$sicklingtest','$hbgenotype','$bloodgroup','$psa','$lecells','$bleedingtime','$clottingtime','$prothrombintime','$hpyloriqualitative',
		'$hpyloriquantative','$totalbilirubin','$directbilirubin','$sgot','$sgpt','$alkphosphatase','$totalprotein','$acidphos','$amylase','$calcium','$phosphorus','$sodiumna','$potassiumk','$chloridecl','$bicarbonate','$csfglucose','$csfprotein','$serumglobulin',
		'$albuminglobulinratio','$hrpp','$oralgtt','$fastinglevel','$thirtyminutes','$sixtyminutes','$ninetyminutes','$onetwentyminutes','$gluctoptest','$glycosylatedhb',
		'$urea','$creatine','$uricacid','$cholesterol','$triglyceride','$hdlliproteins','$albumin','$ldh','$cpk','$stoolap','$mucus','$blood','$ova','$cysts','$protozoa','$fecal','$stoolcultureyielded','$wetprep','$puscells','$yeastcells','$hvsepithcells','$rbchpf','$hvsbacteria','$tvaginatis','$hvscultureyielded',
		'$ciproflaxin','$pefloxacom','$amoxycillin','$ceftriazone','$rochephin','$ampicillin','$cloxacillin','$chloramphenicol','$erythromicin','$gentamycin','$nitrofuration','$ofloxacin','$streptomycin','$zennat','$floxacin','$tetracyclin','$urinecolourmcs',
		'$urinalappearance','$microscopy','$puscellshpt','$mcsepithcells','$casts','$crystals','$rbc','$mcsbacteria','$yeastscell','$trichomonasvaginalis','$mcscultureyielded','$throatswab','$earswab','$pusswab','$woundswab','$Urethralswab','$urinalysis','".date("U")."','$_SESSION[staff_id]')
      ";

mysql_query($sql_insert) or die("Insertion Failed:" . mysql_error()); 






mysql_query("INSERT INTO `activity`
(`staffid`,`activity`,`date`,`patient`)
VALUES
('$_SESSION[staff_id]','Updated medical record for $patientsurname $patientother','".date("U")."','$_GET[patient]')
");

$suc = urlencode("You have directed $patientsurname $patientother to the laboratory.");
header("Location: docview.php?patient=$patientid&msg=$suc&type=green");

  } 
   }

?>
<!DOCTYPE html>
<html class="sidebar_default no-js" lang="en">
<head>
<meta charset="utf-8">
<title>Refer to lab</title>
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
    </div>
    <div id="main_container">
	<?php	
      if (isset($_GET['msg'])) {

	  $msg = mysql_real_escape_string($_GET['msg']);
	  $color = mysql_real_escape_string($_GET['type']);
	  



echo "<h1><font color = \"$color\">$msg</font></h1>";}

else echo "";
				?>
      <form action='' method="POST">
      <div class="row-fluid">
        <div class="span6">
          <div class="box paint color_3">
            <div class="title">
              <div class="row-fluid">
                <h4> REQUEST/REPORT FORM </h4>
              </div>
            </div>
            <!-- End .title -->
            <div class="content">
              <ul id="tabExample1" class="nav nav-tabs">
                <li class="active"><a href="#home1" data-toggle="tab">Details</a></li>
               
              
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade in active" id="home1">
                  <p>
Surname: <?php echo "$patientsurname"; ?> <b>/</b> Other names: <?php echo "$patientother"; ?><br />
Sex: <?php echo "$patientgender"; ?> <b>/</b> Date: <?php echo date('d M Y'); ?><br />
Company: <?php echo "$patientcompany"; ?> <b>/</b> Doctor's name: <?php echo "$doctorname"; ?> <b>/</b> Hospital: 

<fieldset>
                        <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Clinical Diagnosis</label>
                          <div class="controls span9">
                           <?php echo "$requestrow[clinicaldiagnosis]"; ?>
                           
                          </div>
                          </div>



                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Request</label>
                          <div class="controls span9">
                           <?php echo "$requestrow[request]"; ?>
                           
                          </div>
                          </div>

                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Specimen</label>
                          <div class="controls span9">
                           <?php echo "$requestrow[specimen]"; ?>
                           
                          </div>
                          </div>

                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Lab No</label>
                          <div class="controls span9">
                            <?php 
							$labno = $requestrow['lab no'];
							echo "$labno"; ?>
                           
                          </div>
                          </div>

                          <div class="control-group row-fluid">
                 <div class="span3 visible-desktop"></div>
                  <div class="controls span5">
                    <button type="submit" name = "confirm" id = "confirm" class="btn btn-primary">Confirm and send to laboratory</button>
                  </div>
                </div>


                          </fieldset>
                  </p>
                </div>
                
              </div>
            </div>
            <!-- End .content --> 
          </div>
          <!-- End  .box --> 
		  
		 
		  
		          <div class="box paint color_7">
            <div class="title">
              <div class="row-fluid">
                <h4> BIOCHEMISTRY </h4>
              </div>
            </div>
            <!-- End .title -->
            <div class="content">
              <ul id="tabExample1" class="nav nav-tabs">
               
                <li class="active"><a href="#liver" data-toggle="tab">Liver function</a></li>
                <li><a href="#electrolytes" data-toggle="tab">Electrolytes</a></li>
                <li><a href="#glucose" data-toggle="tab">Others</a></li>
              
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade in active" id="liver">
           <p>
          <h2>Liver function tests</h2><Br />
                    <fieldset>

<div class="form-row control-group row-fluid ">
                 
                  <div class="controls span100">
				  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Lab No</label>
                          <div class="controls span9">
                            <?php 
							$labno = $requestrow['lab no'];
							echo "$labno"; ?>
                           
                          </div>
                          </div>
                    <label class="checkbox ">
                      <input type="checkbox" checked id="totalbilirubin" name="totalbilirubin" value="total bilirubin">
                    Total bilirubin</label>
                    <label class="checkbox ">
                      <input type="checkbox" checked id="directbilirubin" name="directbilirubin" value="direct bilirubin">
                     Direct bilirubin</label>
                    <label class="checkbox">
                      <input type="checkbox" checked id="sgot" name="sgot" value="sgot">
                     Sgot</label>
                      <label class="checkbox">
                      <input type="checkbox" checked id="sgpt" name="sgpt" value="sgpt">
                      Sgpt</label>
                       <label class="checkbox">
                      <input type="checkbox" checked id="alkphosphatase" name="alkphosphatase" value="alk phosphatase">
                      Alk phosphatase</label>
                      <label class="checkbox">
                      <input type="checkbox" checked id="totalprotein" name="totalprotein" value="total protein">
                      Total protein</label>
            <label class="checkbox">
                      <input type="checkbox" checked id="acidphos" name="acidphos" value="acid phos">
                     Acid phos</label>
                       <label class="checkbox">
                      <input type="checkbox" checked id="amylase" name="amylase" value="amylase">
                     Amylase</label>
                      <label class="checkbox">
                      <input type="checkbox" checked id="calcium" name="calcium" value="calcium">
                      Calcium</label>
                      <label class="checkbox">
                      <input type="checkbox" checked id="phosphorus" name="phosphorus" value="phosphorus">
                      Phosphorus</label>
                       
                  </div>
                </div>
</fieldset>
                        
                  </p>
                </div>
        

                <div class="tab-pane fade in active" id="glucose">
                      <p>
				  <h2>Others</h2><Br />
                    <fieldset>

<div class="form-row control-group row-fluid ">
                 
                  <div class="controls span99">
                    <label class="checkbox ">
                      <input type="checkbox" id="2hrpp" name="2hrpp" value="2hr pp">
                    2hr pp</label>
                    <label class="checkbox ">
                      <input type="checkbox" id="oralgtt" name="oralgtt" value="oral g.t.t">
                      Oral g.t.t</label>
                    <label class="checkbox">
                      <input type="checkbox" id="fastinglevel" name="fastinglevel" value="fasting level">
                     Fasting level</label>
                      <label class="checkbox">
                      <input type="checkbox" id="30minutes" name="30minutes" value="30minutes">
                      30minutes</label>
                       <label class="checkbox">
                      <input type="checkbox" id="60minutes" name="60minutes" value="60minutes">
                      60minutes</label>
                      <label class="checkbox">
                      <input type="checkbox" id="90minutes" name="90minutes" value="90minutes">
                      90minutes</label>
                       <label class="checkbox">
                      <input type="checkbox" id="120minutes" name="120minutes" value="120minutes">
                     120minutes</label>
                      <label class="checkbox">
                      <input type="checkbox" id="gluctoptest" name="gluctoptest" value="gluctoptest">
                      Gluc top. test. (g.t.t)</label>
                      <label class="checkbox">
                      <input type="checkbox" id="glycosylatedhb" name="glycosylatedhb" value="glycosylated hb">
                      Gyclosylated hb</label>
                       <label class="checkbox">
                      <input type="checkbox" id="urea" name="urea" value="urea">
                      Urea</label>
                       <label class="checkbox">
                      <input type="checkbox" id="creatine" name="creatine" value="creatine">
                      Creatine</label>
                      <label class="checkbox">
                      <input type="checkbox" id="uricacid" name="uricacid" value="uric acid">
                      Uric acid</label>
					  <label class="checkbox">
                      <input type="checkbox" id="cholesterol" name="cholesterol" value="cholesterol">
                     Cholesterol</label>
					 <label class="checkbox">
                      <input type="checkbox" id="triglyceride" name="triglyceride" value="triglyceride">
                      Trigclyceride</label>
					  <label class="checkbox">
                      <input type="checkbox" id="hdlliproteins" name="hdlliproteins" value="h.d.l liproteins l.d.l">
                      H.d.l liproteins l.d.l</label>
					    <label class="checkbox">
                      <input type="checkbox" id="albumin" name="albumin" value="albumin">
                      Albumin</label>
					   <label class="checkbox">
                      <input type="checkbox" id="ldh" name="ldh" value="ldh">
                      Ldh</label>
					   <label class="checkbox">
                      <input type="checkbox" id="cpk" name="cpk" value="cpk">
                      Cpk</label>
                      
                  </div>
                </div>
</fieldset>
                        
                  </p>
                </div>
				
				
				
								
				<div class="tab-pane fade in active" id="electrolytes">
                  <p>
				  <h2>Electrolytes</h2><Br />
                    <fieldset>

<div class="form-row control-group row-fluid ">
                 
                  <div class="controls span100">
                    <label class="checkbox ">
                      <input type="checkbox" id="sodiumna" name="sodiumna" value="sodium(na)">
                    Sodium(na)</label>
                    <label class="checkbox ">
                      <input type="checkbox" id="potassiumk" name="potassiumk" value="potassium(k)">
                     Potassium(k)</label>
                    <label class="checkbox">
                      <input type="checkbox" id="chloridecl" name="chloridecl" value="chloride(cl)">
                     Chloride(cl)</label>
                      <label class="checkbox">
                      <input type="checkbox" id="bicarbonate" name="bicarbonate" value="bicarbonate">
                      Bicarbonate</label>
                       <label class="checkbox">
                      <input type="checkbox" id="csfglucose" name="csfglucose" value="csf glucose">
                      Csf glucose</label>
                      <label class="checkbox">
                      <input type="checkbox" id="csfprotein" name="csfprotein" value="csf protein">
                      Csf protein</label>
                       <label class="checkbox">
                      <input type="checkbox" id="serumglobulin" name="serumglobulin" value="serum globulin">
                     Serum globulin</label>
                      <label class="checkbox">
                      <input type="checkbox" id="albuminglobulinratio" name="albuminglobulinratio" value="albumin/globulin ratio">
                      ALbumin/globulin ratio</label>
                      
                       
                      
                  </div>
                </div>
</fieldset>
                        
                  </p>
                </div>
                
              </div>
            </div>
			
			
            <!-- End .content --> 
          </div>
          <!-- End  .box --> 
		  
		   <div class="box paint color_9">
            <div class="title">
              <div class="row-fluid">
                <h4> URINALYSIS </h4>
              </div>
            </div>
            <!-- End .title -->
            <div class="content">
             
                  <p>

<fieldset>
                        <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Perform urinalysis test</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="urinalysis" name="urinalysis" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>



                          


                          </fieldset>
                  </p>
               
            </div>
            <!-- End .content --> 
          </div>
          <!-- End  .box -->
        </div>
        <!-- End .span6 -->
        
               <div class="span6">
          <div class="box paint color_2">
            <div class="title">
              <div class="row-fluid">
                <h4> HEAMATOLOGY </h4>
              </div>
            </div>
            <!-- End .title -->
            <div class="content">
              <ul id="tabExample2" class="nav nav-tabs">
                <li class="active"><a href="#fbc" data-toggle="tab">Full blood count</a></li>
               
               <li><a href="#sero" data-toggle="tab">Serology</a></li>
              
               <li><a href="#individual" data-toggle="tab">Others</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade in active" id="fbc">
                  <p>
				
                    <fieldset>

<div class="form-row control-group row-fluid ">
                 
                  <div class="controls span8">
                    <label class="checkbox ">
                      <input type="checkbox" checked id="haemoglobin" name="haemoglobin" value="haemoglobin">
                      Haemoglobin</label>
                    <label class="checkbox ">
                      <input type="checkbox" checked id="heamatocritpcv" id="heamatocritpcv" value="heamatocrit pcv">
                      Heamatocrit pcv</label>
                    <label class="checkbox">
                      <input type="checkbox" checked id="wbccount" name="wbccount" value="wbc count">
                      Wbc count</label>
                      <label class="checkbox">
                      <input type="checkbox" checked id="polymneutrophils" id="polymneutrophils" value="polym neutrophils">
                      Polym neutrophils</label>
                       <label class="checkbox">
                      <input type="checkbox" checked id="lymphocytes" name="lymphocytes" value="lymphocytes">
                      Lymphocytes</label>
                      <label class="checkbox">
                      <input type="checkbox" checked id="eosinophils" name="eosinophils" value="eosinophils">
                      Eosinophils</label>
                       <label class="checkbox">
                      <input type="checkbox" checked id="monocytes" name="monocytes" value="monocytes">
                      Monocytes</label>
                      <label class="checkbox">
                      <input type="checkbox" checked id="basophils" name="basophils" value="basophils">
                      Basophils</label>
                   
                  </div>
                </div>
</fieldset>
                        
                  </p>
                </div>
				
                               <div class="tab-pane fade in active" id="sero">
                  <p>
				  <h2>Serology</h2><Br />
                    <fieldset>

<div class="form-row control-group row-fluid ">
                 
                  <div class="controls span98">
                    <label class="checkbox ">
                      <input type="checkbox" id="directcoombs" name="directcoombs" value="direct coombs">
                    Direct coombs</label>
                    <label class="checkbox ">
                      <input type="checkbox" id="indirectcoombs" name="indirectcoombs" value="indirect coombs">
                      Indirect coombs</label>
                    <label class="checkbox">
                      <input type="checkbox" id="heafmantouxtest" name="heafmantouxtest" value="heaf/mantoux test">
                      Heaf/mantoux test</label>
                      <label class="checkbox">
                      <input type="checkbox" id="hiv12screening" name="hiv12screening" value="hiv 1+2 screening">
                      Hiv 1+2 screening</label>
                       <label class="checkbox">
                      <input type="checkbox" id="vdrl" name="vdrl" value="vdrl/khan/tpha/rpr">
                      Vdrl/khan/tpha/rpr</label>
                      <label class="checkbox">
                      <input type="checkbox" id="pregnancytest" name="pregnancytest" value="pregnancy test">
                      Pregnancy test</label>
                       <label class="checkbox">
                      <input type="checkbox" id="rheumatoidfactor" name="rheumatoidfactor" value="rheumatoid factor">
                      Rheumatoid factor</label>
                      <label class="checkbox">
                      <input type="checkbox" id="hepatitisbantigen" id="hepatitisbantigen" value="hepatitis b antigen">
                      Hepatitis b antigen</label>
                      <label class="checkbox">
                      <input type="checkbox" id="asotitre" name="asotitre" value="aso titre">
                      Aso titre</label>
                       <label class="checkbox">
                      <input type="checkbox" id="microfilara" name="microfilara" value="microfilara">
                      Microfilara</label>
                       <label class="checkbox">
                      <input type="checkbox" id="skinsnip" name="skinsnip" value="skin snip">
                      Skin snip</label>
                      <label class="checkbox">
                      <input type="checkbox" id="skinscrapping" name="skinscrapping" value="skin scrapping">
                      Skin scrapping</label>
                      
                  </div>
                </div>
</fieldset>
                        
                  </p>
                </div>
				 <div class="tab-pane fade in active" id="individual">
                  <p>
          <h2>Others</h2><Br />
                    <fieldset>

<div class="form-row control-group row-fluid ">
<div class="controls span97">
   <label class="checkbox">
                      <input type="checkbox" id="esr" value="esr">
                      Esr</label>
                       <label class="checkbox">
                      <input type="checkbox" id="rbccount" name="rbccount" value="rbc count">
                      Rbc count</label>
                       <label class="checkbox">
                      <input type="checkbox" id="mchc" name="mchc" value="m.c.h.c">
                      M.c.h.c</label>
                      <label class="checkbox">
                      <input type="checkbox" id="mcv" name="mcv" value="m.c.v">
                      M.c.v</label>
                      <label class="checkbox">
                      <input type="checkbox" id="reticulocytescount" name="reticulocytescount" value="reticulocytes count">
                      Reticulocytes count</label>
                      <label class="checkbox">
                      <input type="checkbox" id="platetetcount" name="platetetcount" value="platetet count">
                      Platetet count</label>
                      <label class="checkbox">
                      <input type="checkbox" id="sicklingtest" name="sicklingtest" value="sickling test">
                      Sickling test</label>
                      <label class="checkbox">
                      <input type="checkbox" id="hbgenotype" name="hbgenotype" value="hb genotype">
                      Hb genotype</label>
                      <label class="checkbox">
                      <input type="checkbox" id="bloodgroup" name="bloodgroup" value="blood group">
                      Blood group</label>
                      <label class="checkbox">
                      <input type="checkbox" id="psa" name="psa" value="psa">
                      Psa</label>
                      <label class="checkbox">
                      <input type="checkbox" id="lecells" name="lecells" value="l.e cells">
                      L.e cells</label>
                      <label class="checkbox">
                      <input type="checkbox" id="bleedingtime" name="bleedingtime" value="bleeding time">
                      Bleeding time</label>
                      <label class="checkbox">
                      <input type="checkbox" id="clottingtime" name="clottingtime" value="clotting time">
                      Clotting time</label>
                      <label class="checkbox">
                      <input type="checkbox" id="prothrombintime" name="prothrombintime" value="prothrombin time">
                      Prothrombin time</label>
                      <label class="checkbox">
                      <input type="checkbox" id="hpyloriqualitative" name="hpyloriqualitative" value="h.pylori qualitative">
                      H.pylori qualitative</label>
                       <label class="checkbox">
                      <input type="checkbox" id="hpyloriquantative" name="hpyloriquantative" value="h.pylori quantative">
                      H.pylori quantative</label>
</div>
</div>
</fieldset>
</p>
</div>
				
				
				
                
				
                
              </div>
            </div>
            <!-- End .content --> 
          </div>
          <!-- End  .box --> 
		  
		   <div class="box paint color_3">
            <div class="title">
              <div class="row-fluid">
                <h4> MICROBIOLOGY </h4>
              </div>
            </div>
            <!-- End .title -->
            <div class="content">
              <ul id="tabExample1" class="nav nav-tabs">
                <li class="active"><a href="#stool" data-toggle="tab">Stool analysis</a></li>
                <li><a href="#hvs" data-toggle="tab">Hvs/mcs</a></li>
                <li><a href="#sensitivity" data-toggle="tab">Sensitivity profile</a></li>
                <li><a href="#mcs" data-toggle="tab">Mcs</a></li>
                <li><a href="#swabs" data-toggle="tab">Swabs</a></li>
               
              
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade in active" id="stool">
                     <p>
<h2>Microbiology report</h2><Br />
<fieldset>
                        <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Stool appearance</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="stoolap" name="stoolap" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>



                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Mucus</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="mucus" name="mucus" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>

                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Blood</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="blood" name="blood" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>

                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Ova</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="ova" name="ova" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  
						   <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Cysts</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="cysts" name="cysts" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  
						
						  
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Protozoa</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="protozoa" name="protozoa" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Faecal occult blood</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="fecal" name="fecal" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Culture yielded</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="stoolcultureyielded" name="stoolcultureyielded" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>


                          </fieldset>
                  </p>
                </div>
				
				
				
								<div class="tab-pane fade in active" id="hvs">
                      <p>
<h2>HVS/MCS</h2><Br />
<fieldset>
                        <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Wet prep</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="wetprep" name="wetprep" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>



                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Pus cells</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="puscells" name="puscells" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>

                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Yeast cells</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="yeastcells" name="yeastcells" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>

                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Epith cells</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="hvsepithcells" name="hvsepithcells" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  
						   <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Rbc/hpf</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="rbchpf" name="rbchpf" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Bacteria</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="hvsbacteria" name="hvsbacteria" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">T.vaginatis</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="tvaginatis" name="tvaginatis" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Culture yielded</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="hvscultureyielded" name="hvscultureyielded" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>


                          </fieldset>
                  </p>
                </div>
                
				
				<div class="tab-pane fade in active" id="sensitivity">
                          <p>
						  <h2>Sensitivity profile</h2>
					<fieldset>
					 <div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Ciproflaxin(cpx) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="checkbox"  value="ciproflaxin(cpx)" name="ciproflaxin" id="ciproflaxin">
                      </label>
                   
				  </div>
                </div>
				
				 <div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Pefloxacom(pet) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="checkbox" value="Pefloxacom(pet)" name="Pefloxacom" id="Pefloxacom">
                      </label>
                    
				  </div>
                </div>
				
				<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Amoxycillin(amx) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="checkbox" value="Amoxycillin(amx)" name="Amoxycillin" id="Amoxycillin">
                      </label>
                    
				  </div>
                </div>
				
				
				<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Ceftriazone(cef) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="checkbox" value="Ceftriazone(cef)" name="Ceftriazone" id="Ceftriazone">
                      </label>
                  
				  </div>
                </div>
				
				
				<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Rochephin(cro) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="checkbox" value="Rochephin(cro)" name="Rochephin" id="Rochephin">
                       </label>
                   
				  </div>
                </div>
				
				<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Ampicillin </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="checkbox" value="Ampicillin" name="Ampicillin" id="Ampicillin">
                      </label>
                   
				  </div>
                </div>
				
				
				<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Cloxacillin </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="checkbox" value="Cloxacillin" name="Cloxacillin" id="Cloxacillin">
                      </label>
                    
				  </div>
                </div>
				
				<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Chloramphenicol(chl) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="checkbox" value="Chloramphenicol(chl)" name="Chloramphenicol" id="Chloramphenicol">
                       </label>
                  
				  </div>
                </div>
				
				<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Erythromicin(ery) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="checkbox" value="Erythromicin(ery)" name="Erythromicin" id="Erythromicin">
                      </label>
                    
				  </div>
                </div>
				
				
					<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Gentamycin(gen) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="checkbox" value="Gentamycin(gen)" name="Gentamycin" id="Gentamycin">
                      </label>
                   
				  </div>
                </div>
				
					<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Nitrofuration(nit) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="checkbox" value="Nitrofuration(nit)" name="Nitrofuration" name="Nitrofuration">
                       </label>
                   
				  </div>
                </div>
				
					<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Ofloxacin(ofl) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="checkbox" value="Ofloxacin(ofl)" name="Ofloxacin" id="Ofloxacin">
                      </label>
                    
				  </div>
                </div>
				
				<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Streptomycin(str) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="checkbox" value="Streptomycin(str)" name="Streptomycin" id="Streptomycin">
                      </label>
                   
				  </div>
                </div>

                  <div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Zennat </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="checkbox" value="Zennat" name="Zennat" id="Zennat">
                      </label>
                   
          </div>
                </div>

                  <div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Floxacin (Fx) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="checkbox" value="Floxacin (Fx)" name="Floxacin" id="Floxacin">
                      </label>
                   
          </div>
                </div>

                  <div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Tetracyclin </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="checkbox" value="Tetracyclin" name="Tetracyclin" id="Tetracyclin">
                      </label>
                   
          </div>
                </div>
				
				
				
				
				
				
				
				
				
					
					</fieldset>
					</p>
                </div>
				
							<div class="tab-pane fade in active" id="mcs">
                      <p>
<h2>MCS</h2><Br />
<fieldset>

<div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Urine colour</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="urinecolourmcs" name="urincecolourmcs" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  
<div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Appearance</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="urinalappearance" name="urinalappearance" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  
                         <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Microscopy</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="microscopy" name="microscopy" value="Microscopy" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Puscells/hpt</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="puscellshpt" name="puscellshpt" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Epith cells</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="mcsepithcells" name="mcsepithcells" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Casts</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="casts" name="casts" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Crystals</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="crystals" name="crystals" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Rbc</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="rbc" name="rbc" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Bacteria</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="mcsbacteria" name="mcsbacteria" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Yeasts cell</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="yeastscell" name="yeastscell" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Trichomonas vaginalis</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="trichomonasvaginalis" name="trichomonasvaginalis" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Culture yielded</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="mcscultureyielded" name="mcscultureyielded" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>


                          </fieldset>
                  </p>
                </div>
				
				<div class="tab-pane fade in active" id="swabs">

          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Throat swab</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="throatswab" name="throatswab" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>

                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Ear swab</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="earswab" name="earswab" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>

                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Pus swab</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="pusswab" name="pusswab" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>

                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Wound swab</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="woundswab" name="woundswab" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>

					  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Urethral swab</label>
                          <div class="controls span9">
                           <input value = "" type="checkbox" id="Urethralswab" name="Urethralswab" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  
						 


                          </fieldset>
                  </p>
                </div>
				
                
              </div>
            </div>
			
			
            <!-- End .content --> 
          </div>
          <!-- End  .box --> 
        </div>
        <!-- End .span6 -->
		

      </div>
      <!-- End .row-fluid -->
      
     </form>
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

<!-- Modal Concept --> 
<script language="javascript" type="text/javascript" src="js/plugins/avgrund.js"></script> 
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

<!-- Custom made scripts for this template --> 
<script src="js/scripts.js" type="text/javascript"></script> 
<script type="text/javascript">
  /**** Specific JS for this page ****/


</script>
</body>
</html>