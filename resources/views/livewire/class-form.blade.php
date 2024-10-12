<div>
    <div class="container" style="position: absolute;">
        <h3 style="text-align: center"> Create Class</h3>

        @if (session('success'))
            <div class="alert alert-success" style="text-align: center">
                {{ session('success') }}
            </div>
        @endif



        <form class="row g-3" wire:submit.prevent="CreateClass">
            <div class="row g-3">
                <!-- Display validation errors -->
                @error('name')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror

                <!-- Email input field -->
                <div class="col-8">
                    <input wire:model="name" type="text" name="name" class="form-control" id="inputAddress"
                        placeholder="name" style="width: 100%" title="name">
                </div>

                <!-- Submit button -->
                <div class="col">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>

    </div>
</div>
