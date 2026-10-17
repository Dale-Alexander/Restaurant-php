<?php
namespace App\Models\Enums;

enum Role : string{
    case ADMIN = 'Admin';
    CASE WAITER = 'Staff';
    CASE CUSTOMER = 'Customer';
}