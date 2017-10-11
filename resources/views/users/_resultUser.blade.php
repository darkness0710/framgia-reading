@if(!$users->isEmpty())    
    <div class="container">
        <div class="user-item-wrapper-01">
            <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
                <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
                    @foreach($users as $user)
                        <div class="GridLex-col-4_sm-4_xs-12_xss-12">
                            <div class="user-item-01 clearfix">
                                <div class="user-item-overlay"></div>
                                <div class="user-item-inner">
                                    <div class="image"><img src="{{ $user->avatar }}" alt="images" height="74" width="74" /></div>
                                    <div class="content">
                                        <h3>{{ $user->name }}</h3>
                                        <div class="rating-wrapper inline-text">
                                            <div class="rating-item rating-item-sm">
                                                <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="3.5"/>
                                            </div>
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="user-meta">
                                        <ul class="clearfix">
                                            <li>
                                                <div class="meta">
                                                    {{ trans('view.plans') }}
                                                    <span class="number">{{ $user->plans_count }}</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="meta">
                                                    {{ trans('view.reviews') }}
                                                    <span class="number">{{ $user->reviews_count }}</span>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="{{ route('user.profile', $user->id) }}">
                                                {{ trans('view.view') }}<br />{{ trans('view.profile') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                {{-- <a href="#"></a> --}}
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
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="text-center">{{ trans('view.not_found_lucky') }}</div>
@endif
