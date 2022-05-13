<?php

namespace Laravia\Content\Tests\Unit\Models;

use Laravia\Content\App\Models\Content;
use Laravia\Core\App\Classes\TestCase as LaraviaTestCase;

class ContentModelTest extends LaraviaTestCase
{

    public function testLaraviaContentModelExists()
    {
        $this->assertClassExist(Content::class);
    }
}
