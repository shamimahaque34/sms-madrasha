@extends('backend.master')


@section('title')
    Add Quran Chapter
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Quran Chapter', 'child' => 'Create'])
@endsection


@section('body')
    <section>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-start">{{isset($chapter) ? 'Update' : 'Create'}} Chapter</h4>
                        <a href="{{ route('quran-chapters.index') }}" class="btn btn-success float-end">
                            Manage
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{isset($chapter) ? route('quran-chapters.update',$chapter->id) : route('quran-chapters.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if(isset($chapter))
                                @method('put')
                            @endif
                            <div class="form-group row mt-2">
                                            
                                <div class="col-md-6 ">
                                    <label  class="form-label">Arabic Name</label>
                                    <input type="text"  class="form-control" name="arabic_name" placeholder="" value="{{ isset($chapter) ? $chapter->arabic_name : ''}}">
                                </div>

                                <div class="col-md-6  ">
                                    <label for="" class="form-label">Bangla Name</label>
                                    <input type="text"  class="form-control" name="bangla_name" placeholder="" value="{{ isset($chapter) ? $chapter->bangla_name : ''}}">
                                </div>
                               
                            </div>
                           
                            <div class="form-group row mt-2">
                                            
                                <div class="col-md-6 ">
                                    <label  class="form-label">English Name</label>
                                    <input type="text"  class="form-control" name="english_name" placeholder="" value="{{ isset($chapter) ? $chapter->english_name : ''}}">
                                </div>

                                <div class="col-md-6  ">
                                    <label for="" class="form-label">Chapter Serial</label>
                                    <input type="number"  class="form-control" name="chapter_serial" placeholder="" value="{{ isset($chapter) ? $chapter->chapter_serial : ''}}">
                                </div>
                               
                            </div>


                            <div class="form-group row mt-2">
                                            
                                <div class="col-md-6 ">
                                    <label  class="form-label">Total Verse</label>
                                    <input type="number"  class="form-control" name="total_verse" placeholder="" value="{{ isset($chapter) ? $chapter->total_verse : ''}}">
                                </div>

                                <div class="col-md-6  ">
                                    <label for="" class="form-label">Surah Origin</label>
                                    <input type="number"  class="form-control" name="surah_origin" placeholder="" value="{{ isset($chapter) ? $chapter->surah_origin : ''}}">
                                </div>
                               
                            </div>

                            <div class=" form-group row mt-3">
                                           
                                <label for="" class="col-md-4">Status</label>
                                 <div class="col-md-8">
                                     <label for=""> <input type="radio" name="status" value="1" @if(isset($chapter)) {{$chapter->status == 1 ? 'checked' : ''}} @endif>Published</label>
                                     <label for=""> <input type="radio"  name="status" value="0" @if(isset($chapter)) {{$chapter->status ==0 ?'checked' : ''}} @endif>UnPublished</label>
                                 </div>
                             </div>
                           
                             <div class=" form-group row mt-3">
                                <label for="" class="col-md-4">  
                                </label>
                                <div class="col-md-4">
                                    <input type="submit" value="{{isset($chapter) ? 'Update Chapter' : 'Add Chapter'}}" class="btn btn-success">
                                </div>
                            </div>

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
