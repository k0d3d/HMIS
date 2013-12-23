<?php
define('INCLUDE_CHECK',1);
include 'coreengine.php';
hack_protect();

$identifystaff = mysql_query("select * from user where id='$_SESSION[staff_id]'");


$row = mysql_fetch_array($identifystaff);
$staffname = $row["staffname"];
$staffrole = strtoupper($row["role"]);

$identifypatient = mysql_query("select * from patients where id='$_GET[patient]'");

$patientrow = mysql_fetch_array($identifypatient);
$patientid = $patientrow["id"];
$patientsurname = $patientrow["surname"];
$patientother = $patientrow["other"];
$patientgender = $patientrow["gender"];
$patientcompany = $patientrow["company"];
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
	 <form action='' method="POST">
      <h2>Refer to laboratory for test.</h2>
      <div class="row-fluid">
        <div class="span12">
          <div class="box paint_hover">
            <div class="title">
              <h3> <i class="icon-sitemap"></i> <span>Details</span> </h3>
            </div>
            <div class="content"> Surname:<?php echo "$patientsurname"; ?> <b>|</b> Othernames: <?php echo "$patientother"; ?>
			<br />
Sex: <?php echo "$patientgender"; ?> <b>|</b> Date: <?php echo date('d M Y'); ?><br />
Company: <?php echo "$patientcompany"; ?> <b>|</b> Doctor's name: <?php echo "$staffname"; ?> <b>|</b> Hospital: 
<div style = "margin-top:8px;"></div>
<fieldset>
Specimen: <input style="width:150px;" value = "" type="text" id="specimen" name="specimen" placeholder="" class="row-fluid"> Laboratory: <input style="width:150px;" value = "" type="text" id="labno" name="labno" placeholder="" class="row-fluid"> Lab No:   <input style = "width:150px;" value = "" type="text" id="labno" name="labno" placeholder="" class="row-fluid">               
<br />
 <button type="submit" name = "confirm" id = "confirm" class="btn btn-primary">Confirm and send to laboratory</button>
