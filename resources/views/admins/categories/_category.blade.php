@if(!$categories->isEmpty())      
    <div class="col-md-8">
        <div class="table-responsive tbl-four">
            <table class="table table-bordered bor-bot four-color">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('admin-categories.title') }}</th>
                        <th>{{ trans('admin-categories.description') }}</th>
                        <th>{{ trans('admin-categories.edit') }}</th>
                        <th>{{ trans('admin-categories.delete') }}</th>
                    </tr>
                </thead>
                <tbody class="thum-photo">
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                <div class="mt-30">{{ $loop->iteration }}</div>
                            </td>
                            <td>
                                <div class="mt-30">{{ $category->title }}</div>
                            </td>
                            <td>
                                <div class="mt-30">{{ $category->description }}</div>
                            </td>      
                            <td> 
                                <button type="submit" class="fa fa-pencil mt-30"></button>
                            </td>
                            <td>
                                <button type="submit" class="fa fa-trash mt-30"></button>
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
                        {{ $categories->links() }}
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
