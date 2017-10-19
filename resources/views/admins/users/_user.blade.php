@if(!$users->isEmpty())
    <div class="col-md-8">
        <div class="table-responsive tbl-four">
            <table class="table table-bordered bor-bot four-color">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('admin-users.name') }}</th>
                        <th>{{ trans('admin-users.avatar') }}</th>
                        <th>{{ trans('admin-users.email') }}</th>
                        <th>{{ trans('admin-users.role') }}</th>
                        <th>{{ trans('admin-users.view') }}</th>
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
                            <td>
                                <div class="admin-user-avatar"><img src="{{ $user->avatar }}" id="avatarUser" ></div></td>
                            <td>
                                <div class="mt-30">{{ $user->email }}</div>
                            </td>
                            <td>
                                <div class="mt-30">{{ $user->role }}</div>
                            </td>
                            <td>
                                <a href="{{ route('user.profile', $user->id) }}">
                                    <button type="submit" class="fa fa-eye mt-30"></button>
                                </a>
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
@else
    <div class="col-md-8">
        <div class="text-center">{{ trans('view.not_found_lucky') }}</div>
    </div>
@endif

