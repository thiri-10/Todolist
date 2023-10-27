@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <aside class="col-md-3 ">
                @include('layouts.rightaside')
            </aside>




            <div class="col-md-9" style="height:100vh">

                <h1>Sticky Notes</h1>
                <div class="row">
                    <!-- Sticky notes will be displayed here -->
                    <div class="card col-md-3 mx-2 mb-2 d-flex justify-content-center align-items-center "
                        style="min-height: 155px">
                        Add New Note
                        <button id="add-note" data-bs-toggle="modal" data-bs-target="#note" class="btn  mt-3 rounded"
                            style="background-color: antiquewhite">
                            <i class="bi bi-plus text-dark"></i>
                        </button>

                    </div>
                    @forelse (Auth::user()->note as $note)
                        <div class="card col-md-3 mx-2 mb-2 shadow" style="background-color:antiquewhite">
                            <div class="card-header ">
                                <strong class="text-dark">{{ $note->title }}</strong>
                            </div>
                            <div class="card-body text-dark ">
                                {{ Str::limit($note->note, 100, '...') }}
                            </div>
                            <div class="card-footer-flush  d-flex justify-content-between align-items-center">
                                <small class="text-dark">{{ $note->created_at->diffForHumans() }}</small>

                                <button class="btn text-dark " data-bs-toggle="modal"
                                    data-bs-target="#editnote{{ $note->id }}">
                                    <i class="bi bi-pencil"></i>
                                </button>

                                <form action="{{ route('Note.destroy', $note->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn text-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>

                        </div>

                        <!-- modal to edit and update note -->
                        <div class="modal" id="editnote{{ $note->id }}" value="{{ $note->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        Sticky note
                                        <button class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('Note.update', $note->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="title" class="form-control"
                                                value="{{ $note->title }}" placeholder="Title">
                                            <textarea class="form-control" name="note" id="" cols="30" rows="10">{{ $note->note }}
                                    </textarea>
                                            <button class="btn btn-primary">
                                                Save
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>

                    @empty
                    @endforelse

                </div>


                <!-- modal to save note-->
                <div class="modal" id="note">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                Sticky note
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('Note.store') }}" method="POST">
                                    @csrf
                                    <input type="text" name="title" class="form-control " placeholder="Title" required>
                                    <textarea class="form-control" name="note" id="" cols="30" rows="10"></textarea>
                                    <button class="btn btn-primary">
                                        Save
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
