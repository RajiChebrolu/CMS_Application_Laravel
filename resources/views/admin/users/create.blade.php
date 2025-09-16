<x-layout>
    <a href="{{ route('admin.users.index') }}" class="text-sm text-blue-500">&larr; Back to users        
    </a>
    <div class="min-h-screen rounded-full flex items-center justify-center bg-gradient-to-b from-blue-300 to-teal-300">
        
        <div class="bg-blue-900 text-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h1 class="text-white title">Add New User</h1>
            <form action="{{ route('admin.users.store') }}" method="POST"  enctype="multipart/form-data">
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
                
                {{--role--}}   

                <label for="role" class="text-white block mt-4 font-semibold text-gray-
                700">Role</label>
                <select name="role" class="mt-4 input">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>

                {{-- Avatar upload --}}
                
                <label for="avatar" class="text-white block mt-4 font-semibold text-gray-
                700">Avatar</label>
                <input type="file" name="avatar" class="mt-4 input">
                <button class="block mx-auto btn">Create User</button>
            </form>
        </div>
    </div>
</x-layout>