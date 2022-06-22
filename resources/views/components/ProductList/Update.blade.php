<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="updateData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
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
                                <label class="form-label">Brand *</label>
                                <select required="" class="form-control form-select" id="brand">
                                    <option value="">SELECT *</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->brand_name}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">Title *</label>
                                <input  required="" type="text" class="form-control" id="title">
                            </div>
                            <div class="col-4 mt-3">
                                <label class="form-label">Product Code *</label>
                                <input required="" type="text" class="form-control" id="code" >
                            </div>
                            <div class="col-4 mt-3">
                                <label class="form-label">Category *</label>
                                <select required="" class="form-control form-select" id="category">
                                    <option value="">SELECT</option>
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->categorie_id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-2 mt-3">
                                <label class="form-label">Stock *</label>
                                <select required="" class="form-control form-select" id="stock">
                                    <option value="">SELECT</option>
                                    <option value="true">YES</option>
                                    <option value="false">NO</option>
                                </select>
                            </div>

                            <div class="col-2 mt-3">
                                <label class="form-label">Star *</label>
                                <input required="" type="number" class="form-control" id="star" >
                            </div>
                            <div class="col-3 mt-3">
                                <label class="form-label">Sale Price *</label>
                                <input required="" type="text" class="form-control" id="salePrice" >
                            </div>
                            <div class="col-3 mt-3">
                                <label class="form-label">Special Price *</label>
                                <select required="" class="form-control form-select" id="specialPrice">
                                    <option value="">SELECT</option>
                                    <option value="true">YES</option>
                                    <option value="false">NO</option>
                                </select>
                            </div>
                            <div class="col-3 mt-3">
                                <label class="form-label">Special Sale Price *</label>
                                <input required="" type="text" class="form-control" id="specialSalePrice" >
                            </div>
                            <div class="col-3 mt-3">
                                <label class="form-label">Call Price *</label>
                                <select required="" class="form-control form-select" id="callPrice">
                                    <option value="">SELECT</option>
                                    <option value="true">YES</option>
                                    <option value="false">NO</option>
                                </select>
                            </div>
                            <div class="col-12 mt-3">
                                <label class="form-label">Image *</label>
                                <input required="" type="text" class="form-control" id="image" >
                            </div>
                            <div class="col-12 mt-3">
                                <label class="form-label">Keywords *</label>
                                <input required="" class="form-control" id="keywords" >
                            </div>
                            <div class="col-12 mt-3">
                                <label class="form-label">Remarks *</label>
                                <input required="" class="form-control" id="remarks" >
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
        let thisBtn = $("#updateDataBtn");
        let id = $('#data-id');
        let brand = $('#update-modal #brand');
        let title = $('#update-modal #title');
        let code = $('#update-modal #code');
        let salePrice = $('#update-modal #salePrice');
        let specialSalePrice = $('#update-modal #specialSalePrice');
        let specialPrice = $('#update-modal #specialPrice');
        let callPrice = $('#update-modal #callPrice');
        let stock = $('#update-modal #stock');
        let category = $('#update-modal #category');
        let star = $('#update-modal #star');
        let image = $('#update-modal #image');
        let remarks = $('#update-modal #remarks');
        let keywords = $('#update-modal #keywords');


        LoadingButton(thisBtn);
        axios.post('/ProductList/Update', {
            id:  id.val(),
            brand: brand.val(),
            title: title.val(),
            code: code.val(),
            salePrice: salePrice.val(),
            star: star.val(),
            specialSalePrice: specialSalePrice.val(),
            specialPrice: specialPrice.val(),
            callPrice: callPrice.val(),
            category: category.val(),
            stock: stock.val(),
            image: image.val(),
            remarks: remarks.val(),
            keywords: keywords.val(),
        }).then(function (response) {
            console.log(response)
            if(response.status === 200){
                let data = response.data;
                RemoveLoadingButton(thisBtn);
                if(data === 1){
                    SuccessToast("Request Successful")
                    $( "#update-modal" ).modal( "hide" );
                    id.val('');
                    title.val('');
                    brand.val('');
                    star.val('');
                    salePrice.val('');
                    remarks.val('');
                    image.val('');
                    code.val('');
                    specialSalePrice.val('');
                    specialPrice.val('');
                    callPrice.val('');
                    category.val('');
                    stock.val('');
                    keywords.val('');
                    CreateTableList();

                }else{
                    ErrorToast("Request Fail")
                }
            }else {
                ErrorToast("Something Went Wrong. Please Try Again.")
            }
        }).catch(function (error) {
            ErrorToast("Something Went Wrong. Please Try Again.")
        });

    });
</script>
