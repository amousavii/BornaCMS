@extends('layouts.admin')


@section('content')
    <h1>همه نقش ها</h1>
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <table id="mytable" class="table table-bordred table-striped">

        <thead>

        <th><input type="checkbox" id="checkall" /></th>
        <th>Image</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Created At</th>
        <th>Edit</th>

        <th>Delete</th>
        </thead>
        <tbody>

        @foreach($users as $user)
        <tr>
            <td><input type="checkbox" class="checkthis" /></td>
            <td><img src="/images/users/{{$user->photo ? $user->photo->path : '400x400.png' }}" width="50"></td>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$user->email}}</td>
            <td>
            @foreach($user->roles as $role)
               {{$role->name}} <br>
                @endforeach
            </td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            {{--<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>--}}
            <td><a href="{{route('admin.users.edit',$user->id)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>

            {{--{{Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]])}}--}}
                     {{--{!! Form::submit('delete',['class'=>'btn btn-danger']) !!}--}}
            {{--{{Form::close()}}--}}
            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-primary btn-xs" data-title="delete" data-toggle="modal" data-target="#delete" data-id="{{$user->id}}"><span class="glyphicon glyphicon-trash"></span></button></p></td>

            @endforeach



        </tbody>

    </table>

    <div class="clearfix"></div>
    <ul class="pagination pull-right">
        <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
    </ul>

    </div>

    </div>
    </div>
    </div>
    @stop

@section('footer')
    {{--<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">--}}
        {{--<div class="modal-dialog">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>--}}
                    {{--<h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<div class="form-group">--}}
                        {{--<input class="form-control " type="text" placeholder="Mohsin">--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}

                        {{--<input class="form-control " type="text" placeholder="Irshad">--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>--}}


                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="modal-footer ">--}}
                    {{--<button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- /.modal-content -->--}}
        {{--</div>--}}
        {{--<!-- /.modal-dialog -->--}}
    {{--</div>--}}



    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                </div>
                <div class="modal-footer ">
                        {{Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]])}}
                    {!! Form::hidden('user_id',null,['id'=>"user_id" ,'class'=>'form-control']) !!}
                        {!! Form::submit('delete',['class'=>'btn btn-danger']) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                        {{Form::close()}}



                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@section('footer')
    <script>
        $('#delete').on('show.bs.modal',function(event){
            var button =$(event.relatedTarget)
            var user_id = button.data('id')
            var modal = $(this)
            modal.find('.modal-footer #user_id').val(user_id)
        })
        </script>
    @stop