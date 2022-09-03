@extends('backend.master')

@section('title')
   Manage Quran Translation Providers
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Quran Translation Provider', 'child' => 'Manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Quran Translation Provider</h4>
                    <a href="{{ route('quran-translation-providers.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Brand Name</th>
                                <th>Translated By</th>
                                <th>Language</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($providers as $provider)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $provider->brand_name }}</td>
                                    <td>{{ $provider->translated_by }}</td>
                                    <td>{{ $provider->language }}</td>
                                    <td>{{ $provider->slug }}</td>
                                    <td>{{$provider->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        <div class=d-flex>
                                        <a href="{{route('quran-translation-providers.show',$provider->id)}}" class="btn btn-primary btn-sm "><i class="uil-eye"></i></a>
                                        <a href="{{ route('quran-translation-providers.edit', $provider->slug) }}" class="btn btn-info btn-sm ms-2"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{ route('quran-translation-providers.destroy', $provider->id) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Class'); ">
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

