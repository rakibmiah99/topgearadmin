<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="insertData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     <div class="container">
                         <div class="row">
                             <div class="col-6 mt-3">
                                 <label class="form-label">Brand *</label>
                                 <select required="" class="form-control form-select" id="brand">
                                     <option value="">SELECT</option>
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
    //insert Data
    $('#insertData').submit(function (e){
        let thisBtn = $("#insertDataBtn");
        let brand = $('#create-modal #brand');
        let title = $('#create-modal #title');
        let code = $('#create-modal #code');
        let salePrice = $('#create-modal #salePrice');
        let specialSalePrice = $('#create-modal #specialSalePrice');
        let specialPrice = $('#create-modal #specialPrice');
        let callPrice = $('#create-modal #callPrice');
        let stock = $('#create-modal #stock');
        let category = $('#create-modal #category');
        let star = $('#create-modal #star');
        let image = $('#create-modal #image');
        let keywords = $('#create-modal #keywords');
        let remarks = $('#create-modal #remarks');

        LoadingButton(thisBtn);
        axios.post('ProductList/Insert', {
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
            keywords: keywords.val(),
            remarks: remarks.val()
            }).then(function (response) {
                if(response.status === 200){
                    let data = response.data;
                    RemoveLoadingButton(thisBtn);
                    if(data === 1){
                        SuccessToast("Request Successful")
                        $( "#create-modal" ).modal( "hide" );
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
                        ErrorToast("Request Failed.");
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
