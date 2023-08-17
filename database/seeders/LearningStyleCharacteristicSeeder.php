<?php

namespace Database\Seeders;

use App\Models\LearningStyleCharacteristic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LearningStyleCharacteristicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LearningStyleCharacteristic::insert([
            // style id 1=Independiente
            [
                "learning_style_id"=>"1",
                "characteristic_es"=>"Valoro la autonomía en el aprendizaje.",
                "characteristic_en"=>"I value autonomy in learning.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "learning_style_id"=>"1",
                "characteristic_es"=>"Me gusta descubrir por mí mismo.",
                "characteristic_en"=>"I like to discover for myself.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "learning_style_id"=>"1",
                "characteristic_es"=>"Suelo ser introspectivo.",
                "characteristic_en"=>"I tend to be introspective.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],


            // style id 2=Evitativo
            [
                "learning_style_id"=>"2",
                "characteristic_es"=>"Puedo sentirme abrumado por los desafíos.",
                "characteristic_en"=>"I can feel overwhelmed by challenges.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "learning_style_id"=>"2",
                "characteristic_es"=>"A menudo postergo las tareas.",
                "characteristic_en"=>"I often postpone tasks.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "learning_style_id"=>"2",
                "characteristic_es"=>"Puedo ser indiferente o desinteresado.",
                "characteristic_en"=>"I can be indifferent or disinterested.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],


            // Learning style id 3=•	Colaborativo
            [
                "learning_style_id"=>"3",
                "characteristic_es"=>"Aprendo a través de la interacción.",
                "characteristic_en"=>"I learn through interaction.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "learning_style_id"=>"3",
                "characteristic_es"=>"Valoro las opiniones de los demás.",
                "characteristic_en"=>"I value the opinions of others.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "learning_style_id"=>"3",
                "characteristic_es"=>"Soy un buen oyente.",
                "characteristic_en"=>"I am a good listener.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],


            // Learning style id 4=Dependiente
            [
                "learning_style_id"=>"4",
                "characteristic_es"=>"Necesito instrucciones claras.",
                "characteristic_en"=>"I need clear instructions.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "learning_style_id"=>"4",
                "characteristic_es"=>"Busco la aprobación de los tutores.",
                "characteristic_en"=>"I seek the approval of the tutors.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "learning_style_id"=>"4",
                "characteristic_es"=>"Puedo ser pasivo en mi aprendizaje.",
                "characteristic_en"=>"I can be passive in my learning.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],


            // Learning style id 4=Competitivo
            [
                "learning_style_id"=>"5",
                "characteristic_es"=>"Estoy orientado a logros.",
                "characteristic_en"=>"I am achievement oriented.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "learning_style_id"=>"5",
                "characteristic_es"=>"Busco reconocimiento.",
                "characteristic_en"=>"I seek recognition.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "learning_style_id"=>"5",
                "characteristic_es"=>"Puedo ser argumentativo.",
                "characteristic_en"=>"I can be argumentative.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],




            // Learning style id 6=Participativo
            [
                "learning_style_id"=>"6",
                "characteristic_es"=>"Aprendo haciendo.",
                "characteristic_en"=>"I learn by doing.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "learning_style_id"=>"6",
                "characteristic_es"=>"Busco aplicar lo aprendido.",
                "characteristic_en"=>"I seek to apply what I have learned.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "learning_style_id"=>"6",
                "characteristic_es"=>"Soy activo y dinámico.",
                "characteristic_en"=>"I am active and dynamic.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],



        ]);
    }
}
