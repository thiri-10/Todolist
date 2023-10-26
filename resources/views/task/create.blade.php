@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <aside class="col-md-3 ">
                @include('layouts.rightaside')
            </aside>




            <div class="col-md-9">
                <h1 class="fw-200 mb-5">
                    Create New Task

                </h1>

                <form action="{{ route('Task.store') }}" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <label class="form-label" for="task">Task Name</label>
                        <input type="text" class="form-control @error('task') is-invalid @enderror" name="task"
                            id="task" value="{{ old('task') }}" placeholder="Task Name">
                    </div>
                    @error('task')
                        <div class="alert alert-info">{{ $message }}</div>
                    @enderror

                    <div class="form-group mb-3">
                        <label class="form-label" for="date">Select Date</label>
                        <input type="date" class="form-control  @error('due_date') is-invalid @enderror" id="date"
                            name="due_date" value="{{ old('due_date') }}" placeholder="YY/MM/DD">
                    </div>
                    @error('due_date')
                        <div class="alert alert-info">{{ $message }}</div>
                    @enderror


                    <select class="form-select mb-3  @error('category') is-invalid @enderror" name="category" id=""
                        value="{{ old('category') }}">
                        @foreach (App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="alert alert-info">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <button class="btn btn-info">Add task</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection


@push('script')
    @vite('resources/js/creatTask.js')
@endpush
