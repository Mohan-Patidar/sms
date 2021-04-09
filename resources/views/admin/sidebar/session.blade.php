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
            $posts= App\Models\Student_classe::get();
            $y_id=request()->segment(3);
            @endphp
            @foreach($posts as $post)
            <li @if(request()->segment(2) == $post->id) class="active" @endif ><a href="{{ url('classes',['classes'=>$post->id,'session'=>$y_id]) }}">{{$post->class_name}}</a></li>
                    @endforeach
            </ul>
           
        </div>
    </div>
    <form id="frm-example" action="javascript:void(0)" method="get">
            <div class="page-table" id="dvData">
                <table id="class-table" class="table-bordered table-striped" style="width:100%;">
                    <thead>
                        <tr><th></th>
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
                        @foreach($tests as $t)
                        @foreach($b as $student)
                    
                        @if($t->students_id==$student->id)
                   
                        <tr>
                            <td>{{$student->id}}</td>
                            <td>@php echo ++$i @endphp</td>
                            <td>
                                <div class="d-flex">
                                    
                                        <a class="edit-btn" href="{{route('students.edit',$student->id)}}">
                                            <img src="{{url('/')}}/assets/image/Icon-edit.svg" width="16px" alt=""></a>
                                   
                                   
                                        <a class="view-btn" href="{{url('show',['student'=>$student->id,'session'=>$t->session])}}">
                                            <img src="{{url('/')}}/assets/image/view.svg" width="16px" alt=""></a>
                                    
                                     @if(Auth::check() && Auth::user()->user_type  == "Admin")
                                    <button type="submit" class="delete-btn student-delete" data-id="{{$student->id}}" data-name="{{$t->id}}">
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
                            @foreach($class as $c)
                            @if($c->id == $t->class_name)
                            <td class="sorting_1">{{$c->class_name}}</td>
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
            <p><button type="submit" data-toggle="modal" data-target="#promoteModal">Promote</button></p>
           

            </div>
    </form>

    <div class="container">

<!-- Button to Open the Modal -->
<!-- <button type="button" class="add-btn" data-toggle="modal" data-target="#promoteModal">
   Promote
</button> -->

<!-- The Modal -->
<div class="modal" id="promoteModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Student Promote</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="javascript:void(0)" id="promote-student" method="post">

                    @csrf
            <input type="hidden" name="students_id" id="promote" value="">
                   
                    <label>Session </label>
                    <select  name="year" id="year">
                    <option value="">select</option>
                    @foreach($year as $y)
                       @if($y->status!=1)
                        <option value="{{$y->id}}">{{$y->years}}</option>
                        @endif
                    @endforeach
                    </select>
                    <label>Class</label>
                    <select  name="class" id="class">
                    @foreach($class as $c)
                   
                        <option value="{{$c->id}}">{{$c->class_name}}</option>
                   
                    @endforeach
                    </select>
                    <button type="submit"  value="Add">Promote</button>
                </form>
            </div>

        </div>
    </div>
</div>
    </section>
    @endsection
    @section('additionalscripts')>

    @endsection