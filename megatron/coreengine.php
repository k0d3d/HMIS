<?php
session_start();
if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');
/*************** INTEGRA CONTROL BASE *********************
This is the major backend for the whole application

***********************************************************/




$dbname = 'integra';

$link = mysql_connect("localhost","root","") or die("Couldn't make connection.");
$db = mysql_select_db($dbname, $link) or die("Couldn't select database");


/**** SECURITY PROTOCOL  ********************************

********************************************************/
function page_protect() {

//check for cookies

if(isset($_COOKIE['integrastaffcode'])){
      $_SESSION['staffonline'] = $_COOKIE['integrastaffcode'];
   }


if (!isset($_SESSION['staffonline']))
{
header("Location: index.php");
}
/*******************END********************************/
}

//Checkpage and send user to home.php if loggedin
function change_page() {


if(isset($_COOKIE['cookname']) && isset($_COOKIE['cookpass'])){
      $_SESSION['user_id'] = $_COOKIE['cookname'];
      $_SESSION['password'] = $_COOKIE['cookpass'];
   }


if (isset($_SESSION['user_id']))
{
header("Location: home.php");
}
/*******************END********************************/
} 

//Confirm if userlogged in so as to define session
function examine_page() {


if(isset($_COOKIE['cookname']) && isset($_COOKIE['cookpass'])){
      $_SESSION['user_id'] = $_COOKIE['cookname'];
      $_SESSION['password'] = $_COOKIE['cookpass'];
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

//Get people a user is following
function show_users($user_id=0){

	if ($user_id > 0){
		$follow = array();
		$fsql = "select user_id from following
				where follower_id='$user_id'";
		$fresult = mysql_query($fsql);

		while($f = mysql_fetch_object($fresult)){
			array_push($follow, $f->user_id);
		}

		if (count($follow)){
			$id_string = implode(',', $follow);
			$extra =  " and id in ($id_string)";

		}else{
			return array();
		}

	}

	$users = array();
	$sql = "select id, username from userz where id !='' $extra order by username";


	$result = mysql_query($sql);

	while ($data = mysql_fetch_object($result)){
		$users[$data->id] = $data->username;
	}
	return $users;
}

//show posts from user and their followers
function show_posts($userid,$limit=0){
	$posts = array();

	$user_string = implode(',', $userid);
	$extra =  " and id in ($user_string)";

	if ($limit > 0){
		$extra = "limit $limit";
	}else{
		$extra = '';	
	}

	$sql = "select id,uid,body,date,amenz,device from prayer where uid in ($user_string) order by date desc $extra";
	
	$result = mysql_query($sql);

	while($data = mysql_fetch_object($result)){
		$posts[] = array( 	'stamp' => $data->date, 


							'userid' => $data->uid, 
'amen' => $data->amenz, 
'device' => $data->device, 
'id' => $data->id,
							'body' => $data->body
					);
	}
	return $posts;

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

function convertBodyCodes($body) {
		
		/*
			The following is the replacement array, note
			that the spaces before and after HTML versions
			is used to prevent building up long strings that
			can't be cut by the chopper function bewlow as
			it was built not to cut in the middle of a string
			that stands inside a html tag - this prevents
			cutting a long link in two parts thus making it
			unusable
		*/
		$BCRegExpArrayPattern = array(
			'/#([a-zA-Z1-9]+)/',
			'/@([\\d\\w]+)/',
			'/(&#33;|!){10,}/',
		 '/\\b((https?|ftp):\/\/([-A-Z0-9.]+)(\/[-A-Z0-9+&@#\/%=~_|!:,.;]*)?(\\?[-A-Z0-9+&@#\/%=~_|!:,.;]*)?)/si',

		);
		
		$BCRegExpArrayReplace = array(
			'<a href="#">$0</a>',
			'<a href="box.php?username=$1" class = "vtip" title = "$1">$0</a>',
			'!',
			'<a href="\\1" target="_blank">\\1</a>',
		);

		$body = preg_replace($BCRegExpArrayPattern, $BCRegExpArrayReplace, $body);

		foreach(explode(" ", strip_tags($body)) as $key => $line) {
			/*
				Break long strings into smaller chunks (prevents
				destroying the interface with a 500 characters
				long "word"
			*/
			if (strlen($line) > 50) $body = str_replace($line, wordwrap($line, 25, " ", 1), $body);
			
		}
		
		/* 
			Return the body to the caller
		*/
		return $body;
	}

// Create the string containing your list of banned words, comma separated

$banned_word_list = "fuck, pussy, dick, bitch" ;



// The Function accepts two parameters, $checkstr is the string containing your banned word list and $output is the text to be filtered

function wordfilter($checkstr,$output){

/////////////////////////////////// Regaular Cleaning

$iarray = explode(",",$checkstr) ;

foreach($iarray as $i){

$output = eregi_replace(trim($i),' ***** ',$output) ;

}
/////////////////////////////////////////////////////

////////////////////////////////////// Phonetic Filter


foreach($iarray as $i){
//---------------------------------------------------------------- 1
$checkz = explode(" ",$output) ;

foreach($checkz as $c){
//---------------------------------------------------------------- 2

if(metaphone(trim($c))== metaphone(trim($i))){

$output = eregi_replace($c,' ***** ',$output) ;

}

//---------------------------------------------------------------- 2

}
//---------------------------------------------------------------- 1

}

//////////////////////////////////////////////////////
return $output ;

}	
?>
