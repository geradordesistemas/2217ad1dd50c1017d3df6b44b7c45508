<?php

namespace App\Application\Schema\RegimeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationSchemaRegimeBundle extends Bundle
{
    /** {@inheritdoc} */
    public function getParent()
    {
        return 'ApplicationSchemaRegimeBundle';
    }
}