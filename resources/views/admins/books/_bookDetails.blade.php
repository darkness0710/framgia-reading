<div class="modal-border">
    <div class="form-group pl-20 clearfix">
        <div class="col-md-8">
            <img id="cover" class="image sm-avatar height-170" accept="image"
            src="{{ $book->cover }}"/>
        </div>
    </div>
    <div class="form-group pl-20 clearfix">
        <label for="title" class="col-md-3">{{ trans('admin-books.title') }}</label>
        <div class="col-md-8">
            <h4>{{ $book->title ?: trans('messages.no_data') }}</h4>
        </div>
    </div>
    <div class="form-group pl-20 clearfix">
        <label for="description" class="col-md-3 mt-5">{{ trans('messages.description') }}</label>
        <div class="col-md-8">
            <h4>{{ $book->description ?: trans('messages.no_data') }}</h4>
        </div>
    </div>
    <div class="form-group mt-20 pl-20 clearfix">
        <label for="author" class="col-md-3 mt-5">{{ trans('messages.author') }}</label>

        <div class="col-md-8">
            <h4>{{ $book->author ?: trans('messages.no_data') }}</h4>
        </div>
    </div>
    <div class="form-group mt-20 pl-20 clearfix">
        <label for="category" class="col-md-3 mt-5">{{ trans('admin-books.category') }}</label>

        <div class="col-md-8">
            <h4>{{ $book->category ?: trans('messages.no_data') }}</h4>
        </div>
    </div>
    <div class="form-group pl-20 clearfix">
        <label for="status" class="col-md-3 mt-5">{{ trans('messages.status') }}</label>

        <div class="col-md-8">
            <h4>{{ $book->status ?: trans('messages.no_data') }}</h4>
        </div>
    </div>
    <div class="form-group clearfix pl-20 clearfix">
        <label for="publisher" class="col-md-3 mt-5">{{ trans('admin-books.publisher') }}</label>

        <div class="col-md-8">
            <h4>{{ $book->publisher ?: trans('messages.no_data') }}</h4>
        </div>
    </div>
    <div class="form-group mt-20 pl-20 clearfix">
        <label for="pages" class="col-md-3 mt-5">{{ trans('messages.pages') }}</label>

        <div class="col-md-8">
            <h4>{{ $book->pages ?: trans('messages.no_data') }}</h4>
        </div>
    </div>
    <div class="form-group pl-20 clearfix">
        <label for="language" class="col-md-3 mt-5">{{ trans('admin-books.language') }}</label>

        <div class="col-md-8">
            <h4>{{ $book->language ?: trans('messages.no_data') }}</h4>
        </div>
    </div>
    <div class="form-group pl-20 clearfix">
        <label for="year" class="col-md-3 mt-5">{{ trans('admin-books.year') }}</label>

        <div class="col-md-8">
            <h4>{{ $book->year ?: trans('messages.no_data') }}</h4>
        </div>
    </div>
    <div class="form-group mt-20 pl-20 clearfix">
        <label for="summary" class="col-md-3 mt-5">{{ trans('messages.summary') }}</label>

        <div class="col-md-8">
            <h4>{{ $book->summary ?: trans('messages.no_data') }}</h4>
        </div>
    </div>
</div>
