<div>
    <form wire:submit.prevent="create">
        @if (session('success'))
            <div class="alert alert-success" style="text-align: center">
                {{ session('success') }}
            </div>
        @endif
        @error('day_name')
            <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
        @enderror
        <div class="col">
            <select class="form-select" wire:model="day_name" name="day_name" aria-label="Default select example">

                <option selected disabled hidden>days</option>
                <option value="sunday">sunday</option>
                <option value="monday">monday</option>
                <option value="tuesday">tuesday</option>
                <option value="wednesday">wednesday</option>
                <option value="thursday">thursday</option>
            </select>

        </div>
        @error('selectedClass')
            <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
        @enderror
        <div class="col">
            <select class="form-select" wire:model.live="selectedClass" aria-label="Default select example">
                @foreach ($classes as $key => $class)
                    @if ($key == 0)
                        <option selected disabled hidden>Classes</option>
                    @endif
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>

        @error('selectedTeacher')
            <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
        @enderror
        <div class="col">
            <select class="form-select" wire:model.live="selectedTeacher" aria-label="Default select example">
                @foreach ($teachers as $key => $teacher)
                    @if ($key == 0)
                        <option selected disabled hidden>Teachers</option>
                    @endif
                    <option value="{{ $teacher->id }}">{{ $teacher->user->first_name }} {{ $teacher->user->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="row g-3">
            @error('start_time')
                <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
            @enderror
            <div class="col">
                <input type="time" wire:model="start_time" class="form-control" name="start_time" style="width: 100%"
                    title="start time">

            </div>
            @error('end_time')
                <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
            @enderror
            <div class="col">
                <input type="time" wire:model="end_time" class="form-control" name="end_time" style="width: 100%"
                    title="end time">

            </div>

        </div>

        {{-- @error('selectedSubject')
            <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
        @enderror
        <div class="col">
            <select class="form-select" wire:model="selectedSubject" aria-label="Default select example">
                <option selected disabled hidden>Choose a subject</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div> --}}

        <div class="col-12" style="margin-top: 20px">
            <button type="submit" class="btn btn-primary" style="width: 100%">save</button>
        </div>
    </form>
</div>
