<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accomodation;
use App\Models\City;
use App\Models\CityHotel;
use App\Models\Country;
use App\Models\Flight;
use App\Models\GroundMovement;
use App\Models\Hotel;
use App\Models\Meeting;
use App\Models\MeetingDetail;
use App\Models\MeetingLocation;
use App\Models\Ministry;
use App\Models\Mission;
use App\Models\Room;
use App\Models\Trip;
use App\Models\TripFile;
use App\Models\MissionFile;
use App\Models\User;
use App\Notifications\RealTimeNotification;
use App\Services\FirebaseNotificationService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Auth;

class UserController extends Controller
{
    protected $helper;
    public function __construct(){
        // $this->helper = new FirebaseNotificationService();
    }
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = User::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = url('admin/editUser/' . $row->id);
                    $actionBtn = '<a href="' . $editUrl . '" class="edit btn btn-success btn-sm">Edit</a><button type="button" class="delete btn btn-danger btn-sm deleteUserButton" onClick="DeleteModal(this)" data-userId=' . $row->id . '>Delete</button>';
                    return $actionBtn;
                    // <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.User.list');
    }

    public function createUser(Request $request)
    {
        if ($_POST) {

            $rules = array(
                'name'  => 'required',
                'email'  => 'required|email|unique:users',
                'phone'  => 'required',
                'address_1'  => 'required',
                'address_2'  => 'required',
                'cnic_no'  => 'required',
                'password' => 'required|min:8|confirmed',
            );
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->address_1 = $request->address_1;
                $user->address_2 = $request->address_2;
                $user->cnic_no = $request->cnic_no;
                $user->password = $request->password;
                $user->save();

                return redirect()->route('userList');
            }
        }
        return view('Admin.User.add');
    }

    public function userList(Request $request)
    {
        $users = User::all();
        return view('Admin.User.list', compact('users'));
    }

    public function editUser(Request $request)
    {

        $data['user'] = $user = User::find($request->id);
        
        if ($_POST) {

            $rules = array(
                'name'  => 'required',
                // 'email'  => 'required|email|unique:users',
                'phone'  => 'required',
                'address_1'  => 'required',
                'address_2'  => 'required',
                'cnic_no'  => 'required',
            );
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                return back()->withErrors($validator)->withInput();
            } else {

                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->address_1 = $request->address_1;
                $user->address_2 = $request->address_2;
                $user->cnic_no = $request->cnic_no;
                $user->save();

                $title = "Profile Updated"; 
                $body = "";      
                // $firebaseService = new FirebaseNotificationService();
                // $this->helper->sendPushNotificationSync($user->fcm_token, $title, $body,$user);
                // $user->notify(instance: new RealTimeNotification($data));

                return redirect()->route('userList');
            }
        }

        // $user->date_of_birth = Carbon::parse($user->date_of_birth)->format('Y-m-d');

        return view('Admin.User.edit', $data);
    }

    public function deleteUser(Request $request)
    {
        $deleteUser = User::find($request->id);
        $deleteUser->delete();

        return redirect()->route('userList');
    }

    // COuntry

    public function countryIndex(Request $request)
    {

        if ($request->ajax()) {
            $data = Country::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = url('admin/editCountry/' . $row->id);
                    $actionBtn = '<a href="' . $editUrl . '" class="edit btn btn-success btn-sm">Edit</a><button type="button" class="delete btn btn-danger btn-sm deleteUserButton" onClick="DeleteModal(this)" data-countryId=' . $row->id . '>Delete</button>';
                    return $actionBtn;
                    // <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.Country.list');
    }

    public function createCountry(Request $request)
    {
        if ($_POST) {
            $rules = array(
                'name'  => 'required',
            );
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $Country = new Country();
                $Country->name = $request->name;
                $Country->save();

                return redirect()->route('countryList');
            }
        }
        return view('Admin.Country.add');
    }
    public function countryList(Request $request)
    {
        $Country = Country::all();
        return view('Admin.Country.list', compact('Country'));
    }
    public function editCountry(Request $request)
    {
        $data['Country'] = $Country = Country::find($request->id);
        if ($_POST) {
            $rules = array(
                'name'  => 'required',
            );
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {

                $Country->name = $request->name;
                $Country->save();
                return redirect()->route('countryList');
            }
        }

        return view('Admin.Country.edit', $data);
    }

    public function deleteCountry(Request $request)
    {
        $deleteCountry = Country::find($request->id);
        $deleteCountry->delete();

        return redirect()->route('countryList');
    }

    // City
    public function cityIndex(Request $request)
    {

        if ($request->ajax()) {
            $data = City::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = url('admin/editCity/' . $row->id);
                    $actionBtn = '<a href="' . $editUrl . '" class="edit btn btn-success btn-sm">Edit</a><button type="button" class="delete btn btn-danger btn-sm deleteUserButton" onClick="DeleteModal(this)" data-cityId=' . $row->id . '>Delete</button>';
                    return $actionBtn;
                })
                ->editColumn('country_id', function ($row) {
                    return $row->country_name;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.City.list');
    }

    public function createCity(Request $request)
    {
        if ($_POST) {
            $rules = array(
                'name'  => 'required',
            );
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $City = new City();
                $City->name = $request->name;
                $City->country_id = $request->country_id;
                $City->save();

                return redirect()->route('cityList');
            }
        }
        $data['Countries'] = Country::all();

        return view('Admin.City.add', $data);
    }
    public function cityList(Request $request)
    {
        $City = City::all();
        return view('Admin.City.list', compact('City'));
    }
    public function editCity(Request $request)
    {
        $data['City'] = $City = City::find($request->id);
        if ($_POST) {
            $rules = array(
                'name'  => 'required',
            );
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {

                $City->name = $request->name;
                $City->country_id = $request->country_id;
                $City->save();
                return redirect()->route('cityList');
            }
        }

        $data['Countries'] = Country::all();

        return view('Admin.City.edit', $data);
    }

    public function deleteCity(Request $request)
    {
        $deleteCity = City::find($request->id);
        $deleteCity->delete();

        return redirect()->route('cityList');
    }

    // Ministry

    public function ministryIndex(Request $request)
    {

        if ($request->ajax()) {
            $data = Ministry::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = url('admin/editMinistry/' . $row->id);
                    $actionBtn = '<a href="' . $editUrl . '" class="edit btn btn-success btn-sm">Edit</a><button type="button" class="delete btn btn-danger btn-sm deleteUserButton" onClick="DeleteModal(this)" data-ministryId=' . $row->id . '>Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.Ministry.list');
    }

    public function createMinistry(Request $request)
    {
        if ($_POST) {
            $rules = array(
                'name'  => 'required',
                'status'  => 'required',
            );
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $Ministry = new Ministry();
                $Ministry->name = $request->name;
                $Ministry->status = $request->status;
                $Ministry->save();

                return redirect()->route('ministryList');
            }
        }
        return view('Admin.Ministry.add');
    }
    public function ministryList(Request $request)
    {
        $Ministry = Ministry::all();
        return view('Admin.Ministry.list', compact('Ministry'));
    }
    public function editMinistry(Request $request)
    {
        $data['Ministry'] = $Ministry = Ministry::find($request->id);
        if ($_POST) {
            $rules = array(
                'name'  => 'required',
            );
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {

                $Ministry->name = $request->name;
                $Ministry->save();
                return redirect()->route('ministryList');
            }
        }

        return view('Admin.Ministry.edit', $data);
    }
    public function deleteMinistry(Request $request)
    {
        $deleteMinistry = Ministry::find($request->id);
        $deleteMinistry->delete();

        return redirect()->route('ministryList');
    }
    // Hotel

    public function hotelIndex(Request $request)
    {

        if ($request->ajax()) {
            $data = Hotel::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = url('admin/editHotel/' . $row->id);
                    $actionBtn = '<a href="' . $editUrl . '" class="edit btn btn-success btn-sm">Edit</a><button type="button" class="delete btn btn-danger btn-sm deleteUserButton" onClick="DeleteModal(this)" data-hotelId=' . $row->id . '>Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.Hotel.list');
    }


    public function createHotel(Request $request)
    {
        if ($_POST) {
            $rules = array(
                'name'  => 'required',
                'cities'  => 'required',
            );
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {

                $Hotel = new Hotel();
                $Hotel->name = $request->name;
                $Hotel->save();

                $citiesId =  $request->cities;
                $cityHotel = new CityHotel();
                foreach ($citiesId as $city) {

                    $cityHotel->city_id = $city;
                    $cityHotel->hotel_id = $Hotel->id;
                    $cityHotel->save();
                }

                return redirect()->route('hotelList');
            }
        }
        $data['cities'] = City::all();
        return view('Admin.Hotel.add', $data);
    }
    public function hotelList(Request $request)
    {
        $Hotel = Hotel::all();
        return view('Admin.Hotel.list', compact('Hotel'));
    }
    public function editHotel(Request $request)
    {
        $data['Hotel'] = $Hotel = Hotel::findOrFail($request->id);

        $data['cities'] = City::all();
        $data['hotelCities'] = CityHotel::where('hotel_id', $Hotel->id)->pluck('city_id')->toArray();
        if ($_POST) {
            $rules = array(
                'name'  => 'required',
            );
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {

                $Hotel->name = $request->name;
                $Hotel->save();

                $citiesId = $request->cities;

                CityHotel::where('hotel_id', $Hotel->id)->delete();

                $cityHotel = new CityHotel();
                foreach ($citiesId as $cityId) {
                    $cityHotel->city_id = $cityId;
                    $cityHotel->hotel_id = $Hotel->id;
                    $cityHotel->save();
                }
                return redirect()->route('hotelList');
            }
        }

        return view('Admin.Hotel.edit', $data);
    }

    public function deleteHotel(Request $request)
    {

        CityHotel::where('hotel_id', $request->id)->delete();

        $deleteHotel = Hotel::find($request->id);
        $deleteHotel->delete();

        return redirect()->route('hotelList');
    }

    // Flight

    public function flightIndex(Request $request)
    {

        if ($request->ajax()) {
            $data = Flight::with(['departureCity', 'arrivalCity'])->select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = url('admin/editFlight/' . $row->id);
                    $actionBtn = '<a href="' . $editUrl . '" class="edit btn btn-success btn-sm">Edit</a><button type="button" class="delete btn btn-danger btn-sm deleteUserButton" onClick="DeleteModal(this)" data-flightId=' . $row->id . '>Delete</button>';
                    return $actionBtn;
                })
                ->editColumn('departure_city_id', function ($row) {
                    return $row->departureCity->name;
                })
                ->editColumn('arrival_city_id', function ($row) {
                    return $row->arrivalCity->name;
                })
                ->editColumn('departure_date_time', function ($row) {
                    return $row->departure_date_time;
                })
                ->editColumn('arrival_date_time', function ($row) {
                    return $row->arrival_date_time;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.Flight.list');
    }

    public function addFlight(Request $request)
    {
        if ($_POST) {

            $rules = array(
                'name'  => 'required',
                'departure_date_time'  => 'required',
                'arrival_date_time'  => 'required',
                'departure_city'  => 'required',
                'arrival_city'  => 'required',
            );
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {

                $data = $request->all();

                $data['departure_date_time'] = str_replace('T', ' ', $request->departure_date_time);
                $data['arrival_date_time'] = str_replace('T', ' ', $request->arrival_date_time);

                // Now save the data
                $flight = new Flight();
                $flight->name = $data['name'];
                $flight->departure_city_id = $data['departure_city'];
                $flight->departure_date_time = $data['departure_date_time'];
                $flight->arrival_city_id = $data['arrival_city'];
                $flight->arrival_date_time = $data['arrival_date_time'];
                $flight->save();

                return redirect()->route('flightList');
            }
        }
        $data['cities'] = City::all();
        return view('Admin.Flight.add', $data);
    }

    public function editFlight(Request $request)
    {
        $data['Flight'] = $flight = Flight::findOrFail($request->id);

        $data['cities'] = City::all();

        if ($_POST) {
            $rules = array(
                'name'  => 'required',
                'departure_date_time'  => 'required',
                'arrival_date_time'  => 'required',
                'departure_city'  => 'required',
                'arrival_city'  => 'required',
            );
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {

                $departure_date_time = str_replace('T', ' ', $request->departure_date_time);
                $arrival_date_time = str_replace('T', ' ', $request->arrival_date_time);


                $flight->name = $request->name;
                $flight->departure_city_id = $request->departure_city;
                $flight->departure_date_time = $departure_date_time;
                $flight->arrival_city_id = $request->arrival_city;
                $flight->arrival_date_time = $arrival_date_time;
                $flight->save();


                return redirect()->route('flightList');
            }
        }

        return view('Admin.Flight.edit', $data);
    }


    public function addTrip(Request $request)
    {
        if ($_POST) {

            $rules = array(
                'trip_title'           => 'required|string|max:255',
                'flight_number'        => 'required|string|max:50',
                'departure_city'       => 'required|exists:cities,id',
                'departure_date_time'  => 'required|date',
                'arrival_city'         => 'required|exists:cities,id',
                'arrival_date_time'    => 'required|date|after_or_equal:departure_date_time',
                'trip_participants'    => 'required|array',
                'trip_participants.*'  => 'exists:users,id',
                'trip_image'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'trip_files' => 'nullable|array',
                'trip_files.*' => 'nullable|mimes:pdf,doc,docx',
                'ground_movement_title'        => 'required',
                'ground_movement_cars.*'         => 'required|integer|min:1',
                'ground_movement_no_of_participant.*' => 'required|integer|min:1',
                'ground_movement_date_time.*'    => 'required|date',
                'hotel_id.*'                     => 'required|exists:hotels,id',
                'hotel_checkin_datetime.*'       => 'required|date',
                'hotel_checkout_datetime.*'      => 'required|date|after:hotel_checkin_datetime.*',

                'meeting_country_id.*'           => 'required|exists:countries,id',
                'meeting_city_id.*'              => 'required|exists:cities,id',
                'meeting_date.*'                 => 'required|date',

                'room_no_*.*'                    => 'required|string', // Adjust dynamic fields accordingly
                'room_member_id_*.*'             => 'required|array',
                'room_member_id_*.*.*'           => 'exists:users,id',

                'meeting_title_*.*'              => 'required|string|max:255',
                'meeting_member_id_*.*.*'        => 'exists:users,id',

                'meeting_mission_*_*.*'          => 'required|string|max:255',
                'mission_due_date_*_*.*'         => 'required|date',
                'mission_description_*_*.*'      => 'required|string|max:1000',
                'mission_file_title_*_*.*'       => 'nullable|string|max:255',
                'mission_file_*_*.*'             => 'nullable|file|mimes:jpeg,png,pdf,doc,docx|max:2048'
            );

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                
                DB::beginTransaction();
                // try {
                // dd($request->all());
                // Store Trip
                $imagepath = NULL;
                if ($request->hasFile('trip_image')) {
                    $file = $request->file('trip_image');
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $path = 'image/trip_images/';
                    $file->move($path, $filename);

                    $imagepath = $path . $filename;
                }

                $trip = Trip::create([
                    'title'              => $request->trip_title,
                    'flight_number'      => $request->flight_number,
                    'departure_city_id'  => $request->departure_city,
                    'departure_date'     => $request->departure_date_time,
                    'arrival_city_id'    => $request->arrival_city,
                    'arrival_date'       => $request->arrival_date_time,
                    'trip_participants'  => implode(',', $request->input('trip_participants')),
                    'image'              => $imagepath,
                ]);

                if ($request->hasFile('trip_files')) {
                    foreach ($request->file('trip_files') as $file) {
                        $filename = time() . '_' . $file->getClientOriginalName();

                        $destinationPath = public_path('trip_files');

                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }

                        $file->move($destinationPath, $filename);

                        $filePath = 'trip_files/' . $filename;

                        TripFile::create([
                            'trip_id' => $trip->id,
                            'file_path' => $filePath,
                        ]);
                    }
                }

                // // Store Ground Movements
                foreach ($request->ground_movement_title as $index => $title) {
                    GroundMovement::create([
                        'trip_id'            => $trip->id,
                        'title'              => $title,
                        'no_of_cars'         => $request->ground_movement_cars[$index],
                        'no_of_participant'  => $request->ground_movement_no_of_participant[$index],
                        'date_time'          => $request->ground_movement_date_time[$index],
                    ]);
                }


                // Store Accommodations and Rooms
                foreach ($request->hotel_id as $accIndex => $hotelId) {
                    $increment = $accIndex + 1;

                    $accommodation = Accomodation::create([
                        'trip_id'             => $trip->id,
                        'hotel_id'            => $hotelId,
                        'checkin_datetime'    => $request->hotel_checkin_datetime[$accIndex],
                        'checkout_datetime'   => $request->hotel_checkout_datetime[$accIndex],
                    ]);

                    // Store Room Details for each Accommodation
                    $roomNoField = 'room_no_' . $increment;
                    $roomMemberField = 'room_member_id_' . $increment;

                    // Use the dynamically constructed field names with input()
                    if (!empty($request->input($roomNoField))) {
                        foreach ($request->input($roomNoField) as $roomIndex => $roomNo) {
                            Room::create([
                                'accomodation_id'  => $accommodation->id,
                                'room_no'           => $roomNo,
                                'participants_id'   => implode(',', $request->input($roomMemberField)[$roomIndex + 1]), // Multiple participants as CSV per room
                            ]);
                        }
                    }
                }

                // Store Meetings
                foreach ($request->meeting_country_id as $meetIndex => $countryId) {
                    $increment = $meetIndex + 1;

                    // Dynamically generate field names
                    $meetingTitleField = 'meeting_title_' . $increment;

                    $meetingStartField = 'meeting_start_time_' . $increment;
                    $meetingEndField = 'meeting_end_time_' . $increment;
                    $meetingDescriptionField = 'meeting_description_' . $increment;
                    $meetingDressField = 'meeting_dress_code_' . $increment;
                    $meetingLatitudeField = 'meeting_latitude_' . $increment;
                    $meetingLongitudeField = 'meeting_longitude_' . $increment;
                    $locationTitleField = 'location_title_' . $increment;

                    // Create a meeting record
                    $meeting = Meeting::create([
                        'trip_id'           => $trip->id,
                        'country_id'        => $countryId,
                        'city_id'           => $request->meeting_city_id[$meetIndex],
                        'meeting_date_time' => $request->meeting_date[$meetIndex],
                        // 'meeting_title'     => $request->input($meetingTitleField),   // Dynamically retrieve title
                    ]);


                    // Store Meeting Details for each Meeting
                    // Check if there are meeting details (e.g., title) dynamically
                    if (!empty($request->input($meetingTitleField))) {
                        foreach ($request->input($meetingTitleField) as $detailIndex => $title) {
                            $detailIncrement = $detailIndex + 1;

                            // Generate dynamic field names for meeting details
                            $meetingMissionField = 'meeting_mission_' . $increment . '_' . $detailIncrement;
                            // $meetingMissionField = 'meeting_mission_' . $increment . '_' . $detailIncrement;
                            $missionDueDateField = 'mission_due_date_' . $increment . '_' . $detailIncrement;
                            $missionDescriptionField = 'mission_description_' . $increment . '_' . $detailIncrement;

                            $meetingMemberField = 'meeting_member_id_' . $increment . '_' . $detailIncrement;

                            // Create a meeting detail
                            $meetingDetail = MeetingDetail::create([
                                'meeting_id'           => $meeting->id,
                                'trip_id'              => $trip->id,
                                'title'                => $title,
                                'meeting_partcipants' => implode(',', $request->input($meetingMemberField)),
                                'start_time'           => $request->input($meetingStartField)[$detailIndex],
                                'end_time'             => $request->input($meetingEndField)[$detailIndex],
                                'description'          => $request->input($meetingDescriptionField)[$detailIndex],
                                'dress_code'           => $request->input($meetingDressField)[$detailIndex]
                            ]);
                            $meetingLocation = MeetingLocation::create([

                                'trip_id'              => $trip->id,
                                'meeting_id'           => $meeting->id,
                                'meeting_detail_id'    => $meetingDetail->id,
                                'title'                => $request->input($locationTitleField)[$detailIndex],
                                'latitude'             => $request->input($meetingLatitudeField)[$detailIndex],
                                'longitude'            => $request->input($meetingLongitudeField)[$detailIndex]
                            ]);

                            // Check if there are meeting missions and store them
                            if (!empty($request->input($meetingMissionField))) {
                                foreach ($request->input($meetingMissionField) as $missionIndex => $mission) {
                                    $missionIncrement = $missionIndex + 1;

                                    $missionMemberField = 'mission_member_id_' . $increment . '_' . $detailIncrement . '_' . $missionIncrement;


                                    $missionFileTitleField = 'mission_file_title_' . $increment . '_' . $detailIncrement . '_' . $missionIncrement;
                                    $missionFileField = 'mission_file_' . $increment . '_' . $detailIncrement . '_' . $missionIncrement;

                                    $missionAdded = Mission::create([
                                        'meeting_detail_id'     => $meetingDetail->id,
                                        'mission_name'          => $mission,
                                        'mission_participants'  => implode(',', $request->input($missionMemberField)),
                                        'due_date'  => $request->input($missionDueDateField)[$missionIndex],
                                        'description'  => $request->input($missionDescriptionField)[$missionIndex],
                                    ]);
                                    if (!empty($request->input($missionFileTitleField))) {
                                        foreach ($request->input($missionFileTitleField) as $missionFileTitleIndex => $missionFileTitle) {

                                            if ($request->hasFile($missionFileField)) {
                                                // Retrieve the file
                                                $file = $request->file($missionFileField)[$missionFileTitleIndex];

                                                // Generate a unique filename
                                                $filename = time() . '_' . $file->getClientOriginalName();

                                                // Define the destination path
                                                $destinationPath = public_path('mission_files');

                                                // Create the directory if it doesn't exist
                                                if (!file_exists($destinationPath)) {
                                                    mkdir($destinationPath, 0777, true);
                                                }

                                                // Move the file to the destination directory
                                                $file->move($destinationPath, $filename);

                                                // Generate the file path
                                                $filePath = 'mission_files/' . $filename;

                                                // Store the file information in the database
                                                MissionFile::create([
                                                    'mission_id'     => $missionAdded->id,
                                                    'admin_id'       => Auth::guard('admin')->id(),
                                                    'file_name'      => $missionFileTitle,
                                                    'file_path'      => $filePath, // Store the file path here
                                                ]);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                foreach($request->input('trip_participants') as $item){
                    $user = User::find($item);
                    $title = "Trip Assigned"; 
                    $body = "";
                    $this->helper->sendPushNotificationSync($user->fcm_token, $title, $body,$user);
                }

                DB::commit();
                // return "inserted";
                return redirect()->back()->with('success', 'Trip and related details stored successfully.');
                // } catch (\Exception $e) {
                //     DB::rollBack();
                //     return redirect()->back()->with('error', 'Failed to store trip details: ' . $e->getMessage());
                // }


            }
        }

        $data['countries'] = Country::all();
        $data['cities'] = City::all();
        $data['hotels'] = Hotel::all();
        $data['users'] = User::all();
        return view('Admin.Trip.add', $data);
    }

    public function editTrip(Request $request, $tripId)
    {
        if ($request->isMethod('post')) {
           

            // $rules = [
            //     'trip_title'           => 'required|string|max:255',
            //     'flight_number'        => 'required|string|max:50',
            //     'departure_city'       => 'required|exists:cities,id',
            //     'departure_date_time'  => 'required|date',
            //     'arrival_city'         => 'required|exists:cities,id',
            //     'arrival_date_time'    => 'required|date|after_or_equal:departure_date_time',
            //     'trip_participants'    => 'required|array',
            //     'trip_participants.*'  => 'exists:users,id',
            //     'trip_image'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            //     'trip_files'           => 'nullable|array',
            //     'trip_files.*'         => 'nullable|mimes:pdf,doc,docx',
            //     'ground_movement_title.*'        => 'required',
            //     'ground_movement_cars.*'         => 'required|integer|min:1',
            //     'ground_movement_no_of_participant.*' => 'required|integer|min:1',
            //     'ground_movement_date_time.*'    => 'required|date',
            //     'hotel_id.*'                     => 'required|exists:hotels,id',
            //     'hotel_checkin_datetime.*'       => 'required|date',
            //     'hotel_checkout_datetime.*'      => 'required|date|after:hotel_checkin_datetime.*',
            //     'meeting_country_id.*'           => 'required|exists:countries,id',
            //     'meeting_city_id.*'              => 'required|exists:cities,id',
            //     'meeting_date.*'                 => 'required|date',
            // ];
            // $validator = Validator::make($request->all(), $rules);

            // if ($validator->fails()) {
            //     return back()->withErrors($validator)->withInput();
            // }

            DB::beginTransaction();
            try {
                // Update Trip Details
                $trip = Trip::findOrFail($tripId);

                
                $imagepath = $trip->image; // Keep existing image if not updated
                // if ($request->hasFile('trip_image')) {
                //     $file = $request->file('trip_image');
                //     $filename = time() . '.' . $file->getClientOriginalExtension();
                //     $path = 'image/trip_images/';
                //     $file->move($path, $filename);
                //     $imagepath = $path . $filename;
                // }

                $trip->update([
                    'title'              => $request->trip_title,
                    'flight_number'      => $request->flight_number,
                    'departure_city_id'  => $request->departure_city,
                    'departure_date'     => $request->departure_date_time,
                    'arrival_city_id'    => $request->arrival_city,
                    'arrival_date'       => $request->arrival_date_time,
                    'trip_participants'  => implode(',', $request->input('trip_participants')),
                    'image'              => $imagepath,
                ]);
                
                // Update Trip Files
                // if ($request->hasFile('trip_files')) {
                //     foreach ($request->file('trip_files') as $file) {
                //         $filename = time() . '_' . $file->getClientOriginalName();
                //         $destinationPath = public_path('trip_files');
                //         if (!file_exists($destinationPath)) {
                //             mkdir($destinationPath, 0777, true);
                //         }
                //         $file->move($destinationPath, $filename);
                //         $filePath = 'trip_files/' . $filename;

                //         TripFile::create([
                //             'trip_id'   => $trip->id,
                //             'file_path' => $filePath,
                //         ]);
                //     }
                // }

                // Update Ground Movements
                GroundMovement::where('trip_id', $trip->id)->delete();
                foreach ($request->ground_movement_title as $index => $title) {
                    GroundMovement::create([
                        'trip_id'            => $trip->id,
                        'title'              => $title,
                        'no_of_cars'         => $request->ground_movement_cars[$index],
                        'no_of_participant'  => $request->ground_movement_no_of_participant[$index],
                        'date_time'          => $request->ground_movement_date_time[$index],
                    ]);
                }

                

                // Update Accommodations and Rooms
                Accomodation::where('trip_id', $trip->id)->delete();
                foreach ($request->hotel_id as $accIndex => $hotelId) {
                    $accommodation = Accomodation::create([
                        'trip_id'           => $trip->id,
                        'hotel_id'          => $hotelId,
                        'checkin_datetime'  => $request->hotel_checkin_datetime[$accIndex],
                        'checkout_datetime' => $request->hotel_checkout_datetime[$accIndex],
                    ]);

                    $roomNoField = 'room_no_' . ($accIndex + 1);
                    $roomMemberField = 'room_member_id_' . ($accIndex + 1);

                    if (!empty($request->input($roomNoField))) {
                        foreach ($request->input($roomNoField) as $roomIndex => $roomNo) {
                            Room::create([
                                'accomodation_id' => $accommodation->id,
                                'room_no'         => $roomNo,
                                'participants_id' => implode(',', $request->input($roomMemberField)[$roomIndex + 1]),
                            ]);
                        }
                    }
                }


                // Update Meetings, Details, and Missions
                Meeting::where('trip_id', $trip->id)->delete();
                foreach ($request->meeting_country_id as $meetIndex => $countryId) {
                    $meeting = Meeting::create([
                        'trip_id'   => $trip->id,
                        'country_id' => $countryId,
                        'city_id'   => $request->meeting_city_id[$meetIndex],
                        'meeting_date_time' => $request->meeting_date[$meetIndex],
                    ]);
                    

                    $meetingTitleField = 'meeting_title_' . ($meetIndex + 1);
                    
                    if (!empty($request->input($meetingTitleField))) {
                        dd($request->all(),"below meeting",$meetingTitleField);
                        
                        foreach ($request->input($meetingTitleField) as $detailIndex => $title) {
                            $meetingDetail = MeetingDetail::create([
                                'meeting_id' => $meeting->id,
                                'trip_id' => $meeting->id,
                                'title'      => $title,
                                'meeting_partcipants' => $meeting->id,
                                'start_time' => $meeting->id,
                                'end_time' => $meeting->id,
                                'description' => $meeting->id,
                                'dress_code' => $meeting->id,
                            ]);

                            
                            // Handle Meeting Missions
                            $meetingMissionField = 'meeting_mission_' . ($meetIndex + 1) . '_' . ($detailIndex + 1);
                            if (!empty($request->input($meetingMissionField))) {
                                foreach ($request->input($meetingMissionField) as $missionIndex => $mission) {
                                    $missionAdded = Mission::create([
                                        'meeting_detail_id' => $meetingDetail->id,
                                        'mission_name'      => $mission,
                                    ]);

                                    // Handle Mission Files
                                    $missionFileTitleField = 'mission_file_title_' . ($meetIndex + 1) . '_' . ($detailIndex + 1) . '_' . ($missionIndex + 1);
                                    $missionFileField = 'mission_file_' . ($meetIndex + 1) . '_' . ($detailIndex + 1) . '_' . ($missionIndex + 1);

                                    if (!empty($request->input($missionFileTitleField))) {
                                        foreach ($request->input($missionFileTitleField) as $fileIndex => $fileTitle) {
                                            if ($request->hasFile($missionFileField)) {
                                                $file = $request->file($missionFileField)[$fileIndex];
                                                $filename = time() . '_' . $file->getClientOriginalName();
                                                $destinationPath = public_path('mission_files');
                                                if (!file_exists($destinationPath)) {
                                                    mkdir($destinationPath, 0777, true);
                                                }
                                                $file->move($destinationPath, $filename);
                                                $filePath = 'mission_files/' . $filename;

                                                MissionFile::create([
                                                    'mission_id'  => $missionAdded->id,
                                                    'file_name'   => $fileTitle,
                                                    'file_path'   => $filePath,
                                                ]);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                
                DB::commit();
                return redirect()->back()->with('success', 'Trip updated successfully.');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Failed to update trip: ' . $e->getMessage());
            }
        }

        // GET: Fetch Existing Data for Editing
        $trip = Trip::with('groundMovements','accommodations.rooms', 'meetings.meetingDetails.meetingLocation', 'meetings.meetingDetails.missions.missionFiles')
            ->findOrFail($tripId);

        $data['trip'] = $trip;

        $data['countries'] = Country::all();
        $data['cities'] = City::all();
        $data['hotels'] = Hotel::all();
        $data['users'] = User::all();

        return view('Admin.Trip.edit', $data);
    }

    public function tripsList(Request $request)
    {

        if ($request->ajax()) {
            $data = Trip::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editTripUrl = url('admin/editTrip/' . $row->id);
                    if ($row->trip_completed == '1') {
                        $actionBtn = 'Completed';
                    } else {
                        $actionBtn = '<a href="' . $editTripUrl . '" class="edit btn btn-success btn-sm">Edit</a> <button type="button" class="delete btn btn-info btn-sm endTripButton" onClick="CompleteModal(this)" data-tripId=' . $row->id . '>End Trip</button> ';
                    }
                    return $actionBtn;
                })
                // ->editColumn('country_id', function ($row) {
                //     return $row->country_name;
                // })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.Trip.list');
    }

    public function sendNotification(Request $request)
    {
        $user = User::find($request->user_id);
        $data = [
            'message' => 'New notification message!',
            'user_id' => $user->id,
        ];

        $user->notify(new RealTimeNotification($data));

        return response()->json(['status' => 'Notification sent!']);
    }

    public function completeTrip(Request $request)
    {

        $trip = Trip::find($request->id);
        $trip->trip_completed = '1';
        $trip->save();

        return redirect()->route('tripsList');
    }

    public function missionFiles(Request $request)
    {

        // if ($request->ajax()) {
        //     $data = User::select('*');
        //     return DataTables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function ($row) {
        //             $editUrl = url('admin/editUser/' . $row->id);
        //             $actionBtn = '<a href="' . $editUrl . '" class="edit btn btn-success btn-sm">Edit</a><button type="button" class="delete btn btn-danger btn-sm deleteUserButton" onClick="DeleteModal(this)" data-userId=' . $row->id . '>Delete</button>';
        //             return $actionBtn;
        //             // <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        // $data['trips'] = Trip::where('departure_date');

        return view('Admin.Files.mission_files');
    }


    public function missionFilter(Request $request)
    {
        $fromDate = Carbon::parse($request->from_date)->format('Y-m-d');
        $toDate = Carbon::parse($request->to_date)->format('Y-m-d');
        if ($fromDate && $toDate) {
            $trips = Trip::whereBetween('departure_date', [$fromDate, $toDate])->get();
            $view = view('partial.trips_dropdown', compact('trips'))->render();
            return response()->json(["message" => "Success", "data" => $view], 200);
        }
    }
    public function getMeetings(Request $request)
    {

        if ($request->event_id) {
            $meetings = MeetingDetail::where('trip_id', $request->event_id)->get();
            $view = view('partial.meeting_dropdown', compact('meetings'))->render();
            return response()->json(["message" => "Success", "data" => $view], 200);
        }
    }
    public function getMissions(Request $request)
    {

        if ($request->meeting_id) {
            $missions = Mission::where('meeting_detail_id', $request->meeting_id)->get();
            $view = view('partial.mission_dropdown', compact('missions'))->render();
            return response()->json(["message" => "Success", "data" => $view], 200);
        }
    }
    public function getMissionsPerson(Request $request)
    {

        if ($request->mission_id) {
            $missions = Mission::find($request->mission_id);
            $participants_id = explode(',', $missions->mission_participants);
            $users = User::whereBetween('id', $participants_id)->get();
            $view = view('partial.user_dropdown', compact('users'))->render();
            return response()->json(["message" => "Success", "data" => $view], 200);
        }
    }
    public function getMissionsPersonFiles(Request $request)
    {
        $data = MissionFile::select('*')
            ->where('mission_id', $request->mission_id)
            ->where('user_id', $request->mission_person_id)
            ->get();

        // Render the partial view with data
        $view = view('partial.datatable_view', compact('data'))->render();

        return response()->json([
            'message' => 'Success',
            'html' => $view
        ]);
    }
}
