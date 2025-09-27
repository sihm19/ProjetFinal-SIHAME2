<?php

namespace App\Enum;

enum TypeEtablissement: string
{
    case RESTAURANT = 'Restaurant';
    case BAR = 'Bar';
    case CAFÉ = 'Café';
    case FASTFOOD = 'Fast Food';
    case SNACK = 'Snack';
}
