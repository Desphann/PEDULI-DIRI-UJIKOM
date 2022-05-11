<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PerjalananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user'=>1,
            'tanggal'=> $this->faker->date(),
            'jam'=> $this->faker->time(),
            'lokasi'=>$this->faker->randomElement
            ([
                'Mall BEC','Mall TSM','Cafe Upnormal','SMKN 2 Bandung','ITB','UPI'
            ]),
            'suhu'=>$this->faker->numberBetween(30,40)
        ];
    }
}
