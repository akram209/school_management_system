<div>
    <form class="d-flex" role="search">
        <input wire:model.live.debounce.500ms="search" class="form-control me-2" type="search" placeholder="Search"
            aria-label="Search" style="width: 500px !important;height: 35px !important ;">
    </form>
    <ul class="list-group mt-2"
        style="position: absolute; width: 30% !important;  !important; left: 29% !important ;  top: 78% !important">
        @forelse ($users as $user)
            <a href="{{ route($user->role . '.profile', $user->id) }}" style="text-decoration: none">
                <li class="list-group-item"
                    style="margin-bottom: 10px;  height: 20px ;padding-bottom: 55px; padding-top: 0px">

                    @if ($user->image !== null)
                        <img src="{{ asset('storage/images/' . $user->image) }}"
                            alt=""style="width: 40px;height: 40px; margin-right: 35px">
                    @else
                        <img src="{{ asset('build/assets/images/profile.jpg') }}" alt=""
                            style="width: 40px;height: 40px;">
                    @endif
                    <span style="font: 700"> {{ $user->first_name }} {{ $user->last_name }}</span>
                </li>
            </a>
        @empty
        @endforelse
    </ul>
</div>
