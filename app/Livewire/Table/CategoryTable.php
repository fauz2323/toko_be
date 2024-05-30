<?php

namespace App\Livewire\Table;

use App\Models\CategoryProduct;
use Livewire\Component;
use Livewire\WithPagination;
use Ramsey\Uuid\Uuid;

class CategoryTable extends Component
{
    use WithPagination;
    public $search = '',
        $perPage = 20,
        $test,
        $id;

    public $name;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.table.category-table', [
            'category' => CategoryProduct::where('name', 'like', '%' . $this->search . '%')->paginate($this->perPage),
        ]);
    }

    public function setDataId($id,$name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $category = new CategoryProduct();
        $category->name = $this->name;
        $category->uuid = Uuid::uuid4();
        $category->save();

        $this->reset();
        $this->dispatch('closeModal');

        session()->flash('message', 'Data berhasil disimpan');
    }

    public function destroy($id)
    {
        $category = CategoryProduct::find($id);
        $category->delete();

        session()->flash('message', 'Data berhasil dihapus');
    }

    public function edit()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $category = CategoryProduct::find($this->id);
        $category->name = $this->name;
        $category->save();

        $this->reset();
        $this->dispatch('closeModal');
        session()->flash('message', 'Data berhasil diubah');
    }
}
