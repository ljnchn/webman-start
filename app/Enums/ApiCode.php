<?php
namespace App\Enums;

use ArchTech\Enums\InvokableCases;


enum ApiCode: int
{
    use InvokableCases;

    case SUCCESS = 20000;
    case FAIL = 50000;
}