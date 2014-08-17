# Introduction

SuperBase.io is a Backend-as-a-Service. More information on [http://superbase.io](http://superbase.io)

This repository contains the PHP SDK For SuperBase.io

# Installation

Add `superbase/superbase-sdk-php` to your `require` key in your `composer.json` file.
Then `update` your vendor directory by running:

    composer update
        
# Configuration

The SuperBase SDK needs to know the following information to connect to SuperBase:

* apikey
* apisecret
* backend
* datacenter

The simplest solution is to create an ``.ini` file in one of the following locations:

* `~/.superbase/config`
* `/etc/superbase.conf`

An example configuration may look like this:

    [default]
    apikey = MY_API_KEY
    apisecret = MY_API_SECRET
    backend = MY_BACKEND_CODE
    datacenter = MY_DATACENTER_CODE
    
This information can be found on your SuperBase.io Dashboard

# Usage example

    ```php
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
    
Check the `examples/` directory for more examples.
