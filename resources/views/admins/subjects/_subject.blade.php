@if(!$subjects->isEmpty())    
    <div class="col-md-8">
        <div class="table-responsive tbl-four">
            <table class="table table-bordered bor-bot four-color">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('admin-subjects.title') }}</th>
                        <th>{{ trans('admin-subjects.image') }}</th>
                        <th>{{ trans('admin-subjects.description') }}</th>
                        <th>{{ trans('admin-subjects.trending') }}</th>
                        <th>{{ trans('admin-subjects.create_date') }}</th>
                        <th>{{ trans('admin-subjects.edit') }}</th>
                        <th>{{ trans('admin-subjects.delete') }}</th>
                    </tr>
                </thead>
                <tbody class="thum-photo">
                    @foreach($subjects as $subject)
                        <tr>
                            <td>
                                <div class="mt-30">{{ $loop->iteration }}</div>
                            </td>
                            <td>
                                <div class="mt-30">{{ $subject->title }}</div>
                            </td>
                            <td><img src="{{ $subject->cover }}" id="imageSize"></td>
                            <td>
                                <div class="mt-30">{{ $subject->description }}</div>
                            </td>
                            <td>
                                <div class="mt-30">{{ $subject->trending }}</div>
                            </td>
                            <td>
                                <div class="mt-30">{{ $subject->created_at }}</div>
                            </td>
                            <td> 
                                <a href="#" subject_id={{ $subject->id }} data-hover="tooltip" data-placement="top" data-target="#modal-edit-subjects" data-toggle="modal" id="modal-edit" type="button" class="fa fa-pencil mt-30"></a>
                            </td>
                            <td>
                                {{ Form::open(['route' => ['admin.subject.destroy', 'id' => $user->id, 'subject_id' => $subject->id], 'method' => 'delete']) }}
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
                        {{ $subjects->links() }}
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
