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
    $take =  App\Models\Repayment::where("payments_id", "=", $id)->sum('take_amount');
    @endphp
    <section class="main-wrapper">
        <div class="page-color">
            <div class="page-header">
                <div class="page-title">
                    Extra <span>Pay Details</span>
                </div>
            </div>
            <a href="javascript:void(0)" class="addpayment" data-id="{{$id}}" data-name={{$gave}}>
            You Gave
                                </a>
          
            <div class="modal fade" id="addpayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <div class="row">

                                <form class="add-student-form" id="extrapays" method="Post" action="javascript:void(0)">
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
      
          
        <button  data-toggle="modal" data-target="#myModals">You Got</button>
            
         
          <div class="modal" id="myModals">
              <div class="modal-dialog">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                 
                
                  <form action="javascript:void(0)" method="Post" class="text-left" >
                  @csrf
                  <input type="hidden" id="old_price" value="{{$take}}" >
                  <input type="hidden" id="id" value="{{$id}}" >
                    <label>Enter Amount</label>
                    <input type="number" name="sprice"  autocomplete="off" required>
                    <div  class="pop">
                        <label>Enter Details</label>
                        <input type="text" name="sdetail" id="detail" autocomplete="off" required>
                        <label>When did you give?</label>
                        <input type="date" name="date" id="sdate" required>
                        <!-- <input accept="image/x-png,image/jpeg,image/png" type="file" autocomplete="off"> -->
                        <input type="submit" id="sub-pay" class="open pop-submit-button" value="Got" />
                    </div>
                  </form>
                  
                  </div>
                </div>
              </div>
            </div>
            
            <div class="page-table" id="dvData">
                <table  class="table-bordered table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody >
                   
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>   
                        </tr>
                   
                    </tbody>
                </table>
            </div>
        </div>
            

            
        
    </section>
</div>
    @endsection
    @section('additionalscripts')

    @endsection