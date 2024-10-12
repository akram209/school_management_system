<div>
    <form class="d-flex float-end" role="search" id="search-teacher"
        style=" position: absolute; left: 75% !important; top: 12% !important;">
        <input wire:model.live.debounce.500ms="search" type="search" placeholder="search ">

    </form>
    <table class="table align-middle mb-5 bg-white ">
        <thead class="bg-light">
            <tr>
                <th>Profile</th>
                <th style="padding-left: 5% ">Parent Id</th>
                <th style=" padding-left:5%">Full Name</th>
                <th style=" padding-left:5%">gender</th>
                <th>email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($parents as $parent)
                <tr>
                    <td style=" padding-top: 0px ; padding-right: 10%; padding-bottom: 20px ">
                        <a href="{{ route('teacher.profile', $parent->user_id) }}">
                            @if ($parent->user->image != null)
                                <img src="{{ asset('storage/images' . $parent->user->image) }}" alt=""
                                    width="60">
                            @else
                                <img src="{{ asset('build/assets/images/profile.jpg') }}" alt="profile"
                                    class="profile-card-header-profile-img">
                            @endif
                        </a>
                    </td>


                    <td>{{ $parent->id }}</td>
                    <td>{{ $parent->user->first_name . ' ' . $parent->user->last_name }}</td>
                    <td style="padding-right: 5%">{{ $parent->user->gender }}</td>
                    <td style="padding-right: 5%">{{ $parent->user->email }}</td>
                    <td style="padding-right: 5%">
                        <div class="dropdown">
                            <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('parent.edit', $parent->id) }}">edit</a>
                                </li>
                                <li>
                                    <form action="{{ route('parent.destroy', $parent->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">delete</button>
                                    </form>
                                </li>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('parent.show', $parent->id) }}">view</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
