<div id="modal-review" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" data-backdrop="static" data-keyboard="false" data-replace="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-center">{{ trans('messages.write_review') }}</h4>
    </div>
    <form action="{{ route('book.review') }}" method="post" id="form-review">
        {{ csrf_field() }}
        <div class="modal-body">
            <div class="row gap-20">
                <div class="col-md-12 center">
                    <div id='review-modal' class="my-rating"></div>
                    <div class="form-group">
                        <label>{{ trans('messages.comment') }}</label>
                        <input type="hidden" name="rate" id="rate"/>
                        <input type="hidden" name="target_id" id="target_id"/>
                        <textarea class="form-control" rows="5" name="comment" id="comment" required='required'></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <a href="#" class="btn btn-primary pull-right" id="btn-submit">
                        {{ trans('messages.submit') }}
                    </a>
                </div>
            </div>
        </div>
    </form>
    <div class="modal-footer text-center">
    </div>
</div>
