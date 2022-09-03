@extends('backend.master')

@section('title')
  Section Detail
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Section', 'child' => 'details'])
@endsection

@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom pb-5 " align="center">
                <h4 class="card-title">Single Section Info</h4>
            </div>
            <div class="card-body" align="center">
                <div class="table-responsive">
                    <table  class="display table table-bordered table-hover" style="min-width:845px">
                       <tr>
                         <th>Section Name</th>
                          <td>{{$section->section_name}}</td>
                          
                      </tr>

                      <tr>
                        <th>Section Capacity</th>
                        <td>{{$section->section_capacity}}</td>
                     </tr>

                     <tr>
                        <th>Slug</th>
                        <td>{{ $section->slug }}</td>
                    </tr>

                    <tr>
                        <th>Section Note</th>
                        <td>{{$section->section_note}}</td>
                       
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>{{$section->section_status==1?'Published':'Unpublished'}}</td></td>
                    </tr>

                   

                  
        </table>
                </div>
            </div>
        </div>
    </div>
   
</div>
@endsection
