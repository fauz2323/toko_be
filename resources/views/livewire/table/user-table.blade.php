<div class="row">
    <div class="col-12">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">List User</h5>
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
                                <th>Email</th>
                                <th>Tanggal Join</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->count() == 0)
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
                                    <td>
                                        <span class="d-block">-</span>
                                    </td>
                                </tr>
                            @else
                                @foreach ($users as $item)
                                    <tr>
                                        <td>
                                            <span class="d-block">{{ $item->name }}</span>
                                        </td>
                                        <td>
                                            <span class="d-block">{{ $item->email }}</span>
                                        </td>
                                        <td>
                                            <span class="d-block">{{ $item->created_at }}</span>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="container">
                {{ $users->links('vendor.livewire.costom') }}
            </div>
        </div>
    </div>
</div>
