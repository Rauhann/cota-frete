<?php

namespace App\Actions\Home;

use App\Http\Controllers\Controller;

class GetHome extends Controller
{
    public function __invoke()
    {
        return redirect('index');
    }
}
