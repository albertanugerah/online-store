<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $paginate = 10;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.product.index', [
            'products' => Product::latest()->paginate($this->paginate)
        ])->extends('layouts.app');
    }
}
