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
                    student <span> class</span>
                </div>
                
                <div class="page-btn">
                    <a href="{{route('add_class.create')}}" class="add-btn">Add Fees Structure</a>
                </div>
                </div>
                <div class="tabel-head">
                    <h5 class="page-title"><span>Session </span></h5>
                    <div class="form-group">
                        <ul class="cus-menu">

                            @php
                            $posts= App\Models\Year::orderBy('id','DESC')->get();
                            @endphp
                            @foreach($posts as $post)
                            <li class="active"><a href="{{ url('fees',$post->id) }}">{{$post->years}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            <div class="page-table">
                <table id="example" class="table-striped table-bordered" style="width:100%;">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Session</th>
                            <th>Class Name</th>
                            <th>Fees Structure</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0; @endphp
                        @foreach($tests as $test)
                        <tr>
                            <td>@php echo ++$i @endphp</td>
                            @foreach($year as $y)
                            @if($test->years_id == $y->id)
                            <td>{{$y->years}}</td>
                            @endif
                            @endforeach
                            @foreach($class as $c)
                            @if($test->student_classes_id == $c->id)
                            <td>{{$c->class_name}}</td>
                            @endif
                            @endforeach
                            <td>{{$test->amount}}</td>
                            <td>
                                
                                <div class="d-flex">
                                    @if(Auth::check() && Auth::user()->user_type == "Admin")
                                  
                                        <a class="edit-btn" href="{{route('add_class.edit',$test->id)}}">
                                            <img src="{{url('/')}}/assets/image/Icon-edit.svg" width="16px" alt=""></a>
                                  
                                    
                                    <button type="submit" class="delete-btn delete-confirm" data-id="{{$test->id}}" data-name="{{ $test->class_name }}">
                                        <img src="{{url('/')}}/assets/image/Icon-delete.svg" width="16px" alt="">
                                    </button>
                                    @endif
                                </div>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @endsection
    @section('additionalscripts')

    @endsection