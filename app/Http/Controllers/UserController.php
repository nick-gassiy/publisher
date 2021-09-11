<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Employee;
use App\Repositories\AuthorRepository;
use App\Repositories\EmployeesRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function createUser(Request $request){
        $repo = new UserRepository();
        $user = $repo->createUser(
            $request->get('email'),
            Hash::make($request->get('password')),
            $request->get('username')
        );
    }

    public function updateUser(Request $request,$id){
        $u = new UserRepository();
        $repo = new UserRepository($u->getById($id));
        $user = $repo->createUser(
            $request->get('email'),
            Hash::make($request->get('password')),
            $request->get('username')
        );
    }

    public function deleteUser($id){
        $u = new UserRepository();
        $u->deleteById($id);
    }

    public function getAuthors(){
        $authors =  Author::all();
        $isEmployee = true;
        return view('index',compact('authors','isEmployee'));

    }

    public function getAuthor(Request $request,$id){
        $a = new AuthorRepository();
        $a->getById($id);
    }

    public function createAuthor(Request $request){
        $ar = new AuthorRepository();
        $name = $request->get('name');
        $surname = $request->get('surname');
        $pseudonym = $request->get('pseudonym');
        $address = $request->get('address');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $userId = $request->get('userId');
        $ar->createAuthor($name,$surname,$pseudonym,$address,$email,$phone,$userId);
    }

    public function updateAuthor(Request $request,$id){
        $r = new AuthorRepository();
        $author = $r->getById($id);
        $ar = new AuthorRepository($author);
        $name = $request->get('name');
        $surname = $request->get('surname');
        $pseudonym = $request->get('pseudonym');
        $address = $request->get('address');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $userId = $request->get('userId');
        $ar->createAuthor($name,$surname,$pseudonym,$address,$email,$phone,$userId);
    }

    public function deleteAuthor(Request $request,$id){
        $ar = new AuthorRepository();
        $author = $ar->getById($id);
        $author->agreements->delete();
        $ar->deleteById($id);
        return redirect()->refresh();
    }

    public function getEmployees(){
        return Employee::all();
    }

    public function getEmployee(Request $request,$id){
        $e = new EmployeesRepository();
        $e->getById($id);
    }

    public function createEmployee(Request $request){
        $er = new EmployeesRepository();
        $name = $request->get('name');
        $surname = $request->get('surname');
        $address = $request->get('address');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $userId = $request->get('userId');
        $position_id = $request->get('position_id');
        $er->createEmployee($name,$surname,$address,$email,$phone,$userId,$position_id);
    }

    public function updateEmployee(Request $request,$id){
        $e = new EmployeesRepository();
        $er = new EmployeesRepository($e->getById($id));
        $name = $request->get('name');
        $surname = $request->get('surname');
        $address = $request->get('address');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $userId = $request->get('userId');
        $position_id = $request->get('position_id');
        $er->createEmployee($name,$surname,$address,$email,$phone,$userId,$position_id);
    }

    public function deleteEmployee(Request $request,$id){
        $e = new EmployeesRepository();
        $e->deleteById($id);
    }
}
