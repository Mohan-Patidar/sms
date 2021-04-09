@extends('layouts.adminlayout')

@section('content')

<div class="page-inner ad-inr">
    <section class="main-wrapper">

        <div class="page-color">
            <div class="page-header">
                <div class="page-title">
                    <span>Student Details </span>
                </div>

            </div>
            <h5>Total fees of {{$class}} = {{$amount}} of {{$sessions}} </h5>
            <div>
                <label>Student Id:</label>
                {{$students->student_id}}

            </div>
            <div>
                <label>Scholar No.:</label>
                {{$students->scholar_no}}
            </div>

            <div>
                <label>Student Name:</label>
                {{$students->name}}
            </div>
            <div>
                <label>Father's Name:</label>
                {{$students->father_name}}
            </div>
             <div>
                <label>Mother's Name:</label>
                {{$students->mother_name}}
            </div>
             <div>
                <label>Contact No.:</label>
                {{$students->mobile_no}}
            </div>
            <div>
                <label>Address</label>
                {{$students->address}}
            </div>
            <div>
                <label>Total fees :</label>
                {{$amount}}
            </div>
            <div>
                <label>remaining fees :</label>
                {{$r}}
            </div>

            <div class="container">

                <!-- Button to Open the Modal -->
                <button type="button" class="add-btn" data-toggle="modal" data-target="#myModal">
                    Add
                </button>

                <!-- The Modal -->
                <div class="modal" id="myModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Student fees</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="{{route('reports.store')}}" method="post">

                                    @csrf

                                    <input type="hidden" name="id" value="{{$record_id}}">
                                    <input type="hidden" name="amount" value="{{$amount}}">
                                    <label>Receipt No. </label>
                                    <input type="text" name="receipt_no" id="receipt_no">
                                    <label>Amount to be paid</label>
                                    <input type="text" name="fees" id="fees">
                                    <label>Date</label>
                                    <input type="date" name="date">
                                    <label>Description</label>
                                    <input type="text" name="description">
                                    <input type="submit" name="save" class="login-btn" id="save" value="Add">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>



            <!-- <div><button onclick="myFunction()">Add</button></div>
    <div id="amount" style="display: none;" >
    <form action="{{route('reports.store')}}" method="post">
    
    @csrf
   
    <input type="hidden" name="id" value="{{$record_id}}">
    <input type="hidden" name="amount" value="{{$amount}}">
    <label>Receipt No. </label>
    <input type="text" name="receipt_no" id="receipt_no">
    <label>Amount to be paid</label>
    <input type="text" name="fees" id="fees">
    <label>Date</label>
    <input type="date" name="date">
    <label>Description</label>
    <input type="text" name="description">
    <input type="submit" name="save" class="login-btn" id="save" value="Add">
    </form>
    </div>
   -->
            @if(App\Models\Report::where('records_id',$record_id)->exists())
            <div class="page-table">
                <table id="" class="table-striped table-bordered" style="width:100%;">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Receipt No.</th>
                            <th>Paid Fees</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Edit</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0;
                        $posts = App\Models\Report::where("records_id","=",$record_id)->get();

                        @endphp
                        @foreach($posts as $post)
                        <tr>
                            <td>@php echo ++$i @endphp</td>
                            <td>{{$post->receipt_no}}</td>
                            <td>{{$post->fees}}</td>
                            <td>{{$post->date}}</td>
                            <td>{{$post->description}}</td>
                           @if(Auth::check() && Auth::user()->user_type == "Admin")
                            <td> <button class="edit-btn passingID" r="{{$post->receipt_no}}" dat="{{$post->date}}" fee="{{$post->fees}}" data-id="{{$post->id}}" record-id="{{$post->records_id}}" d="{{$post->description}}">
                                    <a class="" href="javascript:void(0)">
                                        <img src="{{url('/')}}/assets/image/Icon-edit.svg" width="16px" alt=""></a>
                                </button></td>
                            <div class="modal fade" id="myeditModal" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                    <div class="modal-header">
                                <h4 class="modal-title">Edit Receipt</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                                        <div class="modal-body">
                                <form action="{{url('report')}}" method="post">

                                    @csrf

                                    <input type="hidden" name="main_id" id="main_id"  value="">
                                    <input type="hidden" name="id" id="idkl"  value="">
                                   
                                    <label>Receipt No. </label>
                                    <input type="text" name="receipt_no" id="receipt" >
                                    <label>Amount to be paid</label>
                                    <input type="text" name="fees" id="fee" value="">
                                    <label>Date</label>
                                    <input type="date" name="date" id="date">
                                    <label>Description</label>
                                    <input type="text" name="description" id="description">
                                    <input type="submit" name="save" class="login-btn" id="save" value="Add">
                                </form>
                            </div>

                                        
                                    </div>

                                </div>
                            </div>
                             @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @endif
    </section>
    @endsection

   