<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditInfoRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Activity;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar as FacadesDebugbar;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Js;
use Nette\Utils\Json;
use phpDocumentor\Reflection\Types\Parent_;
use PhpParser\Node\Stmt\Echo_;
use PhpParser\Node\Stmt\TryCatch;
use Throwable;

use function PHPUnit\Framework\returnSelf;

class AuthController extends Controller
{
    protected $userModel;
    public function __construct()
    {
        Parent::__construct();
        $this->activityModel = new Activity();
        $this->userModel = new User();
    }
    public function insertActivity($message)
    {
        $activity = session("user")->first_name . " " . session("user")->last_name . " $message";
        $this->activityModel->name = $activity;
        $this->activityModel->created_at = now();
        $this->activityModel->save();
    }
    public function login(Request $request)
    {
        $user = $this->userModel->loginUser($request);
        if ($user) {
            session()->put("user", $user);
            $this->insertActivity("has logged in");
            return Json::encode(1);
        } else {
            return Json::encode(0);
        }
    }
    public function register(RegisterRequest $request)
    {
        $user = $this->userModel->insertUser($request);
        session()->put("user", $user);
        $this->insertActivity("has registrated");
        return Json::encode(1);
    }
    public function logout()
    {
        $this->insertActivity("has logged out");
        session()->flush("user");
        return redirect()->route("index");
    }
    public function editInfo(EditInfoRequest $request)
    {
        $user = $this->userModel->find(session("user")->id);
        session()->flush("user");
        $fields = ["email", "address", "phone"];
        foreach ($fields as $field) {
            $user->$field = $request->$field;
        }
        $user->save();
        session()->put("user", $user);
        $this->insertActivity("has changed info");
        return Json::encode(1);
    }
}
