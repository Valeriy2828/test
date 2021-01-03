<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Firm;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate(50);
        $firms = Firm::orderBy('id','desc')->paginate(50);

        return view('index', ['customers' => $customers, 'firms' => $firms] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function add()
    {
        $firms = Firm::all();
        return view('addCustomer',['firms' => $firms]);
    }

    public function addFirm()
    {

        return view('addFirm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|alpha|max:50',
            'firm_id' => 'required'
        ]);
        $customer = new Customer([
            'first_name' => $request->input('first_name'),
            'firm_id' => $request->input('firm_id'),
        ]);

        $customer->save();

        return back()->with('status','Customer added!!!');
    }

    public function storeFirm(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:50',
        ]);

        $firm = Firm::create($request->all());

        return back()->with('status','Company added!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Customer::where('customer_id', $id)->first();
        return view('edit', ['edit' => $edit]);
    }

    public function editFirm($id)
    {
        $editFirm = Firm::where('id', $id)->first();
        return view('editFirm', ['editFirm' => $editFirm]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $primaryKey)
    {
        $validatedData = $request->validate([
            'first_name' => 'alpha|max:50',
        ]);

        $input = Customer::find($primaryKey);

        $input->first_name = $request->input('first_name');

        $input->save();

        return back()->with('status','Customer update!!!');
    }

    public function updateFirm(Request $request, $id)
    {

       // $firm->update($request->all());

        $validatedData = $request->validate([
            'title' => 'max:50'
        ]);

        $input = Firm::find($id);

        $input->title = $request->input('title');

        $input->save();

        return back()->with('status', 'Company update!!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($primaryKey)
    {
        Customer::find($primaryKey)->delete();
        return back()->with('status-del','Customer deleted!!!');
    }

    public function destroyFirm($id)
    {
        Firm::find($id)->delete();
        return back()->with('status-del','Company deleted!!!');
    }
}
