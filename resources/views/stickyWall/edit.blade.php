@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <aside class="col-md-3 ">
                @include('layouts.rightaside')
            </aside>




            <div class="col-md-9" style="height:100vh">

                <h1>Sticky Notes</h1>
             
                <button id="add-note" data-bs-toggle="modal" data-bs-target="#note" class="btn btn-primary mt-3">Add Sticky
                    Note</button>

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
                                    <input type="text" name="title" class="form-control" placeholder="Title">
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
