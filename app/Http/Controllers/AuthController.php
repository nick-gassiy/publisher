<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Employee;
use App\Models\Role;
use App\Models\Supplies;
use App\Models\User;
use App\Repositories\AuthorRepository;
use App\Repositories\BookRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Symfony\Component\String\b;

class AuthController extends Controller
{
    public function register(Request $request){
        $repo = new UserRepository();
        $user = $repo->createUser(
            $request->get('email'),
            Hash::make($request->get('password')),
            $request->get('username')
        );
        Auth::login($user);
        return "";
    }

    public function login(Request $request){
        $user = User::where('email', $request->get('email'))->get();
        if (isset($user)){
            if(Hash::make($request->get('password')) == $user->password){
                Auth::login($user);
                return "";
            }else{
                return null;
            }
        }else{
            return null;
        }
    }

    public function logout(){
        Auth::logout();
        return "";
    }

    public function test(){
        $books = Book::whereLike('author.name','Рей')->get();
        dd($books);
    }
}
