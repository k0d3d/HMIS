<?php
define('INCLUDE_CHECK',1);
include 'coreengine.php';
hack_protect();

$identifystaff = mysql_query("select * from user where id='$_SESSION[staff_id]'");


$row = mysql_fetch_array($identifystaff);
$staffname = $row["staffname"];
$staffrole = strtoupper($row["role"]);



$identifyrequest = mysql_query("select * from labresults where id='$_GET[id]'");

$requestrow = mysql_fetch_array($identifyrequest);


$condition = "";

$id = $requestrow["id"];
$patientid = $requestrow["patientid"];
$doctorid = $requestrow["doctorid"];
$labid = $requestrow["labguyid"];
$diagnosis = $requestrow["clinicaldiagnosis"];
$specimen = $requestrow["specimen"];
$labno = $requestrow["lab no"];
$totalbilirubin = $requestrow["Total bilirubin"];
$directbilirubin = $requestrow["Direct bilirubin"];
$sgot = $requestrow["Sgot"];
$sgpt = $requestrow["Sgpt"];
$alkphosphatase = $requestrow["Alk phosphatase"];
$totalprotein = $requestrow["Total protein"];
$acidphos = $requestrow["Acid phos"];
$amylase = $requestrow["Amylase"];
$calcium = $requestrow["Calcium"];
$phosphorus = $requestrow["Phosphorus"];
$hrpp = $requestrow["2hr pp"];
$oralgtt = $requestrow["Oral g.t.t"];
$fastinglevel = $requestrow["Fasting level"];
$thirtyminutes = $requestrow["30minutes"];
$sixtyminutes = $requestrow["60minutes"];
$ninetyminutes = $requestrow["90minutes"];
$onetwentyminutes = $requestrow["120minutes"];
$gluctoptest = $requestrow["Gluc top. test. (g.t.t)"];
$glycosylatedhb = $requestrow["Gyclosylated hb"];
$urea = $requestrow["Urea"];
$creatine = $requestrow["Creatine"];
$uricacid = $requestrow["Uric acid"];
$cholesterol = $requestrow["Cholesterol"];
$triglyceride = $requestrow["Triglyceride"];
$hdlliproteins = $requestrow["H.d.l liproteins l.d.l"];
$albumin = $requestrow["Albumin"];
$ldh = $requestrow["Ldh"];
$cpk = $requestrow["Cpk"];
$sodiumna = $requestrow["Sodium(na)"];
$potassiumk = $requestrow["Potassium(k)"];
$chloridecl = $requestrow["Chloride(cl)"];
$bicarbonate = $requestrow["Bicarbonate"];
$csfglucose = $requestrow["Csf glucose"];
$csfprotein = $requestrow["Csf protein"];
$csfchloride = $requestrow["csf chloride"];
$serumglobulin = $requestrow["Serum globulin"];
$albuminglobulinratio = $requestrow["ALbumin/globulin ratio"];
$urineappearance = $requestrow["urineappearance"];
$urinecolour = $requestrow["urinecolour"];
$ph = $requestrow["ph"];
$sg = $requestrow["sg"];
$urineprotein = $requestrow["urineprotein"];
$urinesugar = $requestrow["urinesugar"];
$urinekeytone = $requestrow["urinekeytone"];
$urineerythrocytes = $requestrow["urineerythrocytes"];
$urinebilirubin = $requestrow["urinebilirubin"];
$urobilliaegen = $requestrow["urobilliaegen"];
$nitrite = $requestrow["nitrite"];
$leucocytes = $requestrow["leucocytes"];
$haemoglobin = $requestrow["Haemoglobin"];
$heamatocritpcv = $requestrow["Heamatocrit pcv"];
$wbccount = $requestrow["Wbc count"];
$polymneutrophils = $requestrow["Polym neutrophils"];
$lymphocytes = $requestrow["Lymphocytes"];
$eosinophils = $requestrow["Eosinophils"];
$monocytes = $requestrow["Monocytes"];
$basophils = $requestrow["Basophils"];
$directcoombs = $requestrow["Direct coombs"];
$indirectcoombs = $requestrow["Indirect coombs"];
$heafmantouxtest = $requestrow["Heaf/mantoux test"];
$hiv12screening = $requestrow["Hiv 1+2 screening"];
$vdrl = $requestrow["Vdrl/khan/tpha/rpr"];
$pregnancytest = $requestrow["Pregnancy test"];
$rheumatoidfactor = $requestrow["Rheumatoid factor"];
$hepatitisbantigen = $requestrow["Hepatitis b antigen"];
$asotitre = $requestrow["Aso titre"];
$microfilara = $requestrow["Microfilara"];
$skinsnip = $requestrow["Skin snip"];
$skinscrapping = $requestrow["Skin scrapping"];
$esr = $requestrow["Esr"];
$rbccount = $requestrow["Rbc count"];
$mchc = $requestrow["M.c.h.c"];
$mcv = $requestrow["M.c.v"];
$reticulocytescount = $requestrow["Reticulocytes count"];
$platetetcount = $requestrow["Platetet count"];
$sicklingtest = $requestrow["Sickling test"];
$hbgenotype = $requestrow["Hb genotype"];
$bloodgroup = $requestrow["Blood group"];
$psa = $requestrow["Psa"];
$lecells = $requestrow["L.e cells"];
$bleedingtime = $requestrow["Bleeding time"];
$clottingtime = $requestrow["Clotting time"];
$prothrombintime = $requestrow["Prothrombin time"];
$hpyloriqualitative = $requestrow["H.pylori qualitative"];
$hpyloriquantative = $requestrow["H.pylori quantative"];
$stoolap = $requestrow["Stool appearance"];
$mucus = $requestrow["Mucus"];
$blood = $requestrow["Blood"];
$ova = $requestrow["Ova"];
$cysts = $requestrow["Cysts"];
$protozoa = $requestrow["Protozoa"];
$fecal = $requestrow["Faecal occult blood"];
$stoolcultureyielded = $requestrow["Stool Culture yielded"];
$wetprep = $requestrow["Wet prep"];
$puscells = $requestrow["Pus cells"];
$yeastcells = $requestrow["Yeast cells"];
$hvsepithcells = $requestrow["Epith cells"];
$rbchpf = $requestrow["Rbc/hpf"];
$hvsbacteria = $requestrow["Hvs Bacteria"];
$tvaginatis = $requestrow["T.vaginatis"];
$hvscultureyielded = $requestrow["Hvs Culture yielded"];
$urinecolourmcs = $requestrow["Urine colour"];
$urinalappearance = $requestrow["Appearance"];
$microscopy = $requestrow["Microscopy"];
$puscellshpt = $requestrow["Puscells/hpt"];
$mcsepithcells = $requestrow["Mcs Epith cells"];
$casts = $requestrow["Casts"];
$crystals = $requestrow["Crystals"];
$rbc = $requestrow["Rbc"];
$mcsbacteria = $requestrow["Mcs Bacteria"];
$yeastscell = $requestrow["Yeasts cell"];
$trichomonasvaginalis = $requestrow["Trichomonas vaginalis"];
$mcscultureyielded = $requestrow["Mcs Culture yielded"];
$throatswab = $requestrow["Throat swab"];
$earswab = $requestrow["Ear swab"];
$pusswab = $requestrow["Pus swab"];
$woundswab = $requestrow["Wound swab"];
$Urethralswab = $requestrow["Urethral swab"];
$ciproflaxin = $requestrow["Ciproflaxin(cpx)"];
$pefloxacom = $requestrow["Pefloxacom(pet)"];
$amoxycillin = $requestrow["Amoxycillin(amx)"];
$ceftriazone = $requestrow["Ceftriazone(cef)"];
$rochephin = $requestrow["Rochephin(cro)"];
$ampicillin = $requestrow["Ampicillin"];
$cloxacillin = $requestrow["Cloxacillin"];
$chloramphenicol = $requestrow["Chloramphenicol(chl)"];
$erythromicin = $requestrow["Erythromicin(ery)"];
$gentamycin = $requestrow["Gentamycin(gen)"];
$nitrofuration = $requestrow["Nitrofuration(nit)"];
$ofloxacin = $requestrow["Ofloxacin(ofl)"];
$streptomycin = $requestrow["Streptomycin(str)"];
$zennat = $requestrow["Zennat"];
$floxacin = $requestrow["Floxacin (Fx)"];
$tetracyclin = $requestrow["Tetracyclin"];
$glucoserandom = $requestrow["glucoserandom"];
$mp = $requestrow["mp"];
$sto = $requestrow["sto"];
$sth = $requestrow["sth"];
$spao = $requestrow["spao"];
$spah = $requestrow["spah"];
$spbo = $requestrow["spbo"];
$spbh = $requestrow["spbh"];
$spco = $requestrow["spco"];
$spch = $requestrow["spch"];
$comment = $requestrow["comment"];
$timer = relativeTime($requestrow['date']);


