<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="insertData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Gallery</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     <div class="container">
                         <div class="row">
                             <div class="col-12 mt-3">
                                 <label class="form-label">Title *</label>
                                 <input required="" type="text" id="title" class="form-control" >
                             </div>
                             <div class="col-12 mt-3">
                                 <label class="form-label">Short Description *</label>
                                 <input  required="" type="text" class="form-control" id="shortDes">
                             </div>
                             <div class="col-12 mt-3">
                                 <label class="form-label">Gallery Image *</label>
                                 <input required="" type="text" class="form-control" id="image" >
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
        let title = $('#create-modal #title');
        let shortDes = $('#create-modal #shortDes');
        let image = $('#create-modal #image');

        LoadingButton(thisBtn);

        axios.post('/Gallery/Insert', {
            title: title.val(),
            shortDes: shortDes.val(),
            image: image.val(),
            }).then(function (response) {
                if(response.status === 200){
                    let data = response.data;
                    RemoveLoadingButton(thisBtn);
                    if(data === 1){
                        SuccessToast("Register Successful.")
                        $( "#create-modal" ).modal( "hide" );
                        title.val('');
                        shortDes.val('');
                        image.val('');
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
