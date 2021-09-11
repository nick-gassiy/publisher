<?php

namespace App\Repositories;

use App\Models\Agreements;
use Carbon\Carbon;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class AgreemtsRepository.
 */
class AgreemtsRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Agreements::class;
    }

    public function __construct(Agreements $agreement = null)
    {
        if (isset($agreement))
            $this->agreement = $agreement;
        else
            $this->agreement=new Agreements();
    }

    private $agreement;

    public function createAgreement($begin,$end,$author_id,$tariff_id){
        if (!isset($begin)){
            $begin = Carbon::now();
        }
        if(isset($end) && isset($author_id)&& isset($tariff_id)){
            $this->agreement->begin = $begin;
            $this->agreement->end = $end;
            $this->agreement->author_id = $author_id;
            $this->agreement->traffic_id = $tariff_id;
            $this->agreement->save();
            return $this->agreement;
        }
        return null;
    }

    public function deleteById($id): bool
    {
        return $this->agreement->find($id)->delete();
    }

    public function getById($id, array $columns = ['*'])
    {
        return $this->agreement->find($id)->first();
    }


}
