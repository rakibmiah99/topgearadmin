<div class="modal" id="delete-modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="width: 450px;">

            <div class="modal-body text-center">
                <h3 class=" mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once delete, you can't get it back.</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button"  class="btn shadow-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="confirmDelete" class="btn shadow-sm btn-danger" >Delete</button>
                    <button class="btn d-none shadow-sm  btn-danger" disabled>
                        <span class="spinner-border spinner-border-sm"></span> Processing...
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    //delete data
    $('#delete-modal').on('click','#confirmDelete', function (){
        let id = $(this).attr('data-id');
        let thisBtn = $(this);
        LoadingButton(thisBtn);
        axios.post('/ProductDetails/Delete', {
            id: id,
        }).then(function (response) {
           if(response.status === 200){
               RemoveLoadingButton(thisBtn);
               if(response.data == 1){
                   $('#delete-modal').modal('hide');
                   SuccessToast("Deleted Successful.")
                   CreateTableList();
               }else{
                   ErrorToast("Deleted Failed.");
               }
           }else{
               ErrorToast("Something Went Wrong. Please Try Again.");
           }
        }).catch(function (error) {
            RemoveLoadingButton(thisBtn);
            ErrorToast("Something Went Wrong. Please Try Again.");
        });
    });
</script>
