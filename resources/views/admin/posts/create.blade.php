@extends('layouts.admin')


@section('content')
    <div class="">
        <div class="row">
            <h2>Create And Publish</h2>
            {{--{{session()}}--}}
            {!! Form::open(['method'=>'post','action'=>'AdminPostsController@store','files'=>'true', 'class'=>'form-horizontal']) !!}
            {{Form::token()}}
            <fieldset>

                <!-- Form Name -->

                <!-- Text input-->
                <div class="form-group">
                    {!! Form::label('title','Post Title',['class'=>'col-md-4 control-label' ]) !!}
                    <div class="col-md-4">
                        {!! Form::text('title',null,['class'=>'form-control input-md']) !!}
                        <span class="help-block"> </span>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    {!! Form::label('content','Post Content',['class'=>'col-md-4 control-label' ]) !!}
                    <div class="col-md-4">
                        {!! Form::textarea('content',null,['class'=>'form-control input-md' , 'rows'=>'3']) !!}
                        <span class="help-block"> </span>
                    </div>
                </div>

                <!-- Check box for choosing categories -->
                <div class="form-group">
                    {!! Form::label('categories','Post Categories',['class'=>'col-md-4 control-label' ]) !!}
                    <div class="col-md-4">


                        @foreach($categories as $cat)

                            {!! Form::checkbox('categories[]', $cat->id, false) !!}
                            {!! Form::label('categories[]' , $cat->name) !!}
                        @endforeach


                        <span class="help-block"> </span>
                    </div>
                </div>

                <!-- Text input-->

                <div class="form-group">
                    {!! Form::label('status','Post Status',['class'=>'col-md-4 control-label' ]) !!}
                    <div class="col-md-4">


                        {!! Form::select('status',['published'=>'published','draft'=>'draft'], 'draft') !!}


                        <span class="help-block"> </span>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('post_img','Post Image',['class'=>'col-md-4 control-label' ]) !!}
                    <div class="col-md-4">


                        {!! Form::file('post_img') !!}


                        <span class="help-block"> </span>
                    </div>
                </div>

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