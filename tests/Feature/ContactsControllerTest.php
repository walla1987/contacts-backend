<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\ContactType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactsControllerTest extends TestCase
{

    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Creates a contact
     * @test
     */

    public function create_a_contact()
    {
        $this->withoutExceptionHandling();

        $contact_type = ContactType::factory()->create();

        $data = [
            'firstname' => $this->faker->name,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->email,
            'dob' => $this->faker->date,
            'telephone' => $this->faker->phoneNumber,
            'contact_type_id' => $contact_type->getAttribute('id'),
        ];
        $response = $this->post('/api/v1/contacts/create', $data);

        $this->assertDatabaseHas('contacts', $data);
        $response->assertStatus(201);
    }

    /**
     * Deletes a contact
     * @test
     */
    public function delete_a_contact()
    {
        $this->withoutExceptionHandling();
        $contact = Contact::factory()->create();
        $response = $this->delete('/api/v1/contacts/delete/' . $contact->getAttribute('id'));
        $response->assertStatus(200);
        $this->assertDatabaseMissing('contacts', $contact->toArray());
    }

    /**
     * Updates a contact
     * @test
     */
    public function update_a_contact()
    {
        $this->withoutExceptionHandling();
        $contact = Contact::factory()->create();

        $data = [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
        ];

        $response = $this->patch('/api/v1/contacts/update/' . $contact->getAttribute('id'), $data);
        $response->assertStatus(200);
        $this->assertDatabaseCount('contact_types', 1);
        $this->assertDatabaseHas('contacts', $data);
    }

    /**
     * Lists contacts
     * @test
     */
    public function list_contacts()
    {
        $contacts = Contact::factory()->count(10)->create();
        $response = $this->get('/api/v1/contacts/list');
        $data = json_decode($response->getContent(), true);
        $response->assertStatus(200);
        $this->assertCount(count($data), $contacts);
    }
}
