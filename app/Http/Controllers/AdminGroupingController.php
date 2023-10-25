<?php

namespace App\Http\Controllers;

use App\Models\LearningStyle;
use App\Models\Question;
use App\Models\TeachingStylePreference;
use App\Models\User;
use Illuminate\Http\Request;

class AdminGroupingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = $this->makeGroups();

        return view("admin.grouping.index", compact("groups"));
    }


    public function makeGroups()
    {

        $students = User::role('student')->where("is_survey_completed", 1)->take(10)->get();
        $tutors = User::role('tutor')->where("is_survey_completed", 1)->take(10)->get();

        $teachingStylePreferences = TeachingStylePreference::all();

        $groups = [];

        $tutorsGroup = [];


        $questions = Question::where("type", "tutor")->get();
        $learningStyles=LearningStyle::all();


        foreach ($tutors as $tutor) {


            $learningStyle = $tutor->userLearningStyle('tutor',$questions,$learningStyles)["learning_style"];

            if ($learningStyle) {
                $tutorsGroup[$learningStyle->id][] = [
                    "name" => $tutor->name,
                    "tutor_id" => $tutor->id,
                    "learning_style_id" => $learningStyle->id,
                    "learning_style_name" => $learningStyle->style_en
                ];
            }
        }



        $questions = Question::where("type", "student")->get();


        foreach ($students as $student) {

            $learningStyle = $student->userLearningStyle('student',$questions,$learningStyles)["learning_style"];


            if ($learningStyle) {

                $preferedTeachingStyles = $teachingStylePreferences->where("learning_style_id", $learningStyle->id)->pluck("teaching_style_id")->toArray();


                foreach ($preferedTeachingStyles as $preferedTeachingStyle) {

                    if (isset($tutorsGroup[$preferedTeachingStyle])) {

                        foreach ($tutorsGroup[$preferedTeachingStyle] as $tutorGroup) {


                            $tutor = $tutorGroup;

                            if (isset($groups[$tutor["tutor_id"]]) && count($groups[$tutor["tutor_id"]]['students']) >= 5) {

                                continue;
                            }


                            $groups[$tutor["tutor_id"]]['tutor_id'] = $tutor["tutor_id"];
                            $groups[$tutor["tutor_id"]]['tutor_name'] = $tutor["name"];
                            $groups[$tutor["tutor_id"]]['tutor_learning_style_id'] = $tutor["learning_style_id"];
                            $groups[$tutor["tutor_id"]]['tutor_learning_style_name'] = $tutor["learning_style_name"];



                            $groups[$tutor["tutor_id"]]["students"][] = [
                                "student_id" => $student->id,
                                "student_name" => $student->name,
                                "learning_style_id" => $learningStyle->id,
                                "learning_style_name" => $learningStyle->style_en,
                                "tutor_id" => $tutor["tutor_id"],
                                "tutor_name" => $tutor["name"],
                            ];
                            break;
                        }
                        break;
                    }
                }
            }
        }

        return $groups;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
