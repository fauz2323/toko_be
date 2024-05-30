<div class="row">
    <x-alert.normal />
    <div class="col-12">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">List Category</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#add">
                            Add Category
                        </button>
                    </div>
                    <div class="col-4 align-self-end">
                        <input type="text" class="form-control" placeholder="search..."
                            wire:model.live.debounce.250ms="search">
                    </div>
                </div>
            </div>
            <div class="card-body custom-card-action p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr class="border-b">
                                <th>Name</th>
                                <th>Tanggal Dibuat</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($category->count() == 0)
                                <tr>
                                    <td>
                                        <span class="d-block">-</span>
                                    </td>
                                    <td>
                                        <span class="d-block">-</span>
                                    </td>
                                    <td>
                                        <span class="d-block">-</span>
                                    </td>
                                </tr>
                            @else
                                @foreach ($category as $item)
                                    <tr>
                                        <td>
                                            <span class="d-block">{{ $item->name }}</span>
                                        </td>
                                        <td>
                                            <span class="d-block">{{ $item->created_at }}</span>
                                        </td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#edit" wire:click="setDataId('{{$item->id}}','{{$item->name}}')" class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="container">
                {{ $category->links('vendor.livewire.costom') }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent='store'>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name Category</label>
                            <input type="text" class="form-control" wire:model='name'>
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent='edit'>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name Category</label>
                            <input type="text" class="form-control" wire:model='name'>
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        $wire.on('closeModal', () => {
            $('#add').modal('hide');
            $('#edit').modal('hide');
        });
    </script>
@endscript