</fieldset>
			</div>
          </div>
          <!-- End .box --> 
        </div>
        <!-- End .span12 --> 
      </div>
      <!-- End .row-fluid -->
      
      
      
      <div class="row-fluid">
        <div class="span2">
          <div class="box paint_hover">
            <div class="title">
              <h3> <i class="icon-sitemap"></i> <span>Chemistry</span> </h3>
            </div>
            <div class="content"> <b>RENAL / ELECTROLYTES / BONE</B>
			<br />
			<form class="form-horizontal" action="#">
        
                <div class="form-row control-group row-fluid ">
			<label class="checkbox inline">
                      <input type="checkbox" id="UECREAT" name="UECREAT" value="U&E CREAT">
                      U&E CREAT</label>
					  <br />
					  <label class="checkbox inline">
                      <input type="checkbox" id="ELECTROLYTES" name="ELECTROLYTES" value="ELECTROLYTES">
                      ELECTROLYTES</label>
					  <br />
					  <label class="checkbox inline">
                      <input type="checkbox" id="SODIUM" name="SODIUM" value="SODIUM">
                      SODIUM</label>
					  <BR />
					  <label class="checkbox inline">
                      <input type="checkbox" id="POTASSIUM" name="POTASSIUM" value="POTASSIUM">
                      POTASSIUM</label>
					  <BR />
					  <label class="checkbox inline">
                      <input type="checkbox" id="UREA" name="UREA" value="UREA">
                      UREA</label>
					  <BR />
					  <label class="checkbox inline">
                      <input type="checkbox" id="CREATININE" name="CREATININE" value="CREATININE">
                      CREATININE</label>
					  <BR />
					  <label class="checkbox inline">
                      <input type="checkbox" id="CREATININE CLEARANCE" name="CREATININE CLEARANCE" value="CREATININE CLEARANCE">
                      CREATININE CLEARANCE</label>
					  <br />
					  <label class="checkbox inline">
                      <input type="checkbox" id="PROTEIN (24HR URINE)" name="PROTEIN (24HR URINE)" value="PROTEIN (24HR URINE)">
                      PROTEIN (24HR URINE)</label>
					  <BR />
					   <label class="checkbox inline">
                      <input type="checkbox" id="URIC ACID" name="URIC ACID" value="URIC ACID">
                     URIC ACID</label>
					 <BR />
					 <label class="checkbox inline">
                      <input type="checkbox" id="URIC ACID (24HR URINE)" name="URIC ACID (24HR URINE)" value="URIC ACID (24HR URINE)">
                     URIC ACID (24HR URINE)</label>
					 <BR />
					 <label class="checkbox inline">
                      <input type="checkbox" id="MAGNESIUM" name="MAGNESIUM" value="MAGNESIUM">
                     MAGNESIUM</label>
					 <BR />
					  <label class="checkbox inline">
                      <input type="checkbox" id="CALCIUM(SERUM - NO CUFF)" name="CALCIUM(SERUM - NO CUFF)" value="CALCIUM(SERUM - NO CUFF)">
                    CALCIUM(SERUM - NO CUFF)</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="PHOSPHATE(SERUM)" name="PHOSPHATE(SERUM)" value="PHOSPHATE(SERUM)">
                    PHOSPHATE(SERUM)</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="CALCULUS ANALYSIS" name="CALCULUS ANALYSIS" value="CALCULUS ANALYSIS">
                    CALCULUS ANALYSIS</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="LD-H" name="LD-H" value="LD-H">
                   LD-H</label>
				   <BR />
				   <label class="checkbox inline">
                      <input type="checkbox" id="ALBUMIN(SERUM)" name="ALBUMIN(SERUM)" value="ALBUMIN(SERUM)">
                    ALBUMIN(SERUM)</label>
					
					<DIV STYLE = "MARGIN-TOP:13PX;"></DIV>
					<B>LIVER/PANCREAS</B>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="LFT" name="LFT" value="LFT">
                    LFT</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="LFT + PROTEINS" name="LFT + PROTEINS" value="LFT + PROTEINS">
                    LFT + PROTEINS</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="PROT ELECTROPH(INCL. MYELOMA)" name="PROT ELECTROPH(INCL. MYELOMA)" value="PROT ELECTROPH(INCL. MYELOMA)">
                    PROT ELECTROPH(INCL. MYELOMA)</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="PROTEIN TOTAL / ALBUMIN" name="PROTEIN TOTAL / ALBUMIN" value="PROTEIN TOTAL / ALBUMIN">
                    PROTEIN TOTAL / ALBUMIN</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="BILIRUBIN (TOTAL, CONJ)" name="BILIRUBIN (TOTAL, CONJ)" value="BILIRUBIN (TOTAL, CONJ)">
                    BILIRUBIN (TOTAL, CONJ)</label>
					<bR />
					<label class="checkbox inline">
                      <input type="checkbox" id="ALP" name="ALP" value="ALP">
                    ALP</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="GGT" name="GGT" value="GGT">
                    GGT</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="AST" name="AST" value="AST">
                    AST</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="ALT" name="ALT" value="ALT">
                    ALT</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="AMYLASE" name="AMYLASE" value="AMYLASE">
                    AMYLASE</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="LIPASE" name="LIPASE" value="LIPASE">
                    LIPASE</label>
					
					<DIV STYLE = "MARGIN-TOP:13PX;"></DIV>
					<B>CARDIAC</B>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="MYOGLOBIN" name="MYOGLOBIN" value="MYOGLOBIN">
                    MYOGLOBIN</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="CK-MB MASS" name="CK-MB MASS" value="CK-MB MASS">
                    CK-MB MASS</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="TROPONIN I" name="TROPONIN I" value="TROPONIN I">
                    TROPONIN I</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="TROPONIN T" name="TROPONIN T" value="TROPONIN T">
                    TROPONIN T</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="CK" name="CK" value="CK">
                    CK</label>
					
					<DIV STYLE = "MARGIN-TOP:13PX;"></DIV>
					<B>LIPIDS / CAD RISK</B>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="LIPOGRAM" name="LIPOGRAM" value="LIPOGRAM">
                    LIPOGRAM</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="CHOLESTEROL" name="CHOLESTEROL" value="CHOLESTEROL">
                    CHOLESTEROL</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="TRIGLYCERIDES" name="TRIGLYCERIDES" value="TRIGLYCERIDES">
                    TRIGLYCERIDES</label>
					
					<DIV STYLE = "MARGIN-TOP:13PX;"></DIV>
					<B>DIABETES</B>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="GLUCOSE FASTING" name="GLUCOSE FASTING" value="GLUCOSE FASTING">
                    GLUCOSE FASTING</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="GLUCOSE RANDOM" name="GLUCOSE RANDOM" value="GLUCOSE RANDOM">
                    GLUCOSE RANDOM</label>
					<br />
					<label class="checkbox inline">
                      <input type="checkbox" id="GLUCOSE 2HR POST PRANDIAL" name="GLUCOSE 2HR POST PRANDIAL" value="GLUCOSE 2HR POST PRANDIAL">
                    GLUCOSE 2HR POST PRANDIAL</label>
					<br />
					<label class="checkbox inline">
                      <input type="checkbox" id="GLUCOSE TOLERANCE TEST(2HRS)" name="GLUCOSE TOLERANCE TEST(2HRS)" value="GLUCOSE TOLERANCE TEST(2HRS)">
                    GLUCOSE TOLERANCE TEST(2HRS)</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="HBA1C" name="HBA1C" value="HBA1C">
                    HBA1C</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="C-PEPTIDE" name="C-PEPTIDE" value="C-PEPTIDE">
                    C-PEPTIDE</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="ANTI GADI/IA2 ANTI BODIES" name="ANTI GADI/IA2 ANTI BODIES" value="ANTI GADI/IA2 ANTI BODIES">
                    ANTI GADI/IA2 ANTI BODIES</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="MICROALBUMIN(urine/quantitative)" name="MICROALBUMIN(urine/quantitative)" value="MICROALBUMIN(urine/quantitative)">
                    MICROALBUMIN</label>
					<br />
					<label class="checkbox inline">
                      <input type="checkbox" id="FRUCTOSAMINE SERUM" name="FRUCTOSAMINE SERUM" value="FRUCTOSAMINE SERUM">
                    FRUCTOSAMINE SERUM</label>
					
					<DIV STYLE = "MARGIN-TOP:13PX;"></DIV>
					<B>INFLAMATION / IMMUNE</B>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="CRP" name="CRP" value="CRP">
                    CRP</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="COMPLEMENT C3/C4" name="COMPLEMENT C3/C4" value="COMPLEMENT C3/C4">
                    COMPLEMENT C3/C4</label>
					  </div>
					  
					 
					  </form>
			</div>
          </div>
          <!-- End .box --> 
        </div>
        <!-- End .span2 -->
        <div class="span2">
          <div class="box paint_hover">
            <div class="title">
              <h3> <i class="icon-sitemap"></i> <span>ENDOCRINOLOGY</span> </h3>
            </div>
            <div class="content"> 
