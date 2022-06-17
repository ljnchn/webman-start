<?php

namespace App\Controller;

use support\Request;
use support\Response;

class Index
{
    public function index(Request $request): Response
    {
        return successJson('hello webman start');
    }

}
