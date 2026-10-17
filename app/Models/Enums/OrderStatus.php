<?php
namespace App\Models\Enums{

enum Orderstatus : string{
    case CANCELLED = 'Cancelled';
    case PREPARING = 'Preparing';
    case SERVED = 'Served';
}
}