@extends('department.index')
@section('body')
<div class="col-md-7 offset-3 mt-4">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('department.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">اسم القسم</label>
                    <input type="text" name="mytitle" value="{{ old('mytitle') }}" class="form-control"
                        id="exampleInputEmail1" placeholder="ادخل اسم القسم">
                    @error('mytitle')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">اختر الصورة</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="myimage" class="custom-file-input" id="exampleInputFile">
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
    <!-- /.card -->


</div>
@endsection