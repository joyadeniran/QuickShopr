<?php
//1. ensure this code runs only after a POST from AT
if (!empty($_POST)) {
    //call dependencies
    require_once('functions.php');
    require_once('dbConnector.php');
    require_once('config.php');
    require_once('strings.php');
	
    //2. receive the POST from AT
	$sessionId=$_POST['sessionId'];
	$serviceCode=$_POST['serviceCode'];
	$phoneNumber=$_POST['phoneNumber'];
	$text=$_POST['text'];

	//3. Explode the text to get the value of the latest interaction - think 1*1
	$textArray=explode('*', $text);
	$userResponse=trim(end($textArray));

	//4. Set the default level of the user
	$level=0;

	//5. Check the level of the user from the DB and retain default level if none is found for this session
	$sql = "select level from session_levels where session_id ='".$sessionId." '";
	$levelQuery = $db->query($sql);
	if($result = $levelQuery->fetch_assoc()) {
  		$level = $result['level'];
	}

	//7. Check if the user is in the db
	$sql7 = "SELECT * FROM users WHERE phonenumber LIKE '%".$phoneNumber."%' LIMIT 1";
	$userQuery=$db->query($sql7);
	$userAvailable=$userQuery->fetch_assoc();

    //set default level to zero
    $level = 0;

    /* Split text input based on asteriks(*)
    * Africa's talking appends asteriks for after every menu level or input
    * One needs to split the response from Africa's Talking in order to determine
    * the menu level and input for each level
    * */
    $ussd_string_exploded = explode ("*",$ussd_string);

    // Get menu level from ussd_string reply
    $level = count($ussd_string_exploded);
	

}
?>