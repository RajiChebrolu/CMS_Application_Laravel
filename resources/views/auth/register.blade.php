<x-layout>
    <div class="min-h-screen rounded-full flex items-center justify-center bg-gradient-to-b from-blue-300 to-teal-300">
        <div class="bg-blue-900 text-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h1 class="title text-white">Registration Form</h1>
            <form action="{{route('register')}}" method="post">
             @csrf
             {{--First name --}}
             <input type="text" name="first_name" placeholder="Firstname" value ="{{old('first_name')}}"class="input @error('first_name') ring-red-500 @enderror">
                @error('first_name')
                    <p class="error">{{$message}}</p>
                @enderror 

             {{--Last name --}}
             <input type="text" name="last_name" placeholder="Lastname" value ="{{old('last_name')}}"class="input @error('last_name') ring-red-500 @enderror">
                @error('last_name')
                    <p class="error">{{$message}}</p>
                @enderror 

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

            {{-- Confirm password --}}
            <input type="password" name="password_confirmation" placeholder="Confirm Password"class="input @error('password_confirmation') ring-red-500 @enderror">
            

            {{--Submit button --}}
            <button type="submit" class="bg-pink-600 block mx-auto btn">Register</button>

        </form>
        </div>        
    </div>
    
</x-layout>