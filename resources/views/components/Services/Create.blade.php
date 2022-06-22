<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="insertData">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             <div class="container">
                 <div class="row">
                     <div class="col-6 mt-2">
                         <label class="form-label">Service Name *</label>
                         <input  required="" type="text" id="serviceName" class="form-control" >
                     </div>
                     <div class="col-6 mt-2">
                         <label class="form-label">Service Price Range *</label>
                         <input  required="" type="text" class="form-control" id="priceRange">
                     </div>
                     <div class="col-4 mt-2">
                         <label class="form-label">Rating *</label>
                         <input required="" type="number" class="form-control" id="ratting" >
                     </div>
                     <div class="col-4 mt-2">
                         <label class="form-label">Discount Status *</label>
                         <select required="" class="form-control form-select" id="discountStatus">
                             <option value="">SELECT</option>
                             <option value="true">YES</option>
                             <option value="false">NO</option>
                         </select>
                     </div>
                     <div class="col-4 mt-2">
                         <label class="form-label">Discount Percentage *</label>
                         <input   required="" type="text" class="form-control" id="discountPercentage">
                     </div>
                     <div class="col-12 mt-2">
                         <label class="form-label">Image *</label>
                         <input   required="" type="text" class="form-control" id="image">
                     </div>
                     <div class="col-12 mt-2">
                         <label class="form-label">Short Description *</label>
                         <input   required="" type="text" class="form-control" id="shortDes">
                     </div>
                     <div class="col-12 mt-2">
                         <label class="form-label">Long Description *</label>
                         <textarea required="" rows="4" class="form-control" id="longDes" placeholder=""></textarea>
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
        let serviceName = $('#create-modal #serviceName');
        let priceRange = $('#create-modal #priceRange');
        let ratting = $('#create-modal #ratting');
        let discountStatus = $('#create-modal #discountStatus');
        let discountPercentage = $('#create-modal #discountPercentage');
        let image = $('#create-modal #image');
        let shortDes = $('#create-modal #shortDes');
        let longDes = $('#create-modal #longDes');
        LoadingButton(thisBtn);
        axios.post('/Services/Insert', {
                serviceName: serviceName.val(),
                priceRange: priceRange.val(),
                ratting: ratting.val(),
                discountStatus: discountStatus.val(),
                discountPercentage: discountPercentage.val(),
                image: image.val(),
                shortDes: shortDes.val(),
                longDes: longDes.val(),
            }).then(function (response) {
                if(response.status === 200){
                    let data = response.data;
                    RemoveLoadingButton(thisBtn);
                    if(data===1){
                        SuccessToast("Request Successful")
                        $( "#create-modal" ).modal('hide');
                        serviceName.val('');
                        priceRange.val('');
                        ratting.val('');
                        discountStatus.val('');
                        discountPercentage.val('');
                        image.val('');
                        shortDes.val('');
                        longDes.val('');
                        CreateTableList();
                    }else{
                        ErrorToast("Request Failed.")
                    }
                }else{
                    ErrorToast("Request Failed.")
                }
            }).catch(function (error) {
            ErrorToast("Request Failed.")
        });
        e.preventDefault();
    });
</script>
