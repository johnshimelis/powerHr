<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Salon;
use App\Category;
use App\Models\Service;
use App\Models\Employee;
use App\Models\Review;
use App\Models\Booking;
use App\AdminSetting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SalonController extends Controller
{
    public function index()
    {
        $salon = Salon::where([['owner_id', '=', Auth::user()->id]])->first();
        // $services = Service::where([['status', 1], ['salon_id', $salon->salon_id]])->get();
        $emps = Employee::where([['status', 1], ['salon_id', $salon->salon_id]])->get();
        // dd(Booking::all());
        $bookings = Booking::where([['salon_id', $salon->salon_id]])->get();
        // dd($bookings);
        $ar = array();
        foreach ($bookings as $user) {
            array_push($ar, $user->user_id);
        }
        $users = User::whereIn('id', $ar)->get();
        return view('admin.salon.show', compact('salon', 'emps', 'users'));
    }

    public function create()
    {
        return view('admin.salon.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'bail|required',
        //     'desc' => 'bail|required',
        //     'gender' => 'bail|required',
        //     // 'image' => 'bail|required',
        //     // 'logo' => 'bail|required',
        //     'phone' => 'bail|required|numeric',

        //     'sunopen' => 'required_if:sun,',
        //     'sunclose' => 'required_if:sun,',

        //     'monopen' => 'required_if:mon,',
        //     'monclose' => 'required_if:mon,',

        //     'tueopen' => 'required_if:tue,',
        //     'tueclose' => 'required_if:tue,',

        //     'wedopen' => 'required_if:wed,',
        //     'wedclose' => 'required_if:wed,',

        //     'thuopen' => 'required_if:thu,',
        //     'thuclose' => 'required_if:thu,',

        //     'friopen' => 'required_if:fri,',
        //     'friclose' => 'required_if:fri,',

        //     'satopen' => 'required_if:sat,',
        //     'satclose' => 'required_if:sat,',

        //     'address' => 'bail|required',
        //     'city' => 'bail|required',
        //     'state' => 'bail|required',
        //     'country' => 'bail|required',
        //     'zipcode' => 'bail|required|numeric'
        // ]);

        // dd($request);

        $salon = new Salon();


        $salon->name = $request->name;
        // $salon->desc = $request->desc;
        $salon->gender = "male";

        $salon->address = $request->address;
        // $salon->zipcode = $request->zipcode;
        $salon->city = ucfirst($request->city);
        $salon->state = ucfirst($request->state);
        $salon->country = ucfirst($request->country);
        $salon->website = $request->website;
        $salon->phone = $request->phone;
        $salon->status = 0;


        if ($request->sunopen == null || $request->sunclose == null) {
            $salon->sun = json_encode(array('open' => $request->sunopen, 'close' => $request->sunclose));
        } else {
            $salon->sun = json_encode(array('open' => Carbon::parse($request->sunopen)->format('H:i'), 'close' => Carbon::parse($request->sunclose)->format('H:i')));
        }

        if ($request->monopen == null || $request->monclose == null) {
            $salon->mon = json_encode(array('open' => $request->monopen, 'close' => $request->monclose));
        } else {
            $salon->mon = json_encode(array('open' => Carbon::parse($request->monopen)->format('H:i'), 'close' => Carbon::parse($request->monclose)->format('H:i')));
        }

        if ($request->tueopen == null || $request->tueclose == null) {
            $salon->tue = json_encode(array('open' => $request->tueopen, 'close' => $request->tueclose));
        } else {
            $salon->tue = json_encode(array('open' => Carbon::parse($request->tueopen)->format('H:i'), 'close' => Carbon::parse($request->tueclose)->format('H:i')));
        }

        if ($request->wedopen == null || $request->wedclose == null) {
            $salon->wed = json_encode(array('open' => $request->wedopen, 'close' => $request->wedclose));
        } else {
            $salon->wed = json_encode(array('open' => Carbon::parse($request->wedopen)->format('H:i'), 'close' => Carbon::parse($request->wedclose)->format('H:i')));
        }

        if ($request->thuopen == null || $request->thuclose == null) {
            $salon->thu = json_encode(array('open' => $request->thuopen, 'close' => $request->thuclose));
        } else {
            $salon->thu = json_encode(array('open' => Carbon::parse($request->thuopen)->format('H:i'), 'close' => Carbon::parse($request->thuclose)->format('H:i')));
        }

        if ($request->friopen == null || $request->friclose == null) {
            $salon->fri = json_encode(array('open' => $request->friopen, 'close' => $request->friclose));
        } else {
            $salon->fri = json_encode(array('open' => Carbon::parse($request->friopen)->format('H:i'), 'close' => Carbon::parse($request->friclose)->format('H:i')));
        }

        if ($request->satopen == null || $request->satclose == null) {
            $salon->sat = json_encode(array('open' => $request->satopen, 'close' => $request->satclose));
        } else {
            $salon->sat = json_encode(array('open' => Carbon::parse($request->satopen)->format('H:i'), 'close' => Carbon::parse($request->satclose)->format('H:i')));
        }
        // dd(Auth()->user());
        $salon->owner_id = Auth()->user()->id;
        $salon->save();

        return redirect('/salon');
    }

    public function edit()
    {
        $salon = Salon::where('owner_id', Auth()->user()->id)->first();
        return view('admin.salon.edit', compact('salon'));
    }

    public function update(Request $request, $id)
    {
        $new = Auth::id();        
        $salon = Salon::where('owner_id', $new);
        $request->validate([
            'name' => 'bail|required',
            'desc' => 'bail|required',


            'sunopen' => 'required_if:sun,',
            'sunclose' => 'required_if:sun,',

            'monopen' => 'required_if:mon,',
            'monclose' => 'required_if:mon,',

            'tueopen' => 'required_if:tue,',
            'tueclose' => 'required_if:tue,',

            'wedopen' => 'required_if:wed,',
            'wedclose' => 'required_if:wed,',

            'thuopen' => 'required_if:thu,',
            'thuclose' => 'required_if:thu,',

            'friopen' => 'required_if:fri,',
            'friclose' => 'required_if:fri,',

            'satopen' => 'required_if:sat,',
            'satclose' => 'required_if:sat,'
        ]);

        $salon = Salon::find($salon);

        $salon->name = $request->name;
        $salon->desc = $request->desc;

        $salon->address = $request->address;
        $salon->zipcode = $request->zipcode;
        $salon->city = ucfirst($request->city);
        $salon->state = ucfirst($request->state);
        $salon->country = ucfirst($request->country);
        $salon->website = $request->website;
        $salon->phone = $request->phone;
        $salon->gender = $request->gender;

        if ($request->sunopen == null || $request->sunclose == null) {
            $salon->sun = json_encode(array('open' => $request->sunopen, 'close' => $request->sunclose));
        } else {
            $salon->sun = json_encode(array('open' => Carbon::parse($request->sunopen)->format('H:i'), 'close' => Carbon::parse($request->sunclose)->format('H:i')));
        }

        if ($request->monopen == null || $request->monclose == null) {
            $salon->mon = json_encode(array('open' => $request->monopen, 'close' => $request->monclose));
        } else {
            $salon->mon = json_encode(array('open' => Carbon::parse($request->monopen)->format('H:i'), 'close' => Carbon::parse($request->monclose)->format('H:i')));
        }

        if ($request->tueopen == null || $request->tueclose == null) {
            $salon->tue = json_encode(array('open' => $request->tueopen, 'close' => $request->tueclose));
        } else {
            $salon->tue = json_encode(array('open' => Carbon::parse($request->tueopen)->format('H:i'), 'close' => Carbon::parse($request->tueclose)->format('H:i')));
        }

        if ($request->wedopen == null || $request->wedclose == null) {
            $salon->wed = json_encode(array('open' => $request->wedopen, 'close' => $request->wedclose));
        } else {
            $salon->wed = json_encode(array('open' => Carbon::parse($request->wedopen)->format('H:i'), 'close' => Carbon::parse($request->wedclose)->format('H:i')));
        }

        if ($request->thuopen == null || $request->thuclose == null) {
            $salon->thu = json_encode(array('open' => $request->thuopen, 'close' => $request->thuclose));
        } else {
            $salon->thu = json_encode(array('open' => Carbon::parse($request->thuopen)->format('H:i'), 'close' => Carbon::parse($request->thuclose)->format('H:i')));
        }

        if ($request->friopen == null || $request->friclose == null) {
            $salon->fri = json_encode(array('open' => $request->friopen, 'close' => $request->friclose));
        } else {
            $salon->fri = json_encode(array('open' => Carbon::parse($request->friopen)->format('H:i'), 'close' => Carbon::parse($request->friclose)->format('H:i')));
        }

        if ($request->satopen == null || $request->satclose == null) {
            $salon->sat = json_encode(array('open' => $request->satopen, 'close' => $request->satclose));
        } else {
            $salon->sat = json_encode(array('open' => Carbon::parse($request->satopen)->format('H:i'), 'close' => Carbon::parse($request->satclose)->format('H:i')));
        }
        $salon->save();
        return redirect('/admin/salon');
    }

    public function hideSalon(Request $request)
    {
        $salon = Salon::find($request->salonId);
        if ($salon->status == 0) {
            $salon->status = 1;
            $salon->save();
        } else if ($salon->status == 1) {
            $salon->status = 0;
            $salon->save();
        }
    }

    public function salonDayOff(Request $request)
    {
        $salon = Salon::where([['owner_id', '=', Auth::user()->id]])->first();
        $salon_day = $request->day;
        $salon->$salon_day = json_encode(array('open' => null, 'close' => null));
        $salon->save();
    }
}
