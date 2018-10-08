@extends('layouts.admin')


@section('content')
    <div class="">
        <div class="row">
            <h2>Create Your Simple Registration Form</h2>
{{--{{session()}}--}}
           {!! Form::open(['method'=>'post','action'=>'AdminUsersController@store','files'=>'true', 'class'=>'form-horizontal']) !!}
            {{Form::token()}}
                <fieldset>

                    <!-- Form Name -->

                    <!-- Text input-->
                    <div class="form-group">
                        {!! Form::label('username','UserName',['class'=>'col-md-4 control-label' ]) !!}
                        <div class="col-md-4">
                            {!! Form::text('username',null,['class'=>'form-control input-md']) !!}
                            <span class="help-block"> </span>
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        {!! Form::label('first_name','First Name',['class'=>'col-md-4 control-label' ]) !!}
                        <div class="col-md-4">
{!! Form::text('first_name',null,['class'=>'form-control input-md']) !!}
                            <span class="help-block"> </span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        {!! Form::label('last_name','Last Name',['class'=>'col-md-4 control-label' ]) !!}
                        <div class="col-md-4">
                            {!! Form::text('last_name',null,['class'=>'form-control input-md']) !!}
                            <span class="help-block"> </span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        {!! Form::label('email','Email',['class'=>'col-md-4 control-label' ]) !!}
                        <div class="col-md-4">
                            {!! Form::text('email',null,['class'=>'form-control input-md']) !!}
                            <span class="help-block"> </span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('role','Role',['class'=>'col-md-4 control-label' ]) !!}
                        <div class="col-md-4">


                            {!! Form::select('role',$roles->pluck('name','slug'), '1') !!}


                            <span class="help-block"> </span>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('user_img','User Image',['class'=>'col-md-4 control-label' ]) !!}
                        <div class="col-md-4">


                            {!! Form::file('user_img') !!}


                            <span class="help-block"> </span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        {!! Form::label('password','password',['class'=>'col-md-4 control-label' ]) !!}
                        <div class="col-md-4">
                            {!! Form::password('password',null,['class'=>'form-control input-md']) !!}
                            <span class="help-block"> </span>
                        </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        {!! Form::label('password_2','Confirm password',['class'=>'col-md-4 control-label' ]) !!}
                        <div class="col-md-4">
                            {!! Form::password('password_2',null,['class'=>'form-control input-md']) !!}
                            <span class="help-block"> </span>
                        </div>
                    </div>

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