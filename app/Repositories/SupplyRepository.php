<?php

namespace App\Repositories;

use App\Models\Supplies;
use Carbon\Carbon;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class SupplyRepository.
 */
class SupplyRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Supplies::class;
    }

    private $supply;

    public function __construct(Supplies $supply = null)
    {
        if(isset($supply))
            $this->supply = $supply;
        else
            $this->supply=new Supplies();
    }

    public function getById($id, array $columns = ['*'])
    {
        return $this->supply->find($id)->first();
    }

    public function deleteById($id): bool
    {
        return $this->supply->find($id)->delete();
    }

    public function createSupply($date, $price,$quantity,$book_id,$contractor_id){
        if (!isset($date))
            $date = Carbon::now();

        $this->supply->date = $date;
        $this->supply->price = $price;
        $this->supply->quantity = $quantity;
        $this->supply->book_id = $book_id;
        $this->supply->contractor_id = $contractor_id;
        return $this->supply->save();
    }

    public function updateSupply($date, $price,$quantity,$book_id,$contractor_id){
        isset($date) ? $this->supply->date = $date : null;
        isset($price) ? $this->supply->price = $price: null;
        isset($quantity) ? $this->supply->quantity = $quantity: null;
        isset($book_id) ? $this->supply->book_id = $book_id: null;
        isset($contractor_id) ? $this->supply->contractor_id = $contractor_id: null;
        return $this->supply->save();
    }

}
