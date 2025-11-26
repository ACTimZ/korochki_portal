<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Проверка прав
        if (!$request->session()->get('is_admin')) {
            abort(403, 'Доступ запрещён');
        }

        $applications = Application::with('user')->get();

        return view('admin.index', compact('applications'));
    }

    public function updateStatus(Request $request, $id)
    {
        if (!$request->session()->get('is_admin')) {
            abort(403, 'Доступ запрещён');
        }

        $request->validate([
            'status' => 'required|in:new,in_progress,completed'
        ]);

        $app = Application::findOrFail($id);
        $app->status = $request->status;
        $app->save();

        return back()->with('success', 'Статус обновлён!');
    }
}
