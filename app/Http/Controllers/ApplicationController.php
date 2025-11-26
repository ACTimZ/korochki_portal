<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function create()
    {
        return view('applications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|min:3|max:255',
            'start_date' => 'required|date',
            'payment_method' => 'required|in:cash,phone_transfer',
        ]);

        Application::create([
            'user_id' => $request->session()->get('user_id'),
            'course_name' => $request->course_name,
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

        return view('applications.index', compact('applications'));
    }

    public function addReview(Request $request, $id)
    {
        $request->validate([
            'review' => 'required|min:5'
        ]);

        $app = Application::findOrFail($id);

        // защита: нельзя оставлять отзыв на чужую заявку
        if ($app->user_id != $request->session()->get('user_id')) {
            abort(403, 'Нет доступа');
        }

        $app->review = $request->review;
        $app->save();

        return back()->with('success', 'Отзыв добавлен!');
    }
}
