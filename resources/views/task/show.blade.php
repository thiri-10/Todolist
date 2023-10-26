@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <aside class="col-md-3 ">
                @include('layouts.rightaside')
            </aside>




            <div class="col-md-9">
                <h3 class="fw-200 mb-5 animate__animated animate__bounce ">
                    Hey Let's finish this!! Your Task to do:
                </h3>

                <div class="list-group list-group-flush">
                    <div class="list-group-item ">
                        <i class="bi bi-bag"></i><strong class="mx-3">Task: </strong> {{ $task->task }}
                        <small class="text-info">
                            <i class="bi bi-bell "></i>
                        </small>
                    </div>

                    <div class="list-group-item">
                        <i class="bi bi-clock"></i><strong class="mx-3">Due_date: </strong> {{ $task->due_date }}
                    </div>

                    <div class="list-group-item">
                        <i class="bi bi-person"></i> <strong class="mx-3">Category:</strong>
                        {{ $task->category->category ?? 'Uncategorized' }}
                    </div>


                </div>




            </div>
        </div>
    </div>
@endsection

@push('script')
    @vite('resources/js/TaskIndex.js')
@endpush
