<!-- The Modal -->
<div class="modal" id="viewModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form name="edit">    
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">View Hospital</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                <!-- Modal body -->
                @include('CredoWeb.Hospitals.modalHospitals', [])
        
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>