<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form id="updateData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Order Status</h5>
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
                            <input type="hidden" id="data-id">
                            <div class="col-12 mt-3">
                                <label class="form-label">Order Status *</label>
                                <select required="" class="form-control form-select w-100" id="orderStatus">
                                    <option value="">Select Status</option>
                                    <option value="processing">processing</option>
                                    <option value="accepted">accepted</option>
                                    <option value="delivered">delivered</option>
                                    <option value="canceled">canceled</option>
                                </select>
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

        let thisBtn = $(this);
        let id = $('#update-modal #data-id');
        let orderStatus = $('#update-modal #orderStatus');
        LoadingButton(thisBtn);
        axios.post('/OrderRequest/UpdateOrderStatus', {
            id: id.val(),
            orderStatus: orderStatus.val(),
        }).then(function (response) {
            if(response.status === 200){
                let data = response.data;
                RemoveLoadingButton(thisBtn);
                if(data === 1){
                    SuccessToast("Request Successful.");
                    $('#update-modal').modal('hide');
                    orderStatus.val('');
                    CreateTableList();
                }else{
                    ErrorToast("Request Failed.");
                }
            }
        }).catch(function (error) {
            ErrorToast("Request Failed.");
        });
        e.preventDefault();
    });
</script>
