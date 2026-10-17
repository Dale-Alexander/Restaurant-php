<?php 
namespace App\Models\Enums;

enum ReservationStatus : string{
    case BOOKED = 'Booked';
    case COMPLETED = 'Completed';
    case CANCELLED = 'Cancelled';
    case UNATTENDED = 'Unattended';
}