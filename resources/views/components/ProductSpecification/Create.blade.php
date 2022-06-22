<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="insertData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product Specification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     <div class="container">
                         <div class="row">
                             <div class="col-6 mt-3">
                                 <label class="form-label">Product Code *</label>
                                 <select required="" class="form-control form-select" id="productCode">
                                     <option value="">SELECT</option>
                                     @foreach($productCode as $product)
                                         <option value="{{$product->product_code}}">{{$product->product_code}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="col-6 mt-3">
                                 <label class="form-label">Product Specification Title *</label>
                                 <input  required="" type="text" class="form-control" id="specificationTitle">
                             </div>

                             <div class="col-12 mt-3">
                                 <label class="form-label">Description *</label>
                                 <textarea rows="7" required="" class="form-control" id="description" ></textarea>
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
    editor($('#create-modal #description'))

    //insert Data
    $('#insertData').submit(function (e){
        let thisBtn = $("#insertDataBtn");
        let productCode = $('#create-modal #productCode');
        let specificationTitle = $('#create-modal #specificationTitle');
        let description = $('#create-modal #description');

        LoadingButton(thisBtn);
        axios.post('ProductSpecification/Insert',{
            productCode: productCode.val(),
            specificationTitle: specificationTitle.val(),
            description: description.val(),

            }).then(function (response) {
                if(response.status === 200){
                    let data = response.data;
                    RemoveLoadingButton(thisBtn);
                    if(data === 1){
                        SuccessToast("Request Successful")
                        $( "#create-modal" ).modal( "hide" );
                        productCode.val('');
                        specificationTitle.val('');
                        description.summernote('code', '');
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
