<div class="mt-40">
    <div class="icon ml-25">
        <i class="ri ri-location"></i>{{ trans('view.plans') }}
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
    <div class="codrops-demos-mt">
        <div class="text-center">
            <nav class="codrops-demos">
                <a class="current-demo" href="#">{{ trans('view.view_more') }}</a>
            </nav>
        </div>
    </div>
</div>
