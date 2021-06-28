<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Breakfast;
use App\Models\Lunch;
use App\Models\Dinner;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $auths = Auth::id();
        $pets = Pet::where('user_id',$auths)->get();

        return view('home')
            ->with(['pets' => $pets]);
    }
    public function breakfast(Request $request){


        $breakfast = new Breakfast();
        $breakfast->user_id = Auth::user()->id;
        $breakfast->pet_id = $request->pet_id;
        $breakfast->date = date('Y-m-d');
        $breakfast->time = date('H:i');
        $breakfast->save();

        $mealtime= $breakfast->time;
        $json = '朝ごはん '.$mealtime.' 完了';
        return response()
            ->json($json);
    }
    public function lunch(Request $request){

        $lunch = new Lunch();
        $lunch->user_id = Auth::user()->id;
        $lunch->pet_id = $request->pet_id;
        $lunch->date = date('Y-m-d');
        $lunch->time = date('H:i');
        $lunch->save();

        $mealtime= $lunch->time;
        $json = '昼ごはん '.$mealtime.' 完了';
        return response()
            ->json($json);
    }
    public function dinner(Request $request){

        $dinner = new Dinner();
        $dinner->user_id = Auth::user()->id;
        $dinner->pet_id = $request->pet_id;
        $dinner->date = date('Y-m-d');
        $dinner->time = date('H:i');
        $dinner->save();

        $mealtime= $dinner->time;
        $json = '夜ごはん '.$mealtime.' 完了';
        return response()
            ->json($json);
    }

    public function chart(Request $request){
        $id = $request->pet_id;
        $breakfast = Breakfast::select(
            DB::raw('breakfasts.date'),
            DB::raw('breakfasts.time as breakfast'),
            DB::raw('lunches.time as lunch'),
            DB::raw('dinners.time as dinner'),
        )
            ->join('lunches','breakfasts.date','=','lunches.date')
            ->join('dinners','breakfasts.date','=','dinners.date')
            ->where('breakfasts.pet_id',$id)
            ->where('lunches.pet_id',$id)
            ->where('dinners.pet_id',$id)
            ->get();


        $json = [['日付','朝ごはん','昼ごはん','夜ごはん']];
        foreach($breakfast as $key => $val){
            $json[++$key] = [(string)$val->date,
                array_map('intval',explode(':',$val->breakfast)),
                array_map('intval',explode(':',$val->lunch)),
                array_map('intval',explode(':',$val->dinner))
            ];
        };

        return response()
            ->json($json);
    }

}

