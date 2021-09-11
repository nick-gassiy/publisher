<?php

namespace App\Repositories;

use App\Models\Genres;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class GenresRepository.
 */
class GenresRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Genres::class;
    }

    private $genre;

    public function __construct(Genres $genre = null){
        if(isset($genre))
            $this->genre=$genre;
        else
            $this->genre=new Genres();
    }

    public function createGenre($name){
        if (isset($name))
        {
            $this->genre->name = $name;
            $this->genre->save();
            return $this->genre;
        }
        return null;
    }

    public function updateGenre($name){
        isset($name) ? $this->genre->name = $name : null;
        return $this->genre->update();
    }

    public function deleteById($id): bool
    {
        $this->genre->find($id)->delete();
    }

    public function getById($id, array $columns = ['*'])
    {
        $this->genre->find($id)->first();
    }


}
