<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="updateData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Setting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
{{--                    Modal Loader--}}
                    <div class="text-center mt-5 d-none mb-5" id="modal-loader">
                        <div class="spinner-border text-muted"></div>
                    </div>

{{--                    Modal Content--}}
                    <div class="container">
                        <div class="row">
                            <input id="data-id" type="hidden">
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
                    <button  id="updateDataBtn" type="submit" class="btn btn-success" >Save Change</button>
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
    $('#updateData').submit(function (e){
        e.preventDefault();
        let thisBtn = $("#updateDataBtn");
        let id = $('#update-modal #data-id');
        let sslApiToken = $('#update-modal #sslApiToken');
        let sslSmsId = $('#update-modal #sslSmsId');
        let sslDomain = $('#update-modal #sslDomain');
        LoadingButton(thisBtn);
        axios.post('/Settings/Update', {
            id: id.val(),
            sslApiToken: sslApiToken.val(),
            sslSmsId: sslSmsId.val(),
            sslDomain: sslDomain.val()
        }).then(function (response) {
            if(response.status === 200){
                let data = response.data;
                RemoveLoadingButton(thisBtn);
                if(data === 1){
                    SuccessToast("Request Successful")
                    $( "#update-modal" ).modal( "hide" );
                    id.val('');
                    sslApiToken.val('');
                    sslSmsId.val('');
                    sslDomain.val('');
                    CreateTableList();

                }else{
                    ErrorToast("Request Fail ! Try Again")
                }
            }else {
                ErrorToast("Something Went Wrong. Please Try Again.")
            }
        }).catch(function (error) {
            ErrorToast("Something Went Wrong. Please Try Again.")
        });

    });
</script>
