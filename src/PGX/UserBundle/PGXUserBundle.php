<?php

namespace PGX\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PGXUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
