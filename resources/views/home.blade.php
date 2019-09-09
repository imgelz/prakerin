@extends('layouts.backend')

@section('content')
<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="info-box bg-aqua">
                    <span class="info-box-icon bg-aqua">
                        <i class="info-box-icon ion ion-ios-people-outline"></i>
                    </span>
                <div class="info-box-header"><h1><font color="black"> Hello <b>{{Auth::user()->name}}</b></font></h1></div>

                <div class="info-box-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3><font color="green">You are logged in!</font></h3>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
