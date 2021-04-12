@extends('layouts.adminlayout')

@section('content')
<div class="page-inner ad-inr">
    @if(Session::has('message'))
    <div class="save-alert alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <p>{{ Session::get('message') }}</p>
    </div>
    @endif
    @php 
    $gave =  App\Models\Repayment::where("payments_id", "=", $id)->sum('gave_amount');
   
    @endphp
    <section class="main-wrapper">
        <div class="page-color">
            <div class="page-header">
                <div class="page-title">
                    Extra <span>Pay Details</span>
                </div>
            </div>
            <div class="page-table">
                <table id="example" class="table-striped table-bordered" style="width:100%;">
                    <thead>
                        <tr>
                           
                            <th>Name</th>
                            <th>Father's Name</th>
                            <th>Mother's Name</th>
                            <th>Class</th>
                            <th>View more</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $i = 0; @endphp
                       
                        <tr>
                           
                            <td>{{$student->name}}</td>
                            <td>{{$student->fname}}</td>
                            <td>{{$student->mname}}</td>
                            @foreach($class as $c)
                            @if($c->id==$student->class)
                            <td>{{$c->class_name}}</td>
                            @endif
                            @endforeach
                            @php
         
            $gave =  App\Models\Payment::where("id", "=", $id)->sum('price');
             
           
            @endphp
                            <td>
                           
                            <a href="javascript:void(0)" class="addpayment" data-id="{{$id}}" data-name={{$gave}}>
                                  Gave
                                </a>
                                <a href="javascript:void(0)" class="subpayment" data-id="{{$id}}" data-name={{$gave}}>
                                 Take
                                </a></td>
                        </tr>
                       
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

            
        
    </section>
</div>
    @endsection
    @section('additionalscripts')

    @endsection