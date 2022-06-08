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
    public function definition()
    {
        return [
            'title' =>function(){
                $titles = ['Işıltılı Güneş', 'Modern Çağ', 'Trans Atlantik', 'Kral Avizesi', 'Şatafatlı Avizesi',
                    'Şehzade Avizesi', "Furkan'ın Favorisi", "Seyit'in Favorisi", "Mustafa'nın Favorisi",
                    "Semih Abinin Favorisi", "Işıltılı Geceler", "Ay Işığı", "Gece Baykuşu", "Çöl Kartalı",
                    "Afrika Kaplanı", "Kutup Ayısı", "Hint İneği", "Çin Pangolini", "Türk Baklavası", "Türk Kahvesi",
                    "Anadolu'nun Şatafatı", "Firevun Avizesi"];
                $rnd = random_int(0, count($titles) - 1);
                return $titles[$rnd];
            },
            'category' => function(){
                $rnd = random_int(0, 2);
                $category = ['Modern', 'Antika', 'Deneme'];
                return $category[$rnd];
            },
            'materials' => "asdasdasda, asdasda,a asdasdasda, asdasda, asdasd asdasda",
            'negotiable' => function(){ return random_int(0, 1); },
            'date_of_manufacture' => $this->faker->dateTime,
        ];
    }
}
