<?php

require_once __DIR__ . '/../vendor/google-api-php-client-2.2.2/vendor/autoload.php';

class ProfileService
{
    private $client;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setRedirectUri('http://localhost:8000/profile');



        $this->client->setApplicationName("Working Time Account Service");
        $this->client->setDeveloperKey("YOUR_APP_KEY");
        $this->client->addScope("https://www.googleapis.com/auth/userinfo.profile");
        $this->client->addScope("https://www.googleapis.com/auth/userinfo.email");
    }


    public function getProfile()
    {
        if (isset($_REQUEST['logout'])) {
            unset($_SESSION['access_token']);
        }

        if (isset($_GET['code'])) {
            $this->client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $this->client->getAccessToken();
            $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
            header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));

        }

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $_SESSION['token'] = $this->client->getAccessToken();

        } else {
            $authUrl = $this->client->createAuthUrl();
        }



        $oauth2 = new Google_Service_Oauth2($this->client);
        var_dump($oauth2->userinfo->get());
    }
}


