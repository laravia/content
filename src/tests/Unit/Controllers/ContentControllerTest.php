<?php

namespace Laravia\Content\Tests\Unit\Controllers;

use App\Models\User;
use Laravia\Content\App\Http\Controllers\ContentController;
use Laravia\Core\App\Classes\TestCase as LaraviaTestCase;
use Laravia\User\App\Models\User as ModelsUser;
use Laravia\User\App\Traits\UserTrait;
use Faker\Factory as Faker;
use Laravia\Content\App\Models\Content;

class ContentControllerTest extends LaraviaTestCase
{

    use UserTrait;

    public function testContentControllerExists()
    {
        $this->assertClassExist(ContentController::class);
    }

    public function testSiteContentIndex()
    {
        $this->actingAsUser('admin');
        $response = $this->get('/laravia/contents');
        $response->assertStatus(200);
    }

    public function testSiteContentEdit()
    {
        $this->actingAsUser('admin');
        $response = $this->get('/laravia/content/' . Content::first()->id);
        $response->assertStatus(200);
    }

    public function testSiteContentsStore()
    {

        $faker = Faker::create(Content::class);
        $this->actingAsUser('admin');

        $content = [
            'title' => $faker->text(),
            'body' => $faker->text(),
        ];

        $response = $this->post('/laravia/content/store', $content);

        $this->assertDatabaseHas('contents', [
            'title' => data_get($content, 'title'),
            'body' => data_get($content, 'body'),
        ]);
    }

    public function testSiteContentsUpdate()
    {

        $faker = Faker::create(Content::class);
        $this->actingAsUser('admin');

        $contentData = Content::find(1);
        $content['id'] = $contentData->id;
        $content['body'] = $contentData->body;
        $content['title'] = $faker->text;

        $response = $this->post('/laravia/content/update', $content);

        $this->assertDatabaseHas('contents', [
            'id' => data_get($content, 'id'),
            'title' => data_get($content, 'title'),
            'body' => data_get($content, 'body'),
        ]);
    }
}
