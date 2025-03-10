<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProductType;
use Illuminate\Http\Request;

class productTypeComponent extends Component{
    public $id;
    public $name;
    public $productTypes = [];

    public function fetchData(){
        $this->productTypes = ProductType::orderby('id', 'desc')->get();
    }

    public function save(){
        if($this->id){
            $productType = ProductType::find($this->id);
        }else{
            $productType = new ProductType();
        }

        $productType->name = $this->name;
        $productType->save();
        $this->name = null;
        $this->fetchData();
    }   

    public function edit($id){
        $productType = ProductType::find($id);
        $this->id = $productType->id;
        $this->name = $productType->name;
    }

    public function remove($id){
        $productType = ProductType::find($id);
        $productType->delete();

        $this->fetchData();
    }

    public function render(){
        $this->fetchData();

        return view('livewire.productType');
    }
}