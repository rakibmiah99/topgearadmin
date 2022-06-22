<div data-bs-backdrop="static" class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="insertData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     <div class="container">
                         <div class="row">
                             <div class="col-12 mt-3">
                                 <label class="form-label">SMS API Token *</label>
                                 <input type="text" required="" id="sslApiToken" class="form-control">
                             </div>
                             <div class="col-12 mt-3">
                                 <label class="form-label">SMS API SID *</label>
                                 <input type="text" required="" id="sslSmsId" class="form-control">
                             </div>
                             <div class="col-12 mt-3">
                                 <label class="form-label">SMS API Domain *</label>
                                 <input type="text" required="" id="sslDomain" class="form-control">
                             </div>
                         </div>
                     </div>
                </div>
                <div class="modal-footer">
                    <button  id="insertDataBtn" type="submit" class="btn btn-success" >Save</button>
                    <button class="btn d-none  btn-success" disabled>
                        <span class="spinner-border spinner-border-sm"></span> Processing...
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



<script>
    //insert Data
    $('#insertData').submit(function (e){
        e.preventDefault();
        let thisBtn = $("#insertDataBtn");
        let sslApiToken = $('#create-modal #sslApiToken');
        let sslSmsId = $('#create-modal #sslSmsId');
        let sslDomain = $('#create-modal #sslDomain');
        LoadingButton(thisBtn);
        axios.post('/Settings/Insert', {
            sslApiToken: sslApiToken.val(),
            sslSmsId: sslSmsId.val(),
            sslDomain: sslDomain.val()
            }).then(function (response) {
                if(response.status === 200){
                    let data = response.data;
                    RemoveLoadingButton(thisBtn);
                    if(data === 1){
                        SuccessToast("Request Successful")
                        $("#create-modal" ).modal( "hide" );
                        sslApiToken.val('');
                        sslSmsId.val('');
                        sslDomain.val('');
                        CreateTableList();
                    }else{
                        ErrorToast("Request Fail ! Try Again");
                    }
                }else{
                    ErrorToast("Request Fail ! Try Again");
                }
            }).catch(function (error) {
            ErrorToast("Request Fail ! Try Again");
        });
    });
</script>
