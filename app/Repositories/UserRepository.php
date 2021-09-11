<?php

namespace App\Repositories;

use App\Models\User;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return User::class;
    }

    public function __construct(User $user= null)
    {
        if (isset($user))
            $this->user = $user;
        else
        $this->user=new User();
    }

    private $user;


    public function getById($id, array $columns = ['*'])
    {
       return $this->user->find($id)->first();
    }

    public function deleteById($id): bool
    {
        return $this->user->find($id)->delete();
    }


    public function createUser($email,$password,$username){
        $this->user->email = $email;
        $this->user->password = $password;
        $this->user->username = $username;
        $this->user->save();
        return $this->user;
    }


    public function updateUser($id,$email,$password,$username){
        isset($email) ? $this->user->email = $email : null;
        isset($password) ? $this->user->password = $password : null;
        isset($username) ? $this->user->username = $username : null;
        $this->user->update();
        return $this->user;
    }

}
