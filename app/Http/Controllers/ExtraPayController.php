<?php

namespace App\Http\Controllers;
use App\Models\Student_classe;
use App\Models\Payment;
use App\Models\Repayment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ExtraPayController extends Controller
{
   
    public function index(){
        $students =Payment::get();
        $class = Student_classe::get(); 

   
        return view ('admin.extra.index',compact("class","students"));
    }
    public function show(Request $request,$id){

        $student =Payment::find($id);
        $class = Student_classe::get(); 
        // $data = DB::table('payments')
        // ->select('payments.*','repayments.take_amount','repayments.gave_amount')
        // ->join('repayments', 'payments.id', '=', 'repayments.payments_id')
        // ->where('payments.id',$id)
        // ->get();
        // $gave = Repayment::where("payments_id", "=", $id)->sum('gave_amount');
        // $take = Repayment::where("payments_id", "=", $id)->sum('take_amount');
        // $due=$gave-$take;
      
          
            $id=$student->id;
            
      
        
        return view ('admin.extra.show',compact("class","student","id"));
            
       
     }
    public function store(Request $request){

       $payments = new Payment;
       $payments->name = $request->name;
       $payments->fname = $request->father_name;
       $payments->mname = $request->mother_name;
       $payments->class = $request->class_name;
       $payments->price = 0;
       $payments->save();
      
           
       $arr=["msg"=>"student added","status"=>"success"];
        echo json_encode($arr); 
    }
    public function addPayment(Request $request){
        $id=$request->id;
        $old_price=$request->old_price;
        $c_price=$request->price;
        $result=$old_price + $c_price;
        $payments =Payment::find($id);
        $payments->price=$result;
        $payments->update();

        $repayments = new Repayment;
        $repayments->payments_id = $id; 
        $repayments->gave_amount = $c_price;
        $repayments->details = $request->detail;
        $repayments->date = $request->date;
        $repayments->take_amount =0;
        $repayments->save();

        $arr=["msg"=>"success"];
        echo json_encode($arr); 
        // return  response()->json( $payments);
    }
    public function subpayment(Request $request){
        $id=$request->id;
        $old_price=$request->old_price;
        $c_price=$request->price;
        $result=$old_price - $c_price;
        $payments =Payment::find($id);
        $payments->price=$result;
        $payments->update();

        $repayments = new Repayment;
        $repayments->payments_id = $id; 
        $repayments->take_amount = $c_price;
        $repayments->details = $request->detail;
        $repayments->date = $request->date;
        $repayments->gave_amount =0;
        $repayments->save();

        $arr=["msg"=>"success"];
        echo json_encode($arr); 
        // return  response()->json( $payments);
    }
}
