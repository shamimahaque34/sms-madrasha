@extends('backend.master')

@section('title')
   Manage Subjects
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Subject', 'child' => 'Manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Subject</h4>
                    <a href="{{ route('subjects.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Class Name</th>
                                <th>Group No</th>
                                <th>Subject Name</th>
                                <th>Slug</th>
                                <th>Subject Type</th>
                                <th>Pass Mark</th>
                                <th>Final Mark</th>
                                <th>Subject Author</th>
                                <th>Subject Code</th>
                                <th>Subject Book</th>
                                <th>Label</th>
                                <th>is_graduation</th>
                                <th>is_main</th>
                                <th>is_optional</th>
                                <th>note</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subject->class->class_name }}</td>
                                    <td>{{ $subject->group_id }}</td>
                                    <td>{{ $subject->subject_name }}</td>
                                    <td>{{ $subject->slug }}</td>
                                    <td>{!! $subject->subject_type !!}</td>
                                    <td>{{ $subject->pass_mark }}</td>
                                    <td>{{ $subject->final_mark }}</td>
                                    <td>{{ $subject->subject_author }}</td>
                                    <td>{{ $subject->subject_code }}</td>
                                    <td>
                                        <img src="{{asset($subject->subject_book_image) }}" style="height: 100px;width: 100px" alt="">
                                    </td>
                                    <td>{{ $subject->label }}</td>
                                    <td>{{ $subject->is_for_graduation==0? 'NO':'Yes'}}</td>
                                    <td>{{ $subject->is_main_subject==0? 'NO':'Yes'}}</td>
                                    <td>{{ $subject->is_optional==0? 'NO':'Yes'}}</td>
                                    <td>{!! \Illuminate\Support\Str::words($subject->note,10) !!}</td>
                                    <td>
                                        <div class=d-flex>
                                        <a href="{{route('subjects.show',$subject->id)}}" class="btn btn-primary btn-sm "><i class="uil-eye"></i></a>
                                        <a href="{{ route('subjects.edit', $subject->slug) }}" class="btn btn-info btn-sm ms-2"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{ route('subjects.destroy', $subject->id) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Class'); ">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm ms-2">
                                                <i class="dripicons-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

