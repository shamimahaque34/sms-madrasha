@extends('backend.master')

@section('title')
   Subject Details
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Subject', 'child' => 'details'])
@endsection

@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom pb-5 " align="center">
                <h4 class="card-title">Single Subject Info</h4>
            </div>
            <div class="card-body" align="center">
                <div class="table-responsive">
                    <table  class="display table table-bordered table-hover" style="min-width:845px">
                       <tr>
                         <th>Class Name</th>
                          <td>{{ $subject->class->class_name }}</td>
                       </tr>
                      <tr>
                        <th>Group No</th>
                        <td>{{ $subject->group_id }}</td>
                    </tr>
                    <tr>
                        <th>Subject Name</th>
                        <td>{{ $subject->subject_name }}</td>
                    </tr>

                    <tr>
                        <th>Slug</th>
                        <td>{{ $subject->slug }}</td>
                    </tr>

                    <tr>
                        <th>Subject Type</th>
                        <td>{!! $subject->subject_type !!}</td>
                    </tr>

                    <tr>
                        <th>Pass Mark</th>
                        <td>{{ $subject->pass_mark }}</td>
                    </tr>
                    <tr>
                        <th>Final Mark</th>
                        <td>{{ $subject->final_mark }}</td>
                    </tr>

                    <tr>
                        <th>Subject Author</th>
                        <td>{{ $subject->subject_author }}</td>
                    </tr>

                    <tr>
                        <th>Subject Code</th>
                        <td>{{ $subject->subject_code }}</td>
                    </tr>
                    <tr>
                        <th>Subject Book Image</th>
                        <td>
                            <img src="{{asset($subject->subject_book_image) }}" style="height: 100px;width: 100px" alt="">
                        </td>
                    </tr>

                    <tr>
                        <th>Label</th>
                        <td>{{ $subject->label }}</td>

                    </tr>

                    <tr>
                        <th>is_graduation</th>
                        <td>{{ $subject->is_for_graduation==0? 'NO':'Yes'}}</td>
                    </tr>

                    <tr>
                        <th>is_main</th>
                        <td>{{ $subject->is_main_subject==0? 'NO':'Yes'}}</td>
                    </tr>

                    <tr>
                        <th>is_optional</th>
                        <td>{{ $subject->is_optional==0? 'NO':'Yes'}}</td>

                    </tr>
                    <tr>
                        <th>note</th>
                        <td>{!! \Illuminate\Support\Str::words($subject->note,10) !!}</td>
                        
                        </tr>

                      

                       
                       
                    </table>
                </div>
            </div>
        </div>
    </div>
   
</div>
@endsection
