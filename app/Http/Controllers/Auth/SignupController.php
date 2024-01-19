<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SignupIP;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SignupController extends Controller
{
    private $defaultImage = [
        "user/image/1.jpg", "user/image/2.jpg", "user/image/3.jpg",
        "user/image/4.jpg", "user/image/5.jpg", "user/image/6.jpg",
        "user/image/7.jpg", "user/image/8.jpg", "user/image/9.jpg",
        "user/image/10.jpg", "user/image/11.jpg", "user/image/12.jpg",
        "user/image/13.jpg", "user/image/14.jpg", "user/image/15.jpg",
        "user/image/16.jpg", "user/image/17.jpg", "user/image/18.jpg",
        "user/image/19.jpg", "user/image/20.jpg", "user/image/21.jpg",
        "user/image/22.jpg", "user/image/23.jpg", "user/image/24.jpg",
        "user/image/25.jpg", "user/image/26.jpg", "user/image/27.jpg",
        "user/image/28.jpg", "user/image/29.jpg", "user/image/30.jpg"
    ];

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'userName' => ['required', 'string', 'max:36', 'min:3'],
            'userMail' => ['required', 'string', 'email', 'max:255', 'unique:q_user,email'],
            'userPass' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(Request $request)
    {
        $data = $request->all();
        $this->validator($data)->validate();
        $ip = $request->ip();
        $MentionName = $this->extractMentionName($data['userName']);
        $idUrl = $MentionName;
        $EncPass = Hash::make($data['userPass']);
        $Md5Pass = md5($data['userPass']);
        
        $user = User::create([
          "id_user" => Str::orderedUuid(),
          'id_url' => $idUrl, "mention_name" => $MentionName, 
          "full_name" => $data['userName'], "email" => $data['userMail'], 
          "password" => $EncPass, "md5_pass" => $Md5Pass, 
          "image" => $this->defaultImage[rand(0, 29)]
        ]);
        Log::info(json_encode($user));
        SignupIP::create(["id_user"=>$user->id_user, "ipAdd"=>$ip]);
        return  [
          "state" => "ok",
          "user_name" => $MentionName
        ];
    }
  public function extractMentionName(string $UserName){
    $canditate =  preg_replace('~[^\\pL0-9_]+~u', ' ', $UserName); 
    $count = User::where('mention_name', '=', $canditate)->count();
    if($count == 0){
      return $canditate ;
    }else{
      return $this->extractMentionName($canditate."-".$count);
    }
  }
}
