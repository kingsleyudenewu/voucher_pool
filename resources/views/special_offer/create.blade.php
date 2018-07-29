@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @include('flash::message')
            </div>
        </div>
        <div class="row">
            <div class="col-sm-offset-9 col-sm-2" style="margin-bottom: 30px;">
                <div class="pull-right">
                    <a href="{{ route('special_offers.index') }}" class="btn btn-block btn-success">Back</a>
                </div>
            </div>
        </div>
        <form action="{{ route('special_offers.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">
                    Special Offer Name
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
                    Discount
                </label>
                <input id="discount" type="number" min="1" max="99" name="discount" value="{{ old('discount') }}" class="form-control">
                @if ($errors->has('discount'))
                    <label class="error">
                        <strong>{{ $errors->first('discount') }}</strong>
                    </label>
                @endif
            </div>
            <div class="form-group">
                <label for="expiration">
                    Expiration
                </label>
                <input id="expiration" type="date" name="expiration" value="{{ old('expiration', Carbon\Carbon::today()->format('Y-m-d')) }}" class="form-control">
                @if ($errors->has('expiration'))
                    <label class="error">
                        <strong>{{ $errors->first('expiration') }}</strong>
                    </label>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection