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
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{trans('messages.edit')}} {{trans('messages.companies')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('companies.update', $row->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    @include('admin.' . $modelDirectory . '.form')
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{trans('messages.edit')}}</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
        @if(isset($row))
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <img src="{{url($row->logo)}}" class="rounded" />
            </div>
            <!-- /.card -->

        </div>
        @endif
    </div>
@endsection
