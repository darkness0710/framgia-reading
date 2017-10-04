<div class="modal" id="modal-edit-subjects">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">{{ trans('admin-subjects.edit_subject') }}</h4>
    </div>
    <div class="modal-body">
        <div class="row gap-20">
            <div class="col-sm-12 col-md-12">
                <div class="form-group"> 
                    <label>{{ trans('admin-subjects.title_subject') }}</label>
                    <input class="form-control" placeholder="Enter your new title" type="text" id="edit_input_title" value="" /> 
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group"> 
                    <label>{{ trans('admin-subjects.description_subject') }}</label>
                    <input class="form-control" placeholder="Enter your new description" type="text" id="edit_input_description" value="" /> 
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group"> 
                    <label>{{ trans('admin-subjects.trending_subject') }}</label>
                    <input class="form-control" placeholder="Enter your new trending" type="text" id="edit_input_trending" value="" /> 
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group"> 
                    <label>{{ trans('admin-subjects.image_subject') }}</label>
                    <img src="" id="imageSize2">
                    <input id="upload-avatar" class="form-control" name="avatar" type="file" accept="image/*" onChange="validate(this.value)">
                </div>
            </div>
            <div>
                <input type="hidden" name="subject_id" value="" id="subject_id_hidden" />
            </div>
        </div>
    </div>
    <div class="modal-footer text-center">
        <button type="button" class="btn btn-primary" id="update_subject">{{ trans('admin-subjects.update') }}</button>
        <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">{{ trans('admin-subjects.close') }}</button>
    </div>
</div>
