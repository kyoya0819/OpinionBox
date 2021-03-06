<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            <a href="{{ route('post.index') }}">Box</a><i class="fas fa-angle-right mx-3"></i>未承認の意見
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="px-4 sm:px-0">
            <h1 class="text-xl font-bold text-gray-700 md:text-2xl">未承認の意見</h1>
            <p class="mt-2 text-gray-600">未承認で非公開中の全ての意見を表示しています。</p>
        </div>
        @forelse($posts as $post)
            <div class="mt-6">
                <div class="mx-auto max-w-4xl px-10 py-6 bg-white rounded-lg shadow-md">
                    <div class="mt-2"><a href="{{ route('post.show', [$post->id]) }}" class="text-2xl text-gray-700 font-bold hover:underline">{{ $post->title }}</a>
                        <p class="mt-2 text-gray-600 max-h-24 truncate">
                            {{ $post->content }}
                        </p>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('post.show', [$post->id]) }}" class="text-blue-500 hover:underline">もっと見る</a>
                        <div class="flex justify-end items-center mt-4">
                            <div class="flex items-center">
                                <img src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}さんのプロフィール画像" class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block ">
                                <h1 class="text-gray-700 font-bold">{{ $post->user->name }}</h1>
                                <span class="ml-3 font-light text-gray-600">{{ $post->created_at }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="mt-6">
                <div class="mx-auto max-w-4xl px-10 py-6 text-center bg-white rounded-lg shadow-md">
                    <h1 class="text-gray-700 font-bold cursor-pointer">まだ表示できる意見がない様です</h1>
                </div>
            </div>
        @endforelse
        <div class="mx-auto max-w-4xl">
            {{ $posts->links() }}
        </div>

    </div>
</x-app-layout>
