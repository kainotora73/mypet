<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;


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
}
