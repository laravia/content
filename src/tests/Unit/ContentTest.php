<?php

namespace Laravia\Content\Tests\Unit;

use Laravia\Core\App\Classes\TestCase as LaraviaTestCase;
use Laravia\Core\App\Laravia;

class ContentTest extends LaraviaTestCase
{

    public function testRouteFile()
    {
        $this->assertFileExists(Laravia::path()->get('content')."/routes/web.php");
    }
}
