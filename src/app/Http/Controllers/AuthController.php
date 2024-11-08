<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use App\Http\Requests\PiglyRequest;

class AuthController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $logs = WeightLog::UserIdSearch($user->id)->paginate(8);
        $target = WeightTarget::UserIdSearch($user->id)->latest('id')->first()->target_weight;
        $weight = WeightLog::latest('date')->first()->weight;
        return view('index', compact('weight', 'target', 'user', 'logs'));
    }

    public function register2()
    {
        $user = Auth::user();
        return view('auth.register2', compact('user'));
    }

    public function setInit(PiglyRequest $request)
    {
        $request->merge(['date' => now()->format('Y-m-d')]);
        $weight = $request->only(['user_id', 'weight', 'date']);
        $target_weight = $request->only(['user_id', 'target_weight']);
        WeightLog::create($weight);
        WeightTarget::create($target_weight);
        return redirect('/weight_logs');
    }

    public function createLog(PiglyRequest $request)
    {
        $weight = $request->only(['user_id', 'date', 'weight', 'calories', 'exercise_time', 'exercise_content']);
        WeightLog::create($weight);
        return redirect('/weight_logs');
    }

    public function searchLog(Request $request)
    {
        $user = Auth::user();
        $weight = WeightLog::latest('date')->first()->weight;
        $target = WeightTarget::UserIdSearch($user->id)->latest('id')->first()->target_weight;
        $logs = WeightLog::whereDate('date', '>', $request->dateStart)->whereDate('date', '<', $request->dateEnd)->paginate(8);
        return view('index', compact('weight', 'target', 'user', 'logs'));
    }

    public function detailLog(Request $request)
    {
        $user = Auth::user();
        $log = WeightLog::where('id', $request->weightLogId)->first();
        return view('update', compact('log', 'user'));
    }

    public function updateLog(PiglyRequest $request)
    {
        $log = $request->only(['date', 'weight', 'calories', 'exercise_time', 'exercise_content']);
        WeightLog::find($request->id)->update($log);
        return redirect('/weight_logs');
    }

    public function deleteLog(Request $request)
    {
        WeightLog::find($request->weightLogId)->delete();
        return redirect('/weight_logs');
    }

    public function setGoal()
    {
        $user = Auth::user();
        $target = WeightTarget::where('id', $user->id)->first();
        return view('goal', compact('target', 'user'));
    }

    public function updateGoal(PiglyRequest $request)
    {
        $target = $request->all();
        unset($target['_token']);
        WeightTarget::where('id', $request->id)->update($target);
        return redirect('/weight_logs');
    }
}
