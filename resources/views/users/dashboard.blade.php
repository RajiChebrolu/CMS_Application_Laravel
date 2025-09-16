<x-layout>
    <h1 class="title text-black">Welcome {{auth()->user()->first_name}},
        you have {{$posts->total()}} posts
    </h1>
    {{-- Create Post form--}}
    <div class="card mb-4">
        <h2 class="font-bold text-3xl mb-4">Create a new post</h2>
        {{--Session message--}}
        @if (session('success'))
            <div id="flashMessage" class="mb-2">
                <x-flashMsg msg="{{session('success')}}"></x-flashMsg>
            </div>
        @elseif (session('delete'))           
            <div id="flashMessage">
                <x-flashMsg msg="{{session('delete')}}" bg="bg-pink-600"></x-flashMsg>
            </div>            
        @endif        
        
        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
             @csrf              

             {{--Post Title--}}
            <div class="mb-4">
                <input type="text" name="title" placeholder="Post Title" value ="{{old('title')}}" class="input @error('title') ring-red-500 @enderror">
                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{--post body --}}
            <div class="mb-4">
                <textarea name="body" rows="5" placeholder="Post Content" class="input @error('body') ring-red-500 @enderror">{{old('body')}}</textarea>
                @error('body')
                    <p class="error">{{$message}}</p>
                @enderror    
            </div>  
            
            {{--post image--}}
            <div class="mb-4">
                <label for="">Featured image</label>
                <input type="file" name="image" id="image" 
                class="
                file:mr-4
                file:py-2
                file:px-4
                file:text-sm 
                file:font-semibold
                file:bg-gray-200
                hover:file:bg-pink-400">
                @error('image')
                    <p class="error">{{$message}}</p>                    
                @enderror
            </div>
            

            {{--Submit button --}}
            <button type="submit" class="bg-pink-600 block mx-auto btn"> Create Post</button>

        </form>
    </div> 
    {{--Display user posts--}}   
    <h2 class="font-bold text-3xl mb-4">Your Latest Posts</h2>
      <div class="grid grid-cols-2 gap-6">
        @foreach ($posts as $post )
            <x-postCard :post="$post">

                {{--update post--}}
                <a href="{{route('posts.edit', $post)}}" class="bg-blue-900 btn">Update</a>

                {{--delete post--}}
                <form action="{{route('posts.destroy', $post)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="bg-pink-600 btn">Delete</button>
                </form>
            </x-postCard>        
        @endforeach
    </div>

    <div>
        {{$posts->links()}}
    </div>
</x-layout>
{{--script to hide out the success message after 10sec --}}
<script>
    document.addEventListener('DOMContentLoaded', function()
    {
        const flash = document.getElementById('flashMessage');
        if (flash) {
            setTimeout(() => {
                flash.style.display = 'none';
            }, 10000);
        }
        
    }
);
</script>