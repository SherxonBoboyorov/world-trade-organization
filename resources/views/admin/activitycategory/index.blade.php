@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">All Activity Category</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

             <a href="{{ route('activitycategory.create')}}" class="btn bg-success mb-2">Add Activity Category +</a>


        <div class="card">
            <div class="card-body">

                @if(session('message'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('message') }}
                </div>

                @endif

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 2%;">#</th>
                            <th>Title [Uzbek]</th>
                            <th>Title [Russian]</th>
                            <th>Title [English]</th>
                            <th colspan="2" style="width: 2%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activitycategories as $activitycategory)
                        <tr>
                            <td>{{ $activitycategory->id }}</td>
                            <td>{{ $activitycategory->title_uz }}</td>
                            <td>{{ $activitycategory->title_ru }}</td>
                            <td>{{ $activitycategory->title_en }}</td>
                            <td>
                                <a href="{{ route('activitycategory.edit', $activitycategory->id) }}" class="btn btn-primary btn-icon">
                                    <i class="fa fa-edit">Edit</i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('activitycategory.destroy', $activitycategory->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-icon">
                                        <i class="fa fa-trash">Delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $activitycategories->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection
