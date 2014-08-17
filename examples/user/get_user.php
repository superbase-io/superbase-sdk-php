<?php

use SuperBaseSdk\Common\SuperBase;

// Enable autoloading through Composer
require_once (__DIR__ . '/../../vendor/autoload.php');

// Instantiate the SuperBase helper class
$superbase = new SuperBase();

// This will load the configuration from a superbase config file (see above)
// Optionally provide a filename to specify a non-default filename
$config = $superbase->getConfig();

// Instantiate a client for the User-service
$userclient = $superbase->getClient('user', $config);

// Retrieve the test user
$user = $userclient->getUser('joe');

echo "Loaded " . $user->getDisplayName() . "!\n";
