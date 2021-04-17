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


