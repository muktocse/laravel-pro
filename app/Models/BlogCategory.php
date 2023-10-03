<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected static $blogCategory, $imageFile, $imageName, $imageDirectory, $imageUrl;

    public static function createBlogCategory($request)
    {
        self::$imageFile = $request->file('image');
        if (self::$imageFile)
        {
            self::$imageName  = self::$imageFile->getClientOriginalName();
            self::$imageDirectory = 'backend/uploaded-files/blog-categories/';
            self::$imageFile->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        }
        self::$blogCategory = new BlogCategory();
        self::$blogCategory->name   = $request->name;
        self::$blogCategory->image   = self::$imageUrl;
        self::$blogCategory->status   = $request->status;
        self::$blogCategory->save();
    }
}
