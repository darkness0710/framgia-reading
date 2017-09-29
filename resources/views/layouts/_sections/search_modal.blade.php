<div class="modal fade mt-50" data-width="60%" id="searchModal">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-login">
                <div class="panel-heading mt-10">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="active" id="search-internal-book-link">Search with Internal Books</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#" id="search-google-book-link">Search with Google Books</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="internal-search-form" class="block-display">
                                <div class="form-group ml-50 mt-10 mb-10">
                                    <meta id="csrf-token" content="{{ csrf_token() }}">
                                    <input type="text" id="internal-search-input" tabindex="1"
                                        class="col-md-10" placeholder="Search Internal Book!">
                                        <i class="fa fa-search btn-search" id="interal-search" aria-hidden="true"></i>
                                        <div id='book-search-result'></div>
                                </div>
                            </form>
                            <form id="google-search-form" class="no-display">
                                <div class="form-group ml-50 mt-20">
                                    <input type="text" id="google-search" tabindex="1"
                                        class="col-md-10" placeholder="Search Google Book!">
                                        <i class="fa fa-search btn-search" id="gg-search" aria-hidden="true"></i>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
