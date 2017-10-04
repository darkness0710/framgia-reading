<div id="loginModal" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" data-backdrop="static" data-keyboard="false" data-replace="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-center">{{ trans('messages.login_title') }}</h4>
    </div>
    <div class="modal-body">
        <div class="row gap-20">
            <div class="col-sm-6 col-md-6">
                <button class="btn btn-facebook btn-block mb-5-xs">{{ trans('messages.login_fb') }}</button>
            </div>
            <div class="col-sm-6 col-md-6">
                <button class="btn btn-google-plus btn-block">{{ trans('messages.login_gg') }}</button>
            </div>
            <div class="col-md-12">
                <div class="login-modal-or">
                    <div><span>{{ trans('messages.or') }}</span></div>
                </div>
            </div>

            {{ csrf_field() }}
            
            {!! Form::open([
                'role' => 'form',
                'id' => 'login_form'
            ]) !!}

                {!! BsForm::formItem('email', [
                    'label' => [
                        trans('messages.email'),
                        'options' => [
                            'class' => 'col-md-4 control-label',
                        ],
                    ],
                    'input' => [
                        'type' => 'email',
                        'options' => [
                            'class' => 'form-control',
                            'required' => true,
                            'placeholder' => trans('messages.enter_email'),
                        ],
                    ],
                    'div' => [
                        'class' => 'col-md-12'
                    ],
                    'error' => [
                        'id' => 'login_error_email',
                    ],
                    'template' => "
                        <div class='form-group'>
                            <div class='{div}'>
                                {label}
                                {input}
                                {error}
                            </div>
                        </div>",
                ]) !!}

                {!! BsForm::formItem('password', [
                    'label' => [
                        trans('messages.password'),
                        'options' => [
                            'class' => 'col-md-4 control-label',
                        ],
                    ],
                    'input' => [
                        'type' => 'password',
                        'options' => [
                            'class' => 'form-control',
                            'required' => true,
                            'placeholder' => trans('messages.input_placeholder', [
                                'min' => 8,
                                'max' => 20,
                            ]),
                        ],
                    ],
                    'div' => [
                        'class' => 'col-sm-12 col-md-12'
                    ],
                    'error' => [
                        'id' => 'login_error_password',
                    ],
                    'template' => "
                        <div class='form-group'>
                            <div class='{div}'>
                                {label}
                                {input}
                                {error}
                            </div>
                        </div>",
                ]) !!}

                <div class="col-sm-6 col-md-6 div-margin-top">
                    <div class="checkbox-block">
                        {!! BsForm::formItem('remember', [
                                'label' => [
                                    trans('messages.remember_me'),
                                ],
                                'input' => [
                                    'type' => 'checkbox',
                                    'options' => [
                                        'id' => 'remember',
                                        'class' => 'checkbox',
                                        'value' => 'First Choice',
                                    ],
                                ],
                                'div' => [
                                    'class' => 'col-md-12'
                                ],
                                'template' => "
                                    <div class='form-group'>
                                        <div class='{div}'>
                                            {input}
                                            {label}
                                        </div>
                                    </div>",
                            ]) !!}
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 div-margin-top">
                    <div class="login-box-link-action">
                        <a data-toggle="modal" href="#forgotPasswordModal" class="block line18 mt-1">{{ trans('messages.forgot_password') }}</a> 
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="login-box-box-action">
                        {{ trans('messages.no_account') }}<a data-toggle="modal" href="#registerModal">{{ trans('messages.register') }}</a>
                    </div>
                </div>
        </div>
    </div>
    <div class="modal-footer text-center">
        {!! Form::submit(trans('messages.login'), [
            'class' => 'btn btn-primary',
            'id' => 'btn_login',
        ]) !!}
        <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">{{ trans('messages.close') }}</button>
    </div>
    {!! Form::close() !!}
</div>
