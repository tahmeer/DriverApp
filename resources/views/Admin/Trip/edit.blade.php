@extends('Admin.layout')

@section('main')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Trip</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('editTrip', $trip->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Trip Details -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Trip Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="trip_title">Trip Title</label>
                                <input type="text" class="form-control" id="trip_title" name="trip_title"
                                    value="{{ old('trip_title', $trip->title) }}" required>
                            </div>

                            {{-- <div class="form-group">
                                <label for="trip_participants">Participants</label>
                                <select class="form-control select2" id="trip_participants" name="trip_participants[]"
                                    multiple required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ in_array($user->id, explode(',', $trip->trip_participants)) ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div> --}}
                        </div>
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Air Movement</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="flightNumber">Flight Number</label>
                                        <input type="text" name="flight_number" class="form-control" id="flightNumber"
                                            value="{{ old('flight_number', $trip->flight_number) }}"
                                            placeholder="Enter Flight Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Departure City</label>
                                        <select class="select2 form-control" name="departure_city"
                                            data-placeholder="Select City" style="width: 100%;" required>
                                            <option>Select Option</option>
                                            @foreach ($cities as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $trip->departure_city_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="departureDateTime">Departure Date/Time</label>
                                        <input type="datetime-local" name="departure_date_time" class="form-control"
                                            id="departureDateTime"
                                            value="{{ old('departure_date_time', $trip->departure_date) }}"
                                            placeholder="Select Departure Date/Time" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Arrival City</label>
                                        <select class="select2 form-control" name="arrival_city"
                                            data-placeholder="Select City" style="width: 100%;" required>
                                            <option>Select Option</option>
                                            @foreach ($cities as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $trip->arrival_city_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="arrivalDateTime">Arrival Date/Time</label>
                                        <input type="datetime-local" name="arrival_date_time" class="form-control"
                                            id="arrivalDateTime"
                                            value="{{ old('arrival_date_time', $trip->arrival_date) }}"
                                            placeholder="Select Arrival Date/Time" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="trip_participants">Persons</label>
                                        <select class="form-control select2" name="trip_participants[]" multiple="multiple"
                                            required>
                                            <option value="">Select Members</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ in_array($user->id, explode(',', $trip->trip_participants)) ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Ground Movements -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Ground Movements</h3>
                        </div>
                        <div class="card-body" id="ground-movements">
                            @foreach ($trip->groundMovements as $index => $movement)
                                <div class="ground-movement-row mb-3">
                                    <!-- Title -->
                                    <div class="form-group">
                                        <label for="ground_movement_title_{{ $index }}">Title</label>
                                        <input type="text" name="ground_movement_title[]" class="form-control mb-2"
                                            id="ground_movement_title_{{ $index }}"
                                            value="{{ old('ground_movement_title.' . $index, $movement->title) }}"
                                            required>
                                    </div>

                                    <!-- Number of Cars -->
                                    <div class="form-group">
                                        <label for="ground_movement_cars_{{ $index }}">Number of Cars</label>
                                        <input type="number" name="ground_movement_cars[]" class="form-control mb-2"
                                            id="ground_movement_cars_{{ $index }}"
                                            value="{{ old('ground_movement_cars.' . $index, $movement->no_of_cars) }}"
                                            required>
                                    </div>

                                    <!-- Number of Participants -->
                                    <div class="form-group">
                                        <label for="ground_movement_no_of_participant_{{ $index }}">Number of
                                            Participants</label>
                                        <input type="number" name="ground_movement_no_of_participant[]"
                                            class="form-control mb-2"
                                            id="ground_movement_no_of_participant_{{ $index }}"
                                            value="{{ old('ground_movement_no_of_participant.' . $index, $movement->no_of_participant) }}"
                                            required>
                                    </div>

                                    <!-- Date/Time -->
                                    <div class="form-group">
                                        <label for="ground_movement_date_time_{{ $index }}">Date/Time</label>
                                        <input type="datetime-local" name="ground_movement_date_time[]"
                                            class="form-control" id="ground_movement_date_time_{{ $index }}"
                                            value="{{ old('ground_movement_date_time.' . $index, $movement->date_time) }}"
                                            required>
                                    </div>

                                    @if ($index > 0)
                                        <button type="button"
                                            class="btn btn-danger mt-2 remove-ground-movement">Remove</button>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-primary" id="add-ground-movement">Add Ground
                            Movement</button>
                    </div>

                    <!-- Accommodations -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Accommodations</h3>
                        </div>
                        <div class="card-body" id="accommodationFields">
                            <!-- Loop Through Existing Accommodations -->
                            @foreach ($trip->accommodations as $accIndex => $accommodation)
                                <div class="accommodation-row" id="accommodation_row_{{ $accIndex + 1 }}">
                                    <div class="row">
                                        <!-- Hotel Selection -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="hotel_id_{{ $accIndex + 1 }}">Hotel</label>
                                                <select class="form-control" name="hotel_id[]"
                                                    id="hotel_id_{{ $accIndex + 1 }}">
                                                    <option>Select Option</option>
                                                    @foreach ($hotels as $hotel)
                                                        <option value="{{ $hotel->id }}"
                                                            {{ $accommodation->hotel_id == $hotel->id ? 'selected' : '' }}>
                                                            {{ $hotel->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Check-in DateTime -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="hotel_checkin_datetime_{{ $accIndex + 1 }}">Check-in
                                                    DateTime</label>
                                                <input type="datetime-local" name="hotel_checkin_datetime[]"
                                                    class="form-control" id="hotel_checkin_datetime_{{ $accIndex + 1 }}"
                                                    value="{{ old('hotel_checkin_datetime.' . $accIndex, $accommodation->checkin_datetime) }}"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Check-out DateTime -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="hotel_checkout_datetime_{{ $accIndex + 1 }}">Check-out
                                                    DateTime</label>
                                                <input type="datetime-local" name="hotel_checkout_datetime[]"
                                                    class="form-control" id="hotel_checkout_datetime_{{ $accIndex + 1 }}"
                                                    value="{{ old('hotel_checkout_datetime.' . $accIndex, $accommodation->checkout_datetime) }}"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Room Details -->
                                    <div class="room-details" id="room_details_{{ $accIndex + 1 }}">
                                        @foreach ($accommodation->rooms as $roomIndex => $room)
                                            <div class="row" id="room_{{ $accIndex + 1 }}_{{ $roomIndex + 1 }}">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="room_no_{{ $accIndex + 1 }}_{{ $roomIndex + 1 }}">Room
                                                            No</label>
                                                        <input type="text" name="room_no_{{ $accIndex + 1 }}[]"
                                                            class="form-control"
                                                            id="room_no_{{ $accIndex + 1 }}_{{ $roomIndex + 1 }}"
                                                            value="{{ old('room_no_' . $accIndex, $room->room_no) }}"
                                                            required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="room_member_id_{{ $accIndex + 1 }}_{{ $roomIndex + 1 }}">Persons</label>
                                                        <select class="form-control"
                                                            name="room_member_id_{{ $accIndex + 1 }}[{{ $roomIndex + 1 }}][]"
                                                            id="room_member_id_{{ $accIndex + 1 }}_{{ $roomIndex + 1 }}"
                                                            multiple="multiple">
                                                            <option value="">Select Members</option>
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}"
                                                                    {{ in_array($user->id, explode(',', $room->participants_id)) ? 'selected' : '' }}>
                                                                    {{ $user->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary mt-3"
                                                onClick="addRoomDetails({{ $accIndex + 1 }})">Add Room</button>
                                        </div>
                                    </div>

                                    @if ($accIndex > 0)
                                        <button type="button" class="btn btn-danger mt-3 remove-accommodation">Remove
                                            Accommodation</button>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <button type="button" class="btn btn-primary mt-3" id="addMoreBtnAccommodation"
                            onClick="addMoreAccommodation()">Add More</button>
                    </div>

                    <!-- Meetings -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Meetings</h3>
                        </div>
                        <div class="card-body" id="meetings">

                            @foreach ($trip->meetings as $meetingIndex => $meeting)
                                <div class="meeting-row mb-4" id="meeting_row_{{ $meetingIndex + 1 }}">
                                    <!-- Meeting Section -->
                                    <h5>Meeting {{ $meetingIndex + 1 }}</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meeting_country_id_{{ $meetingIndex + 1 }}">Country</label>
                                                <select class="form-control" name="meeting_country_id[]"
                                                    id="meeting_country_id_{{ $meetingIndex + 1 }}">
                                                    <option value="">Select Country</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}"
                                                            {{ $meeting->country_id == $country->id ? 'selected' : '' }}>
                                                            {{ $country->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meeting_city_id_{{ $meetingIndex + 1 }}">City</label>
                                                <select class="form-control" name="meeting_city_id[]"
                                                    id="meeting_city_id_{{ $meetingIndex + 1 }}">
                                                    <option value="">Select City</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}"
                                                            {{ $meeting->city_id == $city->id ? 'selected' : '' }}>
                                                            {{ $city->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meeting_date_{{ $meetingIndex + 1 }}">Meeting Date</label>
                                                <input type="datetime-local" name="meeting_date[]"
                                                    class="form-control" id="meeting_date_{{ $meetingIndex + 1 }}"
                                                    value="{{ \Carbon\Carbon::parse($meeting->meeting_date_time)->format('Y-m-d\TH:i') }}">
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <!-- Meeting Details Section -->
                                    <div id="meeting_details_{{ $meetingIndex + 1 }}">
                                        @foreach ($meeting->meetingDetails as $detailIndex => $meetingDetail)
                                            <div class="meeting-detail-row mb-3"
                                                id="meeting_detail_row_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}">
                                                <h6>Meeting Detail {{ $detailIndex + 1 }}</h6>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="meeting_title_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}">Title</label>
                                                            <input type="text"
                                                                name="meeting_title_{{ $meetingIndex + 1 }}[]"
                                                                class="form-control"
                                                                id="meeting_title_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}"
                                                                value="{{ $meetingDetail->title }}"
                                                                placeholder="Enter Meeting Title">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="meeting_participants_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}">Meeting
                                                                Participants</label>
                                                            <select name="meeting_member_id_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}[]"
                                                                id="meeting_participants_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}"
                                                                class="form-control" multiple>
                                                                @foreach ($users as $user)
                                                                    <option value="{{ $user->id }}"
                                                                        {{ in_array($user->id, explode(',', $meetingDetail->meeting_partcipants)) ? 'selected' : '' }}>
                                                                        {{ $user->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="meeting_start_time__{{ $meetingIndex + 1 }}_{{ $meetingIndex + 1 }}">Meeting Start
                                                                Time</label>
                                                            <input type="datetime-local" name="meeting_start_time_{{ $meetingIndex + 1 }}[]"
                                                                class="form-control" id="meeting_start_time_{{ $meetingIndex + 1 }}"
                                                                value="{{ \Carbon\Carbon::parse($meeting->start_time)->format('Y-m-d\TH:i') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="meeting_end_time__{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}">Meeting Start
                                                                Time</label>
                                                            <input type="datetime-local" name="meeting_end_time_{{ $meetingIndex + 1 }}[]"
                                                                class="form-control" id="meeting_end_time_{{ $meetingIndex + 1 }}"
                                                                value="{{ \Carbon\Carbon::parse($meeting->end_time)->format('Y-m-d\TH:i') }}">
                                                        </div>
                                                    </div>
                                                </div>
            
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="meeting_description_{{ $meetingIndex + 1 }}">Meeting
                                                                Description</label>
                                                            <input type="text" name="meeting_description_{{ $meetingIndex + 1 }}[]"
                                                                class="form-control"
                                                                id="meeting_description_{{ $meetingIndex + 1 }}"
                                                                value="{{ $meetingDetail->description }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="meeting_dress_code_{{ $meetingIndex + 1 }}">Meeting
                                                                Dress Code</label>
                                                            <input type="text" name="meeting_dress_code_{{ $meetingIndex + 1 }}[]"
                                                                class="form-control"
                                                                id="meeting_dress_code_{{ $meetingIndex + 1 }}"
                                                                value="{{ $meetingDetail->dress_code }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="location_title_1_1">Location Title</label>
                                                            <input type="text"
                                                                value="{{ $meetingDetail->meetingLocation->title }}"
                                                                name="location_title_{{ $meetingIndex + 1 }}[]" class="form-control"
                                                                placeholder="Enter Location Title">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="meeting_latitude_1_1">Latitude</label>
                                                            <input type="text" name="meeting_latitude_{{ $meetingIndex + 1 }}[]"
                                                                class="form-control"
                                                                value="{{ $meetingDetail->meetingLocation->latitude }}"
                                                                placeholder="Enter Latitude">

                                                            {{-- @if ($errors->has('meeting_latitude_1'))
                                                                <p class="error-tag">
                                                                    {{ $errors->first('meeting_latitude_1') }}</p>
                                                            @endif --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="meeting_longitude_1_1">Longitude</label>
                                                            <input type="text" name="meeting_longitude_{{ $meetingIndex + 1 }}[]"
                                                                class="form-control"
                                                                value="{{ $meetingDetail->meetingLocation->longitude }}"
                                                                placeholder="Enter Longitude">

                                                            {{-- @if ($errors->has('meeting_longitude_1'))
                                                                <p class="error-tag">
                                                                    {{ $errors->first('meeting_longitude_1') }}</p>
                                                            @endif --}}
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- Missions Section -->
                                                <div id="missions_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}">
                                                    @foreach ($meetingDetail->missions as $missionIndex => $mission)
                                                        <div class="mission-row mb-3"
                                                            id="mission_row_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}_{{ $missionIndex + 1 }}">
                                                            <h6>Mission {{ $missionIndex + 1 }}</h6>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="mission_name_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}_{{ $missionIndex + 1 }}">Meeting
                                                                            Mission</label>
                                                                        <input type="text"
                                                                            name="mission_name_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}[]"
                                                                            class="form-control"
                                                                            id="mission_name_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}_{{ $missionIndex + 1 }}"
                                                                            value="{{ $mission->mission_name }}"
                                                                            placeholder="Enter Mission Name">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="mission_participants_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}_{{ $missionIndex + 1 }}">Mission
                                                                            Participants</label>
                                                                        <select class="form-control"
                                                                            name="mission_member_id_1_1_1[]"
                                                                            multiple="multiple">
                                                                            <option value="">Select Members</option>
                                                                            @foreach ($users as $key => $row)
                                                                                <option value="{{ $row->id }}"  {{ in_array($row->id, explode(',', $mission->mission_participants)) ? 'selected' : '' }}>
                                                                                    {{ $row->name }}</option>
                                                                            @endforeach
                                                                        </select>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="mission_name_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}_{{ $missionIndex + 1 }}">Mission
                                                                            Description</label>
                                                                        <input type="text"
                                                                            name="mission_description_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}[]"
                                                                            class="form-control"
                                                                            id="mission_description_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}_{{ $missionIndex + 1 }}"
                                                                            value="{{ $mission->description }}"
                                                                            placeholder="Enter Mission Description">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="missionDueDate">Mission Due
                                                                            Date</label>
                                                                        <input type="date"
                                                                            name="mission_due_date_{{ $detailIndex + 1 }}_{{ $missionIndex + 1 }}[]"
                                                                            class="form-control"
                                                                            value="{{ $mission->due_date }}"
                                                                            id="missionDueDate"
                                                                            placeholder="Select Due Date">

                                                                        {{-- @if ($errors->has('mission_due_date_1_1'))
                                                                            <p class="error-tag">
                                                                                {{ $errors->first('mission_due_date_1_1') }}</p>
                                                                        @endif --}}
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    id="mission_files_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}_{{ $missionIndex + 1 }}">
                                                                    <h6>Mission Files</h6>
                                                                    @foreach ($mission->missionFiles as $fileIndex => $file)
                                                                        <div class="mission_file_row mb-3"
                                                                            id="mission_file_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}_{{ $missionIndex + 1 }}_{{ $fileIndex + 1 }}">
                                                                            <div class="row">
                                                                                <!-- Mission File Title -->
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="mission_file_title_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}_{{ $missionIndex + 1 }}_{{ $fileIndex + 1 }}">
                                                                                            File Title
                                                                                        </label>
                                                                                        <input type="text"
                                                                                            name="mission_file_title_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}_{{ $missionIndex + 1 }}[]"
                                                                                            class="form-control"
                                                                                            id="mission_file_title_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}_{{ $missionIndex + 1 }}_{{ $fileIndex + 1 }}"
                                                                                            value="{{ $file->file_name }}"
                                                                                            placeholder="Enter File Title">
                                                                                    </div>
                                                                                </div>

                                                                                <!-- Mission File -->
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="mission_file_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}_{{ $missionIndex + 1 }}_{{ $fileIndex + 1 }}">
                                                                                            File
                                                                                        </label>
                                                                                        <input type="file"
                                                                                            name="mission_file_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}_{{ $missionIndex + 1 }}[]"
                                                                                            class="form-control"
                                                                                            id="mission_file_{{ $meetingIndex + 1 }}_{{ $detailIndex + 1 }}_{{ $missionIndex + 1 }}_{{ $fileIndex + 1 }}">
                                                                                        @if ($file->file_path)
                                                                                            <p>Current File:
                                                                                                <a href="{{ asset($file->file_path) }}"
                                                                                                    target="_blank">
                                                                                                    {{ basename($file->file_path) }}
                                                                                                </a>
                                                                                            </p>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <button type="button" class="btn btn-primary" id="add-meeting">Add Meeting</button>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Update Trip</button>
                    </div>
                </form>
            </div>
        </section>
    </div>


    <script>
        let groundMovementCount = 1; // Initialize a counter for ground movements

        function addGroundMovement() {
            groundMovementCount++; // Increment the counter

            // Create the HTML for the new ground movement fields
            const groundMovementHtml = `
    <div class="row" id="ground_movement_row_${groundMovementCount}">
        <div class="col-md-12">
            <button type="button" class="btn btn-danger" onClick="removeGroundMovement(${groundMovementCount})">Remove</button>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="ground_movement_title_${groundMovementCount}">Title</label>
                <input type="text" name="ground_movement_title[]" class="form-control" id="ground_movement_title_${groundMovementCount}" placeholder="Enter Ground Movement Title">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Cars</label>
                <input type="text" name="ground_movement_cars[]" class="form-control" id="cars_${groundMovementCount}" placeholder="Enter Car Number">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="no_of_participant_${groundMovementCount}">Number Of Participant</label>
                <input type="number" name="ground_movement_no_of_participant[]" class="form-control" id="no_of_participant_${groundMovementCount}" placeholder="Enter Number Of Participants">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="movement_date_time_${groundMovementCount}">Date/ Time</label>
                <input type="datetime-local" name="ground_movement_date_time[]" class="form-control" id="movement_date_time_${groundMovementCount}" placeholder="Select Date/Time">
            </div>
        </div>
        
    </div>
    `;

            // Insert the new fields into the groundMovementFields container
            document.getElementById('groundMovementFields').insertAdjacentHTML('beforeend', groundMovementHtml);
        }

        function removeGroundMovement(rowId) {
            const row = document.getElementById(`ground_movement_row_${rowId}`);
            if (row) {
                row.remove(); // Remove the specified ground movement row
            }
        }


        let accommodationCount = 1;
        let roomCount = {
            1: 1
        }; // Tracks room count per accommodation

        function addMoreAccomodation() {
            accommodationCount++;
            roomCount[accommodationCount] = 1;

            let newAccommodation = `
    <div class="accommodation-row" id="accommodation_row_${accommodationCount}">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="hotel_id_${accommodationCount}">Hotel</label>
                    <select class="form-control" name="hotel_id[]">
                        <option>Select Option</option>
                        @foreach ($hotels as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="hotel_checkin_datetime_${accommodationCount}">Check-in DateTime</label>
                    <input type="datetime-local" name="hotel_checkin_datetime[]" class="form-control" placeholder="Enter Check In">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="hotel_checkout_datetime_${accommodationCount}">Check-out DateTime</label>
                    <input type="datetime-local" name="hotel_checkout_datetime[]" class="form-control" placeholder="Enter Check Out">
                </div>
            </div>
        </div>

        <div class="room-details" id="room_details_${accommodationCount}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="room_no_${accommodationCount}_1">Room No</label>
                        <input type="text" name="room_no_${accommodationCount}[]" class="form-control" placeholder="Enter Room No">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="room_member_id_${accommodationCount}_1">Persons</label>
                        <select class="form-control" name="room_member_id_${accommodationCount}[${accommodationCount}][]" multiple="multiple">
                            <option value="">Select Members</option>
                            @foreach ($users as $key => $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-primary" onClick="addRoomDetails(${accommodationCount})">Add Room</button>
                <button type="button" class="btn btn-danger" onClick="removeAccommodation(${accommodationCount})">Remove Accommodation</button>
            </div>
        </div>
    </div>
    `;

            document.getElementById('accomodationFields').insertAdjacentHTML('beforeend', newAccommodation);
        }

        function addRoomDetails(accommodationId) {
            roomCount[accommodationId]++;
            // console.log(roomCount[accommodationId]++);
            let roomDetails = `
    <div class="row" id="room_${accommodationId}_${roomCount[accommodationId]}">
        <div class="col-md-6">
            <div class="form-group">
                <label for="room_no_${accommodationId}_${roomCount[accommodationId]}">Room No</label>
                <input type="text" name="room_no_${accommodationId}[]" class="form-control" placeholder="Enter Room No">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="room_member_id_${accommodationId}_${roomCount[accommodationId]}">Persons</label>
                <select class="form-control" name="room_member_id_${accommodationCount}[${accommodationCount}][]" multiple="multiple">
                    <option value="">Select Members</option>
                    @foreach ($users as $key => $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <button type="button" class="btn btn-danger" onClick="removeRoom(${accommodationId}, ${roomCount[accommodationId]})">Remove Room</button>
        </div>
    </div>
    `;
            document.getElementById(`room_details_${accommodationId}`).insertAdjacentHTML('beforeend', roomDetails);
        }

        function removeAccommodation(accommodationId) {
            document.getElementById(`accommodation_row_${accommodationId}`).remove();
        }

        function removeRoom(accommodationId, roomId) {
            document.getElementById(`room_${accommodationId}_${roomId}`).remove();
        }

        let meetingCount = 1;
        let detailCounts = {
            1: 1
        };
        let missionCounts = {
            1: {
                1: 1
            }
        };

        // Function to add a new Meeting
        function addMoreMeeting() {
            meetingCount++;
            detailCounts[meetingCount] = 1;
            missionCounts[meetingCount] = {
                1: 1
            };

            let meetingHtml = `
    <div class="meeting-row" id="meeting_row_${meetingCount}">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meeting_country_id_${meetingCount}">Country</label>
                    <select class="form-control" name="meeting_country_id[]">
                        <option>Select Option</option>
                        @foreach ($countries as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meeting_city_id_${meetingCount}">City</label>
                    <select class="form-control" name="meeting_city_id[]">
                        <option>Select Option</option>
                        @foreach ($cities as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meeting_date_${meetingCount}">Meeting Date</label>
                    <input type="date" name="meeting_date[]" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h5>Meeting Details</h5>
            </div>
            <div class="col-md-6">
                <button type="button" class="btn btn-primary" onClick="addMeetingDetails(${meetingCount})">Add Meeting Detail</button>
            </div>
        </div>

        <!-- Meeting Details -->
        <div class="meeting-details" id="meeting_details_${meetingCount}">
            <div class="row" id="meeting_detail_${meetingCount}_1">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="meeting_title_${meetingCount}_1">Meeting Title</label>
                        <input type="text" name="meeting_title_${meetingCount}[]" class="form-control" placeholder="Enter Meeting Title">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="meeting_member_id_${meetingCount}_1">Persons</label>
                        <select class="form-control" name="meeting_member_id_${meetingCount}_1[]" multiple="multiple">
                            <option value="">Select Members</option>
                            @foreach ($users as $key => $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="meeting_start_time_${meetingCount}_1">Meeting Start Time</label>
                        <input type="time" name="meeting_start_time_${meetingCount}[]" class="form-control" placeholder="Enter Start Time">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="meeting_end_time_${meetingCount}_1">Meeting End Time</label>
                        <input type="time" name="meeting_end_time_${meetingCount}[]" class="form-control" placeholder="Enter End Time">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="meeting_description_${meetingCount}_1">Description</label>
                        <input type="text" name="meeting_description_${meetingCount}[]" class="form-control" placeholder="Enter Description">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="meeting_dress_code_${meetingCount}_1">Meeting Dress Code</label>
                        <input type="text" name="meeting_dress_code_${meetingCount}[]" class="form-control" placeholder="Enter Dress Code">
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="location_title_${meetingCount}_1">Location Title</label>
                        <input type="text" name="location_title_${meetingCount}[]"
                            class="form-control" placeholder="Enter Location Title">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="meeting_latitude_${meetingCount}_1">Latitude</label>
                        <input type="text" name="meeting_latitude_${meetingCount}[]"
                            class="form-control" placeholder="Enter Latitude">
                    </div>
                </div>
                
            </div>
            <div class="row">
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="meeting_longitude_${meetingCount}_1">Longitude</label>
                        <input type="text" name="meeting_longitude_${meetingCount}[]"
                            class="form-control" placeholder="Enter Longitude">
                    </div>
                </div>
            </div>
            

            <div class="row">
                <div class="col-md-6">
                    <h5>Meeting Missions</h5>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" onClick="addMission(${meetingCount}, 1)">Add Mission</button>
                </div>
            </div>

            <!-- Mission Details -->
            <div class="mission-details" id="mission_details_${meetingCount}_1">
                <div class="row" id="mission_detail_${meetingCount}_1_1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="meeting_mission_${meetingCount}_1">Meeting Mission</label>
                            <input type="text" name="meeting_mission_${meetingCount}_1[]" class="form-control" placeholder="Enter Mission">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="meeting_mission_member_id_${meetingCount}_1">Persons</label>
                            <select class="form-control" name="mission_member_id_${meetingCount}_1_1[]" multiple="multiple">
                                <option value="">Select Members</option>
                                @foreach ($users as $key => $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mission_description_${meetingCount}_1">Mission Description</label>
                            <input type="text" name="mission_description_${meetingCount}_1[]" class="form-control" placeholder="Enter Mission Description">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="missionDueDate_${meetingCount}_1">Mission Due Date</label>
                            <input type="date" name="mission_due_date_${meetingCount}_1[]" class="form-control"
                                id="missionDueDate" placeholder="Select Due Date">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" onClick="addMissionFile(${meetingCount},1,1)">Add File</button>
                            
                        </div>
                    </div>
                    <div class="mission_file_${meetingCount}_1_1" id="mission_file_${meetingCount}_1_1">
                        <div class="col-md-6">
                        <div class="form-group">
                            
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mission_file_title">Mission File Title</label>
                            <input type="text" name="mission_file_title_${meetingCount}_1_1[]" class="form-control"
                                id="mission_file_title" placeholder="Enter File Title">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="missionFile">Mission File</label>
                            <input type="file" name="mission_file_${meetingCount}_1_1[]" class="form-control"
                                id="missionFile" placeholder="Select Mission File">
                        </div>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div> <!-- End of Meeting Details Section -->

        <!-- Remove Meeting button -->
        <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-danger" onClick="removeMeeting(${meetingCount})">Remove Meeting</button>
            </div>
        </div>
    </div>
    `;

            document.getElementById('meetingFields').insertAdjacentHTML('beforeend', meetingHtml);
        }


        // Function to add Meeting Details
        function addMeetingDetails(meetingId) {
            detailCounts[meetingId]++;
            missionCounts[meetingId][detailCounts[meetingId]] = 1;
            // console.log(missionCounts[meetingId][detailCounts[meetingId]]);
            let detailHtml = `
    <div class="row" id="meeting_detail_${meetingId}_${detailCounts[meetingId]}">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-danger" onClick="removeMeetingDetail(${meetingId}, ${detailCounts[meetingId]})" ${detailCounts[meetingId] === 1 ? 'disabled' : ''}>Remove Detail</button>
            </div>    
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="meeting_title_${meetingId}_${detailCounts[meetingId]}">Meeting Title</label>
                <input type="text" name="meeting_title_${meetingId}[]" class="form-control" placeholder="Enter Meeting Title">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="room_member_id_${meetingId}_${detailCounts[meetingId]}">Persons</label>
                <select class="form-control" name="meeting_member_id_${meetingId}_${detailCounts[meetingId]}[]" multiple="multiple">
                    <option value="">Select Members</option>
                    @foreach ($users as $key => $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="meeting_start_time_${meetingId}_${detailCounts[meetingId]}">Meeting Start Time</label>
                <input type="time" name="meeting_start_time_${meetingId}[]" class="form-control" placeholder="Enter Start Time">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="meeting_end_time_${meetingId}_${detailCounts[meetingId]}">Meeting End Time</label>
                <input type="time" name="meeting_end_time_${meetingId}[]" class="form-control" placeholder="Enter End Time">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="meeting_description_${meetingId}_${detailCounts[meetingId]}">Description</label>
                <input type="text" name="meeting_description_${meetingId}[]" class="form-control" placeholder="Enter Description">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="meeting_dress_code_${meetingId}_${detailCounts[meetingId]}">Meeting Dress Code</label>
                <input type="text" name="meeting_dress_code_${meetingId}[]" class="form-control" placeholder="Enter Dress Code">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="location_title_${meetingId}_${detailCounts[meetingId]}">Location Title</label>
                <input type="text" name="location_title_${meetingId}[]"
                    class="form-control" placeholder="Enter Location Title">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="meeting_latitude_${meetingId}_${detailCounts[meetingId]}">Latitude</label>
                <input type="text" name="meeting_latitude_${meetingId}[]"
                    class="form-control" placeholder="Enter Latitude">
            </div>
        </div>
        
    </div>
    <div class="row">
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="meeting_longitude_${meetingId}_${detailCounts[meetingId]}">Longitude</label>
                <input type="text" name="meeting_longitude_${meetingId}[]"
                    class="form-control" placeholder="Enter Longitude">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h5>Meeting Missions</h5>
        </div>
        <div class="col-md-6">
            <button type="button" class="btn btn-primary" onClick="addMission(${meetingId}, ${detailCounts[meetingId]})">Add Mission</button>
        </div>
    </div>

    <div class="mission-details" id="mission_details_${meetingId}_${detailCounts[meetingId]}">
        <div class="row" id="mission_detail_${meetingId}_${detailCounts[meetingId]}_1">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meeting_mission_${meetingId}_${detailCounts[meetingId]}">Meeting Mission</label>
                    <input type="text" name="meeting_mission_${meetingId}_${detailCounts[meetingId]}[]" class="form-control" placeholder="Enter Mission">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meeting_mission_member_id_${meetingId}_${detailCounts[meetingId]}">Persons</label>
                    <select class="form-control" name="mission_member_id_${meetingId}_${detailCounts[meetingId]}_1[]" multiple="multiple">
                        <option value="">Select Members</option>
                        @foreach ($users as $key => $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mission_description_${meetingId}_${detailCounts[meetingId]}_1">Mission Description</label>
                    <input type="text" name="mission_description_${meetingId}_${detailCounts[meetingId]}[]" class="form-control" placeholder="Enter Mission Description">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="missionDueDate_${meetingId}_${detailCounts[meetingId]}">Mission Due Date</label>
                    <input type="date" name="mission_due_date_${meetingId}_${detailCounts[meetingId]}[]" class="form-control"
                        id="missionDueDate" placeholder="Select Due Date">
                </div>
            </div>
        <div class="col-md-6">
            <div class="form-group">
                <button type="button" class="btn btn-primary" onClick="addMissionFile(${meetingCount},${detailCounts[meetingId]},1)">Add File</button>
                
            </div>
        </div>
        <div class="mission_file_${meetingId}_${detailCounts[meetingId]}_1" id="mission_file_${meetingId}_${detailCounts[meetingId]}_1">
            <div class="col-md-6">
                <div class="form-group">
                    
                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mission_file_title">Mission File Title</label>
                    <input type="text" name="mission_file_title_${meetingId}_${detailCounts[meetingId]}_1[]" class="form-control"
                        id="mission_file_title" placeholder="Enter File Title">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="missionFile">Mission File</label>
                    <input type="file" name="mission_file_${meetingId}_${detailCounts[meetingId]}_1[]" class="form-control"
                        id="missionFile" placeholder="Select Mission File">
                </div>
            </div>
        </div>
        
        </div>
    </div>
    `;

            document.getElementById(`meeting_details_${meetingId}`).insertAdjacentHTML('beforeend', detailHtml);
        }

        function removeMeetingDetail(meetingId, detailId) {
            const detailRow = document.getElementById(`meeting_detail_${meetingId}_${detailId}`);
            if (detailRow) {
                detailRow.remove();
            }
        }

        let missionFileCounts = {};



        function addMissionFile(meetingId, detailId, missionId) {
            if (!missionFileCounts[meetingId]) {
                missionFileCounts[meetingId] = {};
            }
            if (!missionFileCounts[meetingId][detailId]) {
                missionFileCounts[meetingId][detailId] = {};
            }
            if (!missionFileCounts[meetingId][detailId][missionId]) {
                missionFileCounts[meetingId][detailId][missionId] = 1;
            }

            missionFileCounts[meetingId][detailId][missionId]++;

            console.log(missionFileCounts[meetingId][detailId][missionId]);

            let missionFileHtml = `
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mission_file_title_${meetingId}_${detailId}_${missionId}_${missionFileCounts[meetingId][detailId][missionId]}">Mission File Title</label>
                    <input type="text" name="mission_file_title_${meetingId}_${detailId}_${missionId}[]" class="form-control"
                        id="mission_file_title_${meetingId}_${detailId}_${missionId}_${missionFileCounts[meetingId][detailId][missionId]}" placeholder="Enter File Title">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="missionFile_${meetingId}_${detailId}_${missionId}_${missionFileCounts[meetingId][detailId][missionId]}">Mission File</label>
                    <input type="file" name="mission_file_${meetingId}_${detailId}_${missionId}[]" class="form-control"
                        id="missionFile_${meetingId}_${detailId}_${missionId}_${missionFileCounts[meetingId][detailId][missionId]}" placeholder="Select Mission File">
                </div>
            </div>
            `;

            document.getElementById(`mission_file_${meetingId}_${detailId}_${missionId}`).insertAdjacentHTML('beforeend',
                missionFileHtml);
        }

        // Function to add a Mission to a Meeting Detail
        function addMission(meetingId, detailId) {
            missionCounts[meetingId][detailId]++;

            let missionHtml = `
    <div class="row" id="mission_detail_${meetingId}_${detailId}_${missionCounts[meetingId][detailId]}">
        <div class="row">
            
            <div class="col-md-6">
                <button type="button" class="btn btn-danger" onClick="removeMission(${meetingId}, ${detailId}, ${missionCounts[meetingId][detailId]})">Remove Mission</button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="meeting_mission_${meetingId}_${detailId}">Meeting Mission</label>
                <input type="text" name="meeting_mission_${meetingId}_${detailId}[]" class="form-control" placeholder="Enter Mission">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="meeting_mission_member_id_${meetingId}_${detailId}">Persons</label>
                <select class="form-control" name="mission_member_id_${meetingId}_${detailId}_${missionCounts[meetingId][detailId]}[]" multiple="multiple">
                    <option value="">Select Members</option>
                    @foreach ($users as $key => $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="mission_description_${meetingId}_${detailId}">Mission Description</label>
                <input type="text" name="mission_description_${meetingId}_${detailId}[]" class="form-control" placeholder="Enter Mission Description">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="missionDueDate_${meetingId}_${detailId}">Mission Due Date</label>
                <input type="date" name="mission_due_date_${meetingId}_${detailId}[]" class="form-control"
                    id="missionDueDate" placeholder="Select Due Date">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <button type="button" class="btn btn-primary" onClick="addMissionFile(${meetingCount},${detailCounts[meetingId]},${missionCounts[meetingId][detailId]})">Add File</button>
                
            </div>
        </div>
        <div class="mission_file_${meetingId}_${detailId}_${missionCounts[meetingId][detailId]}" id="mission_file_${meetingId}_${detailId}_${missionCounts[meetingId][detailId]}">
            <div class="col-md-6">
            <div class="form-group">
                
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="mission_file_title">Mission File Title</label>
                <input type="text" name="mission_file_title_${meetingId}_${detailId}_${missionCounts[meetingId][detailId]}[]" class="form-control"
                    id="mission_file_title" placeholder="Enter File Title">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="missionFile">Mission File</label>
                <input type="file" name="mission_file_${meetingId}_${detailId}_${missionCounts[meetingId][detailId]}[]" class="form-control"
                    id="missionFile" placeholder="Select Mission File">
            </div>
        </div>
            </div>
        

        
    </div>
    `;

            document.getElementById(`mission_details_${meetingId}_${detailId}`).insertAdjacentHTML('beforeend',
                missionHtml);
        }

        // Function to generate the HTML for a Meeting Detail
        function generateMeetingDetail(meetingId, detailId) {
            return `
    <div class="row" id="meeting_detail_${meetingId}_${detailId}">
        <div class="col-md-6">
            <div class="form-group">
                <label for="meeting_title_${meetingId}_${detailId}">Meeting Title</label>
                <input type="text" name="meeting_title[]" class="form-control" placeholder="Enter Meeting Title">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="room_member_id_${meetingId}_${detailId}">Persons</label>
                <select class="form-control" name="meeting_member_id_${meetingId}_${detailId}[]" multiple="multiple">
                    <option value="">Select Members</option>
                    @foreach ($users as $key => $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="meeting_start_time_${meetingId}_${detailId}">Meeting Start Time</label>
                <input type="time" name="meeting_start_time[]" class="form-control" placeholder="Enter Start Time">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="meeting_end_time_${meetingId}_${detailId}">Meeting End Time</label>
                <input type="time" name="meeting_end_time[]" class="form-control" placeholder="Enter End Time">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="meeting_description_${meetingId}_${detailId}">Description</label>
                <input type="text" name="meeting_description[]" class="form-control" placeholder="Enter Description">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="meeting_dress_code_${meetingId}_${detailId}">Meeting Dress Code</label>
                <input type="text" name="meeting_dress_code[]" class="form-control" placeholder="Enter Dress Code">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="location_title_${meetingId}_${detailId}">Location Title</label>
                <input type="text" name="location_title_${meetingId}[]"
                    class="form-control" placeholder="Enter Location Title">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="meeting_latitude_${meetingId}_${detailId}">Latitude</label>
                <input type="text" name="meeting_latitude_${meetingId}[]"
                    class="form-control" placeholder="Enter Latitude">
            </div>
        </div>
        
    </div>
    <div class="row">
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="meeting_longitude_${meetingId}_${detailId}">Longitude</label>
                <input type="text" name="meeting_longitude_${meetingId}[]"
                    class="form-control" placeholder="Enter Longitude">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <h5>Meeting Missions</h5>
        </div>
        <div class="col-md-6">
            <button type="button" class="btn btn-primary" onClick="addMission(${meetingId}, ${detailId})">Add Mission</button>
        </div>
    </div>

    <div class="mission-details" id="mission_details_${meetingId}_${detailId}">
        <!-- First Mission -->
        <div class="row" id="mission_detail_${meetingId}_${detailId}_1">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meeting_mission_${meetingId}_${detailId}_1">Meeting Mission</label>
                    <input type="text" name="meeting_mission_${meetingId}_${detailId}[]" class="form-control" placeholder="Enter Mission">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meeting_mission_member_id_${meetingId}_${detailId}_1">Persons</label>
                    <select class="form-control" name="mission_member_id_${meetingId}_${detailId}_1[]" multiple="multiple">
                        <option value="">Select Members</option>
                        @foreach ($users as $key => $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mission_description_${meetingId}_${detailId}_1">Meeting Description</label>
                    <input type="text" name="mission_description_${meetingId}_${detailId}[]" class="form-control" placeholder="Enter Mission Description">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="missionDueDate_${meetingId}_${detailId}">Mission Due Date</label>
                    <input type="date" name="mission_due_date_${meetingId}_${detailId}[]" class="form-control"
                        id="missionDueDate" placeholder="Select Due Date">
                </div>
            </div>

            <!-- Remove Mission Button -->
            <div class="col-md-6">
                <button type="button" class="btn btn-danger" onClick="removeMission(${meetingId}, ${detailId}, 1)">Remove Mission</button>
            </div>
        </div>
    </div>

    <!-- Remove Meeting Detail Button -->
    <div class="row">
        <div class="col-md-6">
            <button type="button" class="btn btn-danger" onClick="removeMeetingDetail(${meetingId}, ${detailId})">Remove Detail</button>
        </div>
    </div>
    `;
        }

        // Remove Meeting Function
        function removeMeeting(meetingId) {
            if (meetingCount > 1) {
                document.getElementById(`meeting_row_${meetingId}`).remove();
                delete detailCounts[meetingId];
                delete missionCounts[meetingId];
                meetingCount--;
            }
        }

        // Remove Meeting Detail Function
        function removeMeetingDetail(meetingId, detailId) {
            if (detailCounts[meetingId] > 1) {
                document.getElementById(`meeting_detail_${meetingId}_${detailId}`).remove();
                delete missionCounts[meetingId][detailId];
                detailCounts[meetingId]--;
            }
        }

        // Remove Mission Function
        function removeMission(meetingId, detailId, missionId) {
            if (missionCounts[meetingId][detailId] > 1) {
                document.getElementById(`mission_detail_${meetingId}_${detailId}_${missionId}`).remove();
                missionCounts[meetingId][detailId]--;
            }
        }
    </script>
@endsection
