@extends('backend.master')

@section('title')
  Class Detail
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Class', 'child' => 'details'])
@endsection

@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom pb-5 " align="center">
                <h4 class="card-title">Single Class Info</h4>
            </div>
            <div class="card-body" align="center">
                <div class="table-responsive">
                    <table  class="display table table-bordered table-hover" style="min-width:845px">
                       <tr>
                         <th>Class Name</th>
                          <td>{{$class->class_name}}</td>
                          
                      </tr>

                      <tr>
                        <th>Class Numeric</th>
                        <td>{{$class->class_numeric}}</td>
                     </tr>

                     <tr>
                        <th>Note</th>
                        <td>{{$class->class_note}}</td>
                       
                    </tr>

                    <tr>
                        <th>Label</th>
                        <td>{{$class->class_label}}</td>
                       
                    </tr>

                     <tr>
                        <th>Slug</th>
                        <td>{{ $class->slug }}</td>
                    </tr>

                   

                    <tr>
                        <th>Status</th>
                        <td>{{$class->class_status==1?'Published':'Unpublished'}}</td></td>
                    </tr>

                   

                  
        </table>
                </div>
            </div>
        </div>
    </div>
   
</div>
@endsection
