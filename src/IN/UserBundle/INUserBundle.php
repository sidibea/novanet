<?php

namespace IN\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class INUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
