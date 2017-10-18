@if (!$subjects->isEmpty())
    <ul class="grid cs-style-1">
        @foreach ($subjects as $subject)
            <li>
                <figure>
                    <div><img src="{{ $subject->cover }}" alt="{{ $subject->title }}"></div>
                    <figcaption>
                        <h3>{{ $subject->title }}</h3>
                        <span>{{ $subject->description }}</span>
                        <p class="text-white">{{ $subject->plans_count }} {{ trans('view.plan') }}</p>
                        <a href="{{ route('subject.show', $subject->id) }}">{{ trans('view.view') }}</a>
                    </figcaption>
                </figure>
            </li>
        @endforeach
    </ul>
    <div class="pager-wrappper clearfix mb-50">
        <div class="pager-innner">
            <div class="clearfix">
                <div id="paginate">
                    {{ $subjects->links() }}
                </div>
            </div>
        </div>
    </div>
@else
    <div class="mt-50 mb-50">
        <div class="text-center">{{ trans('view.not_found_lucky') }}</div>
    </div>
@endif
