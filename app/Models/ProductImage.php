<?php

namespace App\Models;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $file_path
 */
class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';
    public $timestamps = false;
    protected $guarded = false;

    public function imageUrl() :  Application | UrlGenerator | string
    {
        return url('storage/' . $this->image_path);
    }


}
