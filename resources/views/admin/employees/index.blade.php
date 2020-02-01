@extends('admin.layouts.app')
@section('breadcrump')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{trans('messages.employees')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{trans('messages.home')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('messages.employees')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route($modelDirectory . '.create')}}" class="btn btn-primary">{{trans('messages.add')}} {{trans('messages.employees')}}</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{trans('messages.firstName')}}</th>
                            <th>{{trans('messages.lastName')}}</th>
                            <th>{{trans('messages.company')}}</th>
                            <th>{{trans('messages.email')}}</th>
                            <th>{{trans('messages.phone')}}</th>
                            <th>{{trans('messages.date')}}</th>
                            <th>{{trans('messages.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rows as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->firstName}}</td>
                            <td>{{$row->lastName}}</td>
                            <td>{{$row->companyy->name}}</td>
                            <td>{{!empty($row->email) ? $row->email : 'there is no email'}}</td>
                            <td>{{!empty($row->phone) ? $row->phone : 'there is no phone'}}</td>
                            <td>{{$row->created_at->diffForHumans()}}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{route($modelDirectory . '.edit', $row->id)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <form action="{{route($modelDirectory . '.destroy', $row->id)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" onclick="return confirm('Are you sure ?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                {{$rows->links()}}
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
