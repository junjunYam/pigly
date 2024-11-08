<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightTarget extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'target_weight'];

    public function user(){
        return $this->belongsTo(PiglyUser::class);
    }

    public function scopeUserIdSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('user_id', 'like', '%' . $keyword . '%');
        }
    }
}
