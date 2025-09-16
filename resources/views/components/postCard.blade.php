@props(['post', 'full'=>false])

<div class="card">
    {{--title--}}
    <h2 class="font-bold text-2xl">{{$post->title}}</h2> 
    
    {{--featured image--}}
    <div class="h-52 rounded-md mb-4 w-full object-cover overflow-hidden">
        @if ($post->image)
            <img src="{{asset('storage/' . $post->image)}}" alt="" class="w-full h-40 sm:h-52">
        @else
           <img src="{{asset('storage/post_images/default.jpg')}}" alt="" class="w-full h-40 sm:h-52">
        @endif
    </div>

    {{--author and date --}} 
    <div class="text-md font-bold">
        <span>Posted {{$post->created_at->diffForHumans()}} by</span>
        <a href="{{route('posts.user', $post->user)}}" class="text-pink-500 text-xl animate-pulse font-bold"> {{$post->user->first_name }}</a>
    </div>
    {{--body--}}   
    @if ($full)
        <div class="text-md">
            <span>{{($post->body)}}</span>            
        </div>
        
    @else
        <div class="text-md">
            <p>{{Str::words($post->body, 15)}}</p>
            <a href="{{route('posts.show', $post)}}" class="text-pink-500 text-xl font-bold animate-pulse">Read more &rarr;</a>
        </div>        
    @endif  
    <div class="flex items-center justify-end gap-4 mt-6">
        {{$slot}}
    </div>
</div>
        
