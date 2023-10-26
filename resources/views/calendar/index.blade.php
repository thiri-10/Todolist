@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <aside class="col-md-3 ">
                @include('layouts.rightaside')
            </aside>




            <div class="col-md-9">

                {{-- Container  for calendar --}}
                <div id="calendar"> </div>

            </div>
        </div>
    </div>
@endsection

@push('script')
    @vite('resources/js/taskCalendar.js')
@endpush
