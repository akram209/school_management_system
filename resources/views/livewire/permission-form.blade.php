<div>
    <div class="container" style="position: absolute;">
        <h3 style="text-align: center">Send Permissions</h3>

        @if (session('success'))
            <div class="alert alert-success" style="text-align: center">
                {{ session('success') }}
            </div>
        @endif



        <form class="row g-3" wire:submit.prevent="SendPermission">
            <div class="row g-3">
                <!-- Display validation errors -->
                @error('email')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror

                <!-- Email input field -->
                <div class="col-8">
                    <input wire:model="email" type="email" name="email" class="form-control" id="inputAddress"
                        placeholder="email" style="width: 100%" title="email">
                </div>

                <!-- Submit button -->
                <div class="col">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </div>
        </form>

    </div>
</div>
