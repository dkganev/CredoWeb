$(function() {
    $('#table').bootstrapTable()
});

function selectHospital(){
        selectedType = $("#addModal select[name='type'] option:selected" ).val();
        if (selectedType == 2) {
            $( "#addModal div[name='hospital" ).show();
        }
        else{
            
            $( "#addModal div[name='hospital" ).hide();
        }
        
        selectedType = $( "#editModal select[name='type'] option:selected" ).val();
        if (selectedType == 2) {
            $( "#editModal div[name='hospital" ).show();
        }
        else{
            
            $( "#editModal div[name='hospital" ).hide();
        }
        
        
    
    
}


$(document).ready(function(){
    $("#addBtn").click(function(){
        $("#addModal").modal();
    });
  
    $("select[name='type']").change(function(){
        selectHospital();
    });
});

//CredoWeb Users
function addUser() {
    var formData = $('form[name="add"]').serializeArray();
    postData = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        formData: formData,
    } 
    
    $.ajax({
        url: "/addUser",
        type:"POST",
	dataType: 'JSON',
        data:postData,
        success:function(response){
            if(response.success == 1) {
                window.open('/users',"_self");
            }
            else{
                alert(response.error);
            }
        },
	error:function(response){
            //console.log('error',response);
            if(response) {
            }
        },
    });
}

function openViewUserForm(userID) {
    
    postData = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        userID: userID,
    } 
    $.ajax({
        url: "/openViewUserForm",
        type:"POST",
	dataType: 'JSON',
        data:postData,
        success:function(response){
            //console.log(response.requestData);
            if(response.success == 1) {
                $("#viewModal").modal();
                data = response.requestData
                $( "#viewModal input[name='first_name']" ).val(data.first_name);
                $( "#viewModal input[name='first_name']" ).attr('readonly', true);
                $( "#viewModal input[name='last_name']" ).val(data.last_name);
                $( "#viewModal input[name='last_name']" ).attr('readonly', true);
                $( "#viewModal input[name='email']" ).val(data.email);
                $( "#viewModal input[name='email']" ).attr('readonly', true);
                $( "#viewModal select[name='type']" ).val(data.type);
                if (data.type == 2) {
                    $( "#viewModal div[name='hospital" ).show();
                }
                else{
                    $( "#viewModal div[name='hospital" ).hide();
                }
                $( "#viewModal select[name='type']" ).attr('readonly', true);
                $( "#viewModal select[name='type']" ).prop("disabled", true);
                $( "#viewModal select[name='workplace_id']" ).val(data.workplace_id);
                $( "#viewModal select[name='workplace_id']" ).attr('readonly', true);
                $( "#viewModal select[name='workplace_id']" ).prop("disabled", true);
            }
            else{
                //alert(response.error);
            }
        },
	error:function(response){
            console.log('error',response);
            if(response) {
            }
        },
    });
}

function openEditUserForm(userID) {
    
    postData = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        userID: userID,
    } 
    $.ajax({
        url: "/openEditUserForm",
        type:"POST",
	dataType: 'JSON',
        data:postData,
        success:function(response){
            //console.log(response.requestData);
            if(response.success == 1) {
                $("#editModal").modal();
                $("#userID").val(userID);
                data = response.requestData
                $( "#editModal input[name='first_name']" ).val(data.first_name);
                $( "#editModal input[name='last_name']" ).val(data.last_name);
                $( "#editModal input[name='email']" ).val(data.email);
                $( "#editModal select[name='type']" ).val(data.type);
                if (data.type == 2) {
                    $( "#editModal div[name='hospital" ).show();
                }
                else{
                    $( "#editModal div[name='hospital" ).hide();
                }
                $( "#editModal select[name='workplace_id']" ).val(data.workplace_id);
            }
            else{
                //alert(response.error);
            }
        },
	error:function(response){
            console.log('error',response);
            if(response) {
            }
        },
    });
}

