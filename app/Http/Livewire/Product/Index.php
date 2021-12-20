<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $paginate = 10;
    public $search;
    public $formVisible;

    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];

    //$listener formClose = untuk emit di create.blade untuk menutup form create
    protected $listeners = [
        'formClose' => 'formCloseHandler'
    ];


    //method mount = method construct
    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        return view('livewire.product.index', [
            'products' => $this->search === null ?
                Product::latest()->paginate($this->paginate) :
                Product::latest()->where('title', 'like', "%{$this->search}%")->paginate($this->paginate)
        ])->extends('layouts.app');
    }

    //method ini akan dipanggil di $listener
    public function formCloseHandler()
    {
        $this->formVisible = false;

    }
}
