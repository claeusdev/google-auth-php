<?php 

final class Auth
{

	protected $client;

	public function __construct(Google_Client $googleClient = null)
	{

		$this->client = $googleClient;

		if ($this->client) {
			$this->client->setClientId('54395839616-3pvssucel04peesvleikjmf82pl9ent6.apps.googleusercontent.com');
			$this->client->setClientSecret('kGwrclAPHkbz8WHscGwJsc_N');
			$this->client->setRedirectUri('http://localhost/goog/index.php');
			$this->client->setScopes('email');
		}
	}

	public function signedIn()
	{
		return isset($_SESSION['access_token']);
	}


	public static function getAuthUrl()
	{
		return $this->client->createAuthUrl();
	}


	public function checkRedirectCode() 
	{
		if (isset($_GET['code'])) {

			$this->client->authenticate($_GET['code']);

			// setting redirect token in session

			$this->setToken($this->client->getAccessToken());

			return true;
		}

		false;
	}


	public static function setToken($token)
	{
		$_SESSION['access_token'] = $token;

		$this->client->setAccessToken($token);
	}

}

