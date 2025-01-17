<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected  $analyses = [
        ['name' => 'Journée de technicien et véhicule en mission', 'price' => 2400.00],
        ['name' => 'Analyses physico-chimiques', 'price' => 150.00],
        ['name' => 'pH, Température, Conductivité', 'price' => 100.00],
        ['name' => 'Chlore libre résiduel', 'price' => 100.00],
        ['name' => 'Turbidité', 'price' => 200.00],
        ['name' => 'Couleur', 'price' => 100.00],
        ['name' => 'Odeur', 'price' => 100.00],
        ['name' => 'Saveur', 'price' => 150.00],
        ['name' => 'Oxygène dissous', 'price' => 90.00],
        ['name' => 'TA', 'price' => 90.00],
        ['name' => 'TAC', 'price' => 100.00],
        ['name' => 'Chlorures', 'price' => 130.00],
        ['name' => 'Sulfates', 'price' => 165.00],
        ['name' => 'Nitrites', 'price' => 150.00],
        ['name' => 'Nitrates', 'price' => 250.00],
        ['name' => 'Sodium', 'price' => 250.00],
        ['name' => 'Potassium', 'price' => 150.00],
        ['name' => 'Calcium', 'price' => 150.00],
        ['name' => 'TH', 'price' => 150.00],
        ['name' => 'Azote ammoniacal', 'price' => 200.00],
        ['name' => 'Oxydabilité au permanganate', 'price' => 300.00],
        ['name' => 'Bore', 'price' => 420.00],
        ['name' => 'Cyanures', 'price' => 250.00],
        ['name' => 'Fluorures', 'price' => 300.00],
        ['name' => 'Hydrogène sulfuré', 'price' => 2850.00],
        ['name' => 'Métaux lourds par ICP (Al, As, Ba, Cd, CrT, Cu, Fe, Mn, Ni, Pb, Se, Zn, Co, Mo, Sb, Sn, V) + Mercure', 'price' => 1500.00],
        ['name' => 'Trihalométhanes (THM)', 'price' => 2000.00],
        ['name' => 'Hydrocarbures aromatiques polycycliques (HAP)', 'price' => 150.00],
        ['name' => 'Analyses bactériologiques', 'price' => 250.00],
        ['name' => 'Coliformes totaux', 'price' => 250.00],
        ['name' => 'Escherichia coli', 'price' => 150.00],
        ['name' => 'Entérocoques intestinaux', 'price' => 60.00],
        ['name' => 'Clostridium sulfito-réducteurs', 'price' => 60.00],
        ['name' => 'Germes totaux à 22 °C', 'price' => 60.00],
        ['name' => 'Germes totaux à 37°C', 'price' => 60.00],
    ];

    public function definition()
    {
        // Randomly select an analysis from the array
        $analysis = $this->faker->randomElement($this->analyses);

        return [
            'name' => $analysis['name'],
            'price' => $analysis['price'],
        ];
    }
}
