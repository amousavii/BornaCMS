@extends('layouts.admin')


@section('content')
    <div class="container">
        <div class="row">
            <h2>ساخت نقش جدید در سیستم</h2>
            {{--{{session()}}--}}
            {!! Form::open(['method'=>'post','route'=>'admin.create.role', 'class'=>'form-horizontal']) !!}
            <fieldset>

                <!-- Form Name -->
                <legend>ثبت نقش</legend>
{!! Form::token() !!}
                <!-- Text input-->
                <div class="form-group">
                    {!! Form::label('slug','Slug',['class'=>'col-md-4 control-label' ]) !!}
                    <div class="col-md-4">
                        {!! Form::text('slug',null,['class'=>'form-control input-md']) !!}
                        <span class="help-block"> </span>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    {!! Form::label('name','Name',['class'=>'col-md-4 control-label' ]) !!}
                    <div class="col-md-4">
                        {!! Form::text('name',null,['class'=>'form-control input-md']) !!}
                        <span class="help-block"> </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton"> </label>
                    <div class="col-md-4">
                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                    </div>
                </div>




            </fieldset>
            {!! Form::close() !!}
        </div>
    </div>
@stop