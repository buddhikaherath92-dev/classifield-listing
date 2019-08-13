<?php

namespace App\Helpers;
use Alert;
class Common
{

    /**
     * Slugify any given string
     */
    public function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
//        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    /**
     * Returns the subcategory ID for given slug
     */
    public function getSubCategoryIdFromSlug($slug)
    {
        foreach (config('constance.categories') as $index => $category) {
            foreach ($category['sub_cat'] as $subCatIndex => $subCategory) {
                if ($subCategory['slug'] === $slug) {
                    return $subCatIndex;
                }
            }
        }
        return false;
    }
    /**
     * Returns the subcategory for given id
     */
    public function getCategoryObjectFromSubID($subId)
    {
        foreach (config('constance.categories') as $index => $category){
            foreach ($category['sub_cat'] as $subCatIndex => $subCategory) {
                if ($subCatIndex === $subId){
                    return $subCategory;
                }
            }
        }
        return false;
    }
    /**
     * Returns the category ID for given slug
     */
    public function getCategoryIdFromSlug($slug)
    {
        foreach (config('constance.categories') as $index => $category) {
            if ($category['slug'] === $slug) {
                return $index;
            }
        }
        return false;
    }
    /**
     * Returns the subcategory for given id
     */
    public function getCategoryObjectFromID($catId)
    {
        foreach (config('constance.categories') as $index => $category){
            if ($index === $catId){
                return $category;
            }
        }
        return false;
    }
    /**
     * Handle the sweet alerts
     * @param $message,$title,$description
     * @return Alert
     * */
    public function showAlerts($message,$title,$description){
        switch ($title){
            case "error":
                Alert::error($message, $description)->autoclose(3500);
                break;
            case "success":
                Alert::success($message, $description)->autoclose(3500);
                break;
            case "info":
                Alert::info($message, $description)->autoclose(3500);
                break;
            case "message":
                Alert::message($message, $description)->autoclose(3500);
                break;
        }
    }

}