<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="updateData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Specification</h5>
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
    //insert Data
    $('#updateData').submit(function (e){
        e.preventDefault();
        let thisBtn = $("#updateDataBtn");
        let id = $('#data-id');
        let productCode = $('#update-modal #productCode');
        let specificationTitle = $('#update-modal #specificationTitle');
        let description = $('#update-modal #description');

        LoadingButton(thisBtn);
        axios.post('/ProductSpecification/Update', {
            id:  id.val(),
            productCode: productCode.val(),
            specificationTitle: specificationTitle.val(),
            description: description.val(),
        }).then(function (response) {
            console.log(response)
            if(response.status === 200){
                let data = response.data;
                RemoveLoadingButton(thisBtn);
                if(data === 1){
                    CreateTableList();
                    SuccessToast("Request Successful")
                    $( "#update-modal" ).modal( "hide" );
                    id.val('');
                    productCode.val('');
                    specificationTitle.val('');
                    description.summernote('code', '');

                }else{
                    ErrorToast("Request Fail");
                }
            }else {
                ErrorToast("Something Went Wrong. Please Try Again.");
            }
        }).catch(function (error) {
            ErrorToast("Something Went Wrong. Please Try Again.");
        });
    });
</script>
