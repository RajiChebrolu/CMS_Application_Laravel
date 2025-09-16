<x-layout>
    <a href="{{ route('admin.users.index') }}" class="block mb-12 text-xl font-bold text-blue-700 animate-pulse">&larr; Go back to your
    dashboard</a>
    <div class="min-h-screen rounded-full flex items-center justify-center bg-gradient-to-b from-blue-300 to-teal-300">
        
        <div class="bg-blue-900 text-white p-25 max-w-xl rounded-lg shadow-lg w-full max-w-md">
            <h1 class="text-2xl font-bold mb-6 border-b pb-2">Edit User</h1>
            <form method="POST" action="{{ route('admin.users.update', $user) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{--First name --}}
                <input type="text" id="first_name"  name="first_name" placeholder="Firstname" value ="{{old('first_name', $user->first_name)}}"class="input ">
                {{--Last name --}}
                <input type="text" id="last_name" name="last_name" placeholder="Lastname" value ="{{old('last_name', $user->last_name)}}"class="input">
                {{--Email--}}
                <input type="email" id="email" name="email" placeholder="Email" 
                value ="{{old('email',$user->email)}}" class="input">        
            
                {{--role --}}            
                <label for="role" class="text-white block mt-4 font-semibold">Role</label>
                <select id="role" name="role"
                class="mt-4 input">
                <option value="user" @selected($user->role =='user')>User</option>
                <option value="admin" @selected($user->role =='admin')>Admin</option>
                </select>            
                {{-- Avatar upload --}}
                
                    <label for="avatar" class="text-white block mt-4 font-semibold">Avatar</label>
                    <input type="file" name="avatar" class="mt-4 input">
                    @if ($user->avatar)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $user->avatar) }}"
                            alt="Avatar" class="h-15 w-15 rounded-full">
                        </div>
                    @endif            
                <button type="submit" class="bg-pink-600 block mx-auto btn">Save</button>
            </form>
        </div>
    </div>
    
</x-layout>