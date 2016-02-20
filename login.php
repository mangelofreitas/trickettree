<?php
	session_start();

	require_once('Facebook/autoload.php');

	$fb = new Facebook\Facebook(
		[
		'app_id' => '1092595837459940',
		'app_secret' => '4617cb90db7f6484bddcbed3c3ae7eb3',
		'default_graph_version' => 'v2.5',
		]);

	$helper = $fb->getRedirectLoginHelper();
	$permissions = ['public_profile'];
	$loginUrl = $helper->getLoginUrl('http://localhost/tricktree/login_callback.php', $permissions);

	echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
?>
