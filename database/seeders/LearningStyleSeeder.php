<?php

namespace Database\Seeders;

use App\Models\LearningStyle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LearningStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        LearningStyle::insert([
            [
                "style_en" => "Independent",
                "style_es" => "Independiente",
                "type" => "student",
                "info_es"=>"Te gusta pensar por ti mismo. Eres autónomo y confiado en tu aprendizaje. Decides lo que es importante y lo que no lo es, y te gusta trabajar de manera solitaria. Evitas el trabajo en equipo.",
                "info_en"=>"You like to think for yourself. You are autonomous and confident in your learning. You decide what is important and what is not, and you like to work alone. You avoid teamwork.",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "style_es"=>"Evitativo",
                "style_en"=>"Evitativo",
                "type"=>"student",
                "info_es"=>"No manifiestas entusiasmo en clase. No participas y te mantienes aislado. Eres apático y desinteresado en las actividades escolares. No te gusta estar mucho tiempo en el aula.",
                "info_en"=>"You do not show enthusiasm in class. You do not participate and you keep yourself isolated. You are apathetic and uninterested in school activities. You don't like to spend a lot of time in the classroom.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "style_es" => "Colaborativo",
                "style_en" => "Collaborative",
                "type" => "student",
                "info_es"=>"Te gusta aprender compartiendo ideas y talentos. Gustas de trabajar con tus compañeros y con tus profesores.",
                "info_en"=>"You like to learn by sharing ideas and talents. You like to work with your classmates and with your teachers.",
                "created_at" => now(),
                "updated_at" => now()
            ],

            [
                "style_es"=>"Dependiente",
                "style_en"=>"Dependiente",
                "type"=>"student",
                "info_es"=>"Manifiestas poca curiosidad intelectual y aprendes solo lo que tienes que aprender. Visualizas a los profesores y a tus compañeros como figuras de guía o autoridad para realizar tus actividades.",
                "info_en"=>"You show little intellectual curiosity and learn only what you have to learn. You visualize teachers and your classmates as guiding or authoritative figures to carry out your activities.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "style_es"=>"Competitivo",
                "style_en"=>"Competitive",
                "type"=>"student",
                "info_es"=>"Estudias para demostrar tu supremacía en términos de aprovechamiento o calificación. Te gusta ser el centro de atención y recibir reconocimiento de tus logros.",
                "info_en"=>"You study to demonstrate your supremacy in terms of performance or grade. You like to be the center of attention and receive recognition for your achievements.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "style_es"=>"Participativo",
                "style_en"=>"Participative",
                "type"=>"student",
                "info_es"=>"Eres un buen elemento en clase, disfrutas la sesión y procuras estar al pendiente la mayor parte del tiempo. Tienes mucha disposición para el trabajo escolar.",
                "info_en"=>"You are a good element in class, you enjoy the session and try to be aware most of the time. You are very willing to do school work.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "style_es"=>"Experto",
                "style_en"=>"Expert",
                "type"=>"tutor",
                "info_es"=>"Eres tutor que posee el conocimiento y la experiencia que los estudiantes requieren. Mantienes tu estatus entre tus estudiantes porque dominas los detalles de la disciplina que impartes. Además, retas a tus estudiantes mediante la competencia entre ellos y partes del supuesto de que tus pupilos necesitan ser preparados por alguien como tú.",
                "info_en"=>"You are a tutor who possesses the knowledge and experience that students require. You maintain your status among your students because you master the details of the discipline you teach. In addition, you challenge your students through competition between them and you assume that your pupils need to be prepared by someone like you.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "style_es"=>"Autoridad Formal",
                "style_en"=>"Formal Authority",
                "type"=>"tutor",
                "info_es"=>"Te refieres al tutor que mantiene su estatus entre los estudiantes por su conocimiento y, desde luego, dentro de la escuela. Ofreces retroalimentación eficaz a los estudiantes basada en los objetivos del curso, tus expectativas y mediante los reglamentos institucionales. Cuidas mucho la normatividad correcta y aceptable dentro de la escuela y ofreces un conocimiento estructurado a tus pupilos.",
                "info_en"=>"You refer to the tutor who maintains his status among the students for his knowledge and, of course, within the school. You offer effective feedback to students based on course objectives, your expectations and through institutional regulations. You take great care of the correct and acceptable regulations within the school and offer structured knowledge to your pupils.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "style_es"=>"Modelo Personal",
                "style_en"=>"Personal Model",
                "type"=>"tutor",
                "info_es"=>"Eres el tutor que cree ser el “ejemplo para tus estudiantes” y que por medio de tu propio desempeño les muestras a ellos las formas adecuadas para pensar y comportarse. Eres meticuloso y ordenado, y por medio de tu persona motivas a tus pupilos a emular tu propio comportamiento.",
                "info_en"=>"You are the tutor who believes to be the “example for your students” and that through your own performance you show them the appropriate ways to think and behave. You are meticulous and orderly, and through your person you motivate your pupils to emulate your own behavior.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "style_es"=>"Facilitador",
                "style_en"=>"Facilitator",
                "type"=>"tutor",
                "info_es"=>"Eres aquel tutor que guía a los estudiantes hacia el aprendizaje mediante cuestionamientos alternativos y toma de decisiones. Destacas el desarrollo de los estudiantes con miras a la independencia, la iniciativa y la responsabilidad. Gustas del trabajo por medio de proyectos o problemas que permiten a los estudiantes aprender por su cuenta y en los que tu función es solo de asesoría.",
                "info_en"=>"You are the tutor who guides students towards learning through alternative questioning and decision making. You highlight the development of students with a view to independence, initiative and responsibility. You like to work through projects or problems that allow students to learn on their own and in which your role is only advisory.",
                "created_at"=>now(),
                "updated_at"=>now()
            ],
            [
                "style_es"=>"Delegador",
                "style_en"=>"Delegator",
                "type"=>"tutor",
                "info_es"=>"Eres aquel tutor que le da libertad al alumno para ser lo más autónomo posible. Motivas a los estudiantes a trabajar en proyectos de manera independiente o en pequeños equipos. Funges solamente como consultor del proyecto.",
                "info_en"=>"You are the tutor who gives the student freedom to be as autonomous as possible. You motivate students to work on projects independently or in small teams. You only serve as a project consultant.",
                "created_at"=>now(),
                "updated_at"=>now()
            ]
        ]);
    }
}
