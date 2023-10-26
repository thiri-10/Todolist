@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <aside class="col-md-3 ">
                @include('layouts.rightaside')
            </aside>




            <div class="col-md-9">
                <h1 class="fw-200 mb-5">
                    Edit Task
                    {{-- <span>5</span> --}}
                </h1>

                <form action="{{ route('Task.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label class="form-label" for="">Edit Task</label>
                        <input type="text" class="form-control @error('task') is-invalid @enderror" name="task"
                            value="{{ old('task', $task->task) }}" placeholder="Write task name">
                        @error('task')
                            <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="date">Due Date</label>
                        <input type="date" class="form-control  @error('due_date') is-invalid @enderror" id="date"
                            name="due_date" value="{{ old('due_date', $task->due_date) }}" placeholder="YY/MM/DD">
                        @error('due_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>



                    <select class="form-select mb-3  @error('category') is-invalid @enderror" name="category"
                        id="">
                        @foreach (App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" @if (old('category', $task->category_id) == $category->id) selected @endif>
                                {{ $category->category }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror


                    <div class="form-group">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection


@push('script')
    @vite('resources/js/creatTask.js')
@endpush
