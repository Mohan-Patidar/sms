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
                        Add <span>session</span>
                    </div>
                   
                </div>
                <div class="profile-box">
                    <div class="short-code">
                        <form id="class-form" method="Post" action="{{route('years.store')}}"
                        enctype="multipart/form-data" >
                        @csrf
                        <div class="col-md-6 last-input-margin">
                                <div class="form-group">
                                    <label>Add Session</label>
                                    <input type="text" name="years" class="form-control @error('years') is-invalid @enderror" placeholder="e.g. 2018-2019">
                                    @error('years')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    <label>Make this session as current</label>
                                    <input type="checkbox" name="session[]" value="1">
                                 
                                </div>
                            </div>
                           
                            <div class="btn btn-box">
                                <button type="submit" class="add-btn margin-top-15">Add Session</button>
                            </div>
                        </form>
                    </div>
                </div>
                @if(App\Models\Year::exists())
                <div class="page-table" id="dvData">
                <table id="student-table" class="table table-bordered table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Session</th>
                            <th>Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody id="result">
                        @php $i = 0; @endphp
                        @foreach($years as $r)
                        
            
                        <tr>
                            <td>@php echo ++$i @endphp</td>
                            <td>{{$r->years}}</td>
                            <td >
                            @if($r->status==1)
                            <a class="active"  href="{{url('remove',$r->id)}}">Deactivate</a>
                            @else
                            <a href="{{url('remove',$r->id)}}">Active</a>
                            @endif
                            </td>
                          
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            </div>
        </section>

@endsection
@section('additionalscripts')
<script>
  
   
</script>
@endsection