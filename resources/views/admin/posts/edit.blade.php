<x-layout>
    <a href="{{ route('dashboard') }}" class="block mb-12 text-xl font-bold text-blue-700 animate-pulse">&larr; Go back to your dashboard</a>
    {{-- edit post form --}}
        <div class="card">
            <h2 class="font-bold mb-4">Update your post</h2>
            <form action="{{ route('admin.posts.update', $post) }}" method="post"
            enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- Post title --}}
                <div class="mb-4">
                    <label for="title">Post Title</label>
                    <input type="text" name="title" value="{{ old('title', $post->title) }}"
                    class="input @error('title') ring-red-500 @enderror">
                    @error('title')
                    <p class="error"> {{ $message }}</p>
                    @enderror
                </div>
                {{-- Post content --}}
                <div class="mb-4">
                    <label for="body">Post Content</label>
                    <textarea name="body" rows="5" class="input @error('body') ring-
                    red-500 @enderror">{{ old('body', $post->body) }}</textarea>
                    @error('body')
                    <p class="error"> {{ $message }}</p>
                    @enderror
                </div>
                {{-- current Featured photo --}}
                <div class="h-52 rounded-md mb-4 object-cover overflow-hidden">
                    <label class="block mb-1">Current featured photo</label>
                    @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt=""
                    class="h-full object-contain">
                    @else
                    <img src="{{ asset('storage/post_images/default.jpg') }}"
                    alt="" class="h-full object-contain">
                    @endif
                </div>
                {{-- Upload new featured image --}}
                <div class="mb-4">
                    <label for="image">Featured image</label>
                    <input type="file" name="image" id="image"
                    class="file:mr-4 file:py-2 file:px-4 file:text-sm file:font-
                    semibold file:bg-gray-200 hover:file:bg-blue-100">
                    @error('image')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Select author --}}
                <div class="mb-4">
                    <label for="user_id">Author</label>
                    <select name="user_id" id="user_id" class="input
                    @error('user_id') ring-red-500 @enderror">
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}" @selected(old('user_id',
                    $post->user_id) == $user->id)>{{ $user->first_name }}</option>
                    @endforeach
                    </select>
                    @error('user_id')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Submit button --}}
                <button class="bg-pink-600 block mx-auto btn">Update</button>
            </form>
        </div>
</x-layout>