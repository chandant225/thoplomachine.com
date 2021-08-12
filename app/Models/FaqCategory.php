<?php

namespace App\Models;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    use HasFactory;

    public function faq()
    {
        return $this->belongsTo(Faq::class);
    }
}