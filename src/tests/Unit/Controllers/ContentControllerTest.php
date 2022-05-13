<?php

namespace Laravia\Content\Tests\Unit\Controllers;

use Laravia\Content\App\Http\Controllers\ContentController;
use Laravia\Core\App\Classes\TestCase as LaraviaTestCase;

class ContentControllerTest extends LaraviaTestCase
{

    public function testLaraviaContentControllerExists()
    {
        $this->assertClassExist(ContentController::class);
    }
}
