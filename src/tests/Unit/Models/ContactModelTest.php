<?php

namespace Laravia\Contact\Tests\Unit\Models;

use Laravia\Contact\App\Models\Contact;
use Laravia\Core\App\Classes\TestCase as LaraviaTestCase;

class ContactModelTest extends LaraviaTestCase
{

    public function testLaraviaContactModelExists()
    {
        $this->assertClassExist(Contact::class);
    }
}
