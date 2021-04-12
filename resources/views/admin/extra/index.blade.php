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
                    Extra <span>Pay</span>
                </div>

                <div class="page-btn">
                    <a href="javascript:void(0)" class="add-btn addstudent">Add Student</a>

                    <div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <p class="msg"></p>
                                <div class="modal-body">
                                    <form class="add-student-form" id="extrapays" method="Post" action="">

                                        @csrf
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" id="name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Father name</label>
                                                    <input type="text" name="father_name" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mother name</label>
                                                    <input type="text" name="mother_name" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Class</label>
                                                    <select name="class_name" id="class_name">
                                                        <option value="" selected>Select Class</option>
                                                        @foreach($class as $test)
                                                        <option value="{{$test->id}}">{{$test->class_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-secondary addfees" data-dismiss="modal">Add</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="page-table">
                <table id="example" class="table-striped table-bordered" style="width:100%;">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Father's Name</th>
                            <th>Mother's Name</th>
                            <th>Class</th>
                            <th>View more</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $i = 0; @endphp
                        @foreach($students as $s)
                        <tr>
                            <td>@php echo ++$i @endphp</td>
                            <td>{{$s->name}}</td>
                            <td>{{$s->fname}}</td>
                            <td>{{$s->mname}}</td>
                            @foreach($class as $c)
                            @if($c->id==$s->class)
                            <td>{{$c->class_name}}</td>
                            @endif
                            @endforeach
                            @php
         
            $gave =  App\Models\Payment::where("id", "=", $s->id)->sum('price');
             
           
            @endphp
                            <td>
                            <a href="javascript:void(0)" class="showdetails" data-id="{{$s->id}}" >
                                 view more
                                </a>
                            <a href="javascript:void(0)" class="addpayment" data-id="{{$s->id}}" data-name={{$gave}}>
                                  Gave
                                </a>
                                <a href="javascript:void(0)" class="subpayment" data-id="{{$s->id}}" data-name={{$gave}}>
                                 Take
                                </a></td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <div class="modal fade" id="addpayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Gave Payment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <div class="row">

                                <form class="add-student-form" id="extrapays" method="Post" önSubmit="return" action="javascript:void(0)">
                                    @csrf
                                    <input type="hidden" name="old" id="old_price" value="">
                                    <input type="hidden" name="sid" id="id" value="">
                                        
                                            <label>Amount</label>
                                            <input type="number" name="price" id="prices" autocomplete="off">
                                      
                                       
                                                <label>When did you got?</label>
                                                <input type="date" name="date" id="dates">
                                          
                                      
                                      
                                                <label>Enter Details</label>
                                                <input type="text" name="detail" id="details">
                                         

                                        <button type="submit" class="btn btn-secondary addpay" >Gave</button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="subpayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Take Payment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <div class="row">

                                <form class="add-student-form" id="takeamount" method="Post" önSubmit="return" action="javascript:void(0)">
                                    @csrf
                                    <input type="hidden" name="old" id="oldprice" value="">
                                    <input type="hidden" name="sid" id="ids" value="">
                                        
                                            <label>Amount</label>
                                            <input type="number" name="price" id="tprices" autocomplete="off">
                                      
                                       
                                                <label>When did you got?</label>
                                                <input type="date" name="date" id="tdates">
                                          
                                      
                                      
                                                <label>Enter Details</label>
                                                <input type="text" name="detail" id="tdetails">
                                         

                                        <button type="submit" class="btn btn-secondary subpay" >Gave</button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="showdetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                        <div class="student-name">
                                                            <h5 class="s_name"></h5>
                                                            <div class="stu-detail">
                                                                <div class="user-dtls">
                                                                <label>Father's name:</label>
                                                                    <span class="f_name"></span></br>
                                                                    <label>Mother's name:</label>
                                                                    <span class="m_name"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                        <div class="fee-sec">
                                        <div class="fee-left">
                                            <h6>Gave Amount: <span class="total-fee gave"><label>₹</label></span></h6>
                                        </div>
                                        <div class="fee-right">
                                            <h6>Due Amount: <span class="due-fee take"><label>₹</label></span></h6>
                                        </div>
                                    </div>
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>

</div>
</section>
@endsection
@section('additionalscripts')

@endsection