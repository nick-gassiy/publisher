<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use App\Models\Positions;
use App\Models\Role;
use App\Models\Tariffs;
use App\Repositories\GenresRepository;
use App\Repositories\RolesRepository;
use App\Repositories\TariffRepository;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function getAllTariffs(){
        return Tariffs::all();
    }

    public function createTariff(Request $request){
        $t = new TariffRepository();
        $t->createTariff(
            $request->get('name'),
            $request->get('price')
        );
    }

    public function updateTariff(Request $request,$id){
        $tr = new TariffRepository();
        $tariff = $tr->getById($id);
        $t = new TariffRepository($tariff);
        $t->createTariff(
            $request->get('name'),
            $request->get('price')
        );
    }

    public function deleteTariff(Request $request,$id){
        $t = new TariffRepository();
        $t->deleteById($id);
    }

    public function getAllGenres(){
        return Genres::all();
    }

    public function createGenre(Request $request){
        $g = new GenresRepository();
        $g->createGenre(
            $request->get('name')
        );
    }

    public function updateGenre(Request $request,$id){
        $g = new GenresRepository();
        $genre = $g->getById($id);
        $gr = new GenresRepository($genre);
        $gr->updateGenre(
            $request->get('name')
        );
    }

    public function deleteGenre(Request $request,$id){
        $g = new GenresRepository();
        $g->deleteById($id);
    }

    public function getAllRoles(){
        return Role::all();
    }

    public function createRole(Request $request){
        $g = new RolesRepository();
        $g->createRole(
            $request->get('name')
        );
    }

    public function updateRole(Request $request,$id){
        $r = new RolesRepository();
        $g = new RolesRepository($r->getById($id));
        $g->updateRole(
            $request->get('name')
        );
    }

    public function deleteRole(Request $request,$id){
        $r = new RolesRepository();
        $r->deleteById($id);
    }

}
