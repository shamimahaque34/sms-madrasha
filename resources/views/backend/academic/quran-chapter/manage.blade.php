@extends('backend.master')

@section('title')
   Manage Chapters
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Quran Chapter', 'child' => 'Manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Chapter</h4>
                    <a href="{{ route('quran-chapters.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Arabic Name</th>
                                <th>Bangla Name</th>
                                <th>English Name</th>
                                <th>Chapter Serial</th>
                                <th>Total Verse</th>
                                <th>Surah Origin</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($chapters as $chapter)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $chapter->arabic_name }}</td>
                                    <td>{{ $chapter->bangla_name }}</td>
                                    <td>{{ $chapter->english_name }}</td>
                                    <td>{{ $chapter->chapter_serial }}</td>
                                    <td>{{ $chapter->total_verse }}</td>
                                    <td>{{ $chapter->surah_origin == 1 ? 'Madani' : 'Makki' }}</td>
                                    <td>{{ $chapter->slug }}</td>
                                    <td>{{$chapter->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        <div class=d-flex>
                                        <a href="{{route('quran-chapters.show',$chapter->id)}}" class="btn btn-primary btn-sm "><i class="uil-eye"></i></a>
                                        <a href="{{ route('quran-chapters.edit', $chapter->slug) }}" class="btn btn-info btn-sm ms-2"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{ route('quran-chapters.destroy', $chapter->id) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Class'); ">
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

