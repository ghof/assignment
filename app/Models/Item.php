<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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

    public function scopeWebsite($query)
    {
        return $query->select(
            DB::raw("SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(url, '/', 3), '://', -1), '/', 1), '?', 1) AS domain"),
            DB::raw('sum(price) as total')
        )->groupBy('domain')->orderBy('total', "DESC");
    }
    public function scopeCurrentMonth($query)
    {
        return $query->whereMonth('created_at', now()->month);
    }

}
