@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Member</div>

                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        {!! Form::open(['route' => 'temple-count.store']) !!}

                        <div class="form-group">
                            {!! Form::label('member', 'Member') !!}
                            {!! link_to_route('member.create', $title = 'Add Member', $parameters = [], $attributes = ['class' => 'btn btn-info btn-xs']) !!}
                            {!! Form::select('member', $members, null, ['placeholder' => 'Pick an Member.', 'class' => 'form-control']) !!}

                        </div>

                        <div class="form-group">
                            {!! Form::label('sex', 'Male/Female') !!}
                            {!! Form::select('sex', [1 => 'Male', 2 => 'Female'], null, ['placeholder' => 'Pick a Male or Female.', 'class' => 'form-control']) !!}
                        </div>

                            <div class="form-group">
                                {!! Form::label('count', 'Count') !!}
                                {!! Form::text('count', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                            {!! Form::submit('Save',['class' => 'btn btn-sm btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