<B>ENDOCRINE - THYROID</B>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="TSH" name="TSH" value="TSH">
                    TSH</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="FREE T4" name="FREE T4" value="FREE T4">
                    FREE T4</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="FREE T3" name="FREE T3" value="FREE T3">
                    FREE T3</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="THYROID FUNCTIONS(TSH / FT4)" name="THYROID FUNCTIONS(TSH / FT4)" value="THYROID FUNCTIONS(TSH / FT4)">
                    THYROID FUNCTIONS(TSH / FT4)</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="THYROID FUNCTIONS(TSH / FT4)" name="THYROID FUNCTIONS(TSH / FT4)" value="THYROID FUNCTIONS(TSH / FT4)">
                    THYROID FUNCTIONS(TSH / FT4)</label>
					<br />
					<label class="checkbox inline">
                      <input type="checkbox" id="THYROID FUNCTIONS(TSH / FT3) FTA" name="THYROID FUNCTIONS(TSH / FT3) FTA" value="THYROID FUNCTIONS(TSH / FT3) FTA">
                    THYROID FUNCTIONS(TSH / FT3) FTA</label>
					<br />
					<label class="checkbox inline">
                      <input type="checkbox" id="THYROID ANTIBODIES" name="THYROID ANTIBODIES" value="THYROID ANTIBODIES">
                    THYROID ANTIBODIES</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="TSH RECEPTOR ANTIBODIES" name="TSH RECEPTOR ANTIBODIES" value="TSH RECEPTOR ANTIBODIES">
                    TSH RECEPTOR ANTIBODIES</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="PTH" name="PTH" value="PTH">
                    PTH</label>
					
					 <DIV STYLE = "MARGIN-TOP:13PX;"></DIV>
					  <B>ENDOCRINE - REPRODUCTIVE</B>
					  <BR />
					  <label class="checkbox inline">
                      <input type="checkbox" id="MENOPAUSAL SCREEN" name="MENOPAUSAL SCREEN" value="MENOPAUSAL SCREEN">
                    MENOPAUSAL SCREEN</label>
					<BR />
					 <label class="checkbox inline">
                      <input type="checkbox" id="OVULATORY PROFILE (day 21)" name="OVULATORY PROFILE (day 21)" value="OVULATORY PROFILE (day 21)">
                    OVULATORY PROFILE (day 21)</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="INFERTILITY (female day 3)" name="INFERTILITY (female day 3)" value="INFERTILITY (female day 3)">
                    INFERTILITY (female day 3)</label>
					<br />
					<label class="checkbox inline">
                      <input type="checkbox" id="INFERTILITY (male)" name="INFERTILITY (male)" value="INFERTILITY (male)">
                    INFERTILITY (male)</label>
					<br />
					<label class="checkbox inline">
                      <input type="checkbox" id="SEMEN ANALYSIS" name="SEMEN ANALYSIS" value="SEMEN ANALYSIS">
                    SEMEN ANALYSIS</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="B-HCG quantitative" name="B-HCG quantitative" value="B-HCG quantitative">
                    B-HCG quantitative</label>
					<br />
					<label class="checkbox inline">
                      <input type="checkbox" id="B-HCG (male)" name="B-HCG (male)" value="B-HCG (male)">
                    B-HCG (male)</label>
					<br />
					<label class="checkbox inline">
                      <input type="checkbox" id="PROLACTIN (rest 15 minutes)" name="PROLACTIN (rest 15 minutes)" value="PROLACTIN (rest 15 minutes)">
                    PROLACTIN (rest 15 minutes)</label>
					<br />
					<label class="checkbox inline">
                      <input type="checkbox" id="FSH" name="FSH" value="FSH">
                    FSH</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="LH" name="LH" value="LH">
                    LH</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="OESTRADIOL(E2)" name="OESTRADIOL(E2)" value="OESTRADIOL(E2)">
                    OESTRADIOL(E<sub>2</sub>)</label>
					<br />
					<label class="checkbox inline">
                      <input type="checkbox" id="PROGESTERONE(Ovulation day 21)" name="PROGESTERONE(Ovulation day 21)" value="PROGESTERONE(Ovulation day 21)">
                    PROGESTERONE(Ovulation day 21)</label>
					<br />
					<label class="checkbox inline">
                      <input type="checkbox" id="17-OH PROGESTERONE" name="17-OH PROGESTERONE" value="17-OH PROGESTERONE">
                    17-OH PROGESTERONE</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="DHEA-S" name="DHEA-S" value="DHEA-S">
                    DHEA-S</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="TESTOSTERONE" name="TESTOSTERONE" value="TESTOSTERONE">
                    TESTOSTERONE</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="ANTI MULLERIAN HORMONE" name="ANTI MULLERIAN HORMONE" value="ANTI MULLERIAN HORMONE">
                    ANTI MULLERIAN HORMONE</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="SEX HORMONE BINDING GLOBULIN" name="SEX HORMONE BINDING GLOBULIN" value="SEX HORMONE BINDING GLOBULIN">
                    SEX HORMONE BINDING GLOBULIN</label>
			</div>
          </div>
          <!-- End .box --> 
		  
		  <div class="box paint_hover">
            <div class="title">
              <h3> <i class="icon-sitemap"></i> <span>TUMOUR MARKERS</span> </h3>
            </div>
            <div class="content">
			<label class="checkbox inline">
                      <input type="checkbox" id="PSA" name="PSA" value="PSA">
                    PSA</label>
					<BR />
			<label class="checkbox inline">
                      <input type="checkbox" id="CEA(G.I.T. , lung, breast)" name="CEA(G.I.T. , lung, breast)" value="CEA(G.I.T. , lung, breast)">
                    CEA(G.I.T. , lung, breast)</label>		
					<br />
					<label class="checkbox inline">
                      <input type="checkbox" id="CA 19-9(G.I.T. , pancreas)" name="CA 19-9(G.I.T. , pancreas)" value="CA 19-9(G.I.T. , pancreas)">
                    CA 19-9(G.I.T. , pancreas)</label>	
					<br />
					<label class="checkbox inline">
                      <input type="checkbox" id="CA 125(ovary)" name="CA 125(ovary)" value="CA 125(ovary)">
                    CA 125(ovary)</label>
					<br />
					<label class="checkbox inline">
                      <input type="checkbox" id="CA 15-3(breast)" name="CA 15-3(breast)" value="CA 15-3(breast)">
                    CA 15-3(breast)</label>
					<br />
					<label class="checkbox inline">
                      <input type="checkbox" id="AFP" name="AFP" value="AFP">
                    AFP</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="BENCE-JONES PROT(urine)" name="BENCE-JONES PROT(urine)" value="BENCE-JONES PROT(urine)">
                    BENCE-JONES PROT(urine)</label>
					<br />
					<label class="checkbox inline">
                      <input type="checkbox" id="B2-MICROGLOBULIN" name="B2-MICROGLOBULIN" value="B2-MICROGLOBULIN">
                    B2-MICROGLOBULIN</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="OCCULT BLOOD(faeces)" name="OCCULT BLOOD(faeces)" value="OCCULT BLOOD(faeces)">
                    OCCULT BLOOD(faeces)</label>
			</div>
          </div>
        </div>
        <!-- End .span2 -->
        <div class="span2">
          <div class="box paint_hover">
            <div class="title">
              <h3> <i class="icon-sitemap"></i> <span>HAEMATOLOGY</span> </h3>
            </div>
            <div class="content"> 
            <b>GENERAL</b>
			<BR />
			<label class="checkbox inline">
                      <input type="checkbox" id="ANTENATAL SCREEN" name="ANTENATAL SCREEN" value="ANTENATAL SCREEN">
                    ANTENATAL SCREEN</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="ANTENATAL SCREEN + HIV" name="ANTENATAL SCREEN + HIV" value="ANTENATAL SCREEN + HIV">
                    ANTENATAL SCREEN + HIV</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="FBC" name="FBC" value="FBC">
                    FBC</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="ESR" name="ESR" value="ESR">
                    ESR</label>
					<br />
					<label class="checkbox inline">
                      <input type="checkbox" id="HEAMOGLOBIN" name="HEAMOGLOBIN" value="HEAMOGLOBIN">
                    HEAMOGLOBIN</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="WBC + DIFF COUNT" name="WBC + DIFF COUNT" value="WBC + DIFF COUNT">
                    WBC + DIFF COUNT</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="RETICULOCYTES" name="RETICULOCYTES" value="RETICULOCYTES">
                    RETICULOCYTES</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="IRON STUDIES" name="IRON STUDIES" value="IRON STUDIES">
                    IRON STUDIES</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="FERRITIN" name="FERRITIN" value="FERRITIN">
                    FERRITIN</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="FOLATE(SERUM/RBC)" name="FOLATE(SERUM/RBC)" value="FOLATE(SERUM/RBC)">
                    FOLATE(SERUM/RBC)</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="VIT B12" name="VIT B12" value="VIT B12">
                    VIT B12</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="hb ELECTROPHORESIS(SICKLING)" name="hb ELECTROPHORESIS(SICKLING)" value="hb ELECTROPHORESIS(SICKLING)">
                    hb ELECTROPHORESIS(SICKLING)</label>
					<br />
					<label class="checkbox inline">
                      <input type="checkbox" id="ABO / RH (BLOOD GROUPING)" name="ABO / RH (BLOOD GROUPING)" value="ABO / RH (BLOOD GROUPING)">
                    ABO / RH (BLOOD GROUPING)</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="G6PD" name="G6PD" value="G6PD">
                    G6PD</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="COOMBS TEST(INDIRECT)" name="COOMBS TEST(INDIRECT)" value="COOMBS TEST(INDIRECT)">
                    COOMBS TEST(INDIRECT)</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="MALARIA (QBC)" name="MALARIA (QBC)" value="MALARIA (QBC)">
                    MALARIA (QBC)</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="PCV" name="PCV" value="PCV">
                    PCV</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="PLATELET" name="PLATELET" value="PLATELET">
                    PLATELET</label>
					
					 <DIV STYLE = "MARGIN-TOP:13PX;"></DIV>
					  <B>COAGULATION</B>
					  <BR />
					  <label class="checkbox inline">
                      <input type="checkbox" id="PT+INR" name="PT+INR" value="PT+INR">
                    PT+INR</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="PTT" name="PTT" value="PTT">
                    PTT</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="FIBRINOGEN" name="FIBRINOGEN" value="FIBRINOGEN">
                    FIBRINOGEN</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="DIC SCREEN" name="DIC SCREEN" value="DIC SCREEN">
                    DIC SCREEN</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="D-DIMER" name="D-DIMER" value="D-DIMER">
                    D-DIMER</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="PROTEIN C" name="PROTEIN C" value="PROTEIN C">
                   PROTEIN C</label>
				   <BR />
				   <label class="checkbox inline">
                      <input type="checkbox" id="PROTEIN S" name="PROTEIN S" value="PROTEIN S">
                   PROTEIN S</label>
				   <BR />
				   <label class="checkbox inline">
                      <input type="checkbox" id="FACTOR VIII" name="FACTOR VIII" value="FACTOR VIII">
                   FACTOR VIII</label>
			</div>
          </div>
          <!-- End .box --> 
		  
		  <div class="box paint_hover">
            <div class="title">
              <h3> <i class="icon-sitemap"></i> <span>ALLERGY</span> </h3>
            </div>
            <div class="content"> 
				<label class="checkbox inline">
                      <input type="checkbox" id="IGE TOTAL" name="IGE TOTAL" value="IGE TOTAL">
                    IGE TOTAL</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="PAEDIATRIC FOOD SCREEN" name="PAEDIATRIC FOOD SCREEN" value="PAEDIATRIC FOOD SCREEN">
                    PAEDIATRIC FOOD SCREEN</label>
					<BR />
				<label class="checkbox inline">
                      <input type="checkbox" id="ADULT FOOD SCREEN" name="ADULT FOOD SCREEN" value="ADULT FOOD SCREEN">
                    ADULT FOOD SCREEN</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="PHADIATOP(Inhalents)" name="PHADIATOP(Inhalents)" value="PHADIATOP(Inhalents)">
                    PHADIATOP(Inhalents)</label>
					<BR />
				    Other ALLERGIES please specify under OTHER TESTS
			</div>
          </div>
		  
		  <div class="box paint_hover">
            <div class="title">
              <h3> <i class="icon-sitemap"></i> <span>DRUGS</span> </h3>
            </div>
            <div class="content"> 
			 <B>DRUG SCREEN</B>
			 <BR />
				<label class="checkbox inline">
                      <input type="checkbox" id="DRUGS" name="DRUGS" value="DRUGS">
                    DRUGS</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="OPIATES" name="OPIATES" value="OPIATES">
                    OPIATES</label>
					<BR />
				<label class="checkbox inline">
                      <input type="checkbox" id="COCAINE" name="COCAINE" value="COCAINE">
                    COCAINE</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="CANNABIS" name="CANNABIS" value="CANNABIS">
                    CANNABIS</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="ALCOHOL" name="ALCOHOL" value="ALCOHOL">
                    ALCOHOL</label>
				    <BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="AMPHETAMINE" name="AMPHETAMINE" value="AMPHETAMINE">
                    AMPHETAMINE</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="BARBITURATES" name="BARBITURATES" value="BARBITURATES">
                    BARBITURATES</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="BENZODIAZEPINES" name="BENZODIAZEPINES" value="BENZODIAZEPINES">
                    BENZODIAZEPINES</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="MANDRAX" name="MANDRAX" value="MANDRAX">
                    MANDRAX</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="METHADONE" name="METHADONE" value="METHADONE">
                    METHADONE</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="PHENCYCLIDINE" name="PHENCYCLIDINE" value="PHENCYCLIDINE">
                    PHENCYCLIDINE</label>
					
					 <DIV STYLE = "MARGIN-TOP:13PX;"></DIV>
					 <B>DRUG SCREEN</B>
					 <BR />
					 <label class="checkbox inline">
                      <input type="checkbox" id="CARBAMAZEPINE" name="CARBAMAZEPINE" value="CARBAMAZEPINE">
                    CARBAMAZEPINE</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="DIGOXIN" name="DIGOXIN" value="DIGOXIN">
                    DIGOXIN</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="LITHIUM" name="LITHIUM" value="LITHIUM">
                    LITHIUM</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="PHENYTOIN" name="PHENYTOIN" value="PHENYTOIN">
                    PHENYTOIN</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="SODIUM VALPROATE" name="SODIUM VALPROATE" value="SODIUM VALPROATE">
                    SODIUM VALPROATE</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="CYCLOSPORIN" name="CYCLOSPORIN" value="CYCLOSPORIN">
                    CYCLOSPORIN</label>
			</div>
          </div>
        </div>
        <!-- End .span2 -->
        <div class="span2">
          <div class="box paint_hover">
            <div class="title">
              <h3> <i class="icon-sitemap"></i> <span>SEROLOGY</span> </h3>
            </div>
            <div class="content"> 
			<B>AUTO-IMMUNE</B>
			<BR />
			<label class="checkbox inline">
                      <input type="checkbox" id="ARTHRITIS SCREEN" name="ARTHRITIS SCREEN" value="ARTHRITIS SCREEN">
                    ARTHRITIS SCREEN</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="AUTO-IMMUNE SCREEN" name="AUTO-IMMUNE SCREEN" value="AUTO-IMMUNE SCREEN">
                    AUTO-IMMUNE SCREEN</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="ANF + ANTI DNA(DS DNA)" name="ANF + ANTI DNA(DS DNA)" value="ANF + ANTI DNA(DS DNA)">
                    ANF + ANTI DNA(DS DNA)</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="RHEUMATOID FACTOR(NEPH)" name="RHEUMATOID FACTOR(NEPH)" value="RHEUMATOID FACTOR(NEPH)">
                    RHEUMATOID FACTOR(NEPH)</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="RHEUMATOID FACTOR(SEMI QUANTITATIVE)" name="RHEUMATOID FACTOR(SEMI QUANTITATIVE)" value="RHEUMATOID FACTOR(SEMI QUANTITATIVE)">
                    RHEUMATOID FACTOR(SEMI QUANTITATIVE)</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="ENA SCREEN" name="ENA SCREEN" value="ENA SCREEN">
                    ENA SCREEN</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="CARDIOLIPIN AB (LUPUS ANTICOAGULANT)" name="CARDIOLIPIN AB (LUPUS ANTICOAGULANT)" value="CARDIOLIPIN AB (LUPUS ANTICOAGULANT)">
                    CARDIOLIPIN AB (LUPUS ANTICOAGULANT)</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="SMOOTH MUSCLE AB" name="SMOOTH MUSCLE AB" value="SMOOTH MUSCLE AB">
                    SMOOTH MUSCLE AB</label>
					
					 <DIV STYLE = "MARGIN-TOP:13PX;"></DIV>
					 <B>INFECTIVE</B>
					 <BR />
					 <label class="checkbox inline">
                      <input type="checkbox" id="ASOT" name="ASOT" value="ASOT">
                    ASOT</label>
					<BR />
					 <label class="checkbox inline">
                      <input type="checkbox" id="ANTI-DNASE B" name="ANTI-DNASE B" value="ANTI-DNASE B">
                    ANTI-DNASE B</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="CMV" name="CMV" value="CMV">
                    CMV</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="EBV SEROLOGY" name="EBV SEROLOGY" value="EBV SEROLOGY">
                    EBV SEROLOGY</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="H.PYLORI(SERUM)" name="H.PYLORI(SERUM)" value="H.PYLORI(SERUM)">
                    H.PYLORI(SERUM)</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="H.PYLORI(SERUM)" name="H.PYLORI(SERUM)" value="H.PYLORI(SERUM)">
                    H.PYLORI(SERUM)</label>
					<BR />
					<label class="checkbox inline">
                      <input type="checkbox" id="RUBELLA IGM" name="RUBELLA IGM" value="RUBELLA IGM">
                   RUBELLA IGM</label>
				   <BR />
				   <label class="checkbox inline">
                      <input type="checkbox" id="RUBELLA IMMUNITY(IGG ONLY)" name="RUBELLA IMMUNITY(IGG ONLY)" value="RUBELLA IMMUNITY(IGG ONLY)">
                   RUBELLA IMMUNITY(IGG ONLY)</label>
				   <BR />
				   
			</div>
          </div>
          <!-- End .box --> 
        </div>
        <!-- End .span2 -->
        <div class="span2">
          <div class="box paint_hover">
            <div class="title">
              <h3> <i class="icon-sitemap"></i> <span>2 Columns</span> </h3>
            </div>
            <div class="content"> Grid with 2 columns </div>
          </div>
          <!-- End .box --> 
        </div>
        <!-- End .span2 -->
        <div class="span2">
          <div class="box paint_hover">
            <div class="title">
              <h3> <i class="icon-sitemap"></i> <span>2 Columns</span> </h3>
            </div>
            <div class="content"> Grid with 2 columns </div>
          </div>
          <!-- End .box --> 
        </div>
        <!-- End .span2 --> 
      </div>
      <!-- End .row-fluid -->
     
      
     
     
     
    </div>
    <!-- End #container --> 
	</form>
  </div>
  <div id="footer">
    <p> &copy; MEDICAL SOFTWARE - 2013. POWERED BY INTEGRAHEALTH</p>
     </div>
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
<script type="text/javascript">
  /**** Specific JS for this page ****/
