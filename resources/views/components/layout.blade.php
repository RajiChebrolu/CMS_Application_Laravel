<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-100 text-slate-900">
    <header class="bg-gradient-to-b from-blue-300 to-teal-300">
        <nav>
            <a href="{{route('posts.index')}}" class="nav-link">Home</a>            

            @auth
                <div class="relative grid place-items-center" x-data="{open:false}">
                    {{-- Dropdown menu button --}}
                    <button @click = "open = !open" type="button" class="round-btn">
                        <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar): asset('img/avatar.jpg') }}"  class="w-full object-cover rounded-full">
                    </button>

                    {{-- Dropdown menu--}}
                    <div x-show="open" @click.outside="open=false" class="bg-white shadow-lg absolute top-17 left-1/2-translate-x-1/2 rounded-lg overflow-hidden font-bold w-44 px-4 py-3">
                        <p class="username text-lg">{{Auth::user()->first_name}}</p>

                        @if (auth()->user()->role==='admin')
                            <a href="{{ route('admin.dashboard') }}" class="text-lg px-4 rounded-lg hover:bg-blue-200">Admin Panel</a>                            
                        @endif

                        <a href="{{ route('dashboard')}}" class="text-lg  px-4  rounded-lg hover:bg-blue-200">Dashboard</a>

                        <a href="{{ route('profile.edit')}}" class="text-lg px-4 rounded-lg hover:bg-blue-200">Edit Profile</a>

                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button class="text-lg px-4 rounded-lg hover:bg-blue-200">
                                Logout
                            </button>
                        </form>
                    </div>

                </div>
            @endauth
            
            @guest
                <div class="flex items-center gap-4">
                    <a href="{{route('login')}}" class="nav-link">Login</a>
                    <a href="{{route('register')}}" class="nav-link">Register</a>
                </div>
            @endguest

        </nav>
    </header>
<main class="py-8 px-4 mx-auto max-w-screen-lg">
    {{ $slot}}
</main>    
    
</body>
</html>