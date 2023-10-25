<?php

namespace App\Http\Controllers;

use App\Models\LearningStyle;
use App\Models\Question;
use App\Models\TeachingStylePreference;
use App\Models\User;
use App\Models\UserResponse;
use Illuminate\Http\Request;

class AdminGroupingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $groups = [];

        if($request->total_students){

            $total_students=$request->total_students;

            if($total_students<1){
                $total_students=5;
            }

            $groups = $this->makeGroups($request->total_students);
        }


        $tutors = User::role('tutor')->where("is_survey_completed", 1)->count();
        $students = User::role('student')->where("is_survey_completed", 1)->count();


        return view("admin.grouping.index", compact("groups", "tutors", "students"));
    }


    public function makeGroups($total_students)
    {

        $students = User::role('student')->where("is_survey_completed", 1)->get();
        $tutors = User::role('tutor')->where("is_survey_completed", 1)->get();

        $teachingStylePreferences = TeachingStylePreference::all();

        $groups = [];

        $tutorsGroup = [];


        $questions = Question::where("type", "tutor")->get();
        $learningStyles = LearningStyle::with(["recommendedTechniques", "characteristics"])->get();

        $userResponses = UserResponse::whereHas("question")->with('question')->get();

        foreach ($tutors as $tutor) {


            $learningStyle = $tutor->userLearningStyle('tutor', $questions, $learningStyles, $userResponses)["learning_style"];

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

            $learningStyle = $student->userLearningStyle('student', $questions, $learningStyles, $userResponses)["learning_style"];


            if ($learningStyle) {

                $preferedTeachingStyles = $teachingStylePreferences->where("learning_style_id", $learningStyle->id)->pluck("teaching_style_id")->toArray();


                foreach ($preferedTeachingStyles as $preferedTeachingStyle) {

                    if (isset($tutorsGroup[$preferedTeachingStyle])) {

                        foreach ($tutorsGroup[$preferedTeachingStyle] as $tutorGroup) {


                            $tutor = $tutorGroup;

                            if (isset($groups[$tutor["tutor_id"]]) && count($groups[$tutor["tutor_id"]]['students']) >= $total_students) {

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

        // add those tutors who don't have any students

        foreach ($tutors as $tutor) {

            if (!isset($groups[$tutor->id])) {


                $groups[$tutor->id]['tutor_id'] = $tutor->id;
                $groups[$tutor->id]['tutor_name'] = $tutor->name;
                $groups[$tutor->id]['tutor_learning_style_id'] = $learningStyle->id;
                $groups[$tutor->id]['tutor_learning_style_name'] = $learningStyle->style_en;
                $groups[$tutor->id]['students'] = [];

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
