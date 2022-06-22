<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="updateData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Car Brand</h5>
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
                                <label class="form-label">Car Brand Name *</label>
                                <input type="text" class="form-control" required="" id="carBrandName">
                            </div>
                            <div class="col-12 mt-3">
                                <label class="form-label">Car Brand ID *</label>
                                <input type="text" class="form-control" required="" id="carBrandId">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button  id="updateDataBtn" type="submit" class="btn btn-success" >Save</button>
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
        let carBrandName = $('#update-modal #carBrandName');
        let carBrandId = $('#update-modal #carBrandId');


        LoadingButton(thisBtn);
        axios.post('/CarBrand/Update', {
            id: id.val(),
            carBrandName: carBrandName.val(),
            carBrandId: carBrandId.val()
        }).then(function (response) {
            if(response.status === 200){
                let data = response.data;
                RemoveLoadingButton(thisBtn);
                if(data === 1){
                    SuccessToast("Request Successful")
                    $( "#update-modal" ).modal( "hide" );
                    id.val('');
                    carBrandId.val('');
                    carBrandName.val('');
                    CreateTableList();

                }else{
                    ErrorToast("Request Failed.")
                }
            }else {
                ErrorToast("Something Went Wrong. Please Try Again.")
            }
        }).catch(function (error) {
            ErrorToast("Something Went Wrong. Please Try Again.")
        });

    });
</script>
