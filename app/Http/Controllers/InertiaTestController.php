<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Models\InertiaTest;

class InertiaTestController extends Controller
{
    public function index() {
        return Inertia::render('Inertia/Index', [
            'blogs' => DB::table('inertia_tests')->get()
        ]);
    }

    public function create() {
        return Inertia::render('Inertia/Create');
    }

    public function show($id) {
        return Inertia::render('Inertia/Show', [
            'id' => $id,
            'blog' => InertiaTest::findOrFail($id)
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'title' => ['required','max:20'],
            'content' => ['required']
        ]);
        DB::table('inertia_tests')->insert([
            'titile' => $request->title,
            'content' => $request->content
        ]);

        return to_route('inertia.index')->with('message','登録しました。');
    }

    public function delete($id) {
        InertiaTest::where('id',$id)->delete();
        return to_route('inertia.index')->with('message','削除しました。');
    }
}
