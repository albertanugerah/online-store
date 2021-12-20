<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Str;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $price;
    public $image;

    public function render()
    {
        return view('livewire.product.create');
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|min:3',
            'description' => 'required|max:180',
            'price' => 'required|numeric',
            'image' => 'image|max:1024'
        ]);
        $imageName = '';

        if ($this->image) {
            $imageName = Str::slug($this->title, '-')
                .'-'
                .uniqid()
                .'.'.$this->image->getClientOriginalExtension();

            $this->image->storeAs("public", $imageName, 'local');
        } else {
            $imageName = asset("storage/public/{$imageName}");
        }


        $product = [
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $imageName,
        ];
        Product::create($product);
        $this->emit('productStored');


    }
}
