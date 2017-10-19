@if(!$books->isEmpty())
    <div class="col-md-8">
        <div class="table-responsive tbl-four">
            <table class="table table-bordered bor-bot four-color">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('admin-books.title') }}</th>
                        <th>{{ trans('admin-books.image') }}</th>
                        <th>{{ trans('admin-books.author') }}</th>
                        <th>{{ trans('admin-books.view') }}</th>
                        <th>{{ trans('admin-books.edit') }}</th>
                        <th>{{ trans('admin-books.delete') }}</th>
                    </tr>
                </thead>
                <tbody class="thum-photo">
                    @foreach($books as $book)
                        <tr>
                            <td>
                                <div class="mt-30">{{ $loop->iteration }}</div>
                            </td>
                            <td>
                                <div class="mt-30">{{ $book->title }}</div>
                            </td>
                            <td><img src="{{ $book->cover }}" id="imageSize"></td>
                            <td>
                                <div class="mt-30">{{ $book->author }}</div>
                            </td>
                            <td>
                                <button class="fa fa-eye mt-30" id="{{ 'btn_show_' . $book->id }}"></button>
                            </td>
                            <td>
                                <button class="fa fa-edit mt-30" id="{{ 'btn_edit_' . $book->id }}"></button>
                            </td>
                            <td>
                                {{ Form::open(['route' => ['admin.book.destroy', 'id' => $user->id, 'book_id' => $book->id], 'method' => 'delete']) }}
                                    <button type="submit" class="fa fa-trash mt-30"></button>
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pager-wrappper clearfix">
            <div class="pager-innner">
                <div class="clearfix">
                    <div id="paginate">
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="col-md-8">
        <div class="text-center">{{ trans('view.not_found_lucky') }}</div>
    </div>
@endif
