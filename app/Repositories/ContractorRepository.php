<?php

namespace App\Repositories;

use App\Models\Contractors;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ContractorRepository.
 */
class ContractorRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Contractors::class;
    }
    private $contractor;

    public function __construct(Contractors $contractor = null)
    {
        if(isset($contractor))
            $this->contractor = $contractor;
        else
            $this->contractor = new Contractors();
    }


    public function deleteById($id): bool
    {
        return $this->contractor->find($id)->delete();
    }

    public function getById($id, array $columns = ['*'])
    {
        return $this->contractor->find($id)->first();
    }



    public function createContractor($name,$address,$email,$phone){
        $this->contractor->name = $name;
        $this->contractor->address = $address;
        $this->contractor->email = $email;
        $this->contractor->phone = $phone;
        $this->contractor->save();
        return $this->contractor;
    }


    public function updateContractor($name,$address,$email,$phone){
        isset($name) ? $this->contractor->name=$name : null;
        isset($address) ? $this->contractor->address=$address : null;
        isset($email) ? $this->contractor->email=$email : null;
        isset($phone) ? $this->contractor->phone=$phone : null;
        $this->contractor->update();
        return $this->contractor;
    }

}
