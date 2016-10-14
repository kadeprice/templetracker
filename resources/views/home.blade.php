@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {!! link_to_route('temple-count.create', $title = 'Add Cards', $parameters = [], $attributes = ['class' => 'btn btn-info btn-sm']) !!}
                    {!! link_to_route('member.create', $title = 'Add Member', $parameters = [], $attributes = ['class' => 'btn btn-info btn-sm']) !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
