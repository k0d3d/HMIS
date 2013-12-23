<?php 
define('INCLUDE_CHECK',1);
include 'coreengine.php';
hack_protect();

$identifystaff = mysql_query("select * from user where id='$_SESSION[staff_id]'");

$row = mysql_fetch_array($identifystaff);
$staffname = $row["staffname"];
$staffrole = strtoupper($row["role"]);

$reception = "RECEPTION";



	 
	 if (isset($_GET['direct']))
{ 



if(empty($_GET['direct'])) {

$msg = urlencode("Fatal error, please try again.");
		header("Location: reception.php?msg=$msg&type=red");

} else {

$patientid = $_GET['direct'];
$surname = $_GET['surname'];
$othername = $_GET['othername'];
$reason = $_GET['reason'];
$status = $_GET['new'];
if ($status != ''){
				$realstatus = 'New';
				}
				else {$realstatus = 'Old';}
$number = $_GET['number'];

mysql_query("INSERT INTO `waiting`
(`patientid`,`reason`,`receptionistid`,`timer`,`status`)
VALUES
('$patientid','$reason','$_SESSION[staff_id]','".date("U")."','$realstatus')
");
}
mysql_query("INSERT INTO `activity`
(`staffid`,`activity`,`date`,`patient`)
VALUES
('$_SESSION[staff_id]','Directed $surname $othername with hospital number $number to the nursing station for $reason','".date("U")."','$patientid')
");


 $suc = urlencode("You have directed $surname $othername to the nursing station for $reason.");
header("Location: reception.php?msg=$suc&type=green");

	} 
	 
	 $search_word1=$_GET['keyword'];
$q1=mysql_escape_string($search_word1);
$search_word=str_replace(" ","%",$q1); // Space replacing with %
$sql=mysql_query("SELECT * FROM patients WHERE surname LIKE '%$search_word%' OR other LIKE '%$search_word%' OR company LIKE '%$search_word%' OR hospitalnumber LIKE '%$search_word%' OR telenum LIKE '%$search_word%' ORDER BY id DESC LIMIT 20");

$count=mysql_num_rows($sql);
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
      <div class="logo"> <a href="index.html"><span>MEDISOFT</span><span class="icon"></span></a> </div>
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
      <div class="row-fluid">
        <div class="span12">
          <center>
            <form method="get" action="search.php" class="form-inline well" align="center" style="background-color: #eeeeee;">
              <input name="keyword" class="span5" type="text" placeholder="Patient name, company or card number">
             
              <button type="submit" class="btn btn-primary">Search <i class="gicon-search icon-white"></i></button>
            </form>
          </center>
        </div>
      </div>
      <legend>Search Results</legend>
      <div class="row-fluid">
	  
        <table class="table table-striped span8" style="table-layout: fixed;">
          <tbody>
		       
		  <?php 
if(isset($_GET['keyword']) && $_GET["keyword"] != "")
{
$search_word1=$_GET['keyword'];
$q1=mysql_escape_string($search_word1);
$search_word=str_replace(" ","%",$q1); // Space replacing with %
$sql=mysql_query("SELECT * FROM patients WHERE surname LIKE '%$search_word%' OR other LIKE '%$search_word%' OR company LIKE '%$search_word%' OR hospitalnumber LIKE '%$search_word%' OR telenum LIKE '%$search_word%' ORDER BY id DESC LIMIT 20");

$count=mysql_num_rows($sql);

if($count > 0)
{

while($row=mysql_fetch_array($sql))
{
$id=$row['id'];
$surname=$row['surname'];
$othername=$row['other'];
$type=$row['type'];
$cnumber=$row['cnumber'];
$tel=$row['telenum'];
$hospitalnumber=$row['hospitalnumber'];
$company=$row['company'];
$bold_word='<u>'.$search_word.'</u>';
$realsurname = str_ireplace($search_word, $bold_word, $surname);
$realothername = str_ireplace($search_word, $bold_word, $othername);
$realtype = str_ireplace($search_word, $bold_word, $type);
$realcnumber = str_ireplace($search_word, $bold_word, $cnumber);
$realtel = str_ireplace($search_word, $bold_word, $tel);
$realhospitalnumber = str_ireplace($search_word, $bold_word, $hospitalnumber);
$realcompany = str_ireplace($search_word, $bold_word, $company);
?>
            <tr>
              <td style="word-wrap: break-word;"><a rel="nofollow" href="#" target="_blank"><b>Patient name: <?php echo "$realsurname"; ?> <?php echo "$realothername"; ?></b></a>
                <p> Patient type: <?php echo "$realtype"; ?> 
				<br />
				Company number: <?php echo "$realcnumber"; ?>
				<br />
				Patient telephone number: <?php echo "$realtel"; ?>
				<br />
				Hospital card number: <?php echo "$realhospitalnumber"; ?>
				<br />
				Company: <?php echo "$realcompany"; ?><br />
				Last visit: <br />
				Next appointment date: <br />
				
				
				</p>
				
				<p>Actions
				<br />
				 <?php if($staffrole == $reception){ ?>
				<a onclick="javascript:openDialog();" style="color: #46a546;">Direct to nursing station </a> - <?php } ?><a style="color: #46a546;" href = "profile.php?patient=<?php echo "$id"; ?>">Patient profile</a> - <a style="color: #46a546;" href = "case.php?patient=<?php echo "$id"; ?>">Case file</a>
				
				<div class="avgrund-popup  stack modal" id="default-popup" >
  <div class="modal-header">
    <h3 id="myModalLabel">SEND TO NURSING STATION</h3>
  </div>
  <div class="modal-body">
    <p>Send <?php echo "$surname"; ?> <?php echo "$othername"; ?> to the nursing station<br />
	Click a reason below<br />
	
	<small>
	<a href = "?direct=<?php echo "$id"; ?>&reason=Appointment<?php
if (isset($_GET['new']))
{ 
echo "&new";
} ?>&surname=<?php echo "$surname"; ?>&othername=<?php echo "$othername"; ?>&number=<?php echo "$hospitalnumber"; ?>">Appointment</a><br />
	<a href = "waiting.php?id=<?php echo "$id"; ?>&reason=Diagnosis<?php
if (isset($_GET['new']))
{ 
echo "&new";
} ?>&surname=<?php echo "$surname"; ?>&othername=<?php echo "$othername"; ?>&number=<?php echo "$hospitalnumber"; ?>">Diagnosis</a><br />
	<a href = "waiting.php?id=<?php echo "$id"; ?>&reason=Injections<?php
if (isset($_GET['new']))
{ 
echo "&new";
} ?>&surname=<?php echo "$surname"; ?>&othername=<?php echo "$othername"; ?>&number=<?php echo "$hospitalnumber"; ?>">Injections</a><br />
	</small>
	</p>
  </div>
  <div class="modal-footer">
    <button class="btn btn-primary" onclick="javascript:closeDialog();">Close</button>
  </div>
</div>
<div class="avgrund-cover"></div>
				</p>
               
                </td>
            </tr>
           <?php
}
}
else
{

echo "<font size = \"3\" color = \"red\">Your search for <u>$search_word</u> returned no results.</font>";

}


}
?>
		  
          </tbody>
        </table>
        <div class="span4">
          <div>
            <div class="accordion" id="tag-accordion">
              <div class="accordion-group">
                <div class="accordion-heading" style="background-color: whiteSmoke"> <a class="accordion-toggle dark" data-toggle="collapse" href="#company-tags" align="center">Quick summary</a> </div>
                <div id="company-tags" class="accordion-body collapse in">
                  <div class="accordion-inner">
                    <ul style="list-style: none none; margin: 0;">
                      <li> <a href="?tags=highered"> Total patients: <span class="facet-count"><?php echo "$all"; ?></span> </a> </li>
                      

                    </ul>
                  </div>
                </div>
              </div>
         
            </div>
          </div>
        </div>
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
<!-- Modal Concept --> 
<script language="javascript" type="text/javascript" src="js/plugins/avgrund.js"></script> 
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




</script><script>
      function openDialog() {
        Avgrund.show( "#default-popup" );
      }
      function closeDialog() {
        Avgrund.hide();
      }
    </script> 
</body>
</html>