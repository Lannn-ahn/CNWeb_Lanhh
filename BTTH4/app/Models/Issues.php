<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Issues extends Model
{
    //
    use HasFactory;
 
    protected $fillable = [
        'computer_id',
        'reporter_by',
        'reporter_date',
        'description',
        'urgency',
        'status'
    ];
    // khai báo những cột mà controller có thể tác động vào 

    public function computer()
    {
        return $this->belongsTo(Computers::class, 'computer_id', ownerKey: 'id');
    }
}
