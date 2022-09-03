@extends('backend.master')

@section('title')
    Manage Section
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Section', 'child' => 'Manage'])
@endsection


@section('body')
    <section class="py-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-capitalize float-start">Manage Section</h4>
                        <a href="{{ route('sections.create') }}" class="btn btn-success float-end">
                            Create
                        </a>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Section Name</th>
                                <th>Section Capacity</th>
                                <th>Note</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sections as $section)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$section->section_name}}</td>
                                    <td>{{$section->section_capacity}}</td>
                                    <td>{!!$section->section_note!!}</td>
                                    <td>{{$section->section_status==1?'Published':'Unpublished'}}</td>
                                    <td>
                                        <div class="d-flex">
                                        <a href="{{route('sections.show',$section->id)}}" class="btn btn-primary btn-sm "><i class="uil-eye"></i></a>

                                        <a href="{{route('sections.edit',$section->slug)}}" class="btn-sm btn-info ms-2"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{route('sections.destroy',$section->id)}}" method="post" style="display:inline-block" onsubmit="return confirm('Are You Sure?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn-sm btn-danger ms-2"><i class="dripicons-trash"></i></button>
                                        </form>
                                    </td>
                                </div>
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
