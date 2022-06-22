<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="insertData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     <div class="container">
                         <div class="row">
                             <div class="col-6 mt-3">
                                 <label class="form-label">Category Name *</label>
                                 <input pattern="[A-Za-z]{2,}" title="Invalid Name" required="" type="text" id="catName" class="form-control" >
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
        let catName = $('#catName');
        let catId = $('#catId');
        let catImage = $('#catImage');

        LoadingButton(thisBtn);
        axios.post('/ProductCategories/Insert', {
                catName: catName.val(),
                catId: catId.val(),
                catImage: catImage.val(),
            }).then(function (response) {
                if(response.status === 200){
                    let data = response.data;
                    RemoveLoadingButton(thisBtn);
                    if(data === 1){
                        SuccessToast("Register Successful.")
                        $( "#create-modal" ).modal( "hide" );
                        catName.val('');
                        catId.val('');
                        catImage.val('');
                        CreateTableList();
                    }else{
                        ErrorToast("Register Failed.");
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