$identifydoctor = mysql_query("select * from user where id='$doctorid'");

$doctorow = mysql_fetch_array($identifydoctor);
$doctorname = $doctorow["staffname"];

$identifylab = mysql_query("select * from user where id='$labid'");

$labrow = mysql_fetch_array($identifylab);
$labguyname = $labrow["staffname"];

$identifypatient = mysql_query("select * from patients where id='$patientid'");

$patientrow = mysql_fetch_array($identifypatient);
$patientsurname = $patientrow["surname"];
$patientother = $patientrow["other"];
$patientgender = $patientrow["gender"];
$patientcompany = $patientrow["company"];
$patienthospitalnumber = $patientrow["hospitalnumber"];

if (isset($_GET['activate']))
{ 
$removefromwaitinglist = mysql_query("DELETE FROM doclabwaiting WHERE id ='$_GET[id]'") or die ("Bad del query");
$timer = $_GET["timer"];
mysql_query("INSERT INTO `activity`
(`staffid`,`activity`,`date`,`patient`)
VALUES
('$_SESSION[staff_id]','Viewed laboratory test results for $_GET[name] performed by $_GET[nursename] and had been sent in $_GET[timer].','".date("U")."','$_GET[patient]')
");
}
?>

<!DOCTYPE html>
<html class="sidebar_default no-js" lang="en">
<head>
<meta charset="utf-8">
<title>Labresults - <?php echo "$patientsurname"; ?> - <?php echo "$patientother"; ?></title>
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
	
	  



echo "<h1><font color = \"$color\">$msg</font></h1>";}

