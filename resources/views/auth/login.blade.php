<x-layout>
    <div class="min-h-screen rounded-full flex items-center justify-center bg-gradient-to-b from-blue-300 to-teal-300">
        <div class="bg-blue-900 text-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h1 class="title text-white">Welcome back</h1>
            <form action="{{route('login')}}" method="post">
             @csrf
              

             {{--Email--}}
            <input type="email" name="email" placeholder="Email" value ="{{old('email')}}" class="input @error('email') ring-red-500 @enderror">
                @error('email')
                    <p class="error">{{$message}}</p>
                @enderror

            {{-- password --}}
            <input type="password" name="password" placeholder="Password" class="input @error('password') ring-red-500 @enderror">
                @error('password')
                    <p class="error">{{$message}}</p>
                @enderror          
            
            {{--Remember Checkbox--}}
            <label for="remember" class="flex items-center mt-6 space-x-4">
                <input type="checkbox" name="remember" id="remember" class="w-5 h-5 accent-blue-500"></input>
                <span class="text-sm text-white font-bold">Remember me</span>
            </label>

            @error('failed')
                <p class="error">{{$message}}</p>
            @enderror

            {{--Submit button --}}
            <button type="login" class="bg-pink-600 block mx-auto btn">Login</button>

        </form>
        </div>        
    </div>
    
</x-layout>