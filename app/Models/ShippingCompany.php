<?php

namespace App\Models;

use App\Entities\ShippingCompany as EntitiesShippingCompany;

class ShippingCompany
{
    private $entityShippingCompany;

    public function __construct(
        EntitiesShippingCompany $entityShippingCompany
    ) {
        $this->entityShippingCompany = $entityShippingCompany;
    }

    /**
     * Lista todas as transportadoras
     *
     * @return void
     */
    public function listAll()
    {
        return $this->entityShippingCompany->get();
    }
}
