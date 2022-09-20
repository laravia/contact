<?php

namespace Laravia\Contact\Tests\Unit\Controllers;

use Laravia\Contact\App\Http\Controllers\ContactController;
use Laravia\Core\App\Classes\TestCase as LaraviaTestCase;
use Laravia\User\App\Traits\UserTrait;
use Faker\Factory as Faker;
use Laravia\Contact\App\Models\Contact;

class ContactControllerTest extends LaraviaTestCase
{

    use UserTrait;

    private function prepareContact(): void
    {
        Contact::create(['from' => 'test@test', 'project' => 'xanuel', 'body' => 'Test']);
    }

    public function testContactControllerExists()
    {
        $this->assertClassExist(ContactController::class);
    }

    public function testSiteContactIndex()
    {
        $this->actingAsUser('admin');
        $response = $this->get('/laravia/contacts');
        $response->assertStatus(200);
    }

    public function testSiteContactEdit()
    {
        $this->prepareContact();
        $this->actingAsUser('admin');
        $response = $this->get('/laravia/contact/' . Contact::first()->id);
        $response->assertStatus(200);
        Contact::orderByDesc('id')->delete();
    }

    public function testSiteContactsStore()
    {
        $faker = Faker::create(Contact::class);
        $this->actingAsUser('admin');

        $contact = [
            'from' => $faker->text(),
            'body' => $faker->text(),
        ];

        $this->post('/contact/store', $contact);

        $this->assertDatabaseHas('contacts', [
            'from' => data_get($contact, 'from'),
            'body' => data_get($contact, 'body'),
        ]);
    }

}
