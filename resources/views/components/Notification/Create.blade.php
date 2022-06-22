<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="insertData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Notification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     <div class="container">
                         <div class="row">
                             <div class="col-12 mt-3">
                                 <label class="form-label">Subject</label>
                                 <input type="text" class="form-control" required="" id="subject">
                             </div>
                             <div class="col-12 mt-3">
                                 <label class="form-label">Message</label>
                                 <input type="text" class="form-control" required="" id="msg">
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
        let subject = $('#create-modal #subject');
        let msg = $('#create-modal #msg');

        LoadingButton(thisBtn);
        axios.post('/Notification/Insert', {
            subject: subject.val(),
            msg: msg.val()})
            .then(function (response) {
                if(response.status === 200){
                    let data = response.data;
                    RemoveLoadingButton(thisBtn);
                    if(data === 1){
                        SuccessToast("Register Successful.")
                        $( "#create-modal" ).modal( "hide" );
                        subject.val('');
                        msg.val('');
                        CreateTableList();
                    }else{
                        ErrorToast("Request Fail ! Try Again");
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
