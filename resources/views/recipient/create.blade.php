@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                @include('flash::message')
            </div>
        </div>
        <div class="row">
            <div class="col-sm-offset-9 col-sm-2" style="margin-bottom: 30px;">
                <div class="pull-right">
                    <a href="{{ route('recipients.index') }}" class="btn btn-block btn-success">Back</a>
                </div>
            </div>
        </div>
        <form action="{{ route('recipients.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">
                    Fullname
                </label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control" autofocus>
                @if ($errors->has('name'))
                    <label class="error">
                        <strong>{{ $errors->first('name') }}</strong>
                    </label>
                @endif
            </div>
            <div class="form-group">
                <label for="discount">
                    Email
                </label>
                <input id="email" name="email" type="email"  value="{{ old('email') }}" class="form-control">
                @if ($errors->has('email'))
                    <label class="error">
                        <strong>{{ $errors->first('email') }}</strong>
                    </label>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection