<?php

namespace App\Http\Controllers\API;

use App\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use App\Models\Firm;

/**
 * Class SubjectController
 * @package App\Http\Controllers\API
 */

class PurchasesController extends AppBaseController
{
	public function getcompanies(){
		$firm = Firm::select('title')->paginate(5);

		return $this->sendResponse(['firm' => $firm], 'List of companies');
	}
	
	public function getclients($id){
		$customer = Customer::select('first_name')->where('firm_id', $id)->paginate(5);

		return $this->sendResponse(['customer' => $customer], 'List of customers');
		
	}
	
	public function getclient_companies($id){
		$customer = Customer::where('customer_id', $id)->first();
        $company = $customer->firm->title;

        return $this->sendResponse(['company' => $company], 'List of companies');
	}
	

}
