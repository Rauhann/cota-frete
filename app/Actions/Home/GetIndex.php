<?php

namespace App\Actions\Home;

use App\Helpers\State;
use App\Http\Controllers\Controller;
use App\Models\ShippingCompany;
use App\Models\ShippingQuote;

class GetIndex extends Controller
{
    use State;

    private $modelShippingQuote;
    private $modelShippingCompany;

    public function __construct(
        ShippingQuote $modelShippingQuote,
        ShippingCompany $modelShippingCompany
    ) {
        $this->modelShippingQuote = $modelShippingQuote;
        $this->modelShippingCompany = $modelShippingCompany;
    }

    public function __invoke()
    {
        $shippingCompanies = $this->modelShippingCompany->listAll();
        $states = $this->getAllStates();

        return view('home', compact('shippingCompanies', 'states'));
    }
}
