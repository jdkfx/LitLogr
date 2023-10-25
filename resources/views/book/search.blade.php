<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('検索') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-form method="POST" action="">
                        @csrf
                        <x-input
                            type="text"
                            label="キーワード"
                            wire:model="keyword"
                            name="keyword"
                            class="input input-bordered border-gray-200"
                            placeholder="田辺 聖子" />
                        <x-input
                            type="text"
                            label="タイトル"
                            wire:model="title"
                            name="title"
                            class="input input-bordered border-gray-200"
                            placeholder="ジョゼと虎と魚たち" />
                        <x-input
                            type="text"
                            label="ジャンル"
                            wire:model="booksGenreId"
                            name="booksGenreId"
                            class="input input-bordered border-gray-200"
                            placeholder="ジャンルを選択してください" />
                        <x-slot:actions>
                            <x-button label="検索" class="btn btn-info" type="submit" />
                        </x-slot:actions>
                    </x-form>
                    <div>
                        @isset($bookLists)
                            {{!! $bookLists !!}}
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>