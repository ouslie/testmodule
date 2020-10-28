<?php

namespace Modules\Cabytrim\Http\Controllers;

use Auth;
use App\Http\Controllers\BaseController;
use App\Services\DatatableService;
use Modules\Cabytrim\Datatables\CabytrimDatatable;
use Modules\Cabytrim\Repositories\CabytrimRepository;
use Modules\Cabytrim\Http\Requests\CabytrimRequest;
use Modules\Cabytrim\Http\Requests\CreateCabytrimRequest;
use Modules\Cabytrim\Http\Requests\UpdateCabytrimRequest;
use App\Models\Payment;
use DB;
use Illuminate\Http\Request;


class CabytrimController extends BaseController
{
    protected $CabytrimRepo;
    //protected $entityType = 'cabytrim';

    public function __construct(CabytrimRepository $cabytrimRepo)
    {
        //parent::__construct();

        $this->cabytrimRepo = $cabytrimRepo;
    }

    public function getData($year) {
        return Payment::scope()->select(DB::raw("MONTH(payment_date) as month,(sum(amount)) as amount"))
            ->orderBy('payment_date')
            ->whereYear('payment_date', '=', $year)
            ->groupBy(DB::raw("MONTH(payment_date)"))
            ->get();
    }

    public function getDataByTrim($d) {
        $trim = ['1' => ['amount' => '0', 'charge' => '0'], '2' =>  ['amount' => '0', 'charge' => '0'], '3' =>  ['amount' => '0', 'charge' => '0'], '4' =>  ['amount' => '0', 'charge' => '0']];
        foreach($d as $a) {
            if($a->month === 1 || $a->month === '2' || $a->month === '3') {
                $trim['1']['amount'] = $trim['1']['amount'] + $a->amount;
            }
            if($a->month === 4 || $a->month === '5' || $a->month === '6') {
                $trim['2']['amount'] = $trim['2']['amount'] + $a->amount;
            }
            if($a->month === 7 || $a->month === '8' || $a->month === '9') {
                $trim['3']['amount'] = $trim['3']['amount'] + $a->amount;
            }
            if($a->month === 10 || $a->month === '11' || $a->month === '12') {
                $trim['4']['amount'] = $trim['4']['amount'] + $a->amount;
            }
        }

        foreach($trim as $k => &$v ) {
            $v['charge'] = round(($v['amount'] * 2.2 / 100 )) + round(($v['amount'] * 0.2 / 100 )) + round(($v['amount'] * 16.5 / 100 ));
        }
        return $trim;
    }


    public function index($year = null)
    {   
        $year = $year ? $year : date("Y"); 

        $d    = $this->getData($year);
        $trim = $this->getDataByTrim($d);

        return view('cabytrim::home')->withMonth($d)->withTrim($trim);
    }

    public function filter(Request $request) {
        if(isset($request->year)) {
            return $this->index($request->year);
        }
        return $this->index();

    }
}
