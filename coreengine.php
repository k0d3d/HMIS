<?php
session_start();
if(!defined('INCLUDE_CHECK')) die('Something has gone technically wrong and our guard dogs are on a trail for it. LOL');
/*************** INITIATE ENGINE *********************/



$dbname = 'integra';

$link = mysql_connect("localhost","root","") or die("Couldn't make connection.");
$db = mysql_select_db($dbname, $link) or die("Couldn't select database");



//All patients
$rs_all = mysql_query("select count(*) as total_all from patients") or die(mysql_error());
list($all) = mysql_fetch_row($rs_all);


/**** SAFE HACK PROOF  ********************************
This code protects pages to only logged in users. If users have not logged in then it will redirect to login page.
If you want to add a new page and want to login protect, COPY this from this to END marker.
Remember this code must be placed on very top of any html or php page.
********************************************************/
function hack_protect() {

//check for cookies

if(isset($_COOKIE['icookie'])){
      $_SESSION['staff_id'] = $_COOKIE['icookie'];
   }


if (!isset($_SESSION['staff_id']))
{
header("Location: index.php");
}
/*******************END********************************/
}

//Checkpage and send user to home.php if loggedin
function change_page() {


if(isset($_COOKIE['icookie'])){
      $_SESSION['staff_id'] = $_COOKIE['icookie'];
   }


if (isset($_SESSION['staff_id']))
{
header("Location: home.php");
}
/*******************END********************************/
} 

//Confirm if userlogged in so as to define session
function examine_page() {


if(isset($_COOKIE['icookie']) && isset($_COOKIE['icookie'])){
      $_SESSION['staff_id'] = $_COOKIE['icookie'];
   }


/*******************END********************************/
}           
                
//During image upload, capture file extension and validate file type with it
function getExtension($str) {

         $i = strrpos($str,".");
         if (!$i) { return ""; } 

         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}



function makecomma($input)
{
    // This function is written by some anonymous person - I got it from Google
    if(strlen($input)<=2)
    { return $input; }
    $length=substr($input,0,strlen($input)-2);
    $formatted_input = makecomma($length).",".substr($input,-2);
    return $formatted_input;
}




function relativeTime($dt,$precision=2)
{
	$times=array(	365*24*60*60	=> "year",
					30*24*60*60		=> "month",
					7*24*60*60		=> "week",
					24*60*60		=> "day",
					60*60			=> "hour",
					60				=> "minute",
					1				=> "second");
	
	$passed=time()-$dt;
	
	if($passed<5)
	{
		$output='less than 5 seconds ago';
	}
	else
	{
		$output=array();
		$exit=0;
		
		foreach($times as $period=>$name)
		{
			if($exit>=$precision || ($exit>0 && $period<60)) break;
			
			$result = floor($passed/$period);
			if($result>0)
			{
				$output[]=$result.' '.$name.($result==1?'':'s');
				$passed-=$result*$period;
				$exit++;
			}
			else if($exit>0) $exit++;
		}
				
		$output=implode(' and ',$output).' ago';
	}
	
	return $output;
}

function EncodeURL($url)
{
$new = strtolower(ereg_replace(' ','_',$url));
return($new);
}

function DecodeURL($url)
{
$new = ucwords(ereg_replace('_',' ',$url));
return($new);
}

function ChopStr($str, $len) 
{
    if (strlen($str) < $len)
        return $str;

    $str = substr($str,0,$len);
    if ($spc_pos = strrpos($str," "))
            $str = substr($str,0,$spc_pos);

    return $str . "...";
}




?>
