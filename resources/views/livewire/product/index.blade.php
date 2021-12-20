<div>
    <div class="container">
        @if($formVisible)
            <livewire:product.create/>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Product') }}
                        <button wire:click="$toggle('formVisible')" class="btn btn-sm btn-primary">Create</button>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <select wire:model="paginate" name="tableLength" id="tableLength"
                                        class="form-select form-select-sm w-auto"
                                        aria-label="Show length">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                </select>

                            </div>
                            <div class="col">
                                <input type="text" wire:model="search" id="search"
                                       class="form-control form-control-sm"
                                       placeholder="Search" aria-label="search">

                            </div>

                        </div>
                        <hr>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Price</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no = 0 @endphp
                            @foreach( $products as $product )
                                @php $no++ @endphp
                                <tr>
                                    <th scope="row"> {{ $no }}</th>
                                    <td>{{ $product->title }}</td>
                                    <td>Rp {{ number_format($product->price,2,",",".") }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info text-white">Edit</button>
                                        <button class="btn btn-sm btn-danger">Deletes</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

</div>
