<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\ContactType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'dob' => $this->faker->date,
            'telephone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'contact_type_id' => ContactType::factory()
        ];
    }
}
