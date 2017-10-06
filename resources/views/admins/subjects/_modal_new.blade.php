<div class="modal" id="modal-new-subjects">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">{{ trans('admin-subjects.new_subject') }}</h4>
    </div>
    <div class="modal-body">
        <div class="row gap-20">
            <div class="col-sm-12 col-md-12">
                <div class="form-group"> 
                    <label>{{ trans('admin-subjects.title_subject') }}</label>
                    <input class="form-control" type="text" id="new_input_title" value="" /> 
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group"> 
                    <label>{{ trans('admin-subjects.description_subject') }}</label>
                    <input class="form-control" type="text" id="new_input_description" value="" /> 
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group"> 
                    <label>{{ trans('admin-subjects.trending_subject') }}</label>
                    <input class="form-control" type="text" id="new_input_trending" value="" /> 
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group"> 
                    <label>{{ trans('admin-subjects.image_subject') }}</label>
                    <img src="" id="preview-image" class="image-upload-size">
                    <input id="upload-image" class="form-control " name="avatar" type="file" accept="image/*" onChange="validateImageAll(this.value)">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer text-center">
        <button type="button" class="btn btn-primary" id="new_subject">{{ trans('admin-subjects.update') }}</button>
        <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">{{ trans('admin-subjects.close') }}</button>
    </div>
</div>
