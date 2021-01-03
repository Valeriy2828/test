@extends('app')

@section('content')
   <!-- section -->   
   @if(auth()->user())
	   
   <div class="contacts-content">	
      <div class="container">
		<div class="col-md-12  text-center" style="margin-bottom: 25px;">
			<span style="color: green;">{{auth()->user()->name}}</span>			
	    </div>	  
         <div class="row">		 
			
             <div class="col-md-6  text-center">
                 <div class="col-md-6 text-center">
                     <h1 style="margin-bottom: 25px;">Customers</h1>
                 </div>
                 <div class="col-md-6  text-center" style="margin: 1px 0 10px 0; font-size: 20px;">
                     <a href="{{ route('add') }}">Add customer</a>
                 </div>
                 @if($customers->count() > 0)
                     <div class="col-md-6  text-center">
                         {{ $customers->count() }} customer(s)
                     </div>

                     <table class="table">
                         <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Firstname</th>
                             <th scope="col">Company</th>
                             <th scope="col">Delete</th>
                             <th scope="col">Edit</th>
                         </tr>
                         </thead>
                         <tbody>
                         @foreach($customers as $customer)
                             <tr>
                                 <th scope="row">{{ $loop->iteration }}</th>
                                 <td style="text-align: left;">
                                     <p>{{ $customer->first_name }}</p>
                                 </td>
                                 <td style="text-align: left;">
                                     <p>{{ $customer->firm->title }}</p>
                                 </td>
                                 <td style="text-align: left;">
                                     {{--<a href="{{ route('destroy',['id' => $client->user_id]) }}" class="btn btn-warning">Delete</a>--}}
                                     <a href="/delete/{{ $customer->customer_id }}" class="btn btn-warning">Delete</a>
                                 </td>
                                 <td style="text-align: left;">
                                     <a href="/edit/{{ $customer->customer_id }}" class="btn btn-success">Edit</a>
                                 </td>

                                 @endforeach
                             </tr>
                         </tbody>
                     </table>

                 @else
                     <div class="col-md-6 text-center">
                         <p>No customers!!!!</p>
                     </div>
                 @endif
          </div>
             <div class="col-md-6  text-center">
                 <div class="col-md-6 text-center">
                     <h1 style="margin-bottom: 25px;">Company</h1>
                 </div>
                 <div class="col-md-6  text-center" style="margin: 1px 0 10px 0; font-size: 20px;">
                     <a href="{{ route('addFirm') }}">Add company</a>
                 </div>
                 @if($firms->count() > 0)
                     <div class="col-md-6  text-center">
                         {{ $firms->count() }} company(s)
                     </div>
                     <table class="table">
                         <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Title</th>
                             <th scope="col">Delete</th>
                             <th scope="col">Edit</th>
                         </tr>
                         </thead>
                         <tbody>
                         @foreach($firms as $firm)
                             <tr>
                                 <th scope="row">{{ $loop->iteration }}</th>
                                 <td style="text-align: left;">
                                     <p>{{ $firm->title }}</p>
                                 </td>
                                 <td style="text-align: left;">
                                     <a href="/deleteFirm/{{ $firm->id }}" class="btn btn-warning">Delete</a>
                                 </td>
                                 <td style="text-align: left;">
                                     <a href="/editFirm/{{ $firm->id }}" class="btn btn-success">Edit</a>
                                 </td>
                                 @endforeach
                             </tr>
                         </tbody>
                     </table>

                 @else
                     <div class="col-md-6 text-center">
                         <p>No companies!!!!</p>
                     </div>
                 @endif
             </div>
         </div>
      </div>
   </div>
	@else
		@include('auth.login')					
	@endif   
   <!-- End section -->

@endsection
