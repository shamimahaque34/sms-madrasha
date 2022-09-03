@extends('backend.master')


@section('title')
    Add Quran Translation Provider
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Quran Translation Provider', 'child' => 'Create'])
@endsection


@section('body')
    <section>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-start">{{isset($provider) ? 'Update' : 'Create'}} Quran Translation Provider</h4>
                        <a href="{{ route('quran-translation-providers.index') }}" class="btn btn-success float-end">
                            Manage
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{isset($provider) ? route('quran-translation-providers.update',$provider->id) : route('quran-translation-providers.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if(isset($provider))
                                @method('put')
                            @endif
                            <div class="form-group row mt-2">
                                <div class="col-md-6  ">
                                    <label for="" class="form-label">Brand Name</label>
                                    <input type="text"  class="form-control" name="brand_name" placeholder="" value="{{ isset($provider) ? $provider->brand_name : ''}}">
                                </div>            
                                
                                <div class="col-md-6  ">
                                    <label for="" class="form-label">Translated By</label>
                                    <input type="text"  class="form-control" name="translated_by" placeholder="" value="{{ isset($provider) ? $provider->translated_by : ''}}">
                                </div>
                               
                            </div>
                           
                            <div class="form-group row mt-2">
                                            
                                <div class="col-md-6 ">
                                    <label  class="form-label">Language</label>
                                    <input type="text"  class="form-control" name="language" placeholder="" value="{{ isset($provider) ? $provider->language : ''}}">
                                </div>
                               
                                <div class="col-md-6">
                                    <label for="" class="form-label">Status</label><br>
                                    <label for=""> <input type="radio" name="status" value="1" @if(isset($provider)) {{$provider->status == 1 ?'checked' : ''}} @endif>Published</label>
                                    <label for=""> <input type="radio"  name="status" value="0" @if(isset($provider)) {{$provider->status == 0 ?'checked' : ''}} @endif>UnPublished</label>
                                </div>
                               
                               
                            </div>


                            

                            <div class=" form-group row mt-3">
                                <label for="" class="col-md-4">  
                                </label>
                                <div class="col-md-4">
                                    <input type="submit" value="{{isset($provider) ? 'Update Provider' : 'Add Provider'}}" class="btn btn-success">
                                </div>
                            </div>

                         </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
@endsection
