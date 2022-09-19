<?php

namespace Laravia\Contact\App\Providers;

use Laravia\Contact\App\Models\Contact;
use Laravia\Core\App\Providers\ServiceProvider;
use Laravia\User\App\Models\User;

class ContactServiceProvider extends ServiceProvider
{
    protected $name = "contact";

    public function boot()
    {
        $this->defaultBootMethod();
    }

}
