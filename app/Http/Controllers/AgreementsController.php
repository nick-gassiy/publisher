<?php

namespace App\Http\Controllers;

use App\Models\Agreements;
use App\Repositories\AgreemtsRepository;
use Illuminate\Http\Request;

class AgreementsController extends Controller

{
    public function index(){}


    public function getAllAgreements(){
        $agreements = Agreements::all();
        $isEmployee = true;
        return view('index',compact('agreements','isEmployee'));
    }

    public function createAgreement(Request $request){
        $ag = new AgreemtsRepository();
        $begin = $request->get('begin');
        $end = $request->get('end');
        $author_id = $request->get('author_id');
        $tariff_id = $request->get('tariff_id');
        $ag->createAgreement($begin,$end,$author_id,$tariff_id);
    }

}
