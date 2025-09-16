<x-layout>
    <div class="min-h-screen rounded-full flex items-center justify-center bg-gradient-to-b from-blue-300 to-teal-300">
        <div class="bg-blue-900 text-white p-25 max-w-xl rounded-lg shadow-lg w-full max-w-md">
            <h1 class=" text-4xl text-white font-extrabold mb-8 text-center text-slate-900 tracking-tight">Admin Dashboard</h1>
        
            <div class="space-y-6 max-w-md mx-auto text-center">
            <a href="{{ route('admin.users.index') }}"
            class="text-2xl  px-5 py-5 block mx-auto btn ">Manage Users
            </a>
            <a href="{{ route('admin.posts.index') }}"
                class="text-2xl px-5 py-5 block mx-auto btn">Manage Posts
            </a>
            </div>
        </div>   
    </div>
</x-layout>
