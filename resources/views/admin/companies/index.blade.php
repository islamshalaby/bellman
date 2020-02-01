@extends('admin.layouts.app')
@section('breadcrump')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{trans('messages.companies')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{trans('messages.home')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('messages.companies')}}</li>
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
                    <a href="{{route('companies.create')}}" class="btn btn-primary">{{trans('messages.add')}} {{trans('messages.companies')}}</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{trans('messages.name')}}</th>
                            <th>{{trans('messages.email')}}</th>
                            <th>{{trans('messages.logo')}}</th>
                            <th>{{trans('messages.website')}}</th>
                            <th>{{trans('messages.date')}}</th>
                            <th>{{trans('messages.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rows as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{!empty($row->email) ? $row->email : trans('messages.noData')}}</td>
                            <td>
                                @if($row->logo != 'storage/')
                                <img class="rounded" height="50" src="{{url($row->logo)}}" />
                                @else
                                    {{trans('messages.noData')}}
                                @endif
                            </td>
                            <td>{{!empty($row->website) ? $row->website : trans('messages.noData')}}</td>
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
