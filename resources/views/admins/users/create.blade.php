<div id="modal_create_user" class="modal fade login-box-wrapper" tabindex="-1" data-width="750" data-backdrop="static" data-keyboard="false" data-replace="true">
    <div class="modal-header height-70">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-center">Create new user</h4>
    </div>

    {{ Form::open([
        'class' => 'form-horizontal pl-15',
        'id' => 'create-user'
    ]) }}
    {{ csrf_field() }}
    <div class="modal-body">
        <div class="row scrollable height-320">
            <div class="modal-border">

                    <div class="form-group pl-20">
                        {{ Form::label('avatar', trans('messages.avatar'), [
                            'class' => "col-md-3 no-padding",
                        ]) }}
                        <div class="col-md-9">
                            <img id="avatar" class="image sm-avatar height-170" accept="image"
                                src="{{ asset('images/default-avatar.jpg') }}"/>
                            {{ Form::file('avatar', [
                                'class' => 'mt-20',
                                'id' => 'upload-avatar',
                            ]) }}
                            <strong class="alert-danger"></strong>
                        </div>
                    </div>
                    <div class="form-group pl-20">
                        {{ Form::label('name', trans('messages.name'), [
                            'class' => "col-md-3 no-padding",
                        ]) }}
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-3">
                                    {{ Form::select('gender', [
                                        'male' => 'Mr.',
                                        'female' => 'Ms.'
                                    ], trans('messages.gender'), [
                                        'class' => 'form-control',
                                        'required' => true,
                                    ]) }}
                                </div>
                                <div class="col-md-9">
                                    {{ Form::text('name', null, [
                                        'class' => 'form-control',
                                        'required' => true,
                                    ]) }}
                                </div>
                                <strong class="alert-danger" id='admin_error_name'></strong>
                            </div>
                        </div>
                    </div>
                    <div class="form-group pl-20">
                        {{ Form::label('email', trans('messages.email'), [
                            'class' => "col-md-3 no-padding  mt-5",
                        ]) }}

                        <div class="col-md-9">
                            {{ Form::email('email', null, [
                                'class' => 'form-control',
                                'required' => true,
                            ]) }}
                            <strong class="alert-danger" id='admin_error_email'></strong>
                        </div>
                    </div>
                    <div class="form-group mt-20 pl-20">
                        {{ Form::label('mobile', trans('messages.mobile'), [
                            'class' => "col-md-3 no-padding  mt-5",
                        ]) }}

                        <div class="col-md-9">
                            {{ Form::text('mobile', null, [
                                'class' => 'form-control',
                            ]) }}
                            <strong class="alert-danger" id='admin_error_mobile'></strong>
                        </div>
                    </div>
                    <div class="form-group pl-20">
                        {{ Form::label('password', trans('messages.password'), [
                            'class' => "col-md-3 no-padding  mt-5",
                        ]) }}

                        <div class="col-md-9">
                            {{ Form::password('password', [
                                'class' => 'form-control',
                                'required' => true,
                            ]) }}
                            <strong class="alert-danger" id='admin_error_password'></strong>
                        </div>
                    </div>
                    <div class="form-group clearfix pl-20">
                        {{ Form::label('password_confirmation', trans('messages.confirm-password'), [
                            'class' => "col-md-3 no-padding mt-5",
                        ]) }}

                        <div class="col-md-9">
                            {{ Form::password('password_confirmation', [
                                'class' => 'form-control',
                                'required' => true,
                            ]) }}
                        </div>
                    </div>
                    <div class="form-group mt-20 pl-20">
                        {{ Form::label('dob', trans('messages.dob'), [
                            'class' => "col-md-3 mt-5 no-padding",
                        ]) }}

                        <div class="col-md-9">
                            {{ Form::text('dob', null, [
                                'class' => 'form-control',
                                'id' => "dob",
                            ]) }}
                            <strong class="alert-danger" id='admin_error_dob'></strong>
                        </div>
                    </div>
                    <div class="form-group mt-20 pl-20">
                        {{ Form::label('address', trans('messages.address'), [
                            'class' => "col-md-3 no-padding mt-5",
                        ]) }}

                        <div class="col-md-9">
                            {{ Form::text('address', null, [
                                'class' => 'form-control',
                            ]) }}
                            <strong class="alert-danger" id='admin_error_address'></strong>
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
    {{ Html::script('admin/js/create_user.js') }}
    {{ Html::script('js/upload-avatar.js') }}
@endpush
