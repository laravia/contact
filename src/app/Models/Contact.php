<?php

namespace Laravia\Contact\App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Laravia\Core\App\Laravia;
use Laravia\Core\App\Models\Model;

class Contact extends Model
{

    protected $fillable = [
        'body',
        'project',
        'from',
    ];

    protected function linkToEdit(): Attribute
    {

        return Attribute::make(
            get: fn ($value) => "<a href='" . route('laravia.contact::edit') . '/' . $this->id . "' class='text-pink-600 no-underline hover:text-gray-900 border-orange-600 hover:border-orange-600'>" . Laravia::trans('core.btnEdit') . "</a>",
        );
    }

}
