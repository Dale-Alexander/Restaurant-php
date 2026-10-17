<?php
namespace App\Models\Enums{

enum PaymentMethod:string{
    case CASH = 'Cash';
    case CARD = ' Card';
}
}