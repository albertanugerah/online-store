<div class="row row-cols-auto justify-content-center mb-2">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent="store" class="row g-3" method="POST" enctype="multipart/form-data">

                    <div class="col">
                        <label for="title" class="form-label">Title</label>
                        <input wire:model="title" type="text" id="title"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="Title" aria-label="title">

                        @error('title')
                        <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="price" class="form-label">Price</label>
                        <input wire:model="price" type="text"
                               class="form-control @error('price') is-invalid @enderror" placeholder="Price"
                               aria-label="price">
                        @error('price')
                        <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>


                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <input wire:model="description" type="text"
                               class="form-control @error('description') is-invalid @enderror"
                               placeholder="Description" aria-label="description">
                        @error('description')
                        <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>


                    <div class="col-12">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input wire:model="image" type="file" class="form-control" id="image"
                                   aria-label="image">
                            @if ($image)
                                <img
                                    src="{{ empty(!$image) ?  $image->temporaryUrl() : asset("storage/public/{$image}") }}"
                                    alt="" height="200">
                            @endif
                            @error('image')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror


                        </div>
                    </div>

                    <div class="col 3">
                        <div class="btn-group" role="group" aria-label="Button Form">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            <button wire:click="$emit('formClose')" type="button" class="btn btn-sm btn-secondary">Close
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
