<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="insertData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Car Brand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     <div class="container">
                         <div class="row">
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
        let thisBtn = $("#insertDataBtn");
        let carBrandName = $('#create-modal #carBrandName');
        let carBrandId = $('#create-modal #carBrandId');

        LoadingButton(thisBtn);
        axios.post('/CarBrand/Insert', {
            carBrandName: carBrandName.val(),
            carBrandId: carBrandId.val()
            }).then(function (response) {
                if(response.status === 200){
                    let data = response.data;
                    RemoveLoadingButton(thisBtn);
                    if(data === 1){
                        SuccessToast("Request Successful")
                        $( "#create-modal" ).modal( "hide" );
                        carBrandId.val('');
                        carBrandName.val('');
                        CreateTableList();
                    }else{
                        ErrorToast("Request Failed.");
                    }
                }else{
                    ErrorToast("Something Went Wrong. Please Try Again.");
                }
            }).catch(function (error) {
                ErrorToast("Something Went Wrong. Please Try Again.");
        });
        e.preventDefault();
    });
</script>
