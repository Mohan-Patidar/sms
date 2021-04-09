@extends('layouts.adminlayout')

@section('content')

<div class="page-inner ad-inr">
    @if(Session::has('message'))
    <div class="save-alert alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <p>{{ Session::get('message') }}</p>
    </div>
    @endif
    <section class="main-wrapper">

        <div class="page-color">
            <div class="page-header">
                <div class="page-title">
                    <span>student </span>
                </div>
               
                <span class="c_session"><b>Current Session</b> {{$y_name}}  </span>
                <form action="{{ route('import') }}" method="Post" enctype="multipart/form-data" class="export-form">

                    @csrf

                    <input type="file" name="file" id="file" class="my-profile-choose-file">

                    <input type="submit" id="submit" style="display: none;">
                    <button type="button" class="btn btn-success import">Import</button>
                    <!--<a class="btn btn-warning" href="{{ route('export') }}">Export Student Data</a>-->
                    <a  href="#" class="btn btn-warning" id="export" role='button'>Export</a>
                </form>
                <div class="page-btn">
                    <a href="{{route('students.create')}}" class="add-btn">Add Student</a>
                </div>
  
            </div>
            <div class="tabel-head">
                    <h5 class="page-title"><span>Classes </span></h5>
                <div class="form-group">
                    <ul class="cus-menu">
                    @php
                    $posts=  App\Models\Student_classe::get();
                    $current_year=$y_id;
                    @endphp
                    @foreach($posts as $post)
                    <li @if(request()->segment(2) == $post->id) class="active" @endif ><a href="{{ url('classes',['classes'=>$post->id,'session'=>$current_year]) }}">{{$post->class_name}}</a></li>
                            @endforeach
                    </ul>
                   
                </div>
            </div>
            <div class="page-table" id="dvData">
                <table id="student-table" class="table table-bordered table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Actions</th>
                            <th>Student Id</th>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Scholar No.</th>
                            <th>Class</th>
                            <th>Father's Name</th>
                            <th>Mother's Name</th>
                            <th>D.O.B</th>
                            <th>Address</th>
                            <th>Aadhar Number</th>
                            <th>Samagar Id</th>
                            <th>Mobile No. 1</th>
                            <th>Mobile No. 2</th>
                            <th>Bank Acc/No.</th>
                            

                        </tr>
                    </thead>
                    <tbody id="result">
                    
                        @php $i = 0; @endphp
                        @foreach($records as $r)
                        @foreach($students as $student)
                        @if(($r->students_id==$student->id) &&($r->session==$y_id))
                        <tr>

                            <td>@php echo ++$i @endphp</td>
                            <td>
                                <div class="d-flex">
                                  
                                        <a  class="edit-btn" href="{{route('students.edit',$student->id)}}">
                                            <img src="{{url('/')}}/assets/image/Icon-edit.svg" width="16px" alt=""></a>
                                   
                                    
                                        <a class="view-btn" href="{{url('show',['student'=>$student->id,'session'=>$r->session])}}">
                                            <img src="{{url('/')}}/assets/image/view.svg" width="16px" alt=""></a>
                                  
                                    @if(Auth::check() && Auth::user()->user_type  == "Admin")

                                    <button type="submit" class="delete-btn student-delete" data-id="{{$student->id}}" data-name="{{$r->id}}">
                                        <img src="{{url('/')}}/assets/image/Icon-delete.svg" width="16px" alt="">
                                    </button>
                                    @endif

                                </div>
                            </td>
                            <td>{{$student->student_id}}</td>
                            <td>@if($student->profile_picture==NULL)<img class="student-img" src="{{url('/')}}/assets/image/download.png" />
                                @else<img class="student-img" src="{{asset('image/profile_picture/' .$student->profile_picture) }}" />@endif</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->scholar_no}}</td>
                            @foreach($tests as $test)
                            @if($test->id == $r->class_name)
                            <td class="sorting_1">{{$test->class_name}}</td>
                            @endif
                            @endforeach
                            <td>{{$student->father_name}}</td>
                            <td>{{$student->mother_name}}</td>
                            <td>{{$student->dob}}</td>
                            <td>{{$student->address}}</td>
                            <td>{{$student->aadhar_no}}</td>
                            <td>{{$student->samarg_id}}</td>
                            <td>{{$student->mobile_no}}</td>
                            <td>{{$student->mobile_no2}}</td>
                            <td>{{$student->account_no}}</td>
                            
                        </tr>
                        @endif
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @endsection
    @section('additionalscripts')>

    @endsection