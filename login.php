<?php

	require_once('Facebook/autoload.php');

	$fb = new Facebook\Facebook(
		[
		'app_id' => '1092595837459940',
		'app_secret' => '4617cb90db7f6484bddcbed3c3ae7eb3',
		'default_graph_version' => 'v2.5',
		]);

	$helper = $fb->getRedirectLoginHelper();
	$permissions = ['public_profile'];
	if(strpos($_SERVER['REQUEST_URI'], 'index.php'))
	{
		$header = $_SERVER['REQUEST_URI'];
		$header = str_replace("index.php","",$header);
		$loginUrl = $helper->getLoginUrl('http://localhost/'.$header.'profile.php', $permissions);
	}
	else
	{
		$loginUrl = $helper->getLoginUrl('http://localhost/'.$_SERVER['REQUEST_URI'].'profile.php', $permissions);
	}


	echo '<a href="' . $loginUrl . '" style="color: rgb(58, 87, 149)" href="profile.html">Login with <i style="font-size:18px;padding-left:10px" class="fa fa-facebook"></i> </a>';
?>

