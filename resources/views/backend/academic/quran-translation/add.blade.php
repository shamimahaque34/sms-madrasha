@extends('backend.master')


@section('title')
    Add Quran Translation
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Quran Translation', 'child' => 'Create'])
@endsection


@section('body')
    <section>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-start">{{isset($translation) ? 'Update' : 'Create'}} Quran Translation</h4>
                        <a href="{{ route('quran-translations.index') }}" class="btn btn-success float-end">
                            Manage
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{isset($translation) ? route('quran-translations.update',$translation->id) : route('quran-translations.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if(isset($translation))
                                @method('put')
                            @endif
                            <div class="form-group row mt-2">
                                            
                                <div class="col-md-6 ">
                                    <label  class="form-label">Chapter Name </label>
                                    <select name="quran_chapter_id" id="chapterId" class="form-control"  data-placeholder="Chapter Name">
                                        <option value="" disabled selected>select a chapter</option>
                                        @foreach($chapters as $chapter)
                                            <option value="{{$chapter->id}}" {{isset($translation) && $translation->quran_chapter_id == $chapter->id ? 'selected' : ''}}> {{$chapter->arabic_name}}</option>
                                        @endforeach
                                     </select>
                                </div>

                                <div class="col-md-6 ">
                                    <label  class="form-label">Verse Name </label>
                                    <select name="quran_verse_id" class="form-control" id="quranVerse" data-placeholder="Verse Name">
                                        <option value="" disabled selected>select a verse</option>
                                        @foreach($verses as $verse)
                                            <option value="{{$verse->id}}" {{isset($translation) && $translation->quran_verse_id == $verse->id ? 'selected' : ''}}> {{$verse->verse_arabic}}</option>
                                        @endforeach
                                        
                                     </select>
                                </div>

                               
                               
                            </div>
                           
                            <div class="form-group row mt-2">
                                
                                <div class="col-md-6 ">
                                    <label  class="form-label">Quran Translation Provider Name </label>
                                    <select name="quran_translation_provider_id" class="form-control"  data-placeholder="Quran Translation Provider Name">
                                        <option value="" disabled selected>select a quran translation provider</option>
                                        @foreach($providers as $provider)
                                            <option value="{{$provider->id}}" {{isset($translation) && $translation->quran_translation_provider_id == $provider->id ? 'selected' : ''}}> {{$provider->brand_name}}</option>
                                        @endforeach
                                     </select>
                                </div>
                                

                                <div class="col-md-6  ">
                                    <label for="" class="form-label">Translated Verse</label>
                                    <input type="text"  class="form-control" name="translated_verse" placeholder="" value="{{ isset($translation) ? $translation->translated_verse : ''}}">
                                </div>
                               
                            </div>


                            <div class=" form-group row mt-3">
                                           
                                <label for="" class="col-md-4">Status</label>
                                 <div class="col-md-8">
                                     <label for=""> <input type="radio" name="status" value="1" @if(isset($translation)) {{$translation->status == 1 ? 'checked' : ''}} @endif>Published</label>
                                     <label for=""> <input type="radio"  name="status" value="0" @if(isset($translation)) {{$translation->status == 0 ? 'checked' : ''}} @endif>UnPublished</label>
                                 </div>
                             </div>

                            <div class=" form-group row mt-3">
                                <label for="" class="col-md-4">  
                                </label>
                                <div class="col-md-4">
                                    <input type="submit" value="{{isset($translation) ? 'Update Translation' : 'Add Translation'}}" class="btn btn-success">
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
           
            var base_url = {!! json_encode(url('/')) !!}+'/';
            $(document).on('click','#chapterId', function(){
                var chapterId = $(this).val();
                alert('sdfsdf');
                $.ajax({
                    url: base_url +"admin/get-verse-data-by-chapter-id",
                    dataType: "JSON",
                    method: "POST",
                    data: {quran_chapter_id:chapterId}
                    success: function (res) {
                        var verse = '';
                        verse += '<option value="">select a verse</option>';
                        $.each(res, function (index, value) {
                            verse += '<option value="'+value.id+'">'+value.verse_arabic+'</option>';
                        })

                        $('#quranVerse').empty().append(verse);
                    }
                })
            })
        </script>
    
      <script>
        CKEDITOR.replace('editor');
      </script>
   
    @endsection

@endsection
