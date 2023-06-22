<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\CommonMarkConverter;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Set the item's description.
     *
     * @param string $value
     * @return void
     */
    public function setDescriptionAttribute(string $value)
    {
        $converter = new CommonMarkConverter(['html_input' => 'escape', 'allow_unsafe_links' => false]);
        $this->attributes['description'] = $converter->convert($value)->getContent();
    }
}