else echo "";
				?>
      <div class="row-fluid">
        <div class="span3">
          <div class="title">
            <div class="row-fluid legend">
              <h1> <?php echo "$patientsurname"; ?> <?php echo "$patientother"; ?> / <?php echo "$patienthospitalnumber"; ?></h1>
            </div>
          </div>
          <!-- End .title -->
          <div class="content">
            <div class="row-fluid well well-small"> <img class="row-fluid" src="img/sample_avatar_big.jpg"> </div>
            <ul class="nav nav-tabs dark nav-stacked">
             
   
              <li><a href="docview.php?patient=<?php echo "$patientid"; ?>"><i class="gicon-lock"></i> Back to patient profile</a></li>
            </ul>
          </div>
          <!-- End .content --> 
        </div>
        <!-- End .span3 -->
        
        <div class="span9">
           <div class="row-fluid legend profile">
            <div class="row-fluid ">
              <div class="span6 spacer">
                <ul class="unstyled">
                  <li class="location pull-left right_offset"><span class="muted"><i class="icon-user"></i> Requested by doctor <?php echo "$doctorname"; ?></span> </li>
				  <br />
                  <li class="location "><span class="muted"><i class="gicon-wrench"></i></span> Performed by <?php echo "$labguyname"; ?>, <?php echo "$timer"; ?></li>
		
                </ul>
              </div>
             
            </div>
          </div>
          <!-- End .legend -->
		  <br />
                  <div class="span6">
          <div class="box paint_hover">
            <div class="title">
              <h3> <i class="icon-user"></i> <span>Test details</span> </h3>
            </div>
            <div class="content"> 
			<p>Clinical diagnosis: <?php echo "$diagnosis"; ?></p>
			<p>Specimen: <?php echo "$specimen"; ?></p>
            <p>Lab No: <?php echo "$labno"; ?></p>
           
			</div>
          </div>
          <!-- End .box -->

