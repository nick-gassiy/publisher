<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Contractors;
use App\Models\Employee;
use App\Models\Supplies;
use App\Repositories\ContractorRepository;
use App\Repositories\SupplyRepository;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    public function index(){}

    public function mySupplies(){
        $supplies = Supplies::whereIn('book_id',
            Book::where('employee_id',
                Employee::where('user_id',1)->first()->id
            )->get('id')
        )->get();
        return view('index',compact('supplies'));
    }

    public function getSupply($id){
        $sr = new SupplyRepository();
        $supply = $sr->getById($id);
        return view('examples',compact('supply'));
    }

    public function allSupplies(Request $request){
        $filter=  $request->get('filter');

        $supplies = Supplies::class;
        if (isset($filter)){

            foreach ($filter as $k => $v){
            switch ($k){
                case 'contractor':
                    $supplies = parent::queryFilter($supplies,'contractor.name',$v);
                    break;
                case 'book':
                    $supplies = parent::queryFilter($supplies,'employee.name',$v);
                    break;
            }
        }
        $supplies->get();
        }
            else{
            $supplies = Supplies::all();
            }
        $isEmployee = true;

        return view('index',compact('supplies','isEmployee'));
        }

    public function createSupply(Request $request){
        $sr = new SupplyRepository();
        $date = $request->get('date');
        $price = $request->get('price');
        $quantity = $request->get('quantity');
        $book_id = $request->get('book_id');
        $contractor_id = $request->get('contractor_id');
        $sr->updateSupply($date, $price,$quantity,$book_id,$contractor_id);
    }

    public function updateSupply(Request $request,$id){
        $sr = new SupplyRepository();
        $supply = $sr->$this->getSupply($id);
        $ur = new SupplyRepository($supply);
        $date = $request->get('date');
        $price = $request->get('price');
        $quantity = $request->get('quantity');
        $book_id = $request->get('book_id');
        $contractor_id = $request->get('contractor_id');
        $ur->updateSupply($date, $price,$quantity,$book_id,$contractor_id);
    }

    public function deleteSupply(Request $request,$id){
        $sr = new SupplyRepository();
        $sr->deleteById($id);
        return redirect()->refresh();
    }

    public function getAllContractors(){
        $contractors = Contractors::all();
        $isEmployee = true;
        return view('index',compact('contractors','isEmployee'));
    }

    public function createContractor(Request $request){
        $cr = new ContractorRepository();
        $name = $request->get('name');
        $address = $request->get('address');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $cr->createContractor($name,$address,$email,$phone);
    }

    public function updateContractor(Request $request,$id){
        $c = new ContractorRepository();
        $cr = new ContractorRepository($c->getById($id));
        $name = $request->get('name');
        $address = $request->get('address');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $cr->createContractor($name,$address,$email,$phone);
    }

    public function deleteContractor(Request $request,$id){
        $sr = new ContractorRepository();
        $sr->deleteById($id);
        return redirect()->refresh();
    }
}
