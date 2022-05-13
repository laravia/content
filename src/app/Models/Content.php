<?php

namespace Laravia\Content\App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Laravia\Core\App\Classes\Taggify;
use Laravia\Core\App\Laravia;
use Laravia\Core\App\Models\Model;

class Content extends Model
{
    use Taggify;

    protected $fillable = ['body', 'title', 'onlineFrom', 'onlineTo', 'active', 'link', 'user_id'];
    protected $dates = ['onlineFrom', 'onlineTo'];


    protected function onlineFrom(): Attribute
    {

        return Attribute::make(
            get: fn ($value) => ($value ? date($this->dateTimeFormat, strtotime($value)) : null),
            set: fn ($value) => ($value ? Carbon::createFromFormat($this->dateTimeFormat, $value) : null),
        );
    }

    protected function linkToEdit(): Attribute
    {

        return Attribute::make(
            get: fn ($value) => "<a href='" . route('laravia.content::edit') . '/' . $this->id . "' class='text-pink-600 no-underline hover:text-gray-900 border-orange-600 hover:border-orange-600'>" . Laravia::trans('core.btnEdit') . "</a>",
        );
    }

    protected function onlineTo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ($value ? date($this->dateTimeFormat, strtotime($value)) : null),
            set: fn ($value) => ($value ? Carbon::createFromFormat($this->dateTimeFormat, $value) : null),
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
