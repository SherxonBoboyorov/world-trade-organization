<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityCategory extends Model
{
    use HasFactory;

    protected $table = 'activity_categories';

    protected $fillable = [
        'title_ru',
        'title_uz',
        'title_en',
    ];


    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