/* Todo Plugin */
var data = [
{id: 1, title: "<i class='gicon-gift icon-white'><\/i>Have tea with the Queen", isDone: false},
{id: 2, title: "<i class='gicon-briefcase icon-white'><\/i>Steal  James Bond car", isDone: true},
{id: 3, title: "<i class='gicon-heart icon-white'><\/i>Confirm that this template is awesome", isDone: false},
{id: 4, title: "<i class='gicon-thumbs-up icon-white'><\/i>Nothing", isDone: false},  
{id: 5, title: "<i class='gicon-fire icon-white'><\/i>Play solitaire", isDone: false}         
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
          var mappedTasks = $.map(data, function(item){
              return new Task(item);
          });

          self.tasks(mappedTasks);      
      }

      ko.applyBindings(new TaskListViewModel());  
      //End Todo Plugin

      </script><script type="text/javascript">
      //Chart - Campaigns
      $(function () {
        var d4 = [[1,10], [2,9], [3,8], [4,6], [5,5], [6,3], [7,9], [8,10],[9,12],[10,14],[11,15],[12,13],[13,11],[14,10],[15,9],[16,8],[17,12],[18,14],[19,16],[20,19],[21,20],[22,20],[23,19],[24,17],[25,15],[25,14],[26,12],[27,10],[28,8],[29,10],[30,12],[31,10], [32,9], [33,8], [34,6], [35,5], [36,3], [37,9], [38,10],[39,12],[40,14],[41,15],[42,13],[43,11],[44,10],[45,9],[46,8],[47,12],[48,14],[49,16],[50,12],[51,10], [52,9], [53,8], [54,6], [55,5], [56,3], [57,9], [58,10],[59,12],[60,14],[61,15],[62,13],[63,11],[64,10],[65,9],[66,8],[67,12],[68,14],[69,16]];
        var d5 = [[1,12], [2,10], [3,9], [4,8], [5,8], [6,8], [7,8], [8,8],[9,9],[10,9],[11,10],[12,11],[13,12],[14,11],[15,10],[16,10],[17,9],[18,10],[19,11],[20,11],[21,12],[22,13],[23,14],[24,13],[25,12],[25,12],[26,11],[27,10],[28,9],[29,8],[30,7],[31,7], [32,8], [33,8], [34,7], [35,6], [36,6], [37,7], [38,8],[39,8],[40,9],[41,10],[42,11],[43,11],[44,12],[45,12],[46,11],[47,10],[48,9],[49,8],[50,8],[51,9], [52,10], [53,11], [54,12], [55,12], [56,12], [57,13], [58,13],[59,12],[60,11],[61,10],[62,9],[63,8],[64,7],[65,7],[66,6],[67,5],[68,4],[69,3]];

        var plot = $.plot($("#placeholder"),
            [ { data: d4, color:"rgba(0,0,0,0.2)", shadowSize:0, 
            bars: {
              show: true,
              lineWidth: 0,
              fill: true,

              fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] },
          }
      } , 
      { data: d5, 

          color:"rgba(255,255,255, 0.4)", 
          shadowSize:0,
          lines: {show:true, fill:false}, points: {show:false},
          bars: {show:false},
      },  
      ],     
      {
        series: {
         bars: {show:true, barWidth: 0.6}
     },
     grid: { show:false, hoverable: true, clickable: false, autoHighlight: true, borderWidth:0,   },
     yaxis: { min: 0, max: 20 },

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
         var d6 = [[1,10], [2,9], [3,8], [4,6], [5,5], [6,3], [7,9], [8,10],[9,12],[10,14],[11,15],[12,13],[13,11],[14,10],[15,9],[16,8],[17,12],[18,14],[19,16],[20,19],[21,20],[22,20],[23,19],[24,17],[25,15],[25,14],[26,12],[27,10],[28,8],[29,10],[30,12],[31,10], [32,9], [33,8], [34,6], [35,5], [36,3], ];
         $.plot($("#placeholder2"),
           [ { data: d6, color:"#fff", shadowSize:0, 
           bars: {
              show: true,
              lineWidth: 0,
              fill: true,
              highlight: {
                opacity: 0.3
            },
            fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] },
        },
    } , 
    ],     
    {
       series: {
         bars: {show:true, barWidth: 0.6}
     },
     grid: { show:false, hoverable: true, clickable: false, autoHighlight: true, borderWidth:0,   },
     yaxis: { min: 0, max: 23 },

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
       [ { data: d6, color:"rgba(0,0,0,0.2)", shadowSize:0, 
       bars: {

          lineWidth: 0,
          fill: true,

          fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] },
      },
      lines: {show:false, fill:true}, points: {show:false},
  } , 
  ],     
  {
   series: {
     bars: {show:true, barWidth: 0.6}
 },
 grid: { show:false, hoverable: true, clickable: false, autoHighlight: true, borderWidth:0,   },
 yaxis: { min: 0, max: 23 },

});
    //Facebook chart
    $.plot($("#placeholder4"),
       [ { data: d6, color:"rgba(0,0,0,0.2)", shadowSize:0, 
       bars: {

          lineWidth: 0,
          fill: true,

          fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] },
      },
      lines: {show:false, fill:true}, points: {show:false},
  } , 
  ],     
  {
   series: {
     bars: {show:true, barWidth: 0.6}
 },
 grid: { show:false, hoverable: true, clickable: false, autoHighlight: true, borderWidth:0,   },
 yaxis: { min: 0, max: 23 },

});
    // End Fundraiser chart
});




</script>
</body>
</html>