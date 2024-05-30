<?php

namespace App\Livewire\Table;

use App\Models\UserApps;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;
    public $search = '', $perPage = 20, $test;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.table.user-table', [
            'users' => UserApps::where('email', 'like', '%' . $this->search . '%')->paginate($this->perPage),
        ]);
    }
}
