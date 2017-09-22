@extends('users.details.master')

@section('container')
@include('users.details.components.menu')
<div class="col-xs-12 col-sm-8 col-md-9 mt-20">     
    <div class="dashboard-wrapper">
        <h4 class="section-title">
            {{ trans('dashboard-messages.hello', [
            'name' => Auth::user()->name
            ]) }}
        </h4>
        <div class="admin-empty-dashboard dashboard-timeline-padding">          
            <ul class="timeline">
                @foreach ($books as $key => $book)
                @if($key % 2 == 0)
                <li>
                    @else
                    <li class="timeline-inverted">
                        @endif

                        <div class="timeline-badge">
                            <img src="{{ $book->planItem->book->cover }}"/>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title no-margin">{{ $book->planItem->book->title }}</h4>
                                <p class="no-margin">
                                    <small class="text-muted"><i class="glyphicon glyphicon-time"></i>
                                        Start Date: {{ $book->start_date->format('d-m-Y') }}</small>
                                    </p>
                                    <p>
                                        <small class="text-muted"><i class="glyphicon glyphicon-time"></i>
                                            Due Date: {{ $book->due_date->format('d-m-Y') }}</small>
                                        </p>

                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            {{ $book->planItem->book->description }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
