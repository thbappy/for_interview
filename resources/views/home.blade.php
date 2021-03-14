@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-lg-8 col-md-10 ml-auto mr-auto">
        <h4><small>Information Lists</small></h4>
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('information.create') }}" class="btn btn-success float-right">Add</a>
                </div>
            </div>
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Gender</th>
                        <th>Skills</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                @if(!$informations->count())
                    <p>No Product Found</p>
                @else
                <tbody>
                @foreach($informations as $key => $information)
                    <tr>
                        <td class="text-center">{{ ++$key }}</td>
                        <td>{{ $information->name }}</td>
                        <td>{{ $information->email }}</td>
                        <td><img src="{{ asset($information->image)}}" style="width:50px;height: 50px;border-radius: 10px" alt=""></td>
                        <td>{{ $information->gender==1 ? 'Male' : 'Female' }}</td>
                        <td>
                            {{ $information->skills }}
                        </td>
                        <td class="td-actions text-right">
                            <a href="{{ route('information.edit',$information->id) }}" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                                <i class="material-icons">Edit</i>
                            </a>
                            <form action="{{ route('information.delete', $information->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            <button type="submit" onclick="return confirm(' you want to delete?');" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm" data-original-title="" title="">
                                <i class="material-icons">Delete</i>
                            </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                @endif
            </table>
            </div>

        </div>

    </div>
</div>
@endsection
