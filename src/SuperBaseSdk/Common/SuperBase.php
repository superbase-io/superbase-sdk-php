<?php

namespace SuperBaseSdk\Common;

use InvalidArgumentException;
use RuntimeException;

class SuperBase
{
    public function getConfig($filename = null)
    {
        if (!$filename) {
            $testfilename = getenv("HOME") .'/.superbase/config';
            if (file_exists($testfilename)) {
                $filename = $testfilename;
            }
        }
        if (!$filename) {
            throw new RuntimeException("Config filename not provided, and no config file in default locations were found. Use config:create to create a default config file, or use --config to specify the config filename");
        }

        return $this->getConfigFromIni($filename);
    }
    
    public function getConfigFromIni($filename, $section = 'default')
    {
        $data = parse_ini_file($filename, true);

        $sectiondata = $data[$section];

        $config = new Config(
            $sectiondata['apikey'],
            $sectiondata['apisecret'],
            $sectiondata['backend'],
            $sectiondata['datacenter']
        );
        return $config;

    }
    
    public function getClient($service, $config)
    {
        switch($service) {
            case 'user':
                return new \SuperBaseSdk\Service\User\UserClient($config);
        }
        throw new InvalidArgumentException("Unknown/unsupported service client requested: " . $service);
    }
}
