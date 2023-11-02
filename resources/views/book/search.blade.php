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
                    <h1 class="text-2xl">検索する</h1>
                    <x-form method="POST" action="" class="py-5">
                        @csrf
                        <x-input
                            type="text"
                            label="キーワード"
                            wire:model="keyword"
                            name="keyword"
                            class="input input-bordered border-gray-200"
                            placeholder="田辺 聖子"
                            value="{{ old('keyword', $keyword ?? '') }}" />
                        <x-input
                            type="text"
                            label="タイトル"
                            wire:model="title"
                            name="title"
                            class="input input-bordered border-gray-200"
                            placeholder="ジョゼと虎と魚たち"
                            value="{{ old('title', $title ?? '') }}" />
                        <x-input
                            type="text"
                            label="ジャンル"
                            wire:model="booksGenreId"
                            name="booksGenreId"
                            class="input input-bordered border-gray-200"
                            placeholder="ジャンルを選択してください"
                            value="{{ old('booksGenreId', $booksGenreId ?? '') }}" />
                        <x-slot:actions>
                            <x-button label="検索" class="btn btn-info" type="submit" style="color: white" />
                        </x-slot:actions>
                    </x-form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-0.5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl">検索結果一覧</h1>
                    <div>
                        <div class="overflow-x-auto">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>画像</th>
                                        <th>タイトル</th>
                                        <th>著者</th>
                                        <th>出版社</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                @isset($bookLists)
                                    @foreach ($bookLists as $book)
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <img src='{{ $book["Item"]["mediumImageUrl"] }}' alt="" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="font-bold">{{ $book["Item"]["title"] }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $book["Item"]["author"] }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $book["Item"]["publisherName"] }}</p>
                                                </td>
                                                <td>
                                                    <input type="submit" value="読みたい" class="btn btn-neutral" style="color: white" />
                                                </td>
                                                <td>
                                                    <input type="submit" value="読了" class="btn btn-info" style="color: white" />
                                                </td>
                                            </tr>
                                        </tbody>  
                                    @endforeach
                                @endisset
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>