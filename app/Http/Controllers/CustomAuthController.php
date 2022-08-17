<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\User;
use App\Models\Maisonneuve;
use App\Models\Ville;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Session;
use Mail;
use Illuminate\Support\str;
//use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.registration');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (!Auth::validate($credentials)) :
            return redirect('login')->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember'));

        return redirect()->intended('dashboard')->withSuccess('Connecté');
    }

    public function dashboard()
    {
        $blog = new BlogPost;
        $blogs = $blog->selectBlogs(Auth::user()->id);
        // echo "<pre>";
        // var_dump($blogs[1]->body, $blogs[1]->nom);
        // die;
        $name = "Invité";
        if (Auth::check()) {
            $name = Maisonneuve::Select('maisonneuves.nom')
                ->JOIN('users', 'maisonneuves.users_id', '=', 'users.id')
                ->WHERE("maisonneuves.id", Auth::user()->id)
                ->get();
            // $name = Auth::user()->name;
            return view('maisonneuve.dashboard', ['name' => $name[0]->nom, 'id' => Auth::user()->id, 'blogs' => $blogs]);
        }

        return view('maisonneuve.dashboard', ['name' => $name]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect(route('maisonneuve'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:10'
        ]);
        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        $to_name = $request->name;
        $to_email = $request->email;
        $body = "<a href='http://localhost:8000'> Clique ici pour confirmer votre compte</a>";

        Mail::send(
            'email.mail',
            $data = ['name' => $to_name, 'body' => $body],
            function ($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject('Test Laravel');
            }
        );

        return redirect(route('login'));
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function tempPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        if (User::where('email', $request->email)->exists()) {
            $user =  User::where('email', $request->email)->get();
            $user = $user[0];
            $userId = $user->id;
            $tempPass = str::random(50);
            $user->temp_password = $tempPass;
            $user->save();

            //return $tempPass;

            $to_name = $user->name;
            $to_email = $request->email;
            $body = "<a href='http://localhost:8000/new-password/" . $userId . "/" . $tempPass . "'>Cliquez ici pour reinitialiser votre mot de passe</a>";

            Mail::send(
                'email.mail',
                $data = ['name' => $to_name, 'body' => $body],
                function ($message) use ($to_name, $to_email) {
                    $message->to($to_email, $to_name)->subject('Reinitialiser votre mot de passe');
                }
            );

            return redirect()->back()->withSuccess("SVP verifiez votre courriel");
        }
        return redirect()->back()->withErrors('Username does not exist');
    }

    public function newPassword(User $user, $tempPassword)
    {
        if ($user->temp_password === $tempPassword) {
            return view('auth.new-password');
        }
        return redirect(route('forgot.password'))->withErrors('Credential does not match');
    }

    public function storeNewPassword(User $user, $tempPassword, Request $request)
    {
        if ($user->temp_password === $tempPassword) {
            $request->validate([
                'password' => 'required|min:6|max:10'
            ]);
            $user->password = Hash::make($request->password);
            $user->temp_password = NULL;
            $user->save();
            return redirect(route('login'));
        }
        return redirect(route('forgot.password'))->withErrors('Credential does not match');
    }
}
