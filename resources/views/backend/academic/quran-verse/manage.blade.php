@extends('backend.master')

@section('title')
   Manage Verses
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Quran Verse', 'child' => 'Manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Verse</h4>
                    <a href="{{ route('quran-verses.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Quran Chapter Name</th>
                                <th>Verse Arabic</th>
                                <th>Verse Bangla</th>
                                <th>Verse English</th>
                                <th>Audio</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($verses as $verse)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $verse->quranChapter->arabic_name ?? '' }}</td>
                                    <td>{{ $verse->verse_arabic }}</td>
                                    <td>{{ $verse->verse_bangla }}</td>
                                    <td>{{ $verse->verse_english }}</td>
                                    <td><audio controls  muted>
                                        <source src={{asset($verse->audio)}} type="audio/mpeg">
                                    </audio></td>
                                    <td>{{ $verse->slug }}</td>
                                    <td>{{$verse->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        <div class=d-flex>
                                        <a href="{{route('quran-verses.show',$verse->id)}}" class="btn btn-primary btn-sm "><i class="uil-eye"></i></a>
                                        <a href="{{ route('quran-verses.edit', $verse->slug) }}" class="btn btn-info btn-sm ms-2"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{ route('quran-verses.destroy', $verse->id) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Class'); ">
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

