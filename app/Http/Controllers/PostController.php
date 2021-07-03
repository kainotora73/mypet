<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;
use App\Models\Breakfast;
use App\Models\Lunch;
use App\Models\Dinner;
use DB;


class PostController extends Controller
{
    public function signup() {
        return view('signup');
    }



    public function puls() {
        $types = ['dog','cat','rabbit','hedgehog','turtle','birds','reptiles'];
        return view('puls')
            ->with(['types' => $types]);
    }
    public function store(Request $request) {

        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => '名前を入力してください'
        ]);
        $user = Auth::user();

        $pet = new Pet();
        $pet->name = $request->name;
        $pet->body = $request->body;
        $pet->user_id = $user->id;
        $pet->save();

        return redirect()
            ->route('home');
    }

    public function destroy(Pet $pet) {

        $pet->delete();

        return redirect()
            ->route('home');
    }
    public function morning(Request $request) {
        $id = $request->pet_id;
        $morning = Breakfast::where('id',
            (Breakfast::where('pet_id',$id)
                ->max('id'))
            )
            ->delete();
        return response()
            ->json();
    }
    public function noon(Request $request) {
        $id = $request->pet_id;
        $noon = Lunch::where('id',
            (Lunch::where('pet_id',$id)
                ->max('id'))
            )
            ->delete();
        return response()
            ->json();
    }
    public function night(Request $request) {
        $id = $request->pet_id;
        $night = Dinner::where('id',
            (Dinner::where('pet_id',$id)
                ->max('id'))
            )
            ->delete();
        return response()
            ->json();
    }
}
