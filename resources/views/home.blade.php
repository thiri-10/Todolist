@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            {{-- Starting nav --}}
            <aside class="col-md-3 ">
                @include('layouts.rightaside')
            </aside>
            {{-- End nav I mean sidenav  --}}



            {{-- dividing content into col-9 --}}
            <div class="col-md-9">

                <div class="card col-md-3 mb-3 shadow">
                    <div class="card-body">
                        <img src="img/woman.png" alt="" style="width:50px; height:50px">
                        <strong>Hello... {{ Auth::user()->name }}</strong>
                    </div>
                </div>



                <div class="row ">

                    @foreach (App\Models\Category::all() as $category)
                        @if ($category->user_id == Auth::id())
                            <div class="col-md-5">
                                <div class="card-columns">
                                    <div class="card mb-4 shadow" style="background-color:antiquewhite">
                                        <div class="card-body shadow">
                                            <a href="{{ route('Category.show', $category->id) }}" class="btn p-0">

                                                <div class="text-dark"><i class="bi {{ $category->icon }}"></i></div>
                                                <span
                                                    class="text-decoration-none d-lg-inline text-dark">{{ $category->category }}</span>
                                                <span
                                                    class="text-dark">{{ $category->task()->where('user_id', Auth::id())->get()->count() }}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                {{-- card for today task --}}

                <div class="row">
                    <div class="col-md-5">
                        <div class="card-columns">
                            <div class="card mb-4 shadow">
                                <div class="card-body shadow">
                                    <h4>Today
                                        <span>{{ App\Models\Task::whereDate('due_date', $today)->count() }}</span>
                                    </h4>
                                    <small>Completed:
                                        {{ App\Models\Task::whereDate('due_date', $today)->where('completed', true)->count() }}</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- card for expired task --}}

                    <div class="col-md-5">
                        <div class="card-columns">
                            <div class="card mb-4 shadow">
                                <div class="card-body shadow">
                                    <h4>Expired</h4>
                                    {{ App\Models\Task::whereDate('due_date', '<', $today)->count() }}
                                </div>
                            </div>
                        </div>
                    </div>



                    {{-- card for upcoming task --}}

                    <div class="col-md-5">
                        <div class="card-columns">
                            <div class="card mb-4 shadow">
                                <div class="card-body shadow">
                                    <h4>Upcoming
                                        <span> {{ App\Models\Task::whereDate('due_date', '>', $today)->count() }}</span>
                                    </h4>
                                    <small>Completed:
                                        {{ App\Models\Task::whereDate('due_date', '>', $today)->where('completed', true)->count() }}</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>







            </div>
            {{-- End content --}}


        </div>

    </div>
@endsection
