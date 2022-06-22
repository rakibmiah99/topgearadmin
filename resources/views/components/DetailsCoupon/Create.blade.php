<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="insertData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Coupon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     <div class="container">
                         <div class="row">
                             <div class="col-6 mt-3">
                                 <label class="form-label">Coupon ID *</label>
                                 <input type="text" class="form-control" required="" id="couponId">
                             </div>
                             <div class="col-6 mt-3">
                                 <label class="form-label">Coupon Name *</label>
                                 <input type="text" class="form-control" required="" id="couponName">
                             </div>
                             <div class="col-6 mt-3">
                                 <label class="form-label">Coupon Unit *</label>
                                 <select class="form-control form-select" required="" id="couponUnit">
                                    <option value="">Select</option>
                                    <option value="flat">Flat</option>
                                    <option value="percent">Percentage</option>
                                 </select>
                             </div>
                             <div class="col-6 mt-3">
                                 <label class="form-label">Coupon Value *</label>
                                 <input type="number" class="form-control" required="" id="couponValue">
                             </div>
                         </div>
                     </div>
                </div>
                <div class="modal-footer">
                    <button  id="insertData" type="submit" class="btn btn-success" >Save</button>
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
        let thisBtn = $(this);
        let couponId = $('#create-modal #couponId');
        let couponName = $('#create-modal #couponName');
        let couponUnit = $('#create-modal #couponUnit');
        let couponValue = $('#create-modal #couponValue');

        LoadingButton(thisBtn);
        axios.post('/DetailsCoupon/Insert', {
            couponId: couponId.val(),
            couponName: couponName.val(),
            couponUnit: couponUnit.val(),
            couponValue: couponValue.val()
            }).then(function (response) {
                if(response.status === 200){
                    let data = response.data;
                    RemoveLoadingButton(thisBtn);
                    if(data === 1){
                        SuccessToast("Register Successful.")
                        $( "#create-modal" ).modal( "hide" );
                        couponId.val('');
                        couponName.val('');
                        couponUnit.val('');
                        couponValue.val('');
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
