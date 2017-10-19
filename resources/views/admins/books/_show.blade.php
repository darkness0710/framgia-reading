<div id="modal_show_detail" class="modal fade login-box-wrapper max-height-500" tabindex="-1"
    data-width="750" data-backdrop="static" data-keyboard="false"
    data-replace="true">
    <div class="modal-header height-70">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-center">{{ trans('messages.book_detail') }}</h4>
    </div>

    <div class="modal-body padding-20">
        <div class="row height-320">
            <div class="mt-20" id="container_show_detail">
            </div>
        </div>
    </div>

    <div class="modal-footer height-70">
        <div class="row pull-right lt-20 mr-20">
            <button type="button" data-dismiss="modal"
            class="btn btn-primary btn-sm ml-10" id="btn_dismiss">
                {{ trans('messages.dismiss') }}
            </button>
        </div>
    </div>
</div>
