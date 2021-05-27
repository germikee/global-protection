<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Get the complete endpoint to request.
     *
     * @return string
     */
    protected function endpoint()
    {
        return env('GENERATE_PERSON_URL', 'https://pipl.ir/v1/getPerson');
    }

    /**
     * Endpoint to request.
     *
     * @var string
     */
    protected $endpoint;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $response = Http::get($this->endpoint());

        $person = $response->json();

        return [
            'name' => $name = Arr::get($person, 'person.personal.name'),
            'last_name' => Arr::get($person, 'person.personal.last_name'),
            'age' => Arr::get($person, 'person.personal.age'),
            'blood' => Arr::get($person, 'person.personal.blood'),
            'born' => Arr::get($person, 'person.personal.born'),
            'born_place' => Arr::get($person, 'person.personal.born_place'),
            'cellphone' => Arr::get($person, 'person.personal.cellphone'),
            'city' => Arr::get($person, 'person.personal.city'),
            'country' => Arr::get($person, 'person.personal.country'),
            'eye_color' => Arr::get($person, 'person.personal.eye_color'),
            'father_name' => Arr::get($person, 'person.personal.father_name'),
            'gender' => Arr::get($person, 'person.personal.gender'),
            'height' => Arr::get($person, 'person.personal.height'),
            'national_code' => Arr::get($person, 'person.personal.national_code'),
            'religion' => Arr::get($person, 'person.personal.religion'),
            'system_id' => Arr::get($person, 'person.personal.system_id'),
            'weight' => Arr::get($person, 'person.personal.weight'),
            'avatar' => "https://robohash.org/${name}.png",
        ];
    }
}
