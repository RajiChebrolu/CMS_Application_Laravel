<x-layout>
    <a href="{{route('dashboard')}}" class="block mb-2 text-xl font-bold animate-pulse text-blue-500">
        &larr; Go back to your dashboard
    </a>
    {{-- Edit Post form--}}
    <div class="card mt-12">
        <h2 class="font-bold text-3xl mb-4">Update your post</h2>               
        
        <form action="{{route('posts.update', $post)}}" method="post" enctype="multipart/form-data">
             @csrf     
             @method('PUT')         

             {{--Post Title--}}
            <div class="mb-4">
                <input type="text" name="title" placeholder="Post Title" value ="{{ $post->title }}" class="input @error('title') ring-red-500 @enderror">
                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{--post body --}}
            <div class="mb-4">
                <textarea name="body" rows="5" placeholder="Post Content" class="input @error('body') ring-red-500 @enderror">{{ $post->body }}</textarea>
                @error('body')
                    <p class="error">{{$message}}</p>
                @enderror    
            </div>  

            {{--Current featured image--}}
            
            @if ($post->image)
            <div class="h-52 rounded-md mb-4 w-full object-cover overflow-hidden">
                <label for="" class="font-bold text-xl">Current featured photo</label>
                <img src="{{asset('storage/' .$post->image)}}" alt="" class="w-3/8 h-full"> 
            </div> 
            @endif
            
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
            <button type="submit" class="bg-pink-600 w-full btn"> Update Post</button>

        </form>
    </div> 
</x-layout>