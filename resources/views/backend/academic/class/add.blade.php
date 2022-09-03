@extends('backend.master')


@section('title')
    Add Class
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Class', 'child' => 'Create'])
@endsection



@section('body')
    <section>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-start">{{isset($class) ?'Update':'Create'}} Class</h4>
                        <a href="{{ route('classes.index') }}" class="btn btn-success float-end">
                            Manage
                            {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{isset($class)?route('classes.update',$class->id):route('classes.store')}}" method="post">
                            @csrf
                            @if(isset($class))
                                @method('put')
                            @endif
                            <div class="row mt-3">
                                <label for="" class="col-md-4">Class Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="class_name" value="{{isset($class)?$class->class_name:''}}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4">Class Numeric</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" name="class_numeric" value="{{isset($class)?$class->class_numeric:''}}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4 " id="">Note</label>
                                <div class="col-md-8">
                                    <input name="class_note" id="editor" cols="20" rows="5" class="form-control" value="{!!isset($class)?$class->class_note:''!!}"/>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label for="" class="col-md-4">Label</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="class_label" value="{{isset($class)?$class->class_label:''}}">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label for="" class="col-md-4">Class Status</label>
                                <div class="col-md-8">
                                    <label for=""> <input type="radio" name="class_status" value="1" @if(isset($class)) {{$class->class_status==1?'checked':''}} @endif>Published</label>
                                    <label for=""> <input type="radio"  name="class_status" value="0" @if(isset($class)) {{$class->class_status==0?'checked':''}} @endif>UnPublished</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4">
                                </label>
                                <div class="col-md-8">
                                    <input type="submit" value="{{isset($class)?'Update Class':'Add Class'}}" class="btn btn-success">
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
