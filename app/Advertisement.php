<?php

namespace App;

use http\QueryString;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Advertisement extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'summary-ckeditor',
        'price',
        'category_id',
        'subcategory_id',
        'user_id',
        'slug',
        'img_1',
        'img_2',
        'img_3',
        'img_4',
        'is_negotiable',
        'is_featured',
        'is_inactive',
        'expire_date',
        'district',
        'key_words'
    ];

    /**
     * Filters advertisements created by logged user
     * @param $query
     * @return array
     */
    public function scopeWhereAuthUser($query){
        return $query->where('user_id', Auth::id());
    }

    /**
     * Filters advertisements which are active
     * @param $query
     * @return array
     */
    public function scopeWhereActive($query){
        return $query->where('is_inactive', (int)0)->orderBy('is_featured', 'desc');
    }

    /**
     * Returns advertisements count by category
     * @return array
     */
    public static function CountByCategories(){

        $result = [];

        foreach (config('constance.categories') as $index => $category) {
            $count = Advertisement::where('category_id', $index)->where('is_inactive', (int)0)->count();
            foreach (config('constance.categories')[$index]['sub_cat'] as $subIndex => $sub_category) {
                $category['sub_cat'][$subIndex]['sub_count'] = self::CountBySubCategories($subIndex);
            }
            array_push($result, [
               'id'     => $index,
               'name'   => $category['name'],
               'icon'   => $category['image'],
               'slug'   => $category['slug'],
               'count'  => $count,
               'sub_cat' =>  isset($category['sub_cat']) == true ? $category['sub_cat'] : [],

            ]);
        }

        return $result;
    }

    /**
     * Return the advertisement count for the relevant subcategory
     * @param $sub_index
     * @return mixed
     */
    public static function CountBySubCategories($sub_index){
        $count = Advertisement::where('subcategory_id', $sub_index)->where('is_inactive', (int)0)->count();
        return $count;
    }
}
