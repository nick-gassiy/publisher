<?php

namespace App\Repositories;

use App\Models\Book;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class BookRepository.
 */
class BookRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Book::class;
    }
    private $book;

    public function __construct(Book $book = null)
    {
        if(isset($book))
            $this->book = $book;
        else
            $this->book = new Book();
    }


    public function deleteById($id): bool
    {
        return $this->book->find($id)->delete();
    }

    public function getById($id, array $columns = ['*'])
    {
        return $this->book->find($id)->first();
    }



    public function createBook($name,$description,$page,$year,$genre_id ,$employee_id,$userId){
        $this->book->name = $name;
        $this->book->description = $description;
        $this->book->page = $page;
        $this->book->year = $year;
        $this->book->genre_id = $genre_id;
        $this->book->employee_id = $employee_id;
        $this->book->author_id = $userId;
        $this->book->save();
        return $this->book;
    }


    public function updateBook($name,$description,$page,$year,$genre_id,$employee_id,$user_id){
        isset($name) ? $this->book->name=$name : null;
        isset($description) ? $this->book->description=$description : null;
        isset($page) ? $this->book->page=$page : null;
        isset($year) ? $this->book->year=$year : null;
        isset($genre_id) ? $this->book->genre_id=$genre_id : null;
        isset($employee_id) ? $this->book->employee_id=$employee_id : null;
        isset($user_id) ? $this->book->user_id=$user_id : null;
        $this->book->update();
        return $this->book;
    }


}
