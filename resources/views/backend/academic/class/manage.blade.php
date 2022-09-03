@extends('backend.master')

@section('title')
    Manage Class
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Class', 'child' => 'Manage'])
@endsection


@section('body')
    <section class="py-5">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-capitalize float-start">Manage Class</h4>
                        <a href="{{ route('classes.create') }}" class="btn btn-success float-end">
                            Create
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Class Name</th>
                                <th>Class Numeric</th>
                                <th>Note</th>
                                <th>Label</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($classes as $class)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$class->class_name}}</td>
                                    <td>{{$class->class_numeric}}</td>
                                    <td>{!! \Illuminate\Support\Str::words($class->class_note,15) !!}</td>
                                    <td>{{$class->class_label}}</td>
                                    <td>{{$class->class_status==1?'Published':'Unpublished'}}</td>
                                    <td>
                                        <div class="d-flex">
                                        <a href="{{route('classes.show',$class->id)}}" class="btn btn-primary btn-sm "><i class="uil-eye"></i></a>

                                        <a href="{{route('classes.edit',$class->slug)}}" class="btn btn-sm btn-info ms-2"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{route('classes.destroy',$class->id)}}" method="post" style="display:inline-block" onsubmit="return confirm('Are You Sure?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn ms-2 btn-sm btn-danger"><i class="dripicons-trash"></i></button>
                                        </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
