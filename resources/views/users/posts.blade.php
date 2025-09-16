<x-layout>
    <h1 class="title">{{$user->first_name}}'s Posts <span class="text-pink-500 text-3xl animate-pulse">&#9829;</span> {{$posts->total()}}</h1>
    {{--user's posts --}}

     <div class="grid grid-cols-2 gap-6">
        @foreach ($posts as $post )   
            <x-postCard :post="$post" />
        @endforeach
    </div>

    <div>
        {{$posts->links()}}
    </div>
</x-layout>