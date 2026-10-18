<?php
namespace App\Enums\Models{

enum PaymentStatus:string{
case PENDING = 'Pending';
case SUCCEEDED = 'Succeeded';
case FAILED = 'Failed';
case REFUNDED = 'Refunded';
}
}