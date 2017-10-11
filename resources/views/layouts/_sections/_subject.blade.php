<div class="mt-40">
    <div class="icon ml-25">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <div class="section-title">
                <h2>{{ trans('view.hot_subjects') }}</h2> 
            </div>
        </div>
    </div>
    <ul class="grid cs-style-1">
        @foreach ($subjects as $subject)
            <li>
                <figure>
                    <div><img src="{{ $subject->cover }}" alt="{{ $subject->title }}"></div>
                    <figcaption>
                        <h3>{{ $subject->title }}</h3>
                        <span>{{ $subject->description }}</span>
                        <p class="text-white">{{ $subject->plans_count }} {{ trans('view.plan') }}</p>
                        <a href="#">{{ trans('view.view') }}</a>
                    </figcaption>
                </figure>
            </li>
        @endforeach
    </ul>
</div>
