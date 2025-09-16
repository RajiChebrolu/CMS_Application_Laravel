<x-layout>
    <h1 class="title">Edit Profile</h1>
    <div class="min-h-screen rounded-full flex items-center justify-center bg-gradient-to-b from-blue-300 to-teal-300">  
              
        <div class="bg-blue-900 text-white p-8 rounded-lg shadow-lg w-full max-w-md ">
            @if(session('success'))
                <x-flashMsg msg="{{ session('success') }}" />
            @endif
            <form method="POST" action="{{ route('profile.update') }}"
            enctype="multipart/form-data">
                @csrf
                {{--firstname--}}
                    <label for="firstname" class="text-white">Firstname</label>
                    <input type="text" name="first_name" value="{{ old('first_name',$user->first_name) }}" class="mt-1 input">
                
                {{--lastname--}}
                    <label for="lastname" class="text-white">Lastname</label>
                    <input type="text" name="last_name" value="{{ old('last_name',$user->last_name) }}" class="mt-1 input">
                {{--email--}}
                    <label for="email" class="text-white">Email</label>
                    <input type="text" name="email" value="{{ old('email', $user->email) }}" class="mt-1  input">
                {{--new password--}}
                    <label for="password" class="text-white ">New Password</label>
                    <input type="password" name="password" class="mt-1 input">
                {{--Confirm Password--}}
                    <label for="password_confirmation" class="text-white">Confirm Password</label>
                    <input type="password" name="password_confirmation"
                    class="mt-1 input">            
                {{--avatar--}}
                    
                    <label for="avatar" class="text-white">Profile Image</label>
                    <input type="file" name="avatar" class="mt-1 input">
                    @if($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" class="w-
                    12 h-12 rounded-full mt-2">
                    @endif
                    
                
                <button class="bg-pink-600 block mx-auto btn">Update Profile</button>
            </form>
        </div>
    </div>
</x-layout>