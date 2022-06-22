<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="updateData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Product Category</h5>
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
                            <div class="col-6 mt-3">
                                <label class="form-label">Category Name *</label>
                                <input required="" type="text" id="catName" class="form-control" >
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">Category Id *</label>
                                <input  required="" type="text" class="form-control" id="catId">
                            </div>
                            <div class="col-12 mt-3">
                                <label class="form-label">Category Image *</label>
                                <input required="" type="text" class="form-control" id="catImage" >
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
        let catName = $('#update-modal #catName');
        let catId = $('#update-modal #catId');
        let catImage = $('#update-modal #catImage');


        LoadingButton(thisBtn);
        axios.post('/ProductCategories/Update', {
            id: id.val(),
            catName: catName.val(),
            catId: catId.val(),
            catImage: catImage.val(),
        }).then(function (response) {
            if(response.status === 200){
                let data = response.data;
                RemoveLoadingButton(thisBtn);
                if(data === 1){
                    SuccessToast("Registered Successful.")
                    $( "#update-modal" ).modal( "hide" );
                    id.val('');
                    catName.val('');
                    catId.val('');
                    catImage.val('');
                    CreateTableList();

                }else{
                    ErrorToast("Registered Failed.")
                }
            }else {
                ErrorToast("Something Went Wrong. Please Try Again.")
            }
        }).catch(function (error) {
            ErrorToast("Something Went Wrong. Please Try Again.")
        });



    });
</script>
