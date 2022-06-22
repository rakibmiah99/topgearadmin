<div class="modal animated zoomIn" id="ChangeStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="ChangeStatusForm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input readonly required="" type="text" class="form-control" id="StatusID">
                <label>Service status</label>
                <select required="" id="Status" class="form-control form-select">
                    <option value="">Select Status</option>
                    <option value="processing">Processing</option>
                    <option value="accepted">Accepted</option>
                    <option value="completed">Completed</option>
                    <option value="canceled">Canceled</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="StatusSave" type="submit" class="btn btn-primary">Change</button>
            </div>
        </div>
    </div>
    </form>
</div>

<script>
    $("#ChangeStatusForm").on('submit',function (e) {
        e.preventDefault();
        let StatusID=$("#StatusID")
        let Status=$("#Status")
        let thisBtn = $("#StatusSave");
        LoadingButton(thisBtn);
        axios.post("/ServiceRequest/UpdateStatus",{id:StatusID.val(),status:Status.val()}).then((res)=>{
           RemoveLoadingButton(thisBtn);
            if(res.status===200){
                StatusID.val("");
                Status.val("")
                SuccessToast("Request completed")
               $('#ChangeStatus').modal('hide')
                CreateTableList();
            }
            else{
                $('#ChangeStatus').modal('hide')
                ErrorToast("Something Went Wrong")
            }
        }).catch((err)=>{
            RemoveLoadingButton(thisBtn);
            $('#ChangeStatus').modal('hide')
            ErrorToast("Something Went Wrong")
        })
    })
</script>
