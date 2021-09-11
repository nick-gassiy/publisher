<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genres;
use App\Repositories\BookRepository;
use App\Repositories\GenresRepository;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        //todo
    }

    public function myBooks(){
        $books = Book::where('author_id',
            Author::where('user_id',4)->first()->id
        )->get();
        return view('index',compact('books'));

    }

    public function getBook($id){
        $br = new BookRepository();
        $book = $br->getById($id);
        return view('examples',compact('book'));
    }

    public function getAllBooks(Request $request){
        $filter=  $request->get('filter');
        $books = Book::class;
        if (isset($filter)){
            foreach ($filter as $k => $v){
                switch ($k){
                    case 'author':
                        $books = parent::queryFilter($books,'author.name',$v);
                        break;
                    case 'genre':
                        $books = parent::queryFilter($books,'genre.name',$v);
                        break;
                    case 'book':
                        $books = parent::queryFilter($books,'employee.name',$v);
                        break;
                }
            }
            $books = $books->get();
        }else{
            $books = Book::all();
        }
        $isEmployee = true;

        return view('index',compact('books','isEmployee'));

    }

    public function createBook(Request $request){
        $br = new BookRepository();
        $name = $request->get('name');
        $description = $request->get('description');
        $page = $request->get('page');
        $year = $request->get('year');
        $genre_id = $request->get('genre_id');
        $employee_id = $request->get('employee_id');
        $userId = $request->get('userId');
        $br->createBook($name,$description,$page,$year,$genre_id ,$employee_id,$userId);
    }

    public function updateBook(Request $request,$id){
        $r = new BookRepository();
        $book = $r->getById($id);
        $br = new BookRepository($book);
        $name = $request->get('name');
        $description = $request->get('description');
        $page = $request->get('page');
        $year = $request->get('year');
        $genre_id = $request->get('genre_id');
        $employee_id = $request->get('employee_id');
        $userId = $request->get('userId');
        $br->updateBook($name,$description,$page,$year,$genre_id ,$employee_id,$userId);
    }

    public function deleteBook(Request $request,$id){
        $br = new BookRepository();
        $br->deleteById($id);
        return redirect()->refresh();
    }


}
