@extends('layouts.layout')
@section('body')
<div class="row">
    <div class="col-8 offset-2">
        <a href="{{ route('department.create') }}">
            <div class="btn btn-info my-2">اضافة قسم</div>
        </a>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>اسم القسم</th>
                            <th>الصورة</th>
                            <th>الحدث</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $index=> $depart)
                        <tr>
                            <td>{{ $index +1}}</td>
                            <td>{{ $depart->title}}</td>
                            <td><img src="{{ asset('images'.'/'.$depart->image) }}" alt="image department" width="100">
                            </td>
                            <td>
                                <a href="{{ route('department.edit', $depart) }}">
                                    <span class="btn btn-primary">تعديل</span>
                                </a>

                                <span class="btn btn-danger">حذف</span>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection