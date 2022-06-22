<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="updateData">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Update Site Info</h6>
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
                                <label class="form-label">Site Info Type *</label>
                                <select required="" class="form-control form-select" id="siteType">
                                    <option value="">SELECT</option>
                                    <option value="Head-line">Headline</option>
                                    <option value="Sub-Head-line">Sub Headline</option>
                                    <option value="Contact-Phone-Number">Contact Phone Number</option>
                                    <option value="Contact-Address">Contact Address</option>
                                    <option value="Contact-Email">Contact Email</option>
                                    <option value="Privacy-Policy">Privacy Policy</option>
                                    <option value="Terms-Conditions">Terms & Conditions</option>
                                    <option value="Refund-Policy">Refund Policy</option>
                                    <option value="Short-About">Short About</option>
                                    <option value="Details-About">Details About</option>
                                </select>

                            </div>
                            <div class="col-12 mt-3">
                                <label class="form-label">Site Info Details *</label>
                                <textarea required="" rows="4" class="form-control" id="siteDetails" ></textarea>
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

    editor($('#update-modal #siteDetails'))


    $('#updateData').submit(function (e){

        e.preventDefault();
        let thisBtn = $("#updateDataBtn");
        let id = $('#update-modal #data-id');
        let siteType = $('#update-modal #siteType');
        let siteDetails = $('#update-modal #siteDetails');


        LoadingButton(thisBtn);
        axios.post('/SiteInfo/Update', {
            id: id.val(),
            siteType: siteType.val(),
            siteDetails: siteDetails.val()
        }).then(function (response) {
            if(response.status === 200){
                let data = response.data;
                RemoveLoadingButton(thisBtn);
                if(data === 1){
                    SuccessToast("Request Successful.");
                    $( "#update-modal" ).modal( "hide" );
                    id.val('');
                    siteType.val('');
                    siteDetails.val('');
                    CreateTableList();

                }else{
                    ErrorToast("Request fail ! try again")
                }
            }else {
                ErrorToast("Something Went Wrong. Please Try Again.")
            }
        }).catch(function (error) {
            ErrorToast("Something Went Wrong. Please Try Again.")
        });



    });
</script>
