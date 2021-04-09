@extends('layouts.adminlayout')

@section('content')


@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">×</span></button>
    <p>{{ Session::get('message') }}</p>
</div>
@endif
        <section class="main-wrapper">
            <div class="page-color">
                <div class="page-header">
                    <div class="page-title">
                        Student <span>Fees</span>
                    </div>
                    <div class="page-btn">
                        <a href="{{url('/add_class')}}" class="add-btn">
                            <span>
                                    <img src="{{url('/')}}/assets/image/Icon-arrow-back.svg" class="btn-arrow-show" alt="">
                                    <img src="{{url('/')}}/assets/image/Icon-arrow-back-2.svg" class="btn-arrow-hide" alt="">
                                </span>
                            <span>Back</span>
                        </a>
                    </div>
                </div>
                <div class="profile-box">
                    <div class="short-code">
                        <form id="class-form" method="Post" action="{{route('add_class.store')}}"
                        enctype="multipart/form-data" >
                        @csrf
                        <div class="col-md-6 last-input-margin">
                                <div class="form-group">
                                    <label>Add Session</label>
                                    <select name="years_id" id="years_id">
                                        <option value="" selected>Select Session</option>
                                        @foreach($year as $y)
                                        <option value="{{$y->id}}">{{$y->years}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Class</label>
                                    <select name="student_classes_id" id="student_classes_id">
                                        <option value="" selected>Select Class</option>
                                        @foreach($tests as $test)
                                        <option value="{{$test->id}}">{{$test->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Fees</label>
                                <input type="text" placeholder="Fees Structure" name="amount" id="amount">
                              
                            </div>
                           
                            <div class="btn btn-box">
                                <button type="submit" class="add-btn margin-top-15">Add Fees</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

@endsection
@section('additionalscripts')
<script>
    $("#class-form").validate();
   
</script>
@endsection