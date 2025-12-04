<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Leson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function create()
    {
        return view('applications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'leson_id' => 'required|in:1,2,3',
            'start_date' => 'required|date',
            'payment_method' => 'required|in:cash,phone_transfer',
        ]);

        Application::create([
            'user_id' => $request->session()->get('user_id'),
            'leson_id' => $request->leson_id,
            'start_date' => $request->start_date,
            'payment_method' => $request->payment_method,
            'status' => 'new'
        ]);

        return redirect('/applications')->with('success', 'Заявка успешно отправлена!');
    }

    public function index(Request $request)
    {
        $userId = $request->session()->get('user_id');

        $applications = Application::where('user_id', $userId)->get();
        // return dd($applications);
        $lesons = DB::table('lesons')->get();

        return view('applications.index', compact('applications', 'lesons'));
    }

    public function addReview(Request $request, $id)
    {
        $request->validate([
            'review' => 'required|min:5'
        ]);

        $app = Application::findOrFail($id);

        if ($app->user_id != $request->session()->get('user_id')) {
            abort(403, 'Нет доступа');
        }

        $app->review = $request->review;
        $app->save();

        return back()->with('success', 'Отзыв добавлен!');
    }
}
