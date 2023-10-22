<form method="POST" action="" class="form-inline">
    @csrf
    <div class="form-group">
        <input type="text" name="keyword" class="form-control" placeholder="キーワード">
    </div>
    <div class="form-group">
        <input type="text" name="title" class="form-control" placeholder="タイトル">
    </div>
    <div class="form-group">
        <input type="text" name="booksGenreId" class="form-control" placeholder="ジャンルを選択してください">
    </div>
    <div class="form-group">
        <input type="submit" value="検索" class="btn btn-info">
    </div>
</form>

@isset($bookLists)
{{!! $bookLists !!}}
@endisset

@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach