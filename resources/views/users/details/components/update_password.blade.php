@extends('users.details.master')

@section('container')
    @include('users.details.components.menu')

    <div class="col-xs-12 col-sm-8 col-md-9 mt-20">
        <div class="dashboard-wrapper">
            <h4 class="section-title">
                {{ trans('messages.change_password') }}
            </h4>

            {!! Form::open([
                'method' => 'POST',
                'url' => action('Web\UserController@updatePassword', [
                    'id' => $user->id,
                ]),
            ]) !!}
                @if (session('status') == 'success')
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @elseif (session('status') == 'fail')
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="row gap-20">
                    <div class="col-md-8">
                        {!! BsForm::formItem('current_password', [
                            'label' => [
                                trans('messages.current_password'),
                            ],
                            'input' => [
                                'type' => 'password',
                                'options' => [
                                    'id' => 'current_password',
                                    'required' => true,
                                    'autofocus' => true,
                                ],
                            ],
                            'template' => "
                            <div>
                                {label}
                                {input}
                                {error}
                            </div>",
                        ]) !!}
                    </div>
                    <div class="clear"></div>

                    <div class="col-md-8">
                        {!! BsForm::formItem('new_password', [
                            'label' => [
                                trans('messages.new_password'),
                            ],
                            'input' => [
                                'type' => 'password',
                                'options' => [
                                    'id' => 'new_password',
                                    'required' => true,
                                ],
                            ],
                            'error' => [
                                'id' => 'new_pw_error',
                            ],
                            'template' => "
                            <div>
                                {label}
                                {input}
                                {error}
                            </div>",
                        ]) !!}
                    </div>
                    <div class="clear"></div>

                    <div class="col-md-8">
                        {!! BsForm::formItem('confirm_password', [
                            'label' => [
                                trans('messages.confirm_password'),
                            ],
                            'input' => [
                                'type' => 'password',
                                'options' => [
                                    'id' => 'confirm_password',
                                    'required' => true,
                                ],
                            ],
                            'template' => "
                            <div>
                                {label}
                                {input}
                                {error}
                            </div>",
                        ]) !!}
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="clear mt-50"></div>
                    <div class="col-sm-12">
                        {!! Form::submit(trans('messages.save'), [
                                'class' => 'btn btn-primary',
                                'id' => 'btn_save_pw',
                        ]) !!}

                        {!! Form::button(trans('messages.cancel'), [
                            'class' => 'btn btn-primary btn-border',
                            'id' => 'cancel',
                        ]) !!}
                    </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
