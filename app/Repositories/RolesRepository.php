<?php

namespace App\Repositories;

use App\Models\Role;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class RolesRepository.
 */
class RolesRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Role::class;
    }

    private $role;

    public function __construct(Role $role = null){
        if(isset($role))
            $this->role=$role;
        else
            $this->role=new Role();
    }

    public function createRole($name){
        if (isset($name))
        {
            $this->role->name = $name;
            $this->role->save();
            return $this->role;
        }
        return null;
    }

    public function updateRole($name){
        isset($name) ? $this->role->name = $name : null;
        return $this->role->update();
    }

    public function deleteById($id): bool
    {
        $this->role->find($id)->delete();
    }

    public function getById($id, array $columns = ['*'])
    {
        $this->role->find($id)->first();
    }


}
