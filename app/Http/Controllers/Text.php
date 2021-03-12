<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Session;
use Validator;
// use App\User;
use Carbon\Carbon;
use App\model\Textad;
use App\model\liveadd;
use App\model\userMoney;
use App\Rules\Userserver;
use Illuminate\Http\Request;
use App\model\Textad as MTextad;
use Illuminate\Support\Collection;

class Text extends Controller
{
    /**
     * Text get show avilable list.
     */
    public function index()
    {
        $server = Auth::user()->servers;
        /*$addlist = MTextad::select('textads.id', 'Name', 'category', 'cType', 'image', 'cost', 'server_id', 'till_date', 'textad_id')->leftjoin('liveadds', 'textads.id', '=', 'liveadds.textad_id')
        ->get()->sortBy('till_date')->groupBy('cType')->toArray();
        ksort($addlist);
         echo "<pre>";print_r($allads);die;*/ 

        $allads = MTextad::query();
        $allads = $allads->with(['liveadds' => function ($query) {
        $query->whereDate('till_date', '>', date('Y-m-d'))->where(array('active_status'=>1));
            }]);
        $addlist = $allads->orderBy('id')->get()->toArray();  

       

        return view('advertising.text')->with('addlist', $addlist)->with('servers', $server);
    }

    /**
     * Text Post request for purchase.
     */
    public function pindex(Request $request)
    {
        $this->validate($request, [
       'addlocation' => 'required|integer',
       'days' =>    'required|integer',
       'server' =>  'integer',
        ]);

        $add_id = $request->input('addlocation');

        try {
            $textaddInstance = Textad::where('id', $add_id)->first();
            $confirmdata = [];
            $confirmdata['days'] = $days = $request->input('days');

            if (! liveadd::where('textad_id', $add_id)->count() && $days * (int) $textaddInstance->cost) {
                $confirmdata['server'] = $request->input('server');
                $confirmdata['totalCost'] = $days * (int) $textaddInstance->cost;

                $confirmdata['addInstance'] = $textaddInstance;
                $col = collect($confirmdata);
                Session::flash('textadd', $col);

                return view('advertising.confirm')->with('addDetails', $col);
            } else {
                return 'ddd';
            }
        } catch (Exception $s) {
            dd($s);
        }
    }

    /**
     * @Get REQUEST RECIVE
     * Text Add confirm
     */
    public function textConfirm()
    {
        if (! Session::has('textadd')) {
            abort(404);
        }

        try {
            $instance = Session::get('textadd');
            $userMoney = userMoney::where('user_id', Auth::id())->first();

            if ((int) $userMoney->amount >= (int) $instance->get('totalCost')) {
                Auth::user()->hasMoneyB->decrement('amount', (int) $instance->get('totalCost'));

                $date = Carbon::today();
                $userAdd = new liveadd;
                $userAdd->user_id = Auth::id();
                $userAdd->server_id = $instance->get('server');
                $userAdd->from_date = Carbon::today();
                $userAdd->till_date = $date->addDays($instance->get('days'));
                $userAdd->textad_id = $instance->get('addInstance')->id;
                $userAdd->save();

                return redirect()->route('mytextads');
            } else {
                return 'you do not have sufficient money!';
            }
        } catch (Exception $e) {
            report($e);

            return false;
        }
    }

    public function myTextadd()
    {
        $textAdd = DB::table('liveadds')
                        ->join('textads', 'liveadds.textad_id', '=', 'textads.id')
                        ->where('liveadds.user_id', '=', Auth::id())
                        ->where('liveadds.delete_flag',0)->get();
        return view('advertising.textMy')->with('myTextadds', $textAdd);
    }
}