function editUser() {
    var formData = $('form[name="edit"]').serializeArray();
    postData = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        userID: $("#userID").val(),
        formData: formData,
    } 
    
    $.ajax({
        url: "/editUser",
        type:"POST",
	dataType: 'JSON',
        data:postData,
        success:function(response){
            if(response.success == 1) {
                window.open('/users',"_self");
            }
            else{
                alert(response.error);
            }
        },
	error:function(response){
            //console.log('error',response);
            if(response) {
            }
        },
    });
}

function deleteUser(userID) {
    postData = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        userID: userID,
    //    formData: formData,
    } 
    
    $.ajax({
        url: "/deleteUser",
        type:"POST",
	dataType: 'JSON',
        data:postData,
        success:function(response){
            if(response.success == 1) {
                window.open('/users',"_self");
            }
            else{
                alert(response.error);
            }
        },
	error:function(response){
            //console.log('error',response);
            if(response) {
            }
        },
    });
}

//CredoWeb Hospitals
function addHospitals() {
    var formData = $('form[name="add"]').serializeArray();
    postData = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        formData: formData,
    } 
    
    $.ajax({
        url: "/addHospitals",
        type:"POST",
	dataType: 'JSON',
        data:postData,
        success:function(response){
            if(response.success == 1) {
                window.open('/hospitals',"_self");
            }
            else{
                alert(response.error);
            }
        },
	error:function(response){
            //console.log('error',response);
            if(response) {
            }
        },
    });
}

function openViewHospitalForm(hospitalID) {
    
    postData = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        hospitalID: hospitalID,
    } 
    $.ajax({
        url: "/openViewHospitalsForm",
        type:"POST",
	dataType: 'JSON',
        data:postData,
        success:function(response){
            //console.log(response.requestData);
            if(response.success == 1) {
                $("#viewModal").modal();
                data = response.requestData
                $( "#viewModal input[name='name']" ).val(data.name);
                $( "#viewModal input[name='name']" ).attr('readonly', true);
                $( "#viewModal input[name='address']" ).val(data.address);
                $( "#viewModal input[name='address']" ).attr('readonly', true);
                $( "#viewModal input[name='phone']" ).val(data.phone);
                $( "#viewModal input[name='phone']" ).attr('readonly', true);
            }
            else{
                //alert(response.error);
            }
        },
	error:function(response){
            console.log('error',response);
            if(response) {
            }
        },
    });
}

function openEditHospitalForm(hospitalID) {
    
    postData = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        hospitalID: hospitalID,
    } 
    $.ajax({
        url: "/openEditHospitalsForm",
        type:"POST",
	dataType: 'JSON',
        data:postData,
        success:function(response){
            //console.log(response.requestData);
            if(response.success == 1) {
                $("#editModal").modal();
                $("#hospitalID").val(hospitalID);
                data = response.requestData
                $( "#editModal input[name='name']" ).val(data.name);
                $( "#editModal input[name='address']" ).val(data.address);
                $( "#editModal input[name='phone']" ).val(data.phone);
            }
            else{
                //alert(response.error);
            }
        },
	error:function(response){
            console.log('error',response);
            if(response) {
            }
        },
    });
}

function editHospital() {
    var formData = $('form[name="edit"]').serializeArray();
    postData = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        hospitalID: $("#hospitalID").val(),
        formData: formData,
    } 
    
    $.ajax({
        url: "/editHospital",
        type:"POST",
	dataType: 'JSON',
        data:postData,
        success:function(response){
            if(response.success == 1) {
                window.open('/hospitals',"_self");
            }
            else{
                alert(response.error);
            }
        },
	error:function(response){
            //console.log('error',response);
            if(response) {
            }
        },
    });
}

function deleteHospital(hospitalID) {
    postData = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        hospitalID: hospitalID,
    //    formData: formData,
    } 
    
    $.ajax({
        url: "/deleteHospital",
        type:"POST",
	dataType: 'JSON',
        data:postData,
        success:function(response){
            if(response.success == 1) {
                window.open('/hospitals',"_self");
            }
            else{
                alert(response.error);
            }
        },
	error:function(response){
            //console.log('error',response);
            if(response) {
            }
        },
    });
}


