@extends('layouts.layout')
@section('body')
<div class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{ route('department.update',$department->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">اسم القسم</label>
                        <input type="text" name="mytitle" value="{{ $department->title }}" class="form-control"
                            id="exampleInputEmail1" placeholder="ادخل اسم القسم">
                        @error('mytitle')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">اختر الصورة</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <img src="{{ asset('images'.'/'.$department->image)  }}" alt="{{ $department->title }}"
                                    width="100">
                                <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                @error('myimage')
                                <span class="text-danger">{{ $message}}</span>
                                @enderror
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection