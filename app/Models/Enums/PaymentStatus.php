<?php
namespace App\Models\Enums{

enum PaymentStatus:string{
case PENDING = 'Pending';
case SUCCEEDED = 'Succeeded';
case FAILED = 'Failed';
case REFUNDED = 'Refunded';
}
}