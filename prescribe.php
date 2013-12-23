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


?>

<!DOCTYPE html>
<html class="sidebar_default no-js" lang="en">
<head>
<meta charset="utf-8">
<title>Prescribe drugs - <?php echo "$patientsurname"; ?> - <?php echo "$patientother"; ?></title>
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
      <div class="row-fluid">
        <div class="span3">
          <div class="title">
            <div class="row-fluid legend">
              <h1> <?php echo "$patientsurname"; ?> <?php echo "$patientother"; ?> / <?php echo "$patienthospitalnumber"; ?></h1>
			
			<h4>
			  Company: <?php echo "$patientcompany"; ?>
			  </h4>
			 
            </div>
          </div>
          <!-- End .title -->
		  
		  
                 <div class="content">
            <div class="row-fluid well well-small"> <img class="row-fluid" src="img/sample_avatar_big.jpg"> </div>
            <ul class="nav nav-tabs dark nav-stacked">

              <li><a href="docview.php?patient=<?php echo "$patientid"; ?>"><i class="icon-warning"></i> Exit</a></li>
   
              
            </ul>
          </div>
          <!-- End .content --> 
        </div>
        <!-- End .span3 -->
        
        <div class="span9">
    
		  
                  <div class="span9">
           <div class="box paint color_11">
            <div class="title">
              <h4> <i class="icon-tasks"></i> <span>Prescribe drugs</span> </h4>
			  
            </div>
            <div class="content top">
              <form class="form-horizontal" action="" method = "POST">
               

				<div class="form-row control-group row-fluid">
        <label>Stock Location</label>
        <select id="location-selector"></select>
        <label>Billing Class</label>
        <select id="profile-selector"></select>
      </div>
				
	
				
				<div class="form-row control-group row-fluid">
        <label class="control-label span2">Drug Name</label>
		<br />
       
          <input type="text" ng-model="drugname" ng-minlength="1" class="row-fluid drugname">
       
        
        
      </div>
	  
	  <div class="form-row control-group row-fluid">
       
        <div class="controls span9">
            <button type="button" class="btn btn-warning add-bind">Add</button>
        
        </div>
      </div>
				
				<table class="table drugs-list-table table-fixed-header" style="">
        <thead class="header">
          <tr>
            <th>Drug Name</th>
            <th>Stock</th>
            <th>Dosage</th>
            <th>Duration</th>
			<th class="span1">Amount</th>
            <th> </th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
                
               <div class="form-row control-group row-fluid">
                 
                  <div class="controls span9">
                    <button class="btn btn-primary approve-bind">Approve</button>
                  </div>
                </div>
              </form>
  <script type="text/html" id="drugitem">  
          <tr id="drug{{_id}}" data-item-id="{{_id}}" class="pres-item" data-item-purchase-rate="{{itemPurchaseRate}}">
            <td class="itemname">{{itemName}}</td>
            <td class="currentStock">{{currentStock}}</td>
            <td>
              <select class="dosage">
                <option value="1">One Daily (OD)</option>
                <option value="2">Bi-Daily (BD)</option>
                <option value="3">3 Daily (TDS)</option>
                <option value="4">4 Daily (QDS)</option>
                <option value="1">When Necessary (PRN)</option>
              </select>
            </td>
            <td><input type="number" value="1" class="input-small period" min="1" max="30"></td>
            <td> 
              <div class="control-group">
                <input placeholder="amount" type="number" class="input-small amount" value="">
              </div>
            </td>
            <td>
              <button class="remove-drug btn btn-danger btn-mini">Remove</button>
            </td>
          </tr>
  </script>
    <SCRIPT TYPE="text/html" id="locationList">
    <option value="{{_id}}">{{locationName}}</option>
  </SCRIPT>
  <SCRIPT TYPE="text/html" id="profileList">
    <option value="{{_id}}">{{profileName}}</option>
  </SCRIPT>
            </div>
          </div>
		   
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


<script language="javascript" type="text/javascript" src="js/ICanHaz.min.js"></script> 
<script language="javascript" type="text/javascript" src="js/underscore-min.js"></script> 

<!-- Data tables --> 
<script type="text/javascript" language="javascript" src="js/plugins/datatables/js/jquery.dataTables.js"></script> 

<!-- Task plugin --> 
<script language="javascript" type="text/javascript" src="js/plugins/knockout-2.0.0.js"></script> 

