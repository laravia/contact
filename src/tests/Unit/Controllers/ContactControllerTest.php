<?php

namespace Laravia\Contact\Tests\Unit\Controllers;

use App\Models\User;
use Laravia\Contact\App\Http\Controllers\ContactController;
use Laravia\Core\App\Classes\TestCase as LaraviaTestCase;
use Laravia\User\App\Models\User as ModelsUser;
use Laravia\User\App\Traits\UserTrait;
use Faker\Factory as Faker;
use Laravia\Contact\App\Models\Contact;

class ContactControllerTest extends LaraviaTestCase
{

    use UserTrait;

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
        $this->actingAsUser('admin');
        $response = $this->get('/laravia/contact/' . Contact::first()->id);
        $response->assertStatus(200);
    }

    public function testSiteContactsStore()
    {

        $faker = Faker::create(Contact::class);
        $this->actingAsUser('admin');

        $contact = [
            'project' => $faker->word(),
            'from' => $faker->text(),
            'body' => $faker->text(),
        ];

        $this->post('/laravia/contact/store', $contact);

        $this->assertDatabaseHas('contacts', [
            'project' => data_get($contact, 'project'),
            'from' => data_get($contact, 'title'),
            'body' => data_get($contact, 'body'),
        ]);
    }

    public function testSiteContactsUpdate()
    {

        $faker = Faker::create(Contact::class);
        $this->actingAsUser('admin');

        $contactData = Contact::find(1);
        $contact['id'] = $contactData->id;
        $contact['body'] = $faker->text;
        $contact['from'] = $faker->text;
        $contact['project'] = $faker->word;

        $this->post('/laravia/contact/update', $contact);

        $this->assertDatabaseHas('contacts', [
            'id' => data_get($contact, 'id'),
            'from' => data_get($contact, 'from'),
            'body' => data_get($contact, 'body'),
            'project' => data_get($contact, 'project'),
        ]);
    }
}
