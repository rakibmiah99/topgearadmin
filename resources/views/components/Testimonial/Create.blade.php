<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="insertData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     <div class="container">
                         <div class="row">
                             <div class="col-7 mt-3">
                                 <label class="form-label">Customer Name *</label>
                                 <input class="form-control" type="text" id="customerName" required="">
                             </div>
                             <div class="col-5 mt-3">
                                 <label class="form-label">Score *</label>
                                 <input class="form-control" min="1" max="5" type="number" id="score" required="">
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
        let customerName = $('#create-modal #customerName');
        let score = $('#create-modal #score');
        let comment = $('#create-modal #comment');
        let ImageLink = $('#create-modal #ImageLink');


        LoadingButton(thisBtn);
        axios.post('/Testimonial/Insert', {
            customerName: customerName.val(),
            score: score.val(),
            comment: comment.val(),
            ImageLink: ImageLink.val(),
            }).then(function (response) {
                if(response.status === 200){
                    let data = response.data;
                    RemoveLoadingButton(thisBtn);
                    if(data === 1){
                        SuccessToast("Request Successful")
                        $( "#create-modal" ).modal( "hide" );
                        customerName.val('');
                        score.val('');
                        comment.val('');
                        ImageLink.val('');
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
