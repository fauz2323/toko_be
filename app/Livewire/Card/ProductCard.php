<?php

namespace App\Livewire\Card;

use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductImage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Ramsey\Uuid\Uuid;

class ProductCard extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '',
        $perPage = 9;

    public $name, $category, $price, $description, $image;

    public function render()
    {
        $this->category = CategoryProduct::first()->uuid;
        return view('livewire.card.product-card', [
            'products' => Product::where('name', 'like', '%' . $this->search . '%')->paginate($this->perPage),
            'cat' => CategoryProduct::all(),
        ]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        session()->flash('message', 'Data berhasil dihapus');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]);

        $cat = CategoryProduct::where('uuid', $this->category)->first();

        $product = new Product();
        $product->category_id = $cat->id;
        $product->name = $this->name;
        $product->price = $this->price;
        $product->description = $this->description;
        $product->uuid = Uuid::uuid4();
        $product->save();

        $imageName = Uuid::uuid4() . '.' . $this->image->extension();
        $this->image->storeAs('public/products', $imageName);
        $image = new ProductImage();
        $image->product_id = $product->id;
        $image->image = $imageName;
        $image->save();

        $this->reset();
        $this->dispatch('closeModal');
        session()->flash('message', 'Data berhasil disimpan');
    }
}
