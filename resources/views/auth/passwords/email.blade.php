@extends('layouts.default')
@section('title','重置密码')
@section('content')
<div class="col-md-8 offset-md-2">
    <div class="card">
        <div class="card-header">
            <div class="card-body">
                @if ( session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email" class="form-control-label">邮箱地址：</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                        @if( $errors->has('email') )
                            <span class="form-text">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            发送邮件重置密码
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop