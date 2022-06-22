<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <form id="updateData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Product Details</h5>
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
                            <div class="col-5 mt-3">
                                <label class="form-label">Product Code *</label>
                                <select required="" class="form-control form-select" id="productCode">
                                    <option value="">SELECT</option>
                                    @foreach($productCode as $product)
                                        <option value="{{$product->product_code}}">{{$product->product_code}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4 mt-3">
                                <label class="form-label">Color*</label>
                                <input  required="" type="text" class="form-control" id="color">
                            </div><div class="col-3 mt-3">
                                <label class="form-label">Size *</label>
                                <input  required="" type="text" class="form-control" id="size">
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">Image 1 *</label>
                                <input  required="" type="text" class="form-control" id="img1">
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">Image 2 *</label>
                                <input required="" type="text" class="form-control" id="img2" >
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">Image 3 *</label>
                                <input required="" type="text" class="form-control" id="img3" >
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">Image 4 *</label>
                                <input required="" type="text" class="form-control" id="img4" >
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
        let color = $('#update-modal #color');
        let size = $('#update-modal #size');
        let img1 = $('#update-modal #img1');
        let img2 = $('#update-modal #img2');
        let img3 = $('#update-modal #img3');
        let img4 = $('#update-modal #img4');
        let description = $('#update-modal #description');

        LoadingButton(thisBtn);
        axios.post('/ProductDetails/Update', {
            id:  id.val(),
            productCode: productCode.val(),
            color: color.val(),
            size: size.val(),
            img1: img1.val(),
            img2: img2.val(),
            img3: img3.val(),
            img4: img4.val(),
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
                    color.val('');
                    size.val('');
                    img1.val('');
                    img2.val('');
                    img3.val('');
                    img4.val('');
                    description.summernote('code', '');

                }else{
                    ErrorToast("Request Failed.")
                }
            }else {
                ErrorToast("Something Went Wrong. Please Try Again.")
            }
        }).catch(function (error) {
            ErrorToast("Something Went Wrong. Please Try Again.")
        });



    });
</script>