<!-- Custom made scripts for this template --> 
<script src="js/scripts.js" type="text/javascript"></script> 
   <script type="text/javascript">
    var server_api_url = 'http://192.168.2.103';
    var drugsList = [],
    dispenseform = {
      prescription: []
    };

    //Fetch Location
    function getlocations(){
      jQuery.ajax({
        url: server_api_url + '/api/items/location',
        type: 'GET',
        dataType: 'json',
        success: function(d, textStatus) {
          //called when complete
          _.each(d, function(v){
            var htmlpend = ich.locationList(v, true);
            $('#location-selector').append(htmlpend);
          });
        }
      });
    };
    //Fetch Location
    function getprofiles(){
      jQuery.ajax({
        url: server_api_url + '/api/bills/profiles',
        type: 'GET',
        dataType: 'json',
        success: function(d, textStatus) {
          //called when complete
          _.each(d, function(v){
            var htmlpend = ich.profileList(v, true);
            $('#profile-selector').append(htmlpend);
          });
        }
      });
    };
    //Fetch Location Lists
    getlocations();
    getprofiles();

    
    $(document).on('change','.dosage', function(e){
      var id = $(this).parents('tr').attr('id');
      var rs = Math.round($(this).val()) * Math.round($('.period', '#'+id).val());
      $('.amount', '#'+id).val(rs);
    })
    $(document).on('change','.period', function(e){
      var id = $(this).parents('tr').attr('id');
      var rs = Math.round($(this).val()) * Math.round($('.dosage', '#'+id).val());
      $('.amount', '#'+id).val(rs);
    })

    $('.drugname').typeahead({
      source: function(query, process){
        return $.ajax({
          url: server_api_url+ '/api/items/typeahead/term/itemName/query/'+escape(query),
          crossDomain: true,
          success: function(s){
            var results = [];
            $.each(s,function(){
              results.push(this.itemName);
            });
            return process(results);            
          }
        });
      },
      updater: function(item){
        return item;
      }
    });

    //Add an item to the dispense drugs list
    $('.add-bind').on('click', function(e){
      e.preventDefault();
      var thisItemName = $('.drugname').val();
      //Check if we already have itemName in the 
      //list
      if(_.indexOf(drugsList, thisItemName) < 0){
        drugsList.push(thisItemName);
        //$scope.d.push(c);
        //Empty the drugname field
        $('.drugname').val('');
      }else{
        alert("This item is already in the list");
        return false;
      }

      //Fetch Item Info
      $.ajax({
        url: server_api_url + '/api/items/'+thisItemName+'/options/quick/locations/'+ $('#location-selector').val(),
        crossDomain: true,
        success: function(s){
          var htmlpend = ich.drugitem(s, true);
          $('table.drugs-list-table tbody').append(htmlpend);
        }
      })
    });


    $(document).on('click', '.remove-drug', function(e){
      e.preventDefault();
      var id = $(this).parents('tr').attr('id');
      var itemName = $('.itemname', '#'+id).text();
      drugsList.splice(_.indexOf(itemName, drugsList), 1);
      var index = $(this).parents('tr').remove();

    });


    $('.approve-bind').on('click', function(e){
      e.preventDefault();
		var thisbtn = this;
      //Go over each prescribed item and 
      //add it to our to be apporved list
      $('.pres-item').each(function(index){
        var d = {};
        var thisId = $(this).attr('id');
        d.dosage = $('.dosage','#'+thisId).val();
        d.period = $('.period','#'+thisId).val();
        d.amount = parseInt($('input.amount','#'+thisId).val());
        d.itemName = $('.itemname','#'+thisId).text();
        d.itemPurchaseRate = $('#'+thisId).data("itemPurchaseRate");
        d.currentStock = parseInt($('.currentStock','#'+thisId).text());
        d._id = $('#'+thisId).data('itemId');
        // Check if the amount to be dispensed is available
        // (lesser than) from the current stock for the item 
		
        if(d.amount < d.currentStock){
          dispenseform.prescription.push(d);
          $('#'+thisId).data('index', dispenseform.prescription.length - 1);
          $('.countitems').text(dispenseform.prescription.length);

        }          
      })
      if(dispenseform.prescription.length === 0){ 
          alert("You havent confirmed any items. Check your list");
          return false;
      }  
      var drugs = [];
      _.forEach(dispenseform.prescription, function(i,v){
        drugs.push(i);
        //drugs.push({"_id":i._id,"amount":i.amount,"itemName":i.itemname,"itemID": i.itemID,"status":i.options});
      });
      var toSend = {
        "patientName": "<?php echo "$patientsurname $patientother"; ?>",
        "patientId": "<?php echo "$patientid"; ?>",
        "class": $('#profile-selector').val(),
        "drugs": drugs,
        "doctorName": "<?php echo "$staffname"; ?>",
        "doctorId": "<?php echo "$_SESSION[staff_id]"; ?>",
        "location": {
          locationId: $('#location-selector').val(),
          locationName: $('#location-selector option:selected').text(),
          }
      };
      $.ajax({
        url: server_api_url+'/api/items/prescribe',
        type: 'POST',
        data: toSend,
        crossDomain: true,
        success: function(r){
			if(r){
			$(thisbtn).prop({'disabled': true}).text('Prescription Sent');
		  }
        },
		error: function(r){
			$(thisbtn).text('Error, Try Again');
		}
      })
      // itemsService.dispense(toSend, function(c){
      //   //Empty all necessary scope, reset form
      //   dispenseform.length = 0;
      //   //$scope.d = '';
      //   drugsList.length = 0;
      // });          
    })
  </script>
</body>
</html>