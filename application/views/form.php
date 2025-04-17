<form action="<?= base_url("reservasi/insertData/");  ?>" id="form" method="POST">
    <div class="row">            
        <div class="form-group col-md-4">
            <label for="dob">Dob</label>
            <input type="date" class="form-control" name="dob" id="dob">
        </div>
        <div class="form-group col-md-4">
            <label for="date">Date</label>
            <input type="date" class="form-control" name="date" id="date">
        </div>
        <div class="form-group col-md-4">
            <label for="program_id">Nama Program</label>
            <select class="form-control" name="program_id" id="program_id">
                <option value="1">Liburan Tanah Lot</option>
            </select>
        </div>
    </div>
    <div class="row">            
        <div class="form-group col-md-4">
            <label for="pax">Pax</label>
            <input type="number" class="form-control" name="pax" id="pax">
        </div>
        <div class="form-group col-md-4">
            <label for="agent">Agent</label>
            <input type="text" class="form-control" name="agent" id="agent">
        </div>
        <div class="form-group col-md-4">
            <label for="tour_code">Tour Code</label>
            <input type="text" class="form-control" name="tour_code" id="tour_code">
        </div>
    </div>
    <div class="row">            
        <div class="form-group col-md-4">
            <label for="contact">Contact</label>
            <input type="text" class="form-control" name="contact" id="contact">
        </div>
        <div class="form-group col-md-4">
            <label for="activity">Activity</label>
            <input type="text" class="form-control" name="activity" id="activity">
        </div>
        <div class="form-group col-md-4">
            <label for="hotel">Hotel</label>
            <input type="text" class="form-control" name="hotel" id="hotel">
        </div>
    </div>
    <div class="row">            
        <div class="form-group col-md-4">
            <label for="flight_arrival_code">Flight Arrival Code</label>
            <input type="text" class="form-control" name="flight_arrival_code" id="flight_arrival_code">
        </div>
        <div class="form-group col-md-4">
            <label for="eta">Eta</label>
            <input type="time" class="form-control" name="eta" id="eta">
        </div>
        <div class="form-group col-md-4">
            <label for="flight_departure_code">Flight Departure Code</label>
            <input type="text" class="form-control" name="flight_departure_code" id="flight_departure_code">
        </div>
    </div>
    <div class="row">            
        <div class="form-group col-md-4">
            <label for="etd">Etd</label>
            <input type="time" class="form-control" name="etd" id="etd">
        </div>
        <div class="form-group col-md-4">
            <label for="pickup">Pickup</label>
            <input type="time" class="form-control" name="pickup" id="pickup">
        </div>
        <div class="form-group col-md-4">
            <label for="guide_id">Nama Guide</label>
            <select class="form-control" name="guide_id" id="guide_id">
                <option value="1">ASep</option>
            </select>
        </div>
    </div>
    <div class="row">           
        <div class="form-group col-md-4">
            <label for="transport_id">Nomor Kendaraan</label>
            <select class="form-control" name="transport_id" id="transport_id">
                <option value="7">DK 8131 WW</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="sopir_id">Nama Sopir</label>
            <select class="form-control" name="sopir_id" id="sopir_id">
                <option value="33">wawan</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="remarks">Remarks</label>
            <input type="text" class="form-control" name="remarks" id="remarks">
        </div>
    </div>
    <div class="row">           
       <div class="form-group col-md-4">
        <label for="bahasa_id">Bahasa</label>
        <select class="form-control" name="bahasa_id" id="bahasa_id">
            <option value="3">Rusia</option>
        </select>
    </div>
</div>    
<div class="mt-2">
    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
    <button type="reset" class="btn btn-danger waves-effect waves-light" id="btn_reset">Cancel</button>
</div>
</form>