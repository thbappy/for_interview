@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-8 col-md-10 ml-auto mr-auto">
                @if ($message = Session::get('success'))
                    <div class="alert alert-primary" role="alert">
                        {{ $message }}
                    </div>
                @endif
                @if ($message = Session::get('failed'))
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @endif
                <h4><small>Update Product</small></h4>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ route('home') }}" class="btn btn-success float-right">List</a>
                    </div>
                </div>

                <form class="form-horizontal" action="{{ route('information.update', $information->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="product_title">Name</label>
                            <div class="col-md-12">
                                <input type="text" id="product_title" value="{{ $information->name }}" name="name" placeholder="Product Title" class="form-control input-md">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 control-label" for="product_title">Email</label>
                            <div class="col-md-12">
                                <input type="text" value="{{ $information->email }}" id="product_title" name="email" placeholder="Product Price" class="form-control input-md" >
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <div class="col-md-4">
                                <!-- File Button -->
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="filebutton"> Image</label>
                                    <div class="col-md-12">
                                        <img src="{{ asset($information->image) }}" style="widht:100px;height: 50px" alt=""><br>
                                        <input id="filebutton" name="img" class="input-file" type="file">
                                        <span class="text-danger">{{ $errors->first('img') }}</span>
                                    </div>
                                </div>

                                <label class="col-md-12 control-label" for="filebutton"> ------Gender----</label>
                                <div class="form-check">
                                    <input class="form-check-input" value="{{ in_array(1, old($information->gender, [])) ? 'checked' : '' }}" type="radio" name="gender" id="exampleRadios1" value="option1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="0" type="radio" name="gender" id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Female
                                    </label>
                                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                                </div>


                                <!-- Button -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>

            </div>

        </div>
    </div>
@endsection
