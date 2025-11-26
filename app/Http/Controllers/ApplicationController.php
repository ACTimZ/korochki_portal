<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    // Показываем форму создания заявки
    public function create()
    {
        return view('applications.create');
    }

    // Сохраняем новую заявку
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

    // Список заявок текущего пользователя
    public function index(Request $request)
    {
        $userId = $request->session()->get('user_id');

        $applications = Application::where('user_id', $userId)->get();

        return view('applications.index', compact('applications'));
    }

    // Добавление отзыва на заявку
    public function addReview(Request $request, $id)
    {
        $request->validate([
            'review' => 'required|min:5'
        ]);

        $app = Application::findOrFail($id);

        // Проверка: пользователь может оставлять отзыв только на свою заявку
        if ($app->user_id != $request->session()->get('user_id')) {
            abort(403, 'Нет доступа');
        }

        $app->review = $request->review;
        $app->save();

        return back()->with('success', 'Отзыв добавлен!');
    }
}
