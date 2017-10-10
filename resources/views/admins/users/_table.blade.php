@if(!$users->isEmpty())    
    <div class="row">
        <div id="tbl">
            <div class="text-center">
                <h1><span class="fontSize">{{ trans('admin-users.manage_users') }}</span></h1>
            </div>
            <div class="animatedParent no-more-tables">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <button class="btn btn-warning btn-block mb-10" data-toggle="modal" id="modal-new" data-target="#modal-new-subjects"><i class="fa fa-plus" aria-hidden="true"></i> {{ trans('admin-subjects.new') }}</button>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control mb-10" placeholder="Ex: Php master" id="nameSearch" />
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-warning btn-block mb-10">{{ trans('admin-subjects.search') }}</button>
                        </div>
                        <div class="col-md-8">
                            <div class="table-responsive tbl-four">
                                <table class="table table-bordered bor-bot four-color">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Avatar</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>View</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody class="thum-photo">
                                        @foreach($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="mt-30">{{ $loop->iteration }}</div>
                                                </td>
                                                <td>
                                                    <div class="mt-30">{{ $user->name }}</div>
                                                </td>
                                                <td><img src="{{ $user->avatar }}" id="imageSize"></td>
                                                <td>
                                                    <div class="mt-30">{{ $user->email }}</div>
                                                </td>
                                                <td>
                                                    <div class="mt-30">{{ $user->role }}</div>
                                                </td>
                                                <td> 
                                                    <button type="submit" class="fa fa-eye mt-30"></button>
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
                                            {{ $users->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="text-center">{{ trans('view.not_found_lucky') }}</div>
@endif
