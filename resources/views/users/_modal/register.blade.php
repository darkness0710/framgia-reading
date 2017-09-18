<div id="registerModal" class="modal fade login-box-wrapper" tabindex="-1" data-backdrop="static" data-keyboard="false" data-replace="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-center">{{ trans('messages.register_title') }}</h4>
    </div>
    <div class="modal-body">
        <div class="row gap-20">
            <div class="col-sm-6 col-md-6">
                <button class="btn btn-facebook btn-block mb-5-xs">{{ trans('messages.register_fb') }}</button>
            </div>
            <div class="col-sm-6 col-md-6">
                <button class="btn btn-google-plus btn-block">{{ trans('messages.register_gg') }}</button>
            </div>
            <div class="col-md-12">
                <div class="login-modal-or">
                    <div><span>{{ trans('messages.or') }}</span></div>
                </div>
            </div>
            {!! Form::open([
                'role' => 'form',
                'id' => 'register_form'
            ]) !!}
                {!! BsForm::formItem('name', [
                    'label' => [
                        trans('messages.name'),
                        'options' => [
                            'class' => 'col-md-3 control-label',
                        ],
                    ],
                    'input' => [
                        'type' => 'text',
                        'options' => [
                            'class' => 'form-control',
                            'autofocus' => true,
                            'required' => true,
                            'placeholder' => trans('messages.enter_name'),
                        ],
                    ],
                    'div' => [
                        'class' => 'col-sm-12 col-md-12'
                    ],
                    'error' => [
                        'id' => 'error_name',
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

                {!! BsForm::formItem('email', [
                    'label' => [
                        trans('messages.email'),
                        'options' => [
                            'class' => 'col-md-3 control-label',
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
                        'class' => 'col-sm-12 col-md-12'
                    ],
                    'error' => [
                        'id' => 'error_email',
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
                            'class' => 'col-md-3 control-label',
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
                        'id' => 'error_password',
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

                {!! BsForm::formItem('password_confirmation', [
                    'label' => [
                        trans('messages.password_confirmation'),
                        'options' => [
                            'class' => 'col-md-6 control-label',
                        ],
                    ],
                    'input' => [
                        'type' => 'password',
                        'options' => [
                            'class' => 'form-control',
                            'required' => true,
                            'placeholder' => trans('messages.retype_password'),
                        ],
                    ],
                    'div' => [
                        'class' => 'col-sm-12 col-md-12'
                    ],
                    'error' => [
                        'id' => 'error_password_confirmation',
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

                <div class="col-md-12 div-margin-top">
                    <div class="checkbox-block margin"> 
                        <input id="register_accept_checkbox" name="register_accept_checkbox" class="checkbox" value="First Choice" type="checkbox" checked="checked"> 
                        <label class="" for="register_accept_checkbox">{{ trans('messages.term_accept') }}</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="login-box-box-action">
                        {{ trans('messages.have_account') }}<a data-toggle="modal" href="#loginModal"> {{ trans('messages.login') }}</a>
                    </div>
                </div>
        </div>
    </div>
    <div class="modal-footer text-center">
        {!! Form::submit(trans('messages.register'), [
            'class' => 'btn btn-primary',
            'id' => 'submit_btn',
        ]) !!}
        <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">{{ trans('messages.close') }}</button>
    </div>

    {!! Form::close() !!}
</div>
