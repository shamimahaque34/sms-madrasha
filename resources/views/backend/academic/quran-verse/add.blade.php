@extends('backend.master')


@section('title')
    Add Quran Verse
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Quran Verse', 'child' => 'Create'])
@endsection


@section('body')
    <section>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-start">{{isset($verse) ? 'Update' : 'Create'}} Verse</h4>
                        <a href="{{ route('quran-verses.index') }}" class="btn btn-success float-end">
                            Manage
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{isset($verse) ? route('quran-verses.update',$verse->id) : route('quran-verses.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if(isset($verse))
                                @method('put')
                            @endif
                            <div class="form-group row mt-2">
                                            
                                <div class="col-md-6 ">
                                    <label  class="form-label">Chapter Name </label>
                                    <select name="quran_chapter_id" class="form-control"  data-placeholder="Chapter Name">
                                        <option value="" disabled selected>select a chapter</option>
                                        @foreach($chapters as $chapter)
                                            <option value="{{$chapter->id}}" {{isset($verse) && $verse->chapter_id == $chapter->id ? 'selected' : ''}}> {{$chapter->arabic_name}}</option>
                                        @endforeach
                                     </select>
                                </div>

                                <div class="col-md-6  ">
                                    <label for="" class="form-label">Verse Arabic</label>
                                    <input type="text"  class="form-control" name="verse_arabic" placeholder="" value="{{ isset($verse) ? $verse->verse_arabic : ''}}">
                                </div>
                               
                            </div>
                           
                            <div class="form-group row mt-2">
                                            
                                <div class="col-md-6 ">
                                    <label  class="form-label">Verse Bangla</label>
                                    <input type="text"  class="form-control" name="verse_bangla" placeholder="" value="{{ isset($verse) ? $verse->verse_bangla : ''}}">
                                </div>

                                <div class="col-md-6  ">
                                    <label for="" class="form-label">Verse English</label>
                                    <input type="text"  class="form-control" name="verse_english" placeholder="" value="{{ isset($verse) ? $verse->verse_english : ''}}">
                                </div>
                               
                            </div>


                            <div class="form-group row mt-2">
                                            
                                <div class="col-md-6 ">
                                    <label  class="form-label">Audio</label>
                                    <input type="file"  class="form-control-file" name="audio" placeholder=""> 
                                    @if(isset($verse))
                                    <audio controls autoplay muted>
                                        <source src={{asset($verse->audio)}} type="audio/mpeg">
                                    </audio>
                                @endif
                                        
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label">Status</label><br>
                                    <label for=""> <input type="radio" name="status" value="1" @if(isset($verse)) {{$verse->status == 1 ? 'checked' : ''}} @endif>Published</label>
                                    <label for=""> <input type="radio"  name="status" value="0" @if(isset($verse)) {{$verse->status == 0 ?'checked' : ''}} @endif>UnPublished</label>
                                </div>
                               
                            </div>

                            <div class=" form-group row mt-3">
                                <label for="" class="col-md-4">  
                                </label>
                                <div class="col-md-4">
                                    <input type="submit" value="{{isset($verse) ? 'Update Verse' : 'Add Verse'}}" class="btn btn-success">
                                </div>
                            </div>

                            
                           
                           
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @section('script')
    
      <script>
        CKEDITOR.replace('editor');
      </script>
   
    @endsection

@endsection
