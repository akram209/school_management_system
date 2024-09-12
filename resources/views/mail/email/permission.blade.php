    {{ $details['title'] }}
    <hr>

    <h3 style="text-align: center"> {{ $details['body'] }}Your permission code is <span
            style="font-size: 20px">'{{ $details['code'] }}' </span> to
        register.
    </h3>


    <x-mail::button :url="route('register')">
        Register
    </x-mail::button>


    <br>
    <p class="text-center">
        Thanks, {{ config('app.name') }}</p>
