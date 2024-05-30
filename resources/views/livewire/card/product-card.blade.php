<div>
    <div class="text-center">
        <x-alert.normal />

        <h3 class="mb-2">Our <b>Product</b></h3>
        <p class="text-muted">
            We have plans and prices that fit your business perfectly. Make your <br> client site a success with our
            products.
        </p>
        <button type="button" class="btn btn-primary mb-5 col-4" data-bs-toggle="modal" data-bs-target="#add">
            Add Product
        </button>
    </div>

    <div class="row">
        @foreach ($products as $item)
            <div class="col-lg-3">
                <div
                    class="card rounded-top-0 border-3 border-end-0 border-start-0 border-bottom-0 border-top border-success">
                    <div class="card-body border-bottom p-3">
                        <span
                            class="badge bg-success-subtle rounded-1 text-success text-uppercase fs-12 fw-semibold px-2 py-1 mb-3">{{$item->name}}</span>
                        <img src="{{ asset('storage/products/' . $item->image->image) }}"
                            class="img-fluid" alt="...">
                        <p>Price</p>
                        <h2 class="mb-4 text-dark">Rp. {{$item->price}}</h2>

                        <ul class="list-unstyled d-grid gap-2">
                            <li class="fs-15"><i class="ri-shield-check-fill text-success me-2"></i>Category : {{$item->category->name}}
                            </li>
                        </ul>
                        <button class="btn btn-success w-100">Detail</button>
                    </div>
                </div> <!-- end Pricing_card -->
            </div> <!-- end col -->
        @endforeach
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent='store'>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Product</label>
                            <input type="text" class="form-control" wire:model='name'>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Category</label>
                            <select class="form-select" wire:model='category' aria-label="Default select example">
                                @foreach ($cat as $item)
                                    <option value="{{ $item->uuid }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Harga</label>
                            <input type="text" class="form-control" wire:model='price'>
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Deskripsi Product</label>
                            <input type="text" class="form-control" wire:model='description'>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Gambar Product</label>
                            <input class="form-control" type="file" id="formFile" wire:model='image'>
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
        });
    </script>
@endscript