<?php if($glucoserandom != $condition or $mp != $condition or $sto != $condition){ ?>
		   <div class="box paint_hover">
            <div class="title">

            <h3> <i class="icon-beaker"></i> <span>General tests</span> </h3>
            </div>
            <div class="content"> 
			<?php if($glucoserandom != $condition){ ?>
<p>Glucose random: <?php echo "$glucoserandom"; ?></p>
<?php } ?>
<?php if($mp != $condition){ ?>
<p>Mp: <?php echo "$mp"; ?></p>
<?php } ?>
<?php if($sto != $condition){ ?>
<p>S.TYPHI: O (<?php echo "$sto"; ?>) - H (<?php echo "$sth"; ?>)</p>
<?php } ?>
<?php if($spao != $condition){ ?>
<p>S.PARATYPHI A: O (<?php echo "$spao"; ?>) - H (<?php echo "$spah"; ?>)</p>
<?php } ?>
<?php if($spbo != $condition){ ?>
<p>S.PARATYPHI B: O (<?php echo "$spbo"; ?>) - H (<?php echo "$spbh"; ?>)</p>
<?php } ?>
<?php if($spco != $condition){ ?>
<p>S.PARATYPHI C: O (<?php echo "$spco"; ?>) - H (<?php echo "$spch"; ?>)</p>
<?php } ?>
<?php if($comment != $condition){ ?>
<p>Comment: <?php echo "$comment"; ?></p>
<?php } ?>


			 </div>
          </div>
		  <?php } ?>

		  
		    <?php if($totalbilirubin != $condition){ ?>
		   <div class="box paint_hover">
            <div class="title">

            <h3> <i class="icon-beaker"></i> <span>Liver function</span> </h3>
            </div>
            <div class="content"> 
			<?php if($totalbilirubin != $condition){ ?>
<p>Total bilirubin: <?php echo "$totalbilirubin"; ?></p>
<?php } ?>
<?php if($directbilirubin != $condition){ ?>
<p>Direct bilirubin: <?php echo "$directbilirubin"; ?></p>
<?php } ?>
<?php if($sgot != $condition){ ?>
<p>Sgot: <?php echo "$sgot"; ?></p>
<?php } ?>
<?php if($sgpt != $condition){ ?>
<p>Sgpt: <?php echo "$sgpt"; ?></p>
<?php } ?>
<?php if($alkphosphatase != $condition){ ?>
<p>Alkphosphatase: <?php echo "$alkphosphatase"; ?></p>
<?php } ?>
<?php if($totalprotein != $condition){ ?>
<p>Total protein: <?php echo "$totalprotein"; ?></p>
<?php } ?>
<?php if($acidphos != $condition){ ?>
<p>Acid phos: <?php echo "$acidphos"; ?></p>
<?php } ?>
<?php if($amylase != $condition){ ?>
<p>Amylase: <?php echo "$amylase"; ?></p>
<?php } ?>
<?php if($calcium != $condition){ ?>
<p>Calcium: <?php echo "$calcium"; ?></p>
<?php } ?>
<?php if($phosphorus != $condition){ ?>
<p>Phosphorus: <?php echo "$phosphorus"; ?></p>
<?php } ?>

			 </div>
          </div>
		  <?php } ?>
          <!-- End .box --> 
		  <?php if($hrpp != $condition or $oralgtt != $condition or $fastinglevel != $condition or $thirtyminutes != $condition or $sixtyminutes != $condition or $ninetyminutes != $condition or $onetwentyminutes != $condition
		  or $gluctoptest != $condition or $glycosylatedhb != $condition or $urea != $condition or $creatine != $condition or $uricacid != $condition or $cholesterol != $condition or $triglyceride != $condition or $hdlliproteins != $condition or $albumin != $condition or $ldh != $condition or $cpk != $condition){ ?>
		   <div class="box paint_hover">
            <div class="title">
  
            <h3> <i class="icon-beaker"></i> <span>Others - Biochemistry</span> </h3>
            </div>
            <div class="content"> 
			<?php if($hrpp != $condition){ ?>
			<p>2hr pp:  <?php echo "$hrpp"; ?></p>
			<?php } ?>
			<?php if($oralgtt != $condition){ ?>
<p>Oral g.t.t: <?php echo "$oralgtt"; ?> &deg;</p>
<?php } ?>
<?php if($fastinglevel != $condition){ ?>
<p>Fasting level: <?php echo "$fastinglevel"; ?> &deg;</p>
<?php } ?>
<?php if($thirtyminutes != $condition){ ?>
<p>Thirty minutes: <?php echo "$thirtyminutes"; ?> &deg;</p>
<?php } ?>
<?php if($sixtyminutes != $condition){ ?>
<p>Sixty minutes: <?php echo "$sixtyminutes"; ?> &deg;</p>
<?php } ?>
<?php if($ninetyminutes != $condition){ ?>
<p>Ninety minutes: <?php echo "$ninetyminutes"; ?> &deg;</p>
<?php } ?>
<?php if($onetwentyminutes != $condition){ ?>
<p>One twenty minutes: <?php echo "$onetwentyminutes"; ?> &deg;</p>
<?php } ?>
<?php if($gluctoptest != $condition){ ?>
<p>Gluc top. test. (g.t.t): <?php echo "$gluctoptest"; ?> &deg;</p>
<?php } ?>
<?php if($glycosylatedhb != $condition){ ?>
<p>Gyclosylated hb: <?php echo "$glycosylatedhb"; ?> &deg;</p>
<?php } ?>
<?php if($urea != $condition){ ?>
<p>Urea: <?php echo "$urea"; ?> &deg;</p>
<?php } ?>
<?php if($creatine != $condition){ ?>
<p>Creatine: <?php echo "$creatine"; ?> &deg;</p>
<?php } ?>
<?php if($uricacid != $condition){ ?>
<p>Uric acid: <?php echo "$uricacid"; ?> &deg;</p>
<?php } ?>
<?php if($cholesterol != $condition){ ?>
<p>Cholesterol: <?php echo "$cholesterol"; ?> &deg;</p>
<?php } ?>
<?php if($triglyceride != $condition){ ?>
<p>Trigclyceride: <?php echo "$triglyceride"; ?> &deg;</p>
<?php } ?>
<?php if($hdlliproteins != $condition){ ?>
<p>H.d.l liproteins l.d.l: <?php echo "$hdlliproteins"; ?> &deg;</p>
<?php } ?>
<?php if($albumin != $condition){ ?>
<p>Albumin: <?php echo "$albumin"; ?> &deg;</p>
<?php } ?>
<?php if($ldh != $condition){ ?>
<p>Ldh: <?php echo "$ldh"; ?> &deg;</p>
<?php } ?>
<?php if($cpk != $condition){ ?>
<p>Cpk: <?php echo "$cpk"; ?> &deg;</p>
<?php } ?>
				 </div>
          </div>
          <!-- End .box --> 
		  <?php } ?>
		  <?php if($sodiumna != $condition or $potassiumk != $condition or $chloridecl != $condition or $bicarbonate != $condition or $csfglucose != $condition or $csfprotein != $condition or $serumglobulin != $condition
		  or $albuminglobulinratio != $condition){ ?>
		   <div class="box paint_hover">
            <div class="title">
  
            <h3> <i class="icon-beaker"></i> <span>Electrolytes - Biochemistry</span> </h3>
            </div>
            <div class="content"> 
			<?php if($sodiumna != $condition){ ?>
			<p>Sodium(na):  <?php echo "$sodiumna"; ?></p>
			<?php } ?>
			<?php if($potassiumk != $condition){ ?>
<p>Potassium(k): <?php echo "$potassiumk"; ?> &deg;</p>
<?php } ?>
<?php if($chloridecl != $condition){ ?>
<p>Chloride(cl): <?php echo "$chloridecl"; ?> &deg;</p>
<?php } ?>
<?php if($bicarbonate != $condition){ ?>
<p>Bicarbonate: <?php echo "$bicarbonate"; ?> &deg;</p>
<?php } ?>
<?php if($csfglucose != $condition){ ?>
<p>Csf glucose: <?php echo "$csfglucose"; ?> &deg;</p>
<?php } ?>
<?php if($csfprotein != $condition){ ?>
<p>Csf protein: <?php echo "$csfprotein"; ?> &deg;</p>
<?php } ?>
<?php if($csfchloride != $condition){ ?>
<p>Csf chloride: <?php echo "$csfchloride"; ?> &deg;</p>
<?php } ?>
<?php if($serumglobulin != $condition){ ?>
<p>Serum globulin: <?php echo "$serumglobulin"; ?> &deg;</p>
<?php } ?>
<?php if($albuminglobulinratio != $condition){ ?>
<p>ALbumin/globulin ratio: <?php echo "$albuminglobulinratio"; ?> &deg;</p>
<?php } ?>

				 </div>
          </div>
          <!-- End .box --> 
		  <?php } ?>
		  
		  	  <?php if($urineappearance != $condition or $urinecolour != $condition or $ph != $condition or $sg != $condition or $urineprotein != $condition or $urinesugar != $condition or $urinekeytone != $condition
		  or $urineerythrocytes != $condition or $urinebilirubin != $condition or $urobilliaegen != $condition  or $nitrite != $condition or $leucocytes != $condition){ ?>
		   <div class="box paint_hover">
            <div class="title">
  
            <h3> <i class="icon-beaker"></i> <span>Urinalysis</span> </h3>
            </div>
            <div class="content"> 
			<?php if($urineappearance != $condition){ ?>
			<p>Urine appearance:  <?php echo "$urineappearance"; ?></p>
			<?php } ?>
			<?php if($urinecolour != $condition){ ?>
<p>Urine colour: <?php echo "$urinecolour"; ?> &deg;</p>
<?php } ?>
<?php if($ph != $condition){ ?>
<p>Ph: <?php echo "$ph"; ?> &deg;</p>
<?php } ?>
<?php if($sg != $condition){ ?>
<p>Sg: <?php echo "$sg"; ?> &deg;</p>
<?php } ?>
<?php if($urineprotein != $condition){ ?>
<p>Urine protein: <?php echo "$urineprotein"; ?> &deg;</p>
<?php } ?>
<?php if($urinesugar != $condition){ ?>
<p>Urine sugar: <?php echo "$urinesugar"; ?> &deg;</p>
<?php } ?>
<?php if($urinekeytone != $condition){ ?>
<p>Urine keytone: <?php echo "$urinekeytone"; ?> &deg;</p>
<?php } ?>
<?php if($urineerythrocytes != $condition){ ?>
<p>Urine erythrocytes: <?php echo "$urineerythrocytes"; ?> &deg;</p>
<?php } ?>
<?php if($urinebilirubin != $condition){ ?>
<p>Urine bilirubin: <?php echo "$urinebilirubin"; ?> &deg;</p>
<?php } ?>
<?php if($urobilliaegen != $condition){ ?>
<p>Urobilliaegen: <?php echo "$urobilliaegen"; ?> &deg;</p>
<?php } ?>
<?php if($nitrite != $condition){ ?>
<p>Nitrite: <?php echo "$nitrite"; ?> &deg;</p>
<?php } ?>
<?php if($leucocytes != $condition){ ?>
<p>Leucocytes: <?php echo "$leucocytes"; ?> &deg;</p>
<?php } ?>

				 </div>
          </div>
          <!-- End .box --> 
		  <?php } ?>
        </div>
        <!-- End .span6 -->
        <div class="span6">
		<?php if($haemoglobin != $condition){ ?>
          <div class="box paint_hover">
            <div class="title">
  
            <h3> <i class="icon-beaker"></i> <span>Full blood count - Haematology</span> </h3>
            </div>
            <div class="content"> 
			<p>Haemoglobin: <?php echo "$haemoglobin"; ?></p>
			<p>Heamatocrit pcv: <?php echo "$heamatocritpcv"; ?></p>
            <p>Polym Neutrophils: <?php echo "$polymneutrophils"; ?></p>
            <p>Lymphocytes: <?php echo "$lymphocytes"; ?></p>
            <p>Eosinophils: <?php echo "$eosinophils"; ?></p>
            <p>Monocytes: <?php echo "$monocytes"; ?></p>
            <p>Basophils: <?php echo "$basophils"; ?></p>
			 </div>
          </div>
		  <?php } ?>
          <!-- End .box --> 
		  
		  <?php if($directcoombs != $condition or $indirectcoombs != $condition or $heafmantouxtest != $condition or $hiv12screening != $condition or $vdrl != $condition or $pregnancytest != $condition or $rheumatoidfactor != $condition
		  or $hepatitisbantigen != $condition or $asotitre != $condition or $microfilara != $condition or $skinsnip != $condition or $skinscrapping != $condition){ ?>
          <div class="box paint_hover">
            <div class="title">
  
            <h3> <i class="icon-beaker"></i> <span>Serology - Haematology</span> </h3>
            </div>
            <div class="content"> 
			 <?php if($directcoombs != $condition){ ?>
			<p>Direct combs: <?php echo "$directcoombs"; ?></p>
			 <?php } ?>
			 <?php if($indirectcoombs != $condition){ ?>
			<p>Indirect comb: <?php echo "$indirectcoombs"; ?></p>
			<?php } ?>
			 <?php if($heafmantouxtest != $condition){ ?>
            <p>Heaf/mantoux test: <?php echo "$heafmantouxtest"; ?></p>
			<?php } ?>
			 <?php if($hiv12screening != $condition){ ?>
            <p>Hiv 1+2 screening: <?php echo "$hiv12screening"; ?></p>
			<?php } ?>
			<?php if($vdrl != $condition){ ?>
            <p>Vdrl/khan/tpha/rpr: <?php echo "$vdrl"; ?></p>
			<?php } ?>
			<?php if($pregnancytest != $condition){ ?>
            <p>Pregnancy test: <?php echo "$pregnancytest"; ?></p>
			<?php } ?>
			<?php if($rheumatoidfactor != $condition){ ?>
            <p>Rheumatoid factor: <?php echo "$rheumatoidfactor"; ?></p>
			<?php } ?>
			<?php if($hepatitisbantigen != $condition){ ?>
            <p>Hepatitis b antigen: <?php echo "$hepatitisbantigen"; ?></p>
			<?php } ?>
			<?php if($asotitre != $condition){ ?>
            <p>Aso titre: <?php echo "$asotitre"; ?></p>
			<?php } ?>
			<?php if($microfilara != $condition){ ?>
            <p>Microfilara: <?php echo "$microfilara"; ?></p>
			<?php } ?>
			<?php if($skinsnip != $condition){ ?>
            <p>Skin snip: <?php echo "$skinsnip"; ?></p>
			<?php } ?>
			<?php if($skinscrapping != $condition){ ?>
            <p>Skin scrapping: <?php echo "$skinscrapping"; ?></p>
			<?php } ?>
			 </div>
          </div>
		 <?php } ?>
          <!-- End .box --> 
		  
		   <?php if($esr != $condition or $rbccount != $condition or $mchc != $condition or $mcv != $condition or $reticulocytescount != $condition or $platetetcount != $condition or $sicklingtest != $condition
		  or $hbgenotype != $condition or $bloodgroup != $condition or $psa != $condition or $lecells != $condition or $bleedingtime != $condition or $clottingtime != $condition or $prothrombintime != $condition or $hpyloriqualitative != $condition or $hpyloriquantative != $condition){ ?>
          <div class="box paint_hover">
            <div class="title">
  
            <h3> <i class="icon-beaker"></i> <span>Serology - Haematology</span> </h3>
            </div>
            <div class="content"> 
			 <?php if($directcoombs != $condition){ ?>
			<p>Direct combs: <?php echo "$directcoombs"; ?></p>
			 <?php } ?>
			 <?php if($indirectcoombs != $condition){ ?>
			<p>Indirect comb: <?php echo "$indirectcoombs"; ?></p>
			<?php } ?>
			 <?php if($heafmantouxtest != $condition){ ?>
            <p>Heaf/mantoux test: <?php echo "$heafmantouxtest"; ?></p>
			<?php } ?>
			 <?php if($hiv12screening != $condition){ ?>
            <p>Hiv 1+2 screening: <?php echo "$hiv12screening"; ?></p>
			<?php } ?>
			<?php if($vdrl != $condition){ ?>
            <p>Vdrl/khan/tpha/rpr: <?php echo "$vdrl"; ?></p>
			<?php } ?>
			<?php if($pregnancytest != $condition){ ?>
            <p>Pregnancy test: <?php echo "$pregnancytest"; ?></p>
			<?php } ?>
			<?php if($rheumatoidfactor != $condition){ ?>
            <p>Rheumatoid factor: <?php echo "$rheumatoidfactor"; ?></p>
			<?php } ?>
			<?php if($hepatitisbantigen != $condition){ ?>
            <p>Hepatitis b antigen: <?php echo "$hepatitisbantigen"; ?></p>
			<?php } ?>
			<?php if($asotitre != $condition){ ?>
            <p>Aso titre: <?php echo "$asotitre"; ?></p>
			<?php } ?>
			<?php if($microfilara != $condition){ ?>
            <p>Microfilara: <?php echo "$microfilara"; ?></p>
			<?php } ?>
			<?php if($skinsnip != $condition){ ?>
            <p>Skin snip: <?php echo "$skinsnip"; ?></p>
			<?php } ?>
			<?php if($skinscrapping != $condition){ ?>
            <p>Skin scrapping: <?php echo "$skinscrapping"; ?></p>
			<?php } ?>
			 </div>
          </div>
		 <?php } ?>
          <!-- End .box --> 
		  
		  	   <?php if($stoolap != $condition or $mucus != $condition or $blood != $condition or $ova != $condition or $cysts != $condition or $protozoa != $condition or $fecal != $condition
		  or $stoolcultureyielded != $condition){ ?>
          <div class="box paint_hover">
            <div class="title">
  
            <h3> <i class="icon-beaker"></i> <span>Stool analysis - Microbiology</span> </h3>
            </div>
            <div class="content"> 
			 <?php if($stoolap != $condition){ ?>
			<p>Stool appearance: <?php echo "$stoolap"; ?></p>
			 <?php } ?>
			 <?php if($mucus != $condition){ ?>
			<p>Mucus: <?php echo "$mucus"; ?></p>
			<?php } ?>
			 <?php if($blood != $condition){ ?>
            <p>Blood: <?php echo "$blood"; ?></p>
			<?php } ?>
			 <?php if($ova != $condition){ ?>
            <p>Ova: <?php echo "$ova"; ?></p>
			<?php } ?>
			<?php if($cysts != $condition){ ?>
            <p>Cysts: <?php echo "$cysts"; ?></p>
			<?php } ?>
			<?php if($protozoa != $condition){ ?>
            <p>Protozoa: <?php echo "$protozoa"; ?></p>
			<?php } ?>
			<?php if($fecal != $condition){ ?>
            <p>Faecal occult blood: <?php echo "$fecal"; ?></p>
			<?php } ?>
			<?php if($stoolcultureyielded != $condition){ ?>
            <p>Stool Culture yielded: <?php echo "$stoolcultureyielded"; ?></p>
			<?php } ?>
			
			 </div>
          </div>
		 <?php } ?>
          <!-- End .box --> 
		  
		  	  	   <?php if($wetprep != $condition or $puscells != $condition or $yeastcells != $condition or $hvsepithcells != $condition or $rbchpf != $condition or $hvsbacteria != $condition or $tvaginatis != $condition
		  or $hvscultureyielded != $condition){ ?>
          <div class="box paint_hover">
            <div class="title">
  
            <h3> <i class="icon-beaker"></i> <span>Hvs/Mcs - Microbiology</span> </h3>
            </div>
            <div class="content"> 
			 <?php if($wetprep != $condition){ ?>
			<p>Wet prep: <?php echo "$wetprep"; ?></p>
			 <?php } ?>
			 <?php if($puscells != $condition){ ?>
			<p>Pus cells: <?php echo "$puscells"; ?></p>
			<?php } ?>
			 <?php if($yeastcells != $condition){ ?>
            <p>Yeast cells: <?php echo "$yeastcells"; ?></p>
			<?php } ?>
			 <?php if($hvsepithcells != $condition){ ?>
            <p>Epith cells: <?php echo "$hvsepithcells"; ?></p>
			<?php } ?>
			<?php if($rbchpf != $condition){ ?>
            <p>Rbc/hpf: <?php echo "$rbchpf"; ?></p>
			<?php } ?>
			<?php if($hvsbacteria != $condition){ ?>
            <p>Hvs Bacteria: <?php echo "$hvsbacteria"; ?></p>
			<?php } ?>
			<?php if($tvaginatis != $condition){ ?>
            <p>T.vaginatis: <?php echo "$tvaginatis"; ?></p>
			<?php } ?>
			<?php if($hvscultureyielded != $condition){ ?>
            <p>Hvs Culture yielded: <?php echo "$hvscultureyielded"; ?></p>
			<?php } ?>
			
			 </div>
          </div>
		 <?php } ?>
          <!-- End .box --> 
		  
		  	  	   <?php if($urinecolourmcs != $condition or $urinalappearance != $condition or $microscopy != $condition or $puscellshpt != $condition or $mcsepithcells != $condition or $casts != $condition or $crystals != $condition
		  or $rbc != $condition or $mcsbacteria != $condition or $yeastscell != $condition or $trichomonasvaginalis != $condition or $mcscultureyielded != $condition){ ?>
          <div class="box paint_hover">
            <div class="title">
  
            <h3> <i class="icon-beaker"></i> <span>Mcs - Microbiology</span> </h3>
            </div>
            <div class="content"> 
			 <?php if($urinecolourmcs != $condition){ ?>
			<p>Urine colour: <?php echo "$urinalappearance"; ?></p>
			 <?php } ?>
			 <?php if($microscopy != $condition){ ?>
			<p>Microscopy: <?php echo "$microscopy"; ?></p>
			<?php } ?>
			 <?php if($puscellshpt != $condition){ ?>
            <p>Puscells/hpt: <?php echo "$puscellshpt"; ?></p>
			<?php } ?>
			 <?php if($mcsepithcells != $condition){ ?>
            <p>Mcs Epith cells: <?php echo "$hvsepithcells"; ?></p>
			<?php } ?>
			<?php if($casts != $condition){ ?>
            <p>Casts: <?php echo "$casts"; ?></p>
			<?php } ?>
			<?php if($crystals != $condition){ ?>
            <p>Crystals: <?php echo "$crystals"; ?></p>
			<?php } ?>
			<?php if($rbc != $condition){ ?>
            <p>Rbc: <?php echo "$rbc"; ?></p>
			<?php } ?>
			<?php if($mcsbacteria != $condition){ ?>
            <p>Mcs Bacteria: <?php echo "$mcsbacteria"; ?></p>
			<?php } ?>
			<?php if($yeastscell != $condition){ ?>
            <p>Yeasts cell: <?php echo "$yeastscell"; ?></p>
			<?php } ?>
			<?php if($trichomonasvaginalis != $condition){ ?>
            <p>Trichomonas vaginalis: <?php echo "$trichomonasvaginalis"; ?></p>
			<?php } ?>
			<?php if($mcscultureyielded != $condition){ ?>
            <p>Mcs Culture yielded: <?php echo "$mcscultureyielded"; ?></p>
			<?php } ?>
			 </div>
          </div>
		 <?php } ?>
          <!-- End .box --> 
		  
		  	  
		  	  	   <?php if($ciproflaxin != $condition){ ?>
          <div class="box paint_hover">
            <div class="title">
  
            <h3> <i class="icon-beaker"></i> <span>Sensitivity profile - Microbiology</span> </h3>
            </div>
            <div class="content"> 
			
			<p>Ciproflaxin(cpx): <?php echo "$ciproflaxin"; ?></p>
			 
			<p>Pefloxacom(pet): <?php echo "$pefloxacom"; ?></p>
			
            <p>Amoxycillin(amx): <?php echo "$amoxycillin"; ?></p>
			
            <p>Ceftriazone(cef): <?php echo "$ceftriazone"; ?></p>
			
            <p>Rochephin(cro): <?php echo "$rochephin"; ?></p>
		
            <p>Ampicillin: <?php echo "$ampicillin"; ?></p>
			
            <p>Cloxacillin: <?php echo "$cloxacillin"; ?></p>
			
            <p>Chloramphenicol(chl): <?php echo "$chloramphenicol"; ?></p>
			
            <p>Erythromicin(ery): <?php echo "$erythromicin"; ?></p>
			
            <p>Gentamycin(gen): <?php echo "$gentamycin"; ?></p>
			
            <p>Nitrofuration(nit): <?php echo "$nitrofuration"; ?></p>
			
			<p>Ofloxacin(ofl): <?php echo "$ofloxacin"; ?></p>
			
			<p>Streptomycin(str): <?php echo "$streptomycin"; ?></p>
			
			<p>Zennat: <?php echo "$zennat"; ?></p>
			
			<p>Floxacin (Fx): <?php echo "$floxacin"; ?></p>
			
			<p>Tetracyclin: <?php echo "$tetracyclin"; ?></p>
			
			 </div>
          </div>
		 <?php } ?>
          <!-- End .box --> 
		  
		  <?php if($throatswab != $condition or $earswab != $condition or $pusswab != $condition or $woundswab != $condition or $Urethralswab != $condition){ ?>
          <div class="box paint_hover">
            <div class="title">
  
            <h3> <i class="icon-beaker"></i> <span>Swabs - Microbiology</span> </h3>
            </div>
            <div class="content"> 
			 <?php if($throatswab != $condition){ ?>
			<p>Throat swab: <?php echo "$throatswab"; ?></p>
			 <?php } ?>
			 <?php if($earswab != $condition){ ?>
			<p>Ear swab: <?php echo "$earswab"; ?></p>
			<?php } ?>
			 <?php if($pusswab != $condition){ ?>
            <p>Pus swab: <?php echo "$pusswab"; ?></p>
			<?php } ?>
			 <?php if($woundswab != $condition){ ?>
            <p>Wound swab: <?php echo "$woundswab"; ?></p>
			<?php } ?>
			<?php if($Urethralswab != $condition){ ?>
            <p>Urethral swab: <?php echo "$Urethralswab"; ?></p>
			<?php } ?>
			
			 </div>
          </div>
		 <?php } ?>
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
</body>
</html>