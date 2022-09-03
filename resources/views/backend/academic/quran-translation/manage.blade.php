@extends('backend.master')

@section('title')
   Manage Quran Translations
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Quran Translation ', 'child' => 'Manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Quran Translation</h4>
                    <a href="{{ route('quran-translations.create') }}" class="btn btn-success float-end">
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
                                <th>Quran Verse Name</th>
                                <th>Quran Translation Provider Name</th>
                                <th>Translated Verse</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($translations as $translation)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $translation->quranChapter->arabic_name ?? ''}}</td>
                                    <td>{{ $translation->quranVerse->verse_arabic ?? ''}}</td>
                                    <td>{{ $translation->quranTranslationProvider->brand_name ?? ''}}</td>
                                    <td>{{ $translation->translated_verse }}</td>
                                    <td>{{ $translation->slug }}</td>
                                    <td>{{ $translation->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        <div class=d-flex>
                                        <a href="{{route('quran-translations.show',$translation->id)}}" class="btn btn-primary btn-sm "><i class="uil-eye"></i></a>
                                        <a href="{{ route('quran-translations.edit', $translation->slug) }}" class="btn btn-info btn-sm ms-2"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{ route('quran-translations.destroy', $translation->id) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Class'); ">
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

