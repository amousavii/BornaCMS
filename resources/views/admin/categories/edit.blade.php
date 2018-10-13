@extends('layouts.admin')


@section('content')
    <div class="">
        <div class="row">
            <h2>Create And Publish</h2>
            {{--{{session()}}--}}
            {!! Form::open(['method'=>'PATCH','action'=>['AdminCategoriesController@update',$cat->id], 'class'=>'form-horizontal']) !!}
            {{Form::token()}}
            <fieldset>

                <!-- Form Name -->

                <!-- Text input-->
                <div class="form-group">
                    {!! Form::label('name','Category Title',['class'=>'col-md-4 control-label' ]) !!}
                    <div class="col-md-4">
                        {!! Form::text('name',$cat->name,['class'=>'form-control input-md']) !!}
                        <span class="help-block"> </span>
                    </div>
                </div>
                <!-- Text input-->

                <!-- Text input-->

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton"> </label>
                    <div class="col-md-4">
                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                    </div>
                </div>

            </fieldset>
            {!! Form::close() !!}

            @include('includes.errors')

        </div>
    </div>
@stop