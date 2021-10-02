<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Organization;
use App\Category;
use App\Models\Service;
use App\Models\Employee;
use App\Models\Review;
use App\Models\Booking;
use App\AdminSetting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrganizationController extends Controller
{
    public function index()
    {
        $organization = Organization::where([['owner_id', '=', Auth::user()->id]])->first();
        // $services = Service::where([['status', 1], ['organization_id', $organization->organization_id]])->get();
        $emps = Employee::where([['status', 1], ['organization_id', $organization->organization_id]])->get();
        // dd(Booking::all());
        $bookings = Booking::where([['organization_id', $organization->organization_id]])->get();
        // dd($bookings);
        $ar = array();
        foreach ($bookings as $user) {
            array_push($ar, $user->user_id);
        }
        $users = User::whereIn('id', $ar)->get();
        return view('admin.organization.show', compact('organization', 'emps', 'users'));
    }

    public function create()
    {
        return view('admin.organization.create');
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

        $organization = new Organization();


        $organization->name = $request->name;
        // $organization->desc = $request->desc;
        $organization->gender = "male";

        $organization->address = $request->address;
        // $organization->zipcode = $request->zipcode;
        $organization->city = ucfirst($request->city);
        $organization->state = ucfirst($request->state);
        $organization->country = ucfirst($request->country);
        $organization->website = $request->website;
        $organization->phone = $request->phone;
        $organization->status = 0;


        if ($request->sunopen == null || $request->sunclose == null) {
            $organization->sun = json_encode(array('open' => $request->sunopen, 'close' => $request->sunclose));
        } else {
            $organization->sun = json_encode(array('open' => Carbon::parse($request->sunopen)->format('H:i'), 'close' => Carbon::parse($request->sunclose)->format('H:i')));
        }

        if ($request->monopen == null || $request->monclose == null) {
            $organization->mon = json_encode(array('open' => $request->monopen, 'close' => $request->monclose));
        } else {
            $organization->mon = json_encode(array('open' => Carbon::parse($request->monopen)->format('H:i'), 'close' => Carbon::parse($request->monclose)->format('H:i')));
        }

        if ($request->tueopen == null || $request->tueclose == null) {
            $organization->tue = json_encode(array('open' => $request->tueopen, 'close' => $request->tueclose));
        } else {
            $organization->tue = json_encode(array('open' => Carbon::parse($request->tueopen)->format('H:i'), 'close' => Carbon::parse($request->tueclose)->format('H:i')));
        }

        if ($request->wedopen == null || $request->wedclose == null) {
            $organization->wed = json_encode(array('open' => $request->wedopen, 'close' => $request->wedclose));
        } else {
            $organization->wed = json_encode(array('open' => Carbon::parse($request->wedopen)->format('H:i'), 'close' => Carbon::parse($request->wedclose)->format('H:i')));
        }

        if ($request->thuopen == null || $request->thuclose == null) {
            $organization->thu = json_encode(array('open' => $request->thuopen, 'close' => $request->thuclose));
        } else {
            $organization->thu = json_encode(array('open' => Carbon::parse($request->thuopen)->format('H:i'), 'close' => Carbon::parse($request->thuclose)->format('H:i')));
        }

        if ($request->friopen == null || $request->friclose == null) {
            $organization->fri = json_encode(array('open' => $request->friopen, 'close' => $request->friclose));
        } else {
            $organization->fri = json_encode(array('open' => Carbon::parse($request->friopen)->format('H:i'), 'close' => Carbon::parse($request->friclose)->format('H:i')));
        }

        if ($request->satopen == null || $request->satclose == null) {
            $organization->sat = json_encode(array('open' => $request->satopen, 'close' => $request->satclose));
        } else {
            $organization->sat = json_encode(array('open' => Carbon::parse($request->satopen)->format('H:i'), 'close' => Carbon::parse($request->satclose)->format('H:i')));
        }
        // dd(Auth()->user());
        $organization->owner_id = Auth()->user()->id;
        $organization->save();

        return redirect('/organization');
    }

    public function edit()
    {
        $organization = Organization::where('owner_id', Auth()->user()->id)->first();
        return view('admin.organization.edit', compact('organization'));
    }

    public function update(Request $request, $id)
    {
        $new = Auth::id();        
        $organization = Organization::where('owner_id', $new)->first();


        $organization = Organization::find($organization)->first();
        $organization->name = $request->name;
        // $organization->desc = $request->desc;

        if ($request->sunopen == null || $request->sunclose == null) {
            $organization->sun = json_encode(array('open' => $request->sunopen, 'close' => $request->sunclose));
        } else {
            $organization->sun = json_encode(array('open' => Carbon::parse($request->sunopen)->format('H:i'), 'close' => Carbon::parse($request->sunclose)->format('H:i')));
        }

        if ($request->monopen == null || $request->monclose == null) {
            $organization->mon = json_encode(array('open' => $request->monopen, 'close' => $request->monclose));
        } else {
            $organization->mon = json_encode(array('open' => Carbon::parse($request->monopen)->format('H:i'), 'close' => Carbon::parse($request->monclose)->format('H:i')));
        }

        if ($request->tueopen == null || $request->tueclose == null) {
            $organization->tue = json_encode(array('open' => $request->tueopen, 'close' => $request->tueclose));
        } else {
            $organization->tue = json_encode(array('open' => Carbon::parse($request->tueopen)->format('H:i'), 'close' => Carbon::parse($request->tueclose)->format('H:i')));
        }

        if ($request->wedopen == null || $request->wedclose == null) {
            $organization->wed = json_encode(array('open' => $request->wedopen, 'close' => $request->wedclose));
        } else {
            $organization->wed = json_encode(array('open' => Carbon::parse($request->wedopen)->format('H:i'), 'close' => Carbon::parse($request->wedclose)->format('H:i')));
        }

        if ($request->thuopen == null || $request->thuclose == null) {
            $organization->thu = json_encode(array('open' => $request->thuopen, 'close' => $request->thuclose));
        } else {
            $organization->thu = json_encode(array('open' => Carbon::parse($request->thuopen)->format('H:i'), 'close' => Carbon::parse($request->thuclose)->format('H:i')));
        }

        if ($request->friopen == null || $request->friclose == null) {
            $organization->fri = json_encode(array('open' => $request->friopen, 'close' => $request->friclose));
        } else {
            $organization->fri = json_encode(array('open' => Carbon::parse($request->friopen)->format('H:i'), 'close' => Carbon::parse($request->friclose)->format('H:i')));
        }

        if ($request->satopen == null || $request->satclose == null) {
            $organization->sat = json_encode(array('open' => $request->satopen, 'close' => $request->satclose));
        } else {
            $organization->sat = json_encode(array('open' => Carbon::parse($request->satopen)->format('H:i'), 'close' => Carbon::parse($request->satclose)->format('H:i')));
        }
        // dd($organization);
        $organization->save();
        return redirect('/admin/organization');
    }

    public function hideOrganization(Request $request)
    {
        $organization = Organization::find($request->organizationId);
        if ($organization->status == 0) {
            $organization->status = 1;
            $organization->save();
        } else if ($organization->status == 1) {
            $organization->status = 0;
            $organization->save();
        }
    }

    public function organizationDayOff(Request $request)
    {
        $organization = Organization::where([['owner_id', '=', Auth::user()->id]])->first();
        $organization_day = $request->day;
        $organization->$organization_day = json_encode(array('open' => null, 'close' => null));
        $organization->save();
    }
}
