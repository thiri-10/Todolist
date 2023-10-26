@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <aside class="col-md-3 ">
                @include('layouts.rightaside')
            </aside>




            <div class="col-md-9">
                <h1 class="fw-200 mb-5">
                    All Task
                    <span>{{ $tasks->count() }}</span>
                </h1>

                @if (request()->has('keyword'))
                    <div class="mb-3">"Search result by '{{ request()->keyword }}' "</div>
                @endif

                <div class="list-group list-group-flush">
                    @forelse ($tasks as $task)
                        <div class="list-group-item " id="taskList">



                            <input type="checkbox" class="task-checkbox mx-3 form-check-input"
                                data-task-id={{ $task->id }} {{ $task->completed ? 'checked' : '' }}>
                            <label class="form-check-label">
                                {{ Str::limit($task->task, 60, '...') }}
                            </label>


                            <a href="{{ route('Task.show', $task->id) }}" class="btn">
                                <i class="bi-solid bi-chevron-right"></i>
                            </a>
                            <a href="{{ route('Task.edit', $task->id) }}" class="btn ">
                                <small><i class="bi bi-pencil"></i></small>
                            </a>
                            <form class="d-inline" action="{{ route('Task.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn text-danger"><i class="bi bi-trash"></i></button>
                            </form>


                            @if ($task->due_date < $today)
                                <small class=""> (expired)</small>
                            @endif
                            @if ($task->due_date === $today)
                                <small class="text-info">(today)</small>
                            @endif

                        </div>

                    @empty
                        <div class="alert alert-info">
                            No Task,No Stress,Yay!!
                        </div>
                    @endforelse




                </div>
            </div>

            <div class="mt-3">{{ $tasks->onEachSide(3)->links() }}</div>










        </div>
    </div>
    </div>
@endsection

@push('script')
    @vite('resources/js/TaskIndex.js')
@endpush
