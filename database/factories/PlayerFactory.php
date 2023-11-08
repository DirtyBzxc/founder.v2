<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Player>
 */
class PlayerFactory extends Factory
{
    protected $model = Player::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ranks = array("Radiant","Immortal","Ascendant","Diamond","Platinum","Gold","Silver","Bronze","Iron");
        $role = array('Duelist','Controller','Initiator','Sentinel');
        return [
            'nickname' => $this->faker->name(),
            'rank' =>  $ranks[array_rand($ranks)],
            'role' => $role[array_rand($role)],
            'age' => rand(16,33),
            'description' => $this->faker->text(50),
            'link' => 'https://tracker.gg/valorant/profile/riot/Anoxai%23SSS/overview',
            'contact' => 'https://vk.com/bimoers',
            'user_id' => rand(1,250)
        ]; 
    }
}
