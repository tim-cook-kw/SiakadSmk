@extends('page.siswa')
@section('content2')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! $chart->html() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
    <div class="clearfix"></div>
    
@endsection