<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="insertData">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Add Site Info</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     <div class="container">
                         <div class="row">
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
                                 <textarea required="" rows="3" class="form-control" id="siteDetails" ></textarea>
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

    editor($('#create-modal #siteDetails'))

    //insert Data
    $('#insertData').submit(function (e){
        let thisBtn = $("#insertDataBtn");
        let siteType = $('#create-modal #siteType');
        let siteDetails = $('#create-modal #siteDetails');

        LoadingButton(thisBtn);
        axios.post('/SiteInfo/Insert', {
                siteType: siteType.val(),
                siteDetails: siteDetails.val()
            }).then(function (response) {
                if(response.status === 200){
                    let data = response.data;
                    RemoveLoadingButton(thisBtn);
                    if(data === 1){
                        SuccessToast("Register Successful.")
                        $( "#create-modal" ).modal( "hide" );
                        siteType.val('');
                        siteDetails.summernote('code', '');
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
