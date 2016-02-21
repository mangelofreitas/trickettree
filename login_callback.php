<?php

	require_once('Facebook/autoload.php');

	$fb = new Facebook\Facebook(
		[
		'app_id' => '1092595837459940',
		'app_secret' => '4617cb90db7f6484bddcbed3c3ae7eb3',
		'default_graph_version' => 'v2.5',
		]);
	$helper = $fb->getRedirectLoginHelper();

	try
	{
		$accessToken = $helper->getAccessToken();
	}
	catch(Facebook\Exceptions\FacebookResponseException $e)
	{
		echo 'Graph returned an error: '.$e->getMessage();
		exit;
	}
	catch(Facebook\Exceptions\FacebookSDKException $e)
	{
		echo 'Facebook SDK returned an error: '.$e->getMessage();
	}
	if(isset($accessToken))
	{
		$_SESSION['facebook_access_token'] = (string) $accessToken;
	}
	$oAuth2Client = $fb->getOAuth2Client();

	try
	{
	  	$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
	}
	catch(Facebook\Exceptions\FacebookSDKException $e)
	{
		echo 'Facebook SDK Exception: '.$e->getMessage();
	  	exit;
	}

	$fb->setDefaultAccessToken($accessToken);

	try {
	  $response = $fb->get('/me?fields=email,name,id,gender,picture.type(large)',$accessToken);
	  //$userNode = $response->getGraphUser();
	  $simpleNode = $response->getGraphNode();
	  //$locationNode = $responde->getGraphLocation();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}
	$_SESSION['loggedin'] = 'True';
	foreach ($simpleNode as $key => $value)
	{
		if($key == 'name')
		{
			$_SESSION['name'] = $value;
		}
		else if($key == 'picture')
		{
			foreach ($value as $keyP => $valueP)
			{
				if($keyP == 'url')
				{
					$_SESSION['picture'] = $valueP;
				}
			}
		}
	}
	$_SESSION['id'] = $simpleNode['id'];
	$user = readUserFromFacebookID($simpleNode["id"]);

	if (!$user){
			addUser($simpleNode["id"],$simpleNode["name"],$simpleNode["email"],$simpleNode["picture"]["url"]);
	}



	//echo '<br>Logged in as ' . $userNode->getName().'<br>Picture '.$simpleNode->getField('country')//.'<br>City: '.$locationNode->getCity().'<br>Country: '.$locationNode->getCountry();

?>
