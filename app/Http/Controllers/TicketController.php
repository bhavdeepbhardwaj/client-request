<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Models\User;
use Storage;
use App\Models\Ticket;
use App\Models\Rejection;
use App\Models\Category;
use App\Models\Status;
use Faker\Provider\Image;
use App\Mailers\AppMailer;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class TicketController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function create()
    {
        $categories = Category::all();
        return view('ticket.create', compact('categories'));
    }

    public function store(Request $request, AppMailer $mailer)
    {
        // store code
        $this->validate($request, [
            'brand'     => 'required',
            'country'   => 'required',
            'title'     => 'required',
            'category'  => 'required',
            'priority'  => 'required',
            'summary'   => 'required',
            'reference.*' => 'mimes:doc,docx,jpg,jpeg,png,pdf,xlsx,xlx,ppt,pptx,csv,zip',
                      
        ]);
 
        if($request->hasFile('reference')) {
        $picture = array();
        $imageNameArr = [];
        foreach ($request->reference as $file) {
            // you can also use the original name
            $imageName = time().'-'.$file->getClientOriginalName();
            $imageNameArr[] = $imageName;
            // Upload file to public path in images directory
            //$fileName = $file->move(base_path('\public\references'), $file->getClientOriginalName());           
            $fileName = $file->move(date('mdYHis').'uploads', $imageName);

            // Database operation
            $array[] = $fileName; 
            $picture = implode(",", $array); //Image separated by comma
        }
        
    }
        else{
            $picture = "";

    }

      $ticket = new Ticket([
             'job'     => 'ADNESEA',
             'brand'   => $request->input('brand'),
             'country' => $request->input('country'),
             'title'   => $request->input('title'),
             'category_name' => $request->input('category'),
             'priority'  => $request->input('priority'),
             'summary'   => $request->input('summary'),
             'objective' => $request->input('objective'),
             'reference' => $picture,
             'otherinfo' => $request->input('otherinfo'),
         ]);
        
  
        $ticket->save();         
        $mailer->sendTicketInformation(Auth::user(), $ticket);

        $number = DB::table('tickets')
        ->orderBy('created_at','desc')
        ->first();
      
       $num = sprintf('%03d', intval($number->no));
       return redirect()->back()->with("status", "A new SRN: $ticket->job$num has been generated.");

    }


    public function showTicket()
    {
        $tickets = Ticket::latest()->orderBy('no', 'desc')->get();
        return view('ticket.show', compact('tickets'));
    }

    public function showTicketDetail($slug){

        $statuses = DB::table('statuses')
        ->select("*")
        ->get();

        $ticket_detail = Ticket::where('no', $slug)->get()->first();
        return view('ticket.details', compact('ticket_detail', 'statuses'));

      
    }

 
    public function updateTicketDetail(Request $request, $id, AppMailer $mailer)
    {
       
        $deadline = $request->input('deadline');
        $status = $request->input('status');
      
        DB::update('update tickets set deadline = ?, status = ? where no = ?', [$deadline, $status, $id]);
        $num = sprintf('%03d', intval($id));

   
        return redirect()->back()->with("status", "Your SRN: ADNESEA$num has been updated.");


    }

    public function rejection(Request $request, AppMailer $mailer, $id)
    {
        $this->validate($request, [
            'reason' => 'required',
                      
        ]);

        $rejection = new Rejection([
            'jobno'     => $id,
            'reason' => $request->input('reason'),
            'comments'  => $request->input('comments'),

        ]);

      $rejection->save();
      $status= $request->input('reject');

      DB::update('update tickets set status = ? where no = ?', [$status, $id]);
        
      $mailer->sendRejectionInformation(Auth::user(), $rejection);
      return redirect()->back()->with("status", "SRN: ADNESEA$id has been rejected.");
  
    }
    

}
