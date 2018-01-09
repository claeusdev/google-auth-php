<?php 



final class Auth
{

	protected $client;

	public function __construct(Google_Client $googleClient = null)
	{

		$this->client = $googleClient;

		if ($this->client) {
			$this->client->setClientId(getenv('ClientId'));
			$this->client->setClientSecret(getenv('ClientSecret'));
			$this->client->setRedirectUri(getenv('RedirectUri'));
			$this->client->setScopes('email');
		}
	}

	public function signedIn()
	{
		return isset($_SESSION['access_token']);
	}


	public function getAuthUrl()
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


	public function setToken($token)
	{
		$_SESSION['access_token'] = $token;

		$this->client->setAccessToken($token);
	}

}

