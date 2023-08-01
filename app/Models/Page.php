<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';

    protected $fillable = [
        'image',
        'title_ru',
        'title_uz',
        'title_en',
        'sub_content_ru',
        'sub_content_uz',
        'sub_content_en',
        'content_ru',
        'content_en',
        'content_uz',
        'meta_title_ru',
        'meta_title_uz',
        'meta_title_en',
        'meta_description_ru',
        'meta_description_uz',
        'meta_description_en',
    ];


    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/page/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/page/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $page): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $page->image)) {
                File::delete(public_path() . $page->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/page/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/page/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $page->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/page/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/page/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
