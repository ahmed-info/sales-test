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
                            <th>الابناء</th>
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
                                <form action="{{ route('department.delete',$depart->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('subdepart.list', $depart->id) }}">
                                    <span class="btn btn-success">الاقسام الفرعية</span>
                                </a>
                                @foreach ($depart->subdepartments as $sub)
                                <h3 style="display: inline; margin-left: 10px">{{ $sub->subtitle}}</h3>
                                @endforeach
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