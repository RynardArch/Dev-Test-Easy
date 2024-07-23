<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['friend_name', 'car_type', 'car_cost', 'date_bought'];

    protected $casts = [
        'date_bought' => 'date',
        'car_cost' => 'decimal:2',
    ];

    public function getDegradedValueAttribute()
    {
        $dateBought = new \DateTime($this->date_bought);
        $now = new \DateTime();
        $interval = $now->diff($dateBought);

        // Calculate the number of full years
        $years = $interval->y;

        $depreciationRate = 0.15; // 15%
        $currentValue = $this->car_cost * pow((1 - $depreciationRate), $years);

        return number_format($currentValue, 2, '.', ',');
    }
}

