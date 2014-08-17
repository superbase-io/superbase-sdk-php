<?php

namespace SuperBaseSdk\Service\User\Model;

use SuperBaseSdk\Common\BaseClient;

class User
{
    private $displayname;

    public function setDisplayName($displayname)
    {
        $this->displayname = $displayname;
    }

    public function getDisplayName()
    {
        return $this->displayname;
    }
}
