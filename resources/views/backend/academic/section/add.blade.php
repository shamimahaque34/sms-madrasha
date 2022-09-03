@extends('backend.master')


@section('title')
    Add Section
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Section', 'child' => 'Create'])
@endsection


@section('body')
    <section>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-start">{{isset($section) ?'Update':'Create'}} Section</h4>
                        <a href="{{ route('sections.index') }}" class="btn btn-success float-end">
                            Manage
                            {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{isset($section)?route('sections.update',$section->id):route('sections.store')}}" method="post">
                            @csrf
                            @if(isset($section))
                                @method('put')
                            @endif
                            <div class="form-group row mt-3">
                                <label for="" class="col-md-4">Section Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="section_name" value="{{isset($section)?$section->section_name:''}}">
                                </div>
                            </div>
                            <div class=" form-group row mt-3">
                                <label for="" class="col-md-4">Section Capacity</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" name="section_capacity" value="{{isset($section)?$section->section_capacity:''}}">
                                </div>
                            </div>
                            <div class=" form-group row mt-3">
                                <label for="" class="col-md-4">Note</label>
                                <div class="col-md-8">
                                    <textarea name="section_note"  id="editor" cols="20" rows="5" class="form-control" value="">{!!isset($section)?$section->section_note:''!!}</textarea>
                                        
                                    
                                </div>
                            </div>

                            <div class=" form-group row mt-3">
                                <label for="" class="col-md-4">Section Status</label>
                                <div class="col-md-8">
                                    <label for=""> <input type="radio" name="section_status" value="1" @if(isset($section)) {{$section->section_status==1?'checked':''}} @endif>Published</label>
                                    <label for=""> <input type="radio"  name="section_status" value="0" @if(isset($section)) {{$section->section_status==0?'checked':''}} @endif>UnPublished</label>
                                </div>
                            </div>
                            <div class=" form-group row mt-3">
                                <label for="" class="col-md-4">
                                </label>
                                <div class="col-md-8">
                                    <input type="submit" value="{{isset($section)?'Update Section':'Add Section'}}" class="btn btn-success">
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
