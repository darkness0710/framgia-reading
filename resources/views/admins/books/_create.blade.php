<div id="modal-new-subjects" class="modal fade login-box-wrapper max-height-500" tabindex="-1"
    data-width="750" data-backdrop="static" data-keyboard="false"
    data-replace="true">
    <div class="modal-header height-70">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-center">Create new book</h4>
    </div>

    {{ Form::open([
        'class' => 'form-horizontal ml-10',
        'id' => 'create-user'
    ]) }}
    {{ csrf_field() }}
    <div class="modal-body padding-20">
        <div class="row height-320">
            <div class="modal-border">

                    <div class="form-group pl-20">
                        {{ Form::label('cover', trans('admin-books.cover'), [
                            'class' => "col-md-3",
                        ]) }}
                        <div class="col-md-8">
                            <img id="cover" class="image sm-avatar height-170" accept="image"
                                src="{{ asset('images/5.png') }}"/>
                            {{ Form::file('cover', [
                                'class' => 'mt-20',
                                'id' => 'upload-cover',
                            ]) }}
                            <strong class="alert-danger" id='error_book_cover'></strong>
                        </div>
                    </div>
                    <div class="form-group pl-20">
                        {{ Form::label('title', trans('admin-books.title'), [
                            'class' => "col-md-3",
                        ]) }}
                        <div class="col-md-8">
                            {{ Form::text('title', null, [
                                'class' => 'form-control',
                                'required' => true,
                            ]) }}
                            <strong class="alert-danger" id='error_book_title'></strong>
                        </div>
                    </div>
                    <div class="form-group pl-20">
                        {{ Form::label('description', trans('messages.description'), [
                            'class' => "col-md-3 mt-5",
                        ]) }}

                        <div class="col-md-8">
                            {{ Form::textarea('description', null, [
                                'class' => 'form-control',
                                'required' => true,
                                'row' => 5,
                            ]) }}
                            <strong class="alert-danger" id='error_book_description'></strong>
                        </div>
                    </div>
                    <div class="form-group mt-20 pl-20">
                        {{ Form::label('author', trans('messages.author'), [
                            'class' => "col-md-3 mt-5",
                        ]) }}

                        <div class="col-md-8">
                            {{ Form::text('author', null, [
                                'class' => 'form-control',
                                'required' => true,
                            ]) }}
                            <strong class="alert-danger" id='error_book_author'></strong>
                        </div>
                    </div>
                    <div class="form-group mt-20 pl-20">
                        {{ Form::label('category', trans('admin-books.category'), [
                            'class' => "col-md-3 mt-5",
                        ]) }}

                        <div class="col-md-8">
                            {{ Form::select('category', $categories, trans('messages.category'), [
                                'class' => 'form-control',
                                'required' => true,
                            ]) }}
                            <strong class="alert-danger" id='error_book_category'></strong>
                        </div>
                    </div>
                    <div class="form-group pl-20">
                        {{ Form::label('status', trans('messages.status'), [
                            'class' => "col-md-3 mt-5",
                        ]) }}

                        <div class="col-md-8">
                            {{ Form::select('status', [
                                '1' => '1-' . trans('messages.in_progress'),
                                '2' => '2-' . trans('messages.done'),
                            ], trans('messages.status'), [
                                'class' => 'form-control',
                                'required' => true,
                            ]) }}
                            <strong class="alert-danger" id='error_book_status'></strong>
                        </div>
                    </div>
                    <div class="form-group clearfix pl-20">
                        {{ Form::label('publisher', trans('admin-books.publisher'), [
                            'class' => "col-md-3 mt-5",
                        ]) }}

                        <div class="col-md-8">
                            {{ Form::text('publisher', null, [
                                'class' => 'form-control',
                                'required' => true,
                            ]) }}
                            <strong class="alert-danger" id='error_book_publisher'></strong>
                        </div>
                    </div>
                    <div class="form-group mt-20 pl-20">
                        {{ Form::label('pages', trans('messages.pages'), [
                            'class' => "col-md-3 mt-5",
                        ]) }}

                        <div class="col-md-8">
                            {{ Form::number('pages', null, [
                                'class' => 'form-control',
                                'id' => "pages",
                                'required' => true,
                            ]) }}
                            <strong class="alert-danger" id='error_book_pages'></strong>
                        </div>
                    </div>
                    <div class="form-group pl-20">
                        {{ Form::label('language', trans('admin-books.language'), [
                            'class' => "col-md-3 mt-5",
                        ]) }}

                        <div class="col-md-8">
                            {{ Form::text('language', null, [
                                'class' => 'form-control',
                                'required' => true,
                            ]) }}
                            <strong class="alert-danger" id='error_book_language'></strong>
                        </div>
                    </div>
                    <div class="form-group pl-20">
                        {{ Form::label('year', trans('admin-books.year'), [
                            'class' => "col-md-3 mt-5",
                        ]) }}

                        <div class="col-md-8">
                            {{ Form::text('year', null, [
                                'class' => 'form-control',
                                'required' => true,
                                'id' => 'year',
                            ]) }}
                            <strong class="alert-danger" id='error_book_year'></strong>
                        </div>
                    </div>
                    <div class="form-group mt-20 pl-20">
                        {{ Form::label('summary', trans('messages.summary'), [
                            'class' => "col-md-3 mt-5",
                        ]) }}

                        <div class="col-md-8">
                            {{ Form::textarea('summary', null, [
                                'class' => 'form-control',
                                'required' => true,
                            ]) }}
                            <strong class="alert-danger" id='error_book_summary'></strong>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="modal-footer height-70">
        <div class="row pull-right lt-20 mr-20">
            <button type="button"
                class="btn btn-primary btn-sm" id="btn_submit">
                {{ trans('messages.create') }}
            </button>
            <button type="button" data-dismiss="modal"
                class="btn btn-default btn-sm ml-10" id="btn_clear">
                {{ trans('messages.cancel') }}
            </button>
        </div>
    </div>

    {{ Form::close() }}
</div>

@push('scripts')
    {{ Html::script('admin/js/create_book.js') }}
@endpush

@section('script')
<script type="text/javascript">
    var create_book = new create_book();
    create_book.init({
        user_id: {{ Auth::id() }},
    });
</script>
@endsection
