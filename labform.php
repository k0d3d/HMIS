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




$id = $requestrow["id"];
$patientid = $requestrow["patientid"];
$doctorid = $requestrow["doctorid"];
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
$urinalysis = $requestrow["Urinalysis"];
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
$sensitivity = $requestrow["sensitivity"];
$glucoserandom = $requestrow["glucoserandom"];
$mp = $requestrow["mp"];
$widal = $requestrow["widal"];
$Urethralswab = $requestrow["Urethral swab"];




$identifydoctor = mysql_query("select * from user where id='$doctorid'");

$doctorow = mysql_fetch_array($identifydoctor);
$doctorname = $doctorow["staffname"];

$identifypatient = mysql_query("select * from patients where id='$patientid'");

$patientrow = mysql_fetch_array($identifypatient);
$patientsurname = $patientrow["surname"];
$patientother = $patientrow["other"];
$patientgender = $patientrow["gender"];
$patientcompany = $patientrow["company"];

if (isset($_GET['activate']))
{ 
$removefromwaitinglist = mysql_query("DELETE FROM labwaiting WHERE patientid ='$patientid'") or die ("Bad del query");
$timer = $_GET["timer"];
mysql_query("INSERT INTO `activity`
(`staffid`,`activity`,`date`,`patient`)
VALUES
('$_SESSION[staff_id]','Attended to $patientsurname $patientother, who was directed from doctor $doctorname and had waited for $timer.','".date("U")."','$patientid')
");
}

if (isset($_POST['confirm']))
{ 
function filter($arr) {
return array_map('mysql_real_escape_string', $arr);
}
$_POST = filter($_POST);







$pid = $_POST["pid"];
$pdoctorid = $_POST["pdoctorid"];
$pdoctorname = $_POST["pdoctorname"];
$ppatientid = $_POST["ppatientid"];
$pdiagnosis = $_POST["diagnosis"];
$pspecimen = $_POST["specimen"];
$plabno = $_POST["labno"];
$ptotalbilirubin = isset($_POST["totalbilirubin"]) ? $_POST["totalbilirubin"] : '';
$pdirectbilirubin = isset($_POST["directbilirubin"]) ? $_POST["directbilirubin"] : '';
$psgot = isset($_POST["sgot"]) ? $_POST["sgot"] : '';
$psgpt = isset($_POST["sgpt"]) ? $_POST["sgpt"] : '';
$palkphosphatase = isset($_POST["alkphosphatase"]) ? $_POST["alkphosphatase"] : '';
$ptotalprotein = isset($_POST["totalprotein"]) ? $_POST["totalprotein"] : '';
$pacidphos = isset($_POST["acidphos"]) ? $_POST["acidphos"] : '';
$pamylase = isset($_POST["amylase"]) ? $_POST["amylase"] : '';
$pcalcium = isset($_POST["calcium"]) ? $_POST["calcium"] : '';
$pphosphorus = isset($_POST["phosphorus"]) ? $_POST["phosphorus"] : '';
$phrpp = isset($_POST["2hrpp"]) ? $_POST["2hrpp"] : '';
$poralgtt = isset($_POST["oralgtt"]) ? $_POST["oralgtt"] : '';
$pfastinglevel = isset($_POST["fastinglevel"]) ? $_POST["fastinglevel"] : '';
$pthirtyminutes = isset($_POST["30minutes"]) ? $_POST["30minutes"] : '';
$psixtyminutes = isset($_POST["60minutes"]) ? $_POST["60minutes"] : '';
$pninetyminutes = isset($_POST["90minutes"]) ? $_POST["90minutes"] : '';
$ponetwentyminutes = isset($_POST["120minutes"]) ? $_POST["120minutes"] : '';
$pgluctoptest = isset($_POST["gluctoptest"]) ? $_POST["gluctoptest"] : '';
$pglycosylatedhb = isset($_POST["glycosylatedhb"]) ? $_POST["glycosylatedhb"] : '';
$purea = isset($_POST["urea"]) ? $_POST["urea"] : '';
$pcreatine = isset($_POST["creatine"]) ? $_POST["creatine"] : '';
$puricacid = isset($_POST["uricacid"]) ? $_POST["uricacid"] : '';
$pcholesterol = isset($_POST["cholesterol"]) ? $_POST["cholesterol"] : '';
$ptriglyceride = isset($_POST["triglyceride"]) ? $_POST["triglyceride"] : '';
$phdlliproteins = isset($_POST["hdlliproteins"]) ? $_POST["hdlliproteins"] : '';
$palbumin = isset($_POST["albumin"]) ? $_POST["albumin"] : '';
$pldh = isset($_POST["ldh"]) ? $_POST["ldh"] : '';
$pcpk = isset($_POST["cpk"]) ? $_POST["cpk"] : '';
$psodiumna = isset($_POST["sodiumna"]) ? $_POST["sodiumna"] : '';
$ppotassiumk = isset($_POST["potassiumk"]) ? $_POST["potassiumk"] : '';
$pchloridecl = isset($_POST["chloridecl"]) ? $_POST["chloridecl"] : '';
$pbicarbonate = isset($_POST["bicarbonate"]) ? $_POST["bicarbonate"] : '';
$pcsfglucose = isset($_POST["csfglucose"]) ? $_POST["csfglucose"] : '';
$pcsfprotein = isset($_POST["csfprotein"]) ? $_POST["csfprotein"] : '';
$pcsfchloride = isset($_POST["csfchloride"]) ? $_POST["csfchloride"] : '';
$pserumglobulin = isset($_POST["serumglobulin"]) ? $_POST["serumglobulin"] : '';
$palbuminglobulinratio = isset($_POST["albuminglobulinratio"]) ? $_POST["albuminglobulinratio"] : '';
$phaemoglobin = isset($_POST["haemoglobin"]) ? $_POST["haemoglobin"] : '';
$pheamatocritpcv = isset($_POST["heamatocritpcv"]) ? $_POST["heamatocritpcv"] : '';
$pwbccount = isset($_POST["wbccount"]) ? $_POST["wbccount"] : '';
$ppolymneutrophils = isset($_POST["polymneutrophils"]) ? $_POST["polymneutrophils"] : '';
$plymphocytes = isset($_POST["lymphocytes"]) ? $_POST["lymphocytes"] : '';
$peosinophils = isset($_POST["eosinophils"]) ? $_POST["eosinophils"] : '';
$pmonocytes = isset($_POST["monocytes"]) ? $_POST["monocytes"] : '';
$pbasophils = isset($_POST["basophils"]) ? $_POST["basophils"] : '';
$pdirectcoombs = isset($_POST["directcoombs"]) ? $_POST["directcoombs"] : '';
$pindirectcoombs = isset($_POST["indirectcoombs"]) ? $_POST["indirectcoombs"] : '';
$pheafmantouxtest = isset($_POST["heafmantouxtest"]) ? $_POST["heafmantouxtest"] : '';
$phiv12screening = isset($_POST["hiv12screening"]) ? $_POST["hiv12screening"] : '';
$pvdrl = isset($_POST["vdrl"]) ? $_POST["vdrl"] : '';
$ppregnancytest = isset($_POST["pregnancytest"]) ? $_POST["pregnancytest"] : '';
$prheumatoidfactor = isset($_POST["rheumatoidfactor"]) ? $_POST["rheumatoidfactor"] : '';
$phepatitisbantigen = isset($_POST["hepatitisbantigen"]) ? $_POST["hepatitisbantigen"] : '';
$pasotitre = isset($_POST["asotitre"]) ? $_POST["asotitre"] : '';
$pmicrofilara = isset($_POST["microfilara"]) ? $_POST["microfilara"] : '';
$pskinsnip = isset($_POST["skinsnip"]) ? $_POST["skinsnip"] : '';
$pskinscrapping = isset($_POST["skinscrapping"]) ? $_POST["skinscrapping"] : '';
$pesr = isset($_POST["esr"]) ? $_POST["esr"] : '';
$prbccount = isset($_POST["rbccount"]) ? $_POST["rbccount"] : '';
$pmchc = isset($_POST["mchc"]) ? $_POST["mchc"] : '';
$pmcv = isset($_POST["mcv"]) ? $_POST["mcv"] : '';
$preticulocytescount = isset($_POST["reticulocytescount"]) ? $_POST["reticulocytescount"] : '';
$pplatetetcount = isset($_POST["platetetcount"]) ? $_POST["platetetcount"] : '';
$psicklingtest = isset($_POST["sicklingtest"]) ? $_POST["sicklingtest"] : '';
$phbgenotype = isset($_POST["hbgenotype"]) ? $_POST["hbgenotype"] : '';
$pbloodgroup = isset($_POST["bloodgroup"]) ? $_POST["bloodgroup"] : '';
$ppsa = isset($_POST["psa"]) ? $_POST["psa"] : '';
$plecells = isset($_POST["lecells"]) ? $_POST["lecells"] : '';
$pbleedingtime = isset($_POST["bleedingtime"]) ? $_POST["bleedingtime"] : '';
$pclottingtime = isset($_POST["clottingtime"]) ? $_POST["clottingtime"] : '';
$pprothrombintime = isset($_POST["prothrombintime"]) ? $_POST["prothrombintime"] : '';
$phpyloriqualitative = isset($_POST["hpyloriqualitative"]) ? $_POST["hpyloriqualitative"] : '';
$phpyloriquantative = isset($_POST["hpyloriquantative"]) ? $_POST["hpyloriquantative"] : '';
$pstoolap = isset($_POST["stoolap"]) ? $_POST["stoolap"] : '';
$pmucus = isset($_POST["mucus"]) ? $_POST["mucus"] : '';
$pblood = isset($_POST["blood"]) ? $_POST["blood"] : '';
$pova = isset($_POST["ova"]) ? $_POST["ova"] : '';
$pcysts = isset($_POST["cysts"]) ? $_POST["cysts"] : '';
$pprotozoa = isset($_POST["protozoa"]) ? $_POST["protozoa"] : '';
$pfecal = isset($_POST["fecal"]) ? $_POST["fecal"] : '';
$pstoolcultureyielded = isset($_POST["stoolcultureyielded"]) ? $_POST["stoolcultureyielded"] : '';
$pwetprep = isset($_POST["wetprep"]) ? $_POST["wetprep"] : '';
$ppuscells = isset($_POST["puscells"]) ? $_POST["puscells"] : '';
$pyeastcells = isset($_POST["yeastcells"]) ? $_POST["yeastcells"] : '';
$phvsepithcells = isset($_POST["hvsepithcells"]) ? $_POST["hvsepithcells"] : '';
$prbchpf = isset($_POST["rbchpf"]) ? $_POST["rbchpf"] : '';
$phvsbacteria = isset($_POST["hvsbacteria"]) ? $_POST["hvsbacteria"] : '';
$ptvaginatis = isset($_POST["tvaginatis"]) ? $_POST["tvaginatis"] : '';
$phvscultureyielded = isset($_POST["hvscultureyielded"]) ? $_POST["hvscultureyielded"] : '';
$pciproflaxin = isset($_POST["ciproflaxin"]) ? $_POST["ciproflaxin"] : '';
$ppefloxacom = isset($_POST["Pefloxacom"]) ? $_POST["Pefloxacom"] : '';
$pamoxycillin = isset($_POST["Amoxycillin"]) ? $_POST["Amoxycillin"] : '';
$pceftriazone = isset($_POST["Ceftriazone"]) ? $_POST["Ceftriazone"] : '';
$prochephin = isset($_POST["Rochephin"]) ? $_POST["Rochephin"] : '';
$pampicillin = isset($_POST["Ampicillin"]) ? $_POST["Ampicillin"] : '';
$pcloxacillin = isset($_POST["Cloxacillin"]) ? $_POST["Cloxacillin"] : '';
$pchloramphenicol = isset($_POST["Chloramphenicol"]) ? $_POST["Chloramphenicol"] : '';
$perythromicin = isset($_POST["Erythromicin"]) ? $_POST["Erythromicin"] : '';
$pgentamycin = isset($_POST["Gentamycin"]) ? $_POST["Gentamycin"] : '';
$pnitrofuration = isset($_POST["Nitrofuration"]) ? $_POST["Nitrofuration"] : '';
$pofloxacin = isset($_POST["Ofloxacin"]) ? $_POST["Ofloxacin"] : '';
$pstreptomycin = isset($_POST["Streptomycin"]) ? $_POST["Streptomycin"] : '';
$pzennat = isset($_POST["Zennat"]) ? $_POST["Zennat"] : '';
$pfloxacin = isset($_POST["Floxacin"]) ? $_POST["Floxacin"] : '';
$ptetracyclin = isset($_POST["Tetracyclin"]) ? $_POST["Tetracyclin"] : '';
$purinecolourmcs = isset($_POST["urinecolourmcs"]) ? $_POST["urinecolourmcs"] : '';
$purinalappearance = isset($_POST["urinalappearance"]) ? $_POST["urinalappearance"] : '';
$pmicroscopy = isset($_POST["microscopy"]) ? $_POST["microscopy"] : '';
$ppuscellshpt = isset($_POST["puscellshpt"]) ? $_POST["puscellshpt"] : '';
$pmcsepithcells = isset($_POST["mcsepithcells"]) ? $_POST["mcsepithcells"] : '';
$pcasts = isset($_POST["casts"]) ? $_POST["casts"] : '';
$pcrystals = isset($_POST["crystals"]) ? $_POST["crystals"] : '';
$prbc = isset($_POST["rbc"]) ? $_POST["rbc"] : '';
$pmcsbacteria = isset($_POST["mcsbacteria"]) ? $_POST["mcsbacteria"] : '';
$pyeastscell = isset($_POST["yeastscell"]) ? $_POST["yeastscell"] : '';
$ptrichomonasvaginalis = isset($_POST["trichomonasvaginalis"]) ? $_POST["trichomonasvaginalis"] : '';
$pmcscultureyielded = isset($_POST["mcscultureyielded"]) ? $_POST["mcscultureyielded"] : '';
$pthroatswab = isset($_POST["throatswab"]) ? $_POST["throatswab"] : '';
$pearswab = isset($_POST["earswab"]) ? $_POST["earswab"] : '';
$ppusswab = isset($_POST["pusswab"]) ? $_POST["pusswab"] : '';
$pwoundswab = isset($_POST["woundswab"]) ? $_POST["woundswab"] : '';
$pUrethralswab = isset($_POST["Urethralswab"]) ? $_POST["Urethralswab"] : '';
$purineappearance = isset($_POST["urineappearance"]) ? $_POST["urineappearance"] : '';
$purinecolour = isset($_POST["urinecolour"]) ? $_POST["urinecolour"] : '';
$pph = isset($_POST["ph"]) ? $_POST["ph"] : '';
$psg = isset($_POST["sg"]) ? $_POST["sg"] : '';
$purineprotein = isset($_POST["urineprotein"]) ? $_POST["urineprotein"] : '';
$purinesugar = isset($_POST["urinesugar"]) ? $_POST["urinesugar"] : '';
$purinekeytone = isset($_POST["urinekeytone"]) ? $_POST["urinekeytone"] : '';
$purineerythrocytes = isset($_POST["urineerythrocytes"]) ? $_POST["urineerythrocytes"] : '';
$purinebilirubin = isset($_POST["urinebilirubin"]) ? $_POST["urinebilirubin"] : '';
$purobilliaegen = isset($_POST["urobilliaegen"]) ? $_POST["urobilliaegen"] : '';
$pnitrite = isset($_POST["nitrite"]) ? $_POST["nitrite"] : '';
$pleucocytes = isset($_POST["leucocytes"]) ? $_POST["leucocytes"] : '';
$pglucoserandom = isset($_POST["glucoserandom"]) ? $_POST["glucoserandom"] : '';
$pmp = isset($_POST["mp"]) ? $_POST["mp"] : '';
$psto = isset($_POST["sto"]) ? $_POST["sto"] : '';
$psth = isset($_POST["sth"]) ? $_POST["sth"] : '';
$pspao = isset($_POST["spao"]) ? $_POST["spao"] : '';
$pspah = isset($_POST["spah"]) ? $_POST["spah"] : '';
$pspbo = isset($_POST["spbo"]) ? $_POST["spbo"] : '';
$pspbh = isset($_POST["spbh"]) ? $_POST["spbh"] : '';
$pspco = isset($_POST["spco"]) ? $_POST["spco"] : '';
$pspch = isset($_POST["spch"]) ? $_POST["spch"] : '';
$pcomment = isset($_POST["comment"]) ? $_POST["comment"] : '';


mysql_query("INSERT INTO `doclabwaiting`
(`patientid`,`labid`,`timer`,`docid`,`relative`)
VALUES
('$ppatientid','$_SESSION[staff_id]','".date("U")."','$pdoctorid','$pid')
");

$sql_insert = "INSERT into `labresults`
        (`patientid`,`clinicaldiagnosis`,`specimen`,`lab no`,`Haemoglobin`,`Heamatocrit pcv`,`Wbc count`,`Polym neutrophils`,`Lymphocytes`,`Eosinophils`,`Basophils`,`Monocytes`,`Direct coombs`,`Indirect coombs`,`Heaf/mantoux test`,`Hiv 1+2 screening`,`Vdrl/khan/tpha/rpr`,`Pregnancy test`,`Rheumatoid factor`,
		`Hepatitis b antigen`,`Aso titre`,`Microfilara`,`Skin snip`,`Skin scrapping`,`Esr`,`Rbc count`,`M.c.h.c`,`M.c.v`,`Reticulocytes count`,`Platetet count`,`Sickling test`,`Hb genotype`,`Blood group`,`Psa`,`L.e cells`,`Bleeding time`,`Clotting time`,`Prothrombin time`,`H.pylori qualitative`,
		`H.pylori quantative`,`Total bilirubin`,`Direct bilirubin`,`Sgot`,`Sgpt`,`Alk phosphatase`,`Total protein`,`Acid phos`,`Amylase`,`Calcium`,`Phosphorus`,`Sodium(na)`,`Potassium(k)`,`Chloride(cl)`,`Bicarbonate`,`Csf glucose`,`Csf protein`,`csf chloride`,
		`Serum globulin`,`ALbumin/globulin ratio`,`2hr pp`,`Oral g.t.t`,`Fasting level`,`30minutes`,`60minutes`,`90minutes`,`120minutes`,`Gluc top. test. (g.t.t)`,`Gyclosylated hb`,
		`Urea`,`Creatine`,`Uric acid`,`Cholesterol`,`Triglyceride`,`H.d.l liproteins l.d.l`,`Albumin`,`Ldh`,`Cpk`,`Stool appearance`,`Mucus`,`Blood`,`Ova`,`Cysts`,`Protozoa`,`Faecal occult blood`,`Stool Culture yielded`,`Wet prep`,`Pus cells`,`Yeast cells`,`Epith cells`,`Rbc/hpf`,`Hvs Bacteria`,`T.vaginatis`,
		`Hvs Culture yielded`,`Ciproflaxin(cpx)`,`Pefloxacom(pet)`,`Amoxycillin(amx)`,`Ceftriazone(cef)`,`Rochephin(cro)`,`Ampicillin`,`Cloxacillin`,`Chloramphenicol(chl)`,`Erythromicin(ery)`,`Gentamycin(gen)`,`Nitrofuration(nit)`,`Ofloxacin(ofl)`,`Streptomycin(str)`,`Zennat`,`Floxacin (Fx)`,`Tetracyclin`,`Urine colour`,
		`Appearance`,`Microscopy`,`Puscells/hpt`,`Mcs Epith cells`,`Casts`,`Crystals`,`Rbc`,`Mcs Bacteria`,`Yeasts cell`,`Trichomonas vaginalis`,`Mcs Culture yielded`,`Throat swab`,`Ear swab`,`Pus swab`,`Wound swab`,`Urethral swab`,`urineappearance`,`urinecolour`,`ph`,`sg`,`urineprotein`,`urinesugar`,`urinekeytone`,`urineerythrocytes`,`urinebilirubin`,`urobilliaegen`,`nitrite`,`leucocytes`,`date`,`labguyid`,`requestid`,`doctorid`,`glucoserandom`,`mp`,`sto`,`sth`,`spao`,`spah`,`spbo`,`spbh`,`spco`,`spch`,`comment`)
        VALUES
        ('$ppatientid','$pdiagnosis','$pspecimen','$plabno','$phaemoglobin','$pheamatocritpcv','$pwbccount','$ppolymneutrophils','$plymphocytes','$peosinophils','$pbasophils','$pmonocytes','$pdirectcoombs','$pindirectcoombs','$pheafmantouxtest','$phiv12screening','$pvdrl','$ppregnancytest','$prheumatoidfactor',
		'$phepatitisbantigen','$pasotitre','$pmicrofilara','$pskinsnip','$pskinscrapping','$pesr','$prbccount','$pmchc','$pmcv','$preticulocytescount','$pplatetetcount','$psicklingtest','$phbgenotype','$pbloodgroup','$ppsa','$plecells','$pbleedingtime','$pclottingtime','$pprothrombintime','$phpyloriqualitative',
		'$phpyloriquantative','$ptotalbilirubin','$pdirectbilirubin','$psgot','$psgpt','$palkphosphatase','$ptotalprotein','$pacidphos','$pamylase','$pcalcium','$pphosphorus','$psodiumna','$ppotassiumk','$pchloridecl','$pbicarbonate','$pcsfglucose','$pcsfprotein','$pcsfchloride','$pserumglobulin',
		'$palbuminglobulinratio','$phrpp','$poralgtt','$pfastinglevel','$pthirtyminutes','$psixtyminutes','$pninetyminutes','$ponetwentyminutes','$pgluctoptest','$pglycosylatedhb',
		'$purea','$pcreatine','$puricacid','$pcholesterol','$ptriglyceride','$phdlliproteins','$palbumin','$pldh','$pcpk','$pstoolap','$pmucus','$pblood','$pova','$pcysts','$pprotozoa','$pfecal','$pstoolcultureyielded','$pwetprep','$ppuscells','$pyeastcells','$phvsepithcells','$prbchpf','$phvsbacteria','$ptvaginatis','$phvscultureyielded',
		'$pciproflaxin','$ppefloxacom','$pamoxycillin','$pceftriazone','$prochephin','$pampicillin','$pcloxacillin','$pchloramphenicol','$perythromicin','$pgentamycin','$pnitrofuration','$pofloxacin','$pstreptomycin','$pzennat','$pfloxacin','$ptetracyclin','$purinecolourmcs',
		'$purinalappearance','$pmicroscopy','$ppuscellshpt','$pmcsepithcells','$pcasts','$pcrystals','$prbc','$pmcsbacteria','$pyeastscell','$ptrichomonasvaginalis','$pmcscultureyielded','$pthroatswab','$pearswab','$ppusswab','$pwoundswab','$pUrethralswab','$purineappearance','$purinecolour','$pph','$psg','$purineprotein','$purinesugar','$purinekeytone','$purineerythrocytes','$purinebilirubin','$purobilliaegen','$pnitrite','$pleucocytes','".date("U")."','$_SESSION[staff_id]','$pid','$pdoctorid','$pglucoserandom','$pmp','$psto','$psth','$pspao','$pspah','$pspbo','$pspbh','$pspco','$pspch','$pcomment')
      ";

mysql_query($sql_insert) or die("Insertion Failed:" . mysql_error()); 






mysql_query("INSERT INTO `activity`
(`staffid`,`activity`,`date`,`patient`)
VALUES
('$_SESSION[staff_id]','Submitted a lab test result to $pdoctorname','".date("U")."','$ppatientid')
");

$suc = urlencode("You have sent results for $patientsurname $patientother to doctor $doctorname.");
header("Location: labwaiting.php?msg=$suc&type=green");

  
   }

?>
<!DOCTYPE html>
<html class="sidebar_default no-js" lang="en">
<head>
<meta charset="utf-8">
<title>Perform and send test results</title>
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
      <form action='labform.php?id=<?php echo "$_GET[id]"; ?>' method="POST">
      <div class="row-fluid">
        <div class="span6">
          <div class="box paint color_3">
            <div class="title">
              <div class="row-fluid">
                <h4> PERFORM LAB TEST </h4>
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
                           <input  type="text" id="diagnosis" name="diagnosis" value ="<?php echo "$diagnosis"; ?>" class="row-fluid">
                           <input  type="hidden" id="pid" name="pid" value ="<?php echo "$id"; ?>" class="row-fluid">
                           <input  type="hidden" id="pdoctorid" name="pdoctorid" value ="<?php echo "$doctorid"; ?>" class="row-fluid">
                           <input  type="hidden" id="ppatientid" name="ppatientid" value ="<?php echo "$patientid"; ?>" class="row-fluid">
                           <input  type="hidden" id="pdoctorname" name="pdoctorname" value ="<?php echo "$doctorname"; ?>" class="row-fluid">
                           
                          </div>
                          </div>



                          

                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Specimen</label>
                          <div class="controls span9">
                           <input  type="text" id="specimen" name="specimen" value ="<?php echo "$specimen"; ?>" class="row-fluid">
                           
                          </div>
                          </div>

                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Lab No</label>
                          <div class="controls span9">
                           <input  type="text" id="labno" name="labno" value ="<?php echo "$labno"; ?>" class="row-fluid">
                           
                          </div>
                          </div>

                          <div class="control-group row-fluid">
                 <div class="span3 visible-desktop"></div>
                  <div class="controls span5">
                    <button type="submit" name = "confirm" id = "confirm" class="btn btn-primary">Confirm and send to doctor <?php echo "$doctorname"; ?></button>
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
		  
		  <?php if($glucoserandom > 0 or $mp > 0 or $widal > 0){ ?>
		  <div class="box paint color_3">
            <div class="title">
              <h4> <i class="icon-check"></i> <span>GENERAL TESTS</span> </h4>
            </div>
            <div class="content cursor ">
              <form class="form-horizontal" action="#">
        
                <div class="form-row control-group row-fluid ">
		
					  <?php if($glucoserandom > 0){ ?>
                    <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Glucose random</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="glucoserandom" name="glucoserandom" class="row-fluid"> 65 - 115mg/dl
                           
                          </div>
                          </div>
						  <?php } ?>
						  
						   <?php if($mp > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Mp</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="mp" name="mp" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  
						   <?php if($widal > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">S.TYPHI</label>
                          <div class="controls span9">
                           O. <input value = "" type="text" id="sto" name="sto" class="row-fluid">
                           H. <input value = "" type="text" id="sth" name="sth" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">S.PARATYPHI A</label>
                          <div class="controls span9">
                           O. <input value = "" type="text" id="spao" name="spao" class="row-fluid">
                           H. <input value = "" type="text" id="spah" name="spah" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">S.PARATYPHI B</label>
                          <div class="controls span9">
                           O. <input value = "" type="text" id="spbo" name="spbo" class="row-fluid">
                           H. <input value = "" type="text" id="spbh" name="spbh" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">S.PARATYPHI C</label>
                          <div class="controls span9">
                           O. <input value = "" type="text" id="spco" name="spco" class="row-fluid">
                           H. <input value = "" type="text" id="spch" name="spch" class="row-fluid">
                           
                          </div>
                          </div>
						  
						   <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Comment</label>
                          <div class="controls span9">
                          <input value = "" type="text" id="comment" name="comment" class="row-fluid">
                          
                           
                          </div>
                          </div>
						  <?php } ?>
                </div>
                
                
                
              </form>
            </div>
          </div>
		  <?php } ?>
		  
		          <div class="box paint color_7">
            <div class="title">
              <div class="row-fluid">
                <h4> BIOCHEMISTRY </h4>
              </div>
            </div>
            <!-- End .title -->
            <div class="content">
              <ul id="tabExample1" class="nav nav-tabs">
               <?php if($totalbilirubin > 0 or $directbilirubin > 0 or $sgot > 0 or $sgpt > 0 or $alkphosphatase > 0 or $totalprotein > 0 or $acidphos > 0
		  or $amylase > 0 or $calcium > 0 or $phosphorus > 0){ ?>
                <li class="active"><a href="#liver" data-toggle="tab">Liver function</a></li>
				<?php } ?>
				<?php if($sodiumna > 0 or $potassiumk > 0 or $chloridecl > 0 or $bicarbonate > 0 or $csfglucose > 0 or $csfprotein > 0 or $serumglobulin > 0
		  or $albuminglobulinratio > 0){ ?>
                <li><a href="#electrolytes" data-toggle="tab">Electrolytes</a></li>
				<?php } ?>
				<?php if($hrpp > 0 or $oralgtt > 0 or $fastinglevel > 0 or $thirtyminutes > 0 or $sixtyminutes > 0 or $ninetyminutes > 0 or $onetwentyminutes > 0
		  or $gluctoptest > 0 or $glycosylatedhb > 0 or $urea > 0 or $creatine > 0 or $uricacid > 0 or $cholesterol > 0 or $triglyceride > 0 or $hdlliproteins > 0 or $albumin > 0 or $ldh > 0 or $cpk > 0){ ?>
                <li><a href="#glucose" data-toggle="tab">Others</a></li>
				<?php } ?>
              
              </ul>
              <div class="tab-content">
			  <?php if($totalbilirubin > 0 or $directbilirubin > 0 or $sgot > 0 or $sgpt > 0 or $alkphosphatase > 0 or $totalprotein > 0 or $acidphos > 0
		  or $amylase > 0 or $calcium > 0 or $phosphorus > 0){ ?>
                <div class="tab-pane fade in active" id="liver">
           <p>
          <h2>Liver function tests - Biochemistry</h2><Br />
                    <fieldset>

<div class="control-group row-fluid">
                 <?php if ($totalbilirubin > 0){ ?>
				  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Total bilirubin</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="totalbilirubin" name="totalbilirubin" class="row-fluid"> 0.1 - 1.0mg/dl
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($directbilirubin > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Direct bilirubin</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="directbilirubin" name="directbilirubin" class="row-fluid"> 0.1 - 1.0mg/dl
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($sgot > 0){ ?>
						   <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Sgot</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="sgot" name="sgot" class="row-fluid"> <12u/l
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($sgpt > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Sgpt</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="sgpt" name="sgpt" class="row-fluid"> <12u/l
                           
                          </div>
                          </div>
						  <?php } ?>
						    <?php if ($alkphosphatase > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Alkphosphatase</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="alkphosphatase" name="alkphosphatase" class="row-fluid"> <300u/l
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($totalprotein > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Totalprotein</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="totalprotein" name="totalprotein" class="row-fluid"> 6.3 - 8.0g/dl
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($acidphos > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Acid phos</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="acidphos" name="acidphos" class="row-fluid"> 1.1 - 4.0u/l
                           
                          </div>
                          </div>
						  <?php } ?>
						    <?php if ($amylase > 0){ ?>
						   <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Amylase</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="amylase" name="amylase" class="row-fluid"> 70 - 240u/l
                           
                          </div>
                          </div>
						  <?php } ?>
						    <?php if ($calcium > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Calcium</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="calcium" name="calcium" class="row-fluid"> 8.5 - 11u/l
                           
                          </div>
                          </div>
						  <?php } ?>
						    <?php if ($phosphorus > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Phosphorus</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="phosphorus" name="phosphorus" class="row-fluid"> 2.4 - 4.5mg/dl
                           
                          </div>
                          </div>
						  <?php } ?>
						  
						  
						 
						  
						  
						  
						  
                  
</fieldset>
                        
                  </p>
                </div>
        <?php } ?>
<?php if($hrpp > 0 or $oralgtt > 0 or $fastinglevel > 0 or $thirtyminutes > 0 or $sixtyminutes > 0 or $ninetyminutes > 0 or $onetwentyminutes > 0
		  or $gluctoptest > 0 or $glycosylatedhb > 0 or $urea > 0 or $creatine > 0 or $uricacid > 0 or $cholesterol > 0 or $triglyceride > 0 or $hdlliproteins > 0 or $albumin > 0 or $ldh > 0 or $cpk > 0){ ?>
                <div class="tab-pane fade in active" id="glucose">
                      <p>
				  <h2>Others</h2><Br />
                    <fieldset>

<div class="form-row control-group row-fluid ">
                  <?php if ($hrpp > 0){ ?>
				 <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">2hr pp</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="2hrpp" name="2hrpp" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($oralgtt > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Oral g.t.t</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="oralgtt" name="oralgtt" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($fastinglevel > 0){ ?>
						    <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Fasting level</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="fastinglevel" name="fastinglevel" class="row-fluid"> 45 - 100mg/dl
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($thirtyminutes > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">30minutes</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="30minutes" name="30minutes" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($sixtyminutes > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">60minutes</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="60minutes" name="60minutes" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($ninetyminutes > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">90minutes</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="90minutes" name="90minutes" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($onetwentyminutes > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">120minutes</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="120minutes" name="120minutes" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($gluctoptest > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Gluc top. test. (g.t.t)</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="gluctoptest" name="gluctoptest" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($glycosylatedhb > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Gyclosylated hb</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="glycosylatedhb" name="glycosylatedhb" class="row-fluid"> 5.6 - 9.2%
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($urea > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Urea</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="urea" name="urea" class="row-fluid"> 15 - 45mg/dl
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($creatine > 0){ ?>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Creatine</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="creatine" name="creatine" class="row-fluid"> 0.7 - 1.4mg/dl
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($uricacid > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Uric acid</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="uricacid" name="uricacid" class="row-fluid"> 2.5 - 7.0mg/dl
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($cholesterol > 0){ ?>
						   <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Cholesterol</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="cholesterol" name="cholesterol" class="row-fluid"> 150 - 250mg/dl
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($triglyceride > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Trigclyceride</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="triglyceride" name="triglyceride" class="row-fluid"> 74 - 172mg/dl
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($hdlliproteins > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">H.d.l liproteins l.d.l</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="hdlliproteins" name="hdlliproteins" class="row-fluid"> 29 - 61mg/dl
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($albumin > 0){ ?>
						   <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Albumin</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="albumin" name="albumin" class="row-fluid"> 3.5 - 5.3g/dl
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($ldh > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Ldh</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="ldh" name="ldh" class="row-fluid"> 70 - 240u/l
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($cpk > 0){ ?>
						   <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Cpk</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="cpk" name="cpk" class="row-fluid"> 24 - 195u/l
                           
                          </div>
                          </div>
						  <?php } ?>
						  
						  
                
                </div>
</fieldset>
                        
                  </p>
                </div>
				<?php } ?>
				
				
								<?php if($sodiumna > 0 or $potassiumk > 0 or $chloridecl > 0 or $bicarbonate > 0 or $csfglucose > 0 or $csfprotein > 0 or $serumglobulin > 0
		  or $albuminglobulinratio > 0){ ?>
				<div class="tab-pane fade in active" id="electrolytes">
                  <p>
				  <h2>Electrolytes</h2><Br />
                    <fieldset>

<div class="form-row control-group row-fluid ">
                 <?php if ($sodiumna > 0){ ?>
				  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Sodium(na)</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="sodiumna" name="sodiumna" class="row-fluid"> 133 - 46mm 10/l
                           
                          </div>
                          </div>
						  <?php } ?>
						  
						    <?php if ($potassiumk > 0){ ?>
						  	  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Potassium(k)</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="potassiumk" name="potassiumk" class="row-fluid"> 3.8 - 5.4mm 10/
                           
                          </div>
                          </div>
						   <?php } ?>
						  
						  <?php if ($chloridecl > 0){ ?>
						   <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Chloride(cl))</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="chloridecl" name="chloridecl" class="row-fluid"> 96 - 106mm 10/l
                           
                          </div>
                          </div>
						  <?php } ?>
						  
						  <?php if ($bicarbonate > 0){ ?>
						     <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Bicarbonate</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="bicarbonate" name="bicarbonate" class="row-fluid"> 24 - 33mm 10/l
                           
                          </div>
                          </div>
						  <?php } ?>
						  
						  <?php if ($csfglucose > 0){ ?>
						       <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Csf glucose</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="csfglucose" name="csfglucose" class="row-fluid"> 45 - 72mg/dl
                           
                          </div>
                          </div>
						  <?php } ?>
						  
						  <?php if ($csfprotein > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Csf protein</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="csfprotein" name="csfprotein" class="row-fluid"> 10 - 40mmg/dl
                           
                          </div>
                          </div>
						  <?php } ?>
						  
						  <?php if ($csfchloride > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Csf chloride</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="csfchloride" name="csfchloride" class="row-fluid"> 96 - 106mmg/dl
                           
                          </div>
                          </div>
						  <?php } ?>
						  
						  <?php if ($serumglobulin > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Serum globulin</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="serumglobulin" name="serumglobulin" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  
						  <?php if ($albuminglobulinratio > 0){ ?>
						   <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">ALbumin/globulin ratio</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="albuminglobulinratio" name="albuminglobulinratio" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  
						  
                  
                </div>
</fieldset>
                        
                  </p>
                </div>
                <?php } ?>
              </div>
            </div>
			
			
            <!-- End .content --> 
          </div>
          <!-- End  .box --> 
		   <?php if ($urinalysis > 0){ ?>
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
                          <label class="control-label span2"  for="username">Appearance</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="urineappearance" name="urineappearance" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  
 <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Colour</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="urinecolour" name="urinecolour" class="row-fluid">
                           
                          </div>
                          </div>
						  
						   <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Ph</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="ph" name="ph" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Sg</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="sg" name="sg" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Protein</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="urineprotein" name="urineprotein" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Sugar</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="urinesugar" name="urinesugar" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Keytone</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="urinekeytone" name="urinekeytone" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Erythrocytes</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="urineerythrocytes" name="urineerythrocytes" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Bilirubin</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="urinebilirubin" name="urinebilirubin" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Urobilliaegen</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="urobilliaegen" name="urobilliaegen" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Nitrite</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="nitrite" name="nitrite" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Leucocytes</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="leucocytes" name="leucocytes" class="row-fluid">
                           
                          </div>
                          </div>
						  
						  
						  
						  
                       



                          


                          </fieldset>
                  </p>
               
            </div>
            <!-- End .content --> 
          </div>
          <!-- End  .box -->
		  <?php } ?>
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
                <?php if($haemoglobin > 0 or $heamatocritpcv > 0 or $wbccount > 0 or $polymneutrophils > 0 or $lymphocytes > 0 or $eosinophils > 0 or $monocytes > 0
		  or $basophils > 0){ ?>
				<li class="active"><a href="#fbc" data-toggle="tab">Full blood count</a></li>
               <?php } ?>
			   
			   <?php if($directcoombs > 0 or $indirectcoombs > 0 or $heafmantouxtest > 0 or $hiv12screening > 0 or $vdrl > 0 or $pregnancytest > 0 or $rheumatoidfactor > 0
		  or $hepatitisbantigen > 0 or $asotitre > 0 or $microfilara > 0 or $skinsnip > 0 or $skinscrapping > 0){ ?>
               <li><a href="#sero" data-toggle="tab">Serology</a></li>
              <?php } ?>
			  
			  	<?php if($esr > 0 or $rbccount > 0 or $mchc > 0 or $mcv > 0 or $reticulocytescount > 0 or $platetetcount > 0 or $sicklingtest > 0
		  or $hbgenotype > 0 or $bloodgroup > 0 or $psa > 0 or $lecells > 0 or $bleedingtime > 0 or $clottingtime > 0 or $prothrombintime > 0 or $hpyloriqualitative > 0 or $hpyloriquantative > 0){ ?>
               <li><a href="#individual" data-toggle="tab">Others</a></li>
			   <?php } ?>
              </ul>
			  
              <div class="tab-content">
			  <?php if($haemoglobin > 0 or $heamatocritpcv > 0 or $wbccount > 0 or $polymneutrophils > 0 or $lymphocytes > 0 or $eosinophils > 0 or $monocytes > 0
		  or $basophils > 0){ ?>
                <div class="tab-pane fade in active" id="fbc">
                  <p>
				
                    <fieldset>

<div class="form-row control-group row-fluid ">
                 <?php if ($haemoglobin > 0){ ?>
				 <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Haemoglobin</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="haemoglobin" name="haemoglobin" class="row-fluid"> 11. - 16.5 f
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($heamatocritpcv > 0){ ?>
						  	 <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Heamatocrit pcv</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="heamatocritpcv" name="heamatocritpcv" class="row-fluid"> 36 - 54%
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($wbccount > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Wbc count</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="wbccount" name="wbccount" class="row-fluid"> 4000 - 11000/MM3
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($polymneutrophils > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Polym neutrophils</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="polymneutrophils" name="polymneutrophils" class="row-fluid"> 40 - 70%
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($lymphocytes > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Lymphocytes</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="lymphocytes" name="lymphocytes" class="row-fluid"> 20 - 50%
						   
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($eosinophils > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Eosinophils</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="eosinophils" name="eosinophils" class="row-fluid"> 1 - 6%
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($monocytes > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Monocytes</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="monocytes" name="monocytes" class="row-fluid"> 2-10%
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($basophils > 0){ ?>
						   <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Basophils</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="basophils" name="basophils" class="row-fluid"> 0-1%
                           
                          </div>
                          </div>
						  <?php } ?>
						  
				
                </div>
</fieldset>
                        
                  </p>
                </div>
				<?php } ?>
				<?php if($directcoombs > 0 or $indirectcoombs > 0 or $heafmantouxtest > 0 or $hiv12screening > 0 or $vdrl > 0 or $pregnancytest > 0 or $rheumatoidfactor > 0
		  or $hepatitisbantigen > 0 or $asotitre > 0 or $microfilara > 0 or $skinsnip > 0 or $skinscrapping > 0){ ?>
                               <div class="tab-pane fade in active" id="sero">
                  <p>
				  <h2>Serology</h2><Br />
                    <fieldset>

<div class="form-row control-group row-fluid ">
                  <?php if ($directcoombs > 0){ ?>
				  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Direct coombs</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="directcoombs" name="directcoombs" class="row-fluid">
                           
                          </div>
                          </div>
						  		  <?php } ?>
								    <?php if ($indirectcoombs > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Indirect coombs</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="indirectcoombs" name="indirectcoombs" class="row-fluid">
                           
                          </div>
                          </div>
				<?php } ?>
						   <?php if ($heafmantouxtest > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Heaf/mantoux test</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="heafmantouxtest" name="heafmantouxtest" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($hiv12screening > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Hiv 1+2 screening</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="hiv12screening" name="hiv12screening" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($vdrl > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Vdrl/khan/tpha/rpr</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="vdrl" name="vdrl" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($pregnancytest > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Pregnancy test</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="pregnancytest" name="pregnancytest" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($rheumatoidfactor > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Rheumatoid factor</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="rheumatoidfactor" name="rheumatoidfactor" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($hepatitisbantigen > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Hepatitis b antigen</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="hepatitisbantigen" name="hepatitisbantigen" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($asotitre > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Aso titre</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="asotitre" name="asotitre" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($microfilara > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Microfilara</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="microfilara" name="microfilara" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($skinsnip > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Skin snip</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="skinsnip" name="skinsnip" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($skinscrapping > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Skin scrapping</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="skinscrapping" name="skinscrapping" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  
                  
                </div>
</fieldset>
                        
                  </p>
                </div>
				<?php } ?>
				<?php if($esr > 0 or $rbccount > 0 or $mchc > 0 or $mcv > 0 or $reticulocytescount > 0 or $platetetcount > 0 or $sicklingtest > 0
		  or $hbgenotype > 0 or $bloodgroup > 0 or $psa > 0 or $lecells > 0 or $bleedingtime > 0 or $clottingtime > 0 or $prothrombintime > 0 or $hpyloriqualitative > 0 or $hpyloriquantative > 0){ ?>
				 <div class="tab-pane fade in active" id="individual">
                  <p>
          <h2>Others</h2><Br />
                    <fieldset>

<div class="form-row control-group row-fluid ">
 <?php if ($esr > 0){ ?>
<div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Esr</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="esr" name="esr" class="row-fluid"> 0 - 9mm/hr
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($rbccount > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Rbc count</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="rbccount" name="rbccount" class="row-fluid"> 4 - 6mm/mL
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($mchc > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">M.c.h.c</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="mchc" name="mchc" class="row-fluid"> 32 - 96%
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($mcv > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">M.c.v</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="mchc" name="mchc" class="row-fluid"> 78 - 96%
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($reticulocytescount > 0){ ?>
						   <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Reticulocytes count</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="reticulocytescount" name="reticulocytescount" class="row-fluid">  1.2 - 6%(infant)<br />0 - 29%(adult)
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($platetetcount > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Platetet count</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="platetetcount" name="platetetcount" class="row-fluid"> 150,000 - 400,000 mm3
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($sicklingtest > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Sickling test</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="sicklingtest" name="sicklingtest" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($hbgenotype > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Hb genotype</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="hbgenotype" name="hbgenotype" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($bloodgroup > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Blood group</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="bloodgroup" name="bloodgroup" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($psa > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Psa</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="psa" name="psa" class="row-fluid"> 0 - 4ng/dl
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($lecells > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">L.e cells</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="lecells" name="lecells" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($bleedingtime > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Bleeding time</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="bleedingtime" name="bleedingtime" class="row-fluid"> UP TO 6mins 
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($clottingtime > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Clotting time</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="clottingtime" name="clottingtime" class="row-fluid"> 4 - 10mins
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($prothrombintime > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Prothrombin time</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="prothrombintime" name="prothrombintime" class="row-fluid"> 11 - 16sec
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($hpyloriqualitative > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">H.pylori qualitative</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="hpyloriqualitative" name="hpyloriqualitative" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($hpyloriquantative > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">H.pylori quantative</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="hpyloriquantative" name="hpyloriquantative" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  

</div>
</fieldset>
</p>
</div>
<?php } ?>				
				
				
                
				
                
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
			  	<?php if($stoolap > 0 or $mucus > 0 or $blood > 0 or $ova > 0 or $cysts > 0 or $protozoa > 0 or $fecal > 0
		  or $stoolcultureyielded > 0){ ?>
                <li class="active"><a href="#stool" data-toggle="tab">Stool analysis</a></li>
				<?php } ?>
				<?php if($wetprep > 0 or $puscells > 0 or $yeastcells > 0 or $hvsepithcells > 0 or $rbchpf > 0 or $hvsbacteria > 0 or $tvaginatis > 0
		  or $hvscultureyielded > 0){ ?>
                <li><a href="#hvs" data-toggle="tab">Hvs/mcs</a></li>
				<?php } ?>
				<?php if ($sensitivity > 0){ ?>
                <li><a href="#sensitivity" data-toggle="tab">Sensitivity profile</a></li>
				<?php } ?>
				<?php if($wetprep > 0 or $puscells > 0 or $yeastcells > 0 or $hvsepithcells > 0 or $rbchpf > 0 or $hvsbacteria > 0 or $tvaginatis > 0
		  or $hvscultureyielded > 0){ ?>
                <li><a href="#mcs" data-toggle="tab">Mcs</a></li>
			<?php } ?>
			  <?php if($urinecolourmcs > 0 or $urinalappearance > 0 or $microscopy > 0 or $puscellshpt > 0 or $mcsepithcells > 0 or $casts > 0 or $crystals > 0
		  or $rbc > 0 or $mcsbacteria > 0 or $yeastscell > 0 or $trichomonasvaginalis > 0 or $mcscultureyielded > 0){ ?>
                <li><a href="#swabs" data-toggle="tab">Swabs</a></li>
               <?php } ?>
              
              </ul>
              <div class="tab-content">
			  <?php if($stoolap > 0 or $mucus > 0 or $blood > 0 or $ova > 0 or $cysts > 0 or $protozoa > 0 or $fecal > 0
		  or $stoolcultureyielded > 0){ ?>
                <div class="tab-pane fade in active" id="stool">
                     <p>
<h2>Microbiology report</h2><Br />
<fieldset>
<?php if ($stoolap > 0){ ?>
                        <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Stool appearance</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="stoolap" name="stoolap" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
<?php } ?>

<?php if ($mucus > 0){ ?>
                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Mucus</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="mucus" name="mucus" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
<?php } ?>
<?php if ($blood > 0){ ?>
                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Blood</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="blood" name="blood" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
<?php } ?>
<?php if ($ova > 0){ ?>
                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Ova</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="ova" name="ova" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($cysts > 0){ ?>
						   <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Cysts</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="cysts" name="cysts" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						
						  
						  <?php if ($protozoa > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Protozoa</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="protozoa" name="protozoa" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  
						  <?php if ($fecal > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Faecal occult blood</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="fecal" name="fecal" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($stoolcultureyielded > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Culture yielded</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="stoolcultureyielded" name="stoolcultureyielded" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
<?php } ?>

                          </fieldset>
                  </p>
                </div>
				<?php } ?>
				
				
				<?php if($wetprep > 0 or $puscells > 0 or $yeastcells > 0 or $hvsepithcells > 0 or $rbchpf > 0 or $hvsbacteria > 0 or $tvaginatis > 0
		  or $hvscultureyielded > 0){ ?>
								<div class="tab-pane fade in active" id="hvs">
                      <p>
<h2>HVS/MCS</h2><Br />
<fieldset>
 <?php if ($wetprep > 0){ ?>
                        <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Wet prep</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="wetprep" name="wetprep" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
<?php } ?>

 <?php if ($puscells > 0){ ?>
                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Pus cells</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="puscells" name="puscells" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
<?php } ?>
 <?php if ($yeastcells > 0){ ?>
                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Yeast cells</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="yeastcells" name="yeastcells" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
<?php } ?> 
<?php if ($hvsepithcells > 0){ ?>
                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Epith cells</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="hvsepithcells" name="hvsepithcells" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($rbchpf > 0){ ?>
						   <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Rbc/hpf</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="rbchpf" name="rbchpf" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($hvsbacteria > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Bacteria</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="hvsbacteria" name="hvsbacteria" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  
						  <?php if ($tvaginatis > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">T.vaginatis</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="tvaginatis" name="tvaginatis" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  
						  <?php if ($hvscultureyielded > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Culture yielded</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="hvscultureyielded" name="hvscultureyielded" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
<?php } ?>

                          </fieldset>
                  </p>
                </div>
				<?php } ?>
                
							<?php if ($sensitivity > 0){ ?>
				<div class="tab-pane fade in active" id="sensitivity">
                          <p>
						  <h2>Sensitivity profile</h2>
					<fieldset>
		
					 <div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Ciproflaxin(cpx) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="text"  value="" name="ciproflaxin" id="ciproflaxin">
                      </label>
                   
				  </div>
                </div>

				 <div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Pefloxacom(pet) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="text" value="" name="Pefloxacom" id="Pefloxacom">
                      </label>
                    
				  </div>
                </div>

				<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Amoxycillin(amx) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="text" value="" name="Amoxycillin" id="Amoxycillin">
                      </label>
                    
				  </div>
                </div>

				<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Ceftriazone(cef) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="text" value="" name="Ceftriazone" id="Ceftriazone">
                      </label>
                  
				  </div>
                </div>

				<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Rochephin(cro) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="text" value="" name="Rochephin" id="Rochephin">
                       </label>
                   
				  </div>
                </div>

				<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Ampicillin </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="text" value="" name="Ampicillin" id="Ampicillin">
                      </label>
                   
				  </div>
                </div>
		
				<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Cloxacillin </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="text" value="" name="Cloxacillin" id="Cloxacillin">
                      </label>
                    
				  </div>
                </div>
		
				<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Chloramphenicol(chl) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="text" value="" name="Chloramphenicol" id="Chloramphenicol">
                       </label>
                  
				  </div>
                </div>
	
				<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Erythromicin(ery) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="text" value="" name="Erythromicin" id="Erythromicin">
                      </label>
                    
				  </div>
                </div>
	
					<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Gentamycin(gen) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="text" value="" name="Gentamycin" id="Gentamycin">
                      </label>
                   
				  </div>
                </div>

					<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Nitrofuration(nit) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="text" value="" name="Nitrofuration" name="Nitrofuration">
                       </label>
                   
				  </div>
                </div>

					<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Ofloxacin(ofl) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="text" value="" name="Ofloxacin" id="Ofloxacin">
                      </label>
                    
				  </div>
                </div>
				
				<div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Streptomycin(str) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="text" value="" name="Streptomycin" id="Streptomycin">
                      </label>
                   
				  </div>
                </div>
	
                  <div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Zennat </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="text" value="" name="Zennat" id="Zennat">
                      </label>
                   
          </div>
                </div>

                  <div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Floxacin (Fx) </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="text" value="" name="Floxacin" id="Floxacin">
                      </label>
                   
          </div>
                </div>

                  <div class="form-row control-group row-fluid ">
                  <label class="control-label span3">Tetracyclin </label>
                  <div class="controls span9">
                    <label class="checkbox inline">
                      <input type="text" value="" name="Tetracyclin" id="Tetracyclin">
                      </label>
                   
          </div>
                </div>
				
				
				
				
				
				
				
				
				
					
					</fieldset>
					</p>
                </div>
				<?php } ?>
				<?php if($urinecolourmcs > 0 or $urinalappearance > 0 or $microscopy > 0 or $puscellshpt > 0 or $mcsepithcells > 0 or $casts > 0 or $crystals > 0
		  or $rbc > 0 or $mcsbacteria > 0 or $yeastscell > 0 or $trichomonasvaginalis > 0 or $mcscultureyielded > 0){ ?>
							<div class="tab-pane fade in active" id="mcs">
                      <p>
<h2>MCS</h2><Br />
<fieldset>
<?php if ($urinecolourmcs > 0){ ?>
<div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Urine colour</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="urinecolourmcs" name="urincecolourmcs" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($urinalappearance > 0){ ?>
<div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Appearance</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="urinalappearance" name="urinalappearance" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  				  <?php if ($microscopy > 0){ ?>
                         <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Microscopy</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="microscopy" name="microscopy" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($puscellshpt > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Puscells/hpt</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="puscellshpt" name="puscellshpt" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($mcsepithcells > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Epith cells</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="mcsepithcells" name="mcsepithcells" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($casts > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Casts</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="casts" name="casts" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($crystals > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Crystals</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="crystals" name="crystals" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($rbc > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Rbc</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="rbc" name="rbc" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($mcsbacteria > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Bacteria</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="mcsbacteria" name="mcsbacteria" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						   <?php if ($yeastscell > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Yeasts cell</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="yeastscell" name="yeastscell" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($trichomonasvaginalis > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Trichomonas vaginalis</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="trichomonasvaginalis" name="trichomonasvaginalis" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
						  <?php if ($mcscultureyielded > 0){ ?>
						  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Culture yielded</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="mcscultureyielded" name="mcscultureyielded" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
<?php } ?>

                          </fieldset>
                  </p>
                </div>
				<?php } ?>
				
				<?php if($throatswab > 0 or $earswab > 0 or $pusswab > 0 or $woundswab > 0 or $Urethralswab > 0){ ?>
				<div class="tab-pane fade in active" id="swabs">
<?php if ($throatswab > 0){ ?>
          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Throat swab</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="throatswab" name="throatswab" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
<?php } ?>
<?php if ($earswab > 0){ ?>
                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Ear swab</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="earswab" name="earswab" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
						  <?php } ?>
<?php if ($pusswab > 0){ ?>
                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Pus swab</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="pusswab" name="pusswab" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
<?php } ?>
<?php if ($woundswab > 0){ ?>
                          <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Wound swab</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="woundswab" name="woundswab" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
<?php } ?>
<?php if ($Urethralswab > 0){ ?>
					  <div class="control-group row-fluid"> 
                          <!-- Username -->
                          <label class="control-label span2"  for="username">Urethral swab</label>
                          <div class="controls span9">
                           <input value = "" type="text" id="Urethralswab" name="Urethralswab" placeholder="" class="row-fluid">
                           
                          </div>
                          </div>
					<?php } ?>	  
						  
						 


                          </fieldset>
                  </p>
                </div>
				<?php } ?>
				
                
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