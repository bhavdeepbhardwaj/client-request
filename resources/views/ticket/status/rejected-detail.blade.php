@extends('layouts.app')

@section('title', 'Open Ticket')

@section('content')
@include('includes.rejection')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <table class="table table-hover">
                         <tr>
                             <th scope="col">Date: </th>
                             <input type="hidden" name="user_name" value="{!! Auth::user()->name !!}">
                             <td>{{ date('d/m/Y h:i:s a', strtotime($ticket_detail->created_at)) }} </td>
                         </tr>
                        <tr>
                             <th scope="col">SRN:</th>
                             <input type="hidden" name="ticket_id" value="{!! $ticket_detail->no !!}">
                             <td>ADNESEA{{ $num = sprintf('%03d', intval($ticket_detail->no))}}</td>
                         </tr>
               
                        <tr>
                            <th scope="col">Brand:</th>
                            <td>{{ ucfirst(trans($ticket_detail->brand)) }}</td>
                        </tr>
                        
                        <tr>
                            <th scope="col">Country:</th>
                            <td>{{ ucfirst(trans($ticket_detail->country)) }}</td>
                        </tr>
                        
                         <tr>
                            <th scope="col">Title:</th>
                            <td>{!! $ticket_detail->title !!}</td>
                         </tr>
                         <tr>
                             <th scope="col">Category:</th>
                             <td>{!! $ticket_detail->category_name !!}</td>
                         </tr>
               
                        <tr>
                            <th scope="col">Priority:</th>
                            <td>{{ ucfirst(trans($ticket_detail->priority)) }}</td>
                        </tr>
                        
                        <tr>
                            <th scope="col">Summary:</th>
                            <td>{!!  nl2br($ticket_detail->summary) !!}</td>
                         </tr>
                         <tr>
                             <th scope="col">Objective:</th>
                             <td>{!! $ticket_detail->objective !!}</td>
                         </tr>
               
               
                        <tr>
                        <th scope="col">Reference:</th>
                        @if ($ticket_detail->reference!="")
                        <td>
                          @foreach(explode(',', $ticket_detail->reference) as $ref) 
                          <a href="{{ '/'.$ref}}" target="_blank" download="{!! $ref !!}">Download File</a><br/>
                          @endforeach
                          </td>
                          @else
                            <td>N/A</td>
                        @endif
                        </tr>
                         <tr>
                         
                            <th scope="col">Other Information:</th>
                            <td>{!! $ticket_detail->otherinfo !!}</td>
                         </tr>
                       

                <tr>
                 <th scope="col">Deadline:</th>
                 <td>{!! $ticket_detail->deadline !!}</td>
                 </tr>

                 
                  <tr>
                    <th scope="col">Status:</th>
                    <td>{!! $ticket_detail->status !!}</td>
                  </tr>

              
                 </table>

          </div>
          
      </div>
    </div>   
    <script>
	function onDropdownSelect() {
    	var selectedValue = document.getElementById("status").value;
        if(selectedValue == 'Rejected') {
            $("#rejectModal").modal();

        }
    }
</script>  
  @endsection
 