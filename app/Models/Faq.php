<?php

namespace App\Models;

use App\Models\FaqCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->hasOne(FaqCategory::class, 'cat_id');
    }

    public function getCategory($cat_name)
    {
        return $this->join('faq_categories', 'faq_categories.id', '=', 'faqs.cat_id')
            ->where('faq_categories.category', $cat_name)->get();
    }

}