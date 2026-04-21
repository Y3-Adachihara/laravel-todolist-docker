<?php

namespace App\Http\Controllers\Todolist\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->firstOrFail();
        $user->delete();
        return redirect()->route('todolist');
    }
}
