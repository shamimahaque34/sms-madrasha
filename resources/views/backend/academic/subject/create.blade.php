@extends('backend.master')

@section('title')
    Create Subject
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Subject', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{isset($subject) ?'Update':'Create'}} Subject</h4>
                                <a href="{{ route('subjects.index') }}" class="btn btn-success float-end">
                                    Manage
                                    {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{isset($subject) ? route('subjects.update', $subject->id) : route('subjects.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($subject))
                                            @method('put')
                                        @endif
                                        <div class="form-group row mt-2">
                                            <div class="col-md-6 ">
                                                <label  class="form-label">Class Name </label>
                                                <select name="class_id" class="form-control"  data-placeholder="Class Name">
                                                    @foreach($classes as $class)
                                                        <option value="{{$class->id}}" {{isset($subject) && $subject->class_id==$class->id? 'selected':''}}> {{$class->class_name}}</option>
                                                    @endforeach
                                                 </select>
                                            </div>

                                            <div class="col-md-6 ">
                                                <label class="form-label">Group Name</label>
                                                <select name="group_id" class="form-control"  data-placeholder="Group Name">
                                                    <option value="No Group" {{isset($subject) && $subject->group_id=='No Group'? 'selected':''}}>No Group</option>
                                                    <option value="Science" {{isset($subject) && $subject->group_id=='Science'? 'selected':''}}>Science</option>
                                                    <option value="Commerce" {{isset($subject) && $subject->group_id=='Commerce'? 'selected':''}}>Commerce</option>
                                                    <option value="Arts" {{isset($subject) && $subject->group_id=='Arts'? 'selected':''}}>Arts</option>

                                                </select>
                                            </div>
                                        </div>
                                           
                                        </div>
                                        <div class="form-group row mt-2">
                                            <div class="col-md-6  ">
                                                <label for="disabledTextInput" class="form-label">Subject Name </label>
                                                <input type="text"  class="form-control" name="subject_name" placeholder="" value="{{ isset($subject)? $subject->subject_name :''}}">
                                            </div>
                                            <div class="col-md-6 ">
                                                <label  class="form-label">Subject Type </label>
                                                <input type="text"  class="form-control" name="subject_type" placeholder="" value="{{ isset($subject)? $subject->subject_type :''}}">
                                            </div>
                                           
                                        </div>
                                        <div class="form-group row mt-2">

                                            <div class="col-md-6  ">
                                                <label for="disabledTextInput" class="form-label">Pass Mark </label>
                                                <input type="text"  class="form-control" name="pass_mark" placeholder="" value="{{ isset($subject)? $subject->pass_mark :''}}">
                                            </div>
                                            <div class="col-md-6 ">
                                                <label  class="form-label">Full Mark </label>
                                                <input type="text"  class="form-control" name="final_mark" placeholder="" value="{{ isset($subject)? $subject->final_mark :''}}">
                                            </div>
                                           
                                        </div>
                                        <div class="form-group row mt-2">
                                            <div class="col-md-6  ">
                                                <label for="disabledTextInput" class="form-label">subject Author </label>
                                                <input type="text"  class="form-control" name="subject_author" placeholder="" value="{{ isset($subject)? $subject->subject_author :''}}">
                                            </div>
                                            <div class="col-md-6 ">
                                                <label  class="form-label">Subject Code </label>
                                                <input type="text"  class="form-control" name="subject_code" placeholder="" value="{{ isset($subject)? $subject->subject_code :''}}">
                                            </div>
                                           
                                        </div>
                                        <div class="form-group row mt-2">
                                            <div class="col-md-6  ">
                                                <label for="disabledTextInput" class="form-label">Subject Book Image </label><br>
                                                <input type="file"  class="form-control-file" name="subject_book_image" placeholder="" >
                                                @if(isset($subject))
                                                    <img src="{{asset($subject->subject_book_image)}}" style="height: 100px;width: 100px" alt="">
                                                @endif
                                            </div>
                                            <div class="col-md-6 ">
                                                <label class="form-label">Label</label>
                                                <select name="lavel" class="form-control select-2"  data-placeholder="Lavel">
                                                    <option value="primary" {{isset($subject) && $subject->class_label=='primary'? 'selected':''}}>Primary</option>
                                                    <option value="school" {{isset($subject) && $subject->class_label=='school'? 'selected':''}}>School</option>
                                                    <option value="college" {{isset($subject) && $subject->class_label=='college'? 'selected':''}}>College</option>
                                                </select>
                                            </div>
                                           
                                        </div>
                                        <div class="form-group row mt-2">
                                            <div class="col-md-6  ">
                                                <label for="" class="form-label">Is_for_graduation</label>
                                                <div class="col-md-9">
                                                    <label class="sm-2" for=""><input type="radio" name="is_for_graduation" {{isset($subject) && $subject->is_for_graduation == 1? 'checked':''}} value="1"> Yes</label>
                                                    <label for=""><input type="radio" name="is_for_graduation" {{isset($subject) && $subject->is_for_graduation == 0? 'checked':''}} value="0"> NO</label>
                                                </div>
                                              </div>
                                            <div class="col-md-6 ">
                                                <label  class="form-label">is_main_subject  </label>
                                                <div class="col-md-9">
                                                    <label class="sm-2" for=""><input type="radio" name="is_main_subject" {{isset($subject) && $subject->is_main_subject == 1? 'checked':''}} value="1"> yes</label>
                                                    <label for=""><input type="radio" name="is_main_subject" {{isset($subject) && $subject->is_main_subject == 0? 'checked':''}} value="0"> No</label>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="col-md-6 ">
                                            <label  class="form-label">Is_optional</label>
                                            <div class="col-md-9">
                                                <label class="sm-2" for=""><input type="radio" name="is_optional" {{isset($subject) && $subject->is_optional == 1? 'checked':''}} value="1"> Yes</label>
                                                <label for=""><input type="radio" name="is_optional" {{isset($subject) && $subject->is_optional == 0? 'checked':''}} value="0"> No</label>
                                            </div>
                                        </div>
                                        <div class=" form-group row mt-3">
                                            <label for="" class="col-md-3" id="">Note</label>
                                            <div class="col-md-9">
                                                <textarea name="note" id="editor" cols="20" rows="5" class="form-control" value="">{!!isset($subject)?$subject->note:''!!}</textarea>
                                            </div>
                                        </div>

                                        <div class=" form-group row mt-3">
                                            <label for="" class="col-md-4">  
                                            </label>
                                            <div class="col-md-4">
                                                <input type="submit" value="{{isset($subject)?'Update Subject':'Add Subject'}}" class="btn btn-success">
                                            </div>
                                        </div>
                          



                                        {{-- <div class="mb-3 float-end">
                                            <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($subject) ? 'Update ' : 'Create ' }} subject">
                                        </div> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
    <script>
        CKEDITOR.replace('editor');
    </script>
    @endsection

@endsection
