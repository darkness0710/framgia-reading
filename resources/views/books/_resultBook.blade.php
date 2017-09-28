@if (!$books->isEmpty())    
    <div class="container">
        <div class="trip-guide-wrapper">
            <div class="trip-guide-wrapper mb-30 mt-10">
                <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
                    <div class="GridLex-grid-noGutter-equalHeight">
                        @foreach($books as $book)
                        <div class="GridLex-col-3_mdd-2_sm-3_xs-3_xss-6">
                            <div class="trip-guide-item">
                                <div class="image">
                                    <img src="{{ $book->cover }}" class="ml-40 mt-30" alt="images" width="180px" height="220px" />
                                </div>
                                <div class="trip-guide-content">
                                    <h3>{{ $book->title }}</h3>
                                    <p>{{ $book->summary }}</p>
                                </div>
                                <div class="trip-guide-bottom mb-30">
                                    <div class="trip-guide-meta row gap-10">
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="rating-item">
                                                <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="4.5"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gap-10">
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="trip-guide-price">
                                                {{ trans('view.rate') }}: {{ $book->rate }}
                                                <p class="block inline-block-xs">{{ $book->reviews_count }} {{ trans('view.reviews') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 text-right text-left-xs" id="addBookToCart">
                                            <a href="{{ route('book.addToCart', $book->id) }}" class="btn btn-primary"><i class="ti-heart"></i></a>
                                            <a href="{{ route('book.show', $book->id) }}" class="btn btn-primary">{{ trans('view.view') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="pager-wrappper clearfix">
                <div class="pager-innner">
                    <div class="clearfix">
                        <div id="paginate">
                            {{ $books->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="text-center">{{ trans('view.not_found_lucky') }}</div>
@endif
