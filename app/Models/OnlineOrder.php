<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineOrder extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'phone', 'status','address', 'li_do', 'da_thanh_toan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OnlineOrderItem::class, 'order_id');
    }
}
