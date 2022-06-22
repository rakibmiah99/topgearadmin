<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="updateData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Testimonial</h5>
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
                            <div class="col-7 mt-3">
                                <label class="form-label">Customer Name *</label>
                                <input class="form-control" type="text" id="customerName" required="">
                            </div>
                            <div class="col-5 mt-3">
                                <label class="form-label">Score *</label>
                                <input class="form-control" type="text" id="score" required="">
                            </div>
                            <div class="col-12 mt-3">
                                <label class="form-label">Image Link *</label>
                                <input class="form-control" type="text" id="ImageLink" required="">
                            </div>
                            <div class="col-12 mt-3">
                                <label class="form-label">Comment *</label>
                                <textarea required="" rows="4" class="form-control" id="comment" ></textarea>
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
        let thisBtn = $(this);
        let id = $('#data-id');
        let customerName = $('#update-modal #customerName');
        let score = $('#update-modal #score');
        let comment = $('#update-modal #comment');
        let ImageLink = $('#update-modal #ImageLink');

        LoadingButton(thisBtn);
        axios.post('/Testimonial/Update', {
            id: id.val(),
            customerName: customerName.val(),
            score: score.val(),
            comment: comment.val(),
            ImageLink: ImageLink.val(),
        }).then(function (response) {
            if(response.status === 200){
                let data = response.data;
                RemoveLoadingButton(thisBtn);
                if(data === 1){
                    SuccessToast("Registered Successful.")
                    $( "#update-modal" ).modal( "hide" );
                    id.val('');
                    customerName.val('');
                    score.val('');
                    comment.val('');
                    ImageLink.val('');
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
