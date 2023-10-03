<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected static $blog, $imageFile, $imageName, $imageDirectory, $imageUrl;

    public static function createBlog($request)
    {
        self::$imageFile = $request->file('image');
        if (self::$imageFile)
        {
            self::$imageName  = self::$imageFile->getClientOriginalName();
            self::$imageDirectory = 'backend/uploaded-files/blogs/';
            self::$imageFile->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        }
        self::$blog                     = new Blog();
        self::$blog->blog_category_id   = $request->blog_category_id;
        self::$blog->title              = $request->title;
        self::$blog->description        = $request->description;
        self::$blog->image              = self::$imageUrl;
        self::$blog->status             = $request->status;
        self::$blog->save();
    }
}
