<?php

namespace Laravia\Contact\Tests\Unit;

use Laravia\Core\App\Classes\TestCase as LaraviaTestCase;
use Laravia\Core\App\Laravia;

class ContactTest extends LaraviaTestCase
{

    public function testRouteFile()
    {
        $this->assertFileExists(Laravia::path()->get('contact')."/routes/web.php");
    }
}
