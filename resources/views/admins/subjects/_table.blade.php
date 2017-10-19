@if(!$subjects->isEmpty())    
    <div class="row">
        <div id="tbl">
            <div class="text-center">
                <h1><span class="fontSize">{{ trans('admin-subjects.manage_subject') }}</span></h1>
            </div>

            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            @endif

            <div class="animatedParent no-more-tables">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <button class="btn btn-warning btn-block mb-10" data-toggle="modal" id="modal-new" data-target="#modal-new-subjects"><i class="fa fa-plus" aria-hidden="true"></i> {{ trans('admin-subjects.new') }}</button>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control mb-10" placeholder="{{ trans('admin-subjects.search_placeholder') }}" id="nameSearch" />
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-warning btn-block mb-10" id="admin-search-subjects">{{ trans('admin-subjects.search') }}</button>
                        </div>
                        <div id="ajax_table_subjects">
                            @include('admins.subjects._subject')
                        </div>
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
