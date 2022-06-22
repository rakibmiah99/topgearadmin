<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="updateData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Coupon</h5>
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
                                    <option value="percent">Percentage </option>
                                </select>
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">Coupon Value</label>
                                <input type="number" class="form-control" required="" id="couponValue">
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
        let id = $('#update-modal #data-id');
        let couponId = $('#update-modal #couponId');
        let couponName = $('#update-modal #couponName');
        let couponUnit = $('#update-modal #couponUnit');
        let couponValue = $('#update-modal #couponValue');


        LoadingButton(thisBtn);
        axios.post('/DetailsCoupon/Update', {
            id: id.val(),
            couponId: couponId.val(),
            couponName: couponName.val(),
            couponUnit: couponUnit.val(),
            couponValue: couponValue.val()
        }).then(function (response) {
            if(response.status === 200){
                let data = response.data;
                RemoveLoadingButton(thisBtn);
                if(data === 1){
                    SuccessToast("Registered Successful.")
                    $( "#update-modal" ).modal( "hide" );
                    id.val('');
                    couponId.val('');
                    couponName.val('');
                    couponUnit.val('');
                    couponValue.val('');
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
