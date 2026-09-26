@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Отчеты</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <button type="button" id="report_sum" class="btn btn-primary">Отчет по донатам</button>
                        <button type="button" id="report_cdr" class="btn btn-primary">Отчет по CDR</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection





