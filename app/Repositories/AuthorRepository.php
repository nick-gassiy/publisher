<?php

namespace App\Repositories;

use App\Models\Author;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class AuthorRepository.
 */
class AuthorRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Author::class;
    }
    private $author;

    public function __construct(Author $author = null)
    {
        if(isset($author))
            $this->author = $author;
        else
        $this->author = new Author();
    }


    public function deleteById($id): bool
    {
        return $this->author->find($id)->delete();
    }

    public function getById($id, array $columns = ['*'])
    {
        return $this->author->find($id)->first();
    }



    public function createAuthor($name,$surname,$pseudonym,$address,$email,$phone,$userId){
        $this->author->name = $name;
        $this->author->surname = $surname;
        $this->author->pseudonym = $pseudonym;
        $this->author->address = $address;
        $this->author->email = $email;
        $this->author->phone = $phone;
        $this->author->user_id = $userId;
        $this->author->save();
        return $this->author;
    }


    public function updateAuthor($name,$surname,$pseudonym,$address,$email,$phone){
        isset($name) ? $this->author->name=$name : null;
        isset($surname) ? $this->author->surname=$surname : null;
        isset($pseudonym) ? $this->author->pseudonym=$pseudonym : null;
        isset($address) ? $this->author->address=$address : null;
        isset($email) ? $this->author->email=$email : null;
        isset($phone) ? $this->author->phone=$phone : null;
        $this->author->update();
        return $this->author;
    }


}
