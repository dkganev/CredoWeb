<div class="modal-body">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-4 text-right">
                <label><sup><i class="fa fa-asterisk" style="font-size: 10px; "></i></sup>First Name:</label>
            </div>
            <div class="col-sm-4">
                <input class="form-control" type="text" name="first_name" placeholder="First Name" value="">
            </div>    
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-4 text-right">
                <label><sup><i class="fa fa-asterisk" style="font-size: 10px; "></i></sup>Last Name:</label>
            </div>
            <div class="col-sm-4">
                <input class="form-control" type="text" name="last_name" placeholder="Last Name" value="">
            </div>    
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-4 text-right">
                <label><sup><i class="fa fa-asterisk" style="font-size: 10px; "></i></sup>Email:</label>
            </div>
            <div class="col-sm-4">
                <input class="form-control" type="email" name="email" placeholder="Email" value="">
            </div>    
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-4 text-right">
                <label><sup><i class="fa fa-asterisk" style="font-size: 10px; "></i></sup>Type:</label>
            </div>
            <div class="col-sm-4">
                <select class="form-control" name='type' onchange="" value="">
                    <option value=""></option>
                    @foreach ($dataTypes as $dataType)
                        <option value="{{$dataType['ID']}}" >{{$dataType['name']}}</option>
                    @endforeach    
                </select>
            </div>    
        </div>
    </div>
    <div class="form-group" name='hospital' id='hospital' style="display: none;">
        <div class="row">
            <div class="col-sm-4 text-right">
                <label>Hospital:</label>
            </div>
            <div class="col-sm-4">
                <select class="form-control" name='workplace_id' onchange="" value="" >
                    <option value=""></option>
                    @foreach ($dataHospitals as $dataHospital)
                        <option value="{{$dataHospital['ID']}}" >{{$dataHospital['name']}}</option>
                    @endforeach    
                </select></div>    
        </div>
    </div>
   
</div>