<?php

namespace App\Repositories;

use App\Models\Employee;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class EmployeesRepository.
 */
class EmployeesRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Employee::class;
    }
    private $employee;

    public function __construct(Employee $employee = null)
    {
        if(isset($employee))
            $this->employee = $employee;
        else
            $this->employee = new Employee();
    }


    public function deleteById($id): bool
    {
        return $this->employee->find($id)->delete();
    }

    public function getById($id, array $columns = ['*'])
    {
        return $this->employee->find($id)->first();
    }



    public function createEmployee($name,$surname,$address,$email,$phone,$userId,$position_id){
        $this->employee->name = $name;
        $this->employee->surname = $surname;
        $this->employee->address = $address;
        $this->employee->email = $email;
        $this->employee->phone = $phone;
        $this->employee->user_id = $userId;
        $this->employee->position_id = $position_id;
        $this->employee->save();
        return $this->employee;
    }


    public function updateEmployee($name,$surname,$address,$email,$phone, $position_id){
        isset($name) ? $this->employee->name=$name : null;
        isset($surname) ? $this->employee->surname=$surname : null;
        isset($address) ? $this->employee->address=$address : null;
        isset($email) ? $this->employee->email=$email : null;
        isset($phone) ? $this->employee->phone=$phone : null;
        isset($position_id) ?  $this->employee->position_id = $position_id : null;
        $this->employee->update();
        return $this->employee;
    }

}
