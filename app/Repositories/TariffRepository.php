<?php

namespace App\Repositories;

use App\Models\Tariffs;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use function Symfony\Component\Translation\t;

//use Your Model

/**
 * Class TariffRepository.
 */
class TariffRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Tariffs::class;
    }

    private $tariff;

    public function __construct(Tariffs $tariff = null){
        if(isset($tariff))
            $this->tariff=$tariff;
        else
            $this->tariff=new Tariffs();
    }

    public function createTariff($name,$price){
        if (isset($name) && isset($price))
        {
            $this->tariff->name = $name;
            $this->tariff->price = $price;
            $this->tariff->save();
            return $this->tariff;
        }
        return null;
    }

    public function updateTariff($name,$price){
        isset($name) ? $this->tariff->name = $name : null;
        isset($price) ?$this->tariff->price = $price : null;
        return $this->tariff->update();
    }

    public function deleteById($id): bool
    {
        $this->tariff->find($id)->delete();
    }

    public function getById($id, array $columns = ['*'])
    {
        $this->tariff->find($id)->first();
    }


}
