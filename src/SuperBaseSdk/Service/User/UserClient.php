<?php

namespace SuperBaseSdk\Service\User;

use SuperBaseSdk\Common\BaseClient;
use SuperBaseSdk\Service\User\Model\User;

class UserClient extends BaseClient
{
     
    public function __construct($config)
    {
        $this->init('user', $config);
    }
     
    public function getUser($identifier)
    {
        $res = $this->get('users/' . $identifier);

        $data = json_decode($res->getBody(), true);
        $user = new User();
        $user->setDisplayName($data['displayname']);
        return $user;
    }
}
