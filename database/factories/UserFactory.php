<?php

namespace Database\Factories;

use App\Enums\UserRoleEnum;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'     => $this->faker->firstName . ' ' . $this->faker->lastName,
            'avatar' => $this->faker->imageUrl(),
            'email' => $this->faker->email,
            'password' => $this->faker->password,
            'phone' => $this->faker->phoneNumber,
            'link' => null,
            'role' => $this->faker->randomElement(UserRoleEnum::getValues()),
            'bio' => $this->faker->boolean ? $this->faker->word : null,
            'position' => $this->faker->jobTitle,
            'gender' => $this->faker->boolean,
            'city' => $this->faker->city,
            'company_id' => Company::query()->inRandomOrder()->value('id'),
        ];
    }
}
