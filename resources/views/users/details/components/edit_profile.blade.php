@extends('users.details.master')

@push('scripts')
    {!! Html::script(asset('js/upload-avatar.js')) !!} 
    {!! Html::script(asset('js/user_update_profile.js')) !!}
@endpush

@section('container')
    @include('users.details.components.menu')
    <div class="col-xs-12 col-sm-8 col-md-9 mt-20">
        <div class="dashboard-wrapper">
            <h4 class="section-title">
                {{ trans('') }}
            </h4>
        </div>

            {!! Form::open([
                'file' => true,
                'role' => 'form',
                'id' => 'form_edit_profile',
                'enctype' => "multipart/form-data",
            ]) !!}
                <div class="row gap-20">

                <img id="avatar" class="avatar" src="{{ Auth::user()->getAvatar(Auth::user()->id) }}" alt="avatar"/>

                    <div class="col-sm-10 col-md-8">
                        
                        {!! BsForm::formItem('avatar', [
                            'label' => [
                                trans('messages.avatar'),
                            ],
                            'input' => [
                                'type' => 'file',
                                'options' => [
                                    'id' => 'upload-avatar',
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
                    <div class="col-sm-10 col-md-8">

                        {!! BsForm::formItem('name', [
                            'label' => [
                                trans('messages.name'),
                                'options' => [
                                    'class' => 'col-md-5 control-label',
                                ],
                            ],
                            'input' => [
                                'type' => 'text',
                                'value' => $user->name,
                                'options' => [
                                    'class' => 'form-control',
                                ],
                            ],
                            'div' => [
                                'class' => 'col-md-12'
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
                    </div>

                    <div class="col-sm-10 col-md-8">
                        {!! BsForm::formItem('dob', [
                            'label' => [
                                trans('messages.dob'),
                                'options' => [
                                    'class' => 'col-md-5 control-label',
                                ],
                            ],
                            'input' => [
                                'type' => 'date',
                                'value' => $user->dob,
                                'options' => [
                                    'id' => 'dob',
                                    'class' => 'form-control',
                                ],
                            ],
                            'div' => [
                                'class' => 'col-md-12'
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
                    </div>

                    <div class="col-sm-10 col-md-8">
                        {!! BsForm::formItem('email', [
                            'label' => [
                                trans('messages.email'),
                                'options' => [
                                    'class' => 'col-md-5 control-label',
                                ],
                            ],
                            'input' => [
                                'type' => 'email',
                                'value' => $user->email,
                                'options' => [
                                    'class' => 'form-control',
                                ],
                            ],
                            'div' => [
                                'class' => 'col-md-12'
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
                    </div>

                    <div class="col-sm-10 col-md-8">
                        {!! BsForm::formItem('phone', [
                            'label' => [
                                trans('messages.phone'),
                                'options' => [
                                    'class' => 'col-md-5 control-label',
                                ],
                            ],
                            'input' => [
                                'type' => 'text',
                                'value' => $user->phone,
                                'options' => [
                                    'class' => 'form-control',
                                ],
                            ],
                            'div' => [
                                'class' => 'col-md-12'
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
                    </div>

                    <div class="col-sm-10 col-md-8">
                        {!! BsForm::formItem('address', [
                            'label' => [
                                trans('messages.address'),
                                'options' => [
                                    'class' => 'col-md-5 control-label',
                                ],
                            ],
                            'input' => [
                                'type' => 'text',
                                'value' => $user->address,
                                'options' => [
                                    'class' => 'form-control',
                                ],
                            ],
                            'div' => [
                                'class' => 'col-md-12'
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
                    </div>
                    <div class="clear mb-10"></div>

                {!! Form::submit('Save', [
                    'class' => 'btn btn-primary',
                    'id' => 'btn_save',
                ]) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('script')
    <script>
        var update_profile = new update_profile();
        update_profile.init({!! $user->id !!});
    </script>
@endsection
