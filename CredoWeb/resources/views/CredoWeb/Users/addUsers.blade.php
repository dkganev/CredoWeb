<!-- The Modal -->
<div class="modal" id="addModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form name="add">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                <!-- Modal body -->
                @include('CredoWeb.Users.modalUsers', ['dataTypes' => $dataTypes, 'dataHospitals' => $dataHospitals])
        
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" onclick='addUser()' class="btn btn-info" data-dismiss="save">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>