@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <aside class="col-md-3 ">
                @include('layouts.rightaside')
            </aside>




            <div class="col-md-9">
                <h3 class="fw-200 mb-5 animate__animated animate__bounce ">
                    {{ $category->category }}
                </h3>

                <div class="list-group list-group-flush">
                    {{-- {{dd($category->task()->get())}} --}}
                    @forelse ($category->task->all() as $task)
                        <div class="list-group-item ">
                            {{-- d-flex justify-content-around --}}
                            <input type="checkbox" class="task-checkbox mx-3 form-check-input"
                                data-task-id={{ $task->id }} {{ $task->completed ? 'checked' : '' }}>
                            <label class="form-check-label">
                                {{ Str::limit($task->task, 40, '...') }}
                            </label>

                            <a href="{{ route('Task.show', $task->id) }}" class="btn">
                                <i class="bi-solid bi-chevron-right"></i>
                            </a>
                            <a href="{{ route('Task.edit', $task->id) }}" class="btn btn-outline-info">
                                <small><i class="bi bi-pencil"></i></small>
                            </a>
                            <form class="d-inline" action="{{ route('Task.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
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
                            There is no task in this category yet
                        </div>
                    @endforelse

                </div>




            </div>
        </div>
    </div>
@endsection

@push('script')
    @vite('resources/js/TaskIndex.js')
@endpush
