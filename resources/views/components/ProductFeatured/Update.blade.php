<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="updateData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Item</h5>
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
                            <div class="col-6 mt-3">
                                <label class="form-label">Item Link *</label>
                                <input required="" type="text" class="form-control" id="itemLink" >
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">Sale Price *</label>
                                <input required="" type="text" class="form-control" id="salePrice" >
                            </div>
                            <div class="col-3 mt-3">
                                <label class="form-label">Star *</label>
                                <input required="" type="text" class="form-control" id="star" >
                            </div>
                            <div class="col-9 mt-3">
                                <label class="form-label">Image *</label>
                                <input required="" type="text" class="form-control" id="image" >
                            </div>
                            <div class="col-12 mt-3">
                                <label class="form-label">Description *</label>
                                <textarea rows="5" required="" class="form-control" id="description" ></textarea>
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
        let itemLink = $('#update-modal #itemLink');
        let salePrice = $('#update-modal #salePrice');
        let star = $('#update-modal #star');
        let image = $('#update-modal #image');
        let description = $('#update-modal #description');


        LoadingButton(thisBtn);
        axios.post('/ProductFeatured/Update', {
            id:  id.val(),
            brand: brand.val(),
            title: title.val(),
            itemLink: itemLink.val(),
            salePrice: salePrice.val(),
            star: star.val(),
            image: image.val(),
            description: description.val(),
        }).then(function (response) {
            console.log(response)
            if(response.status === 200){
                let data = response.data;
                RemoveLoadingButton(thisBtn);
                if(data === 1){
                    SuccessToast("Registered Successful.")
                    $( "#update-modal" ).modal( "hide" );
                    id.val('');
                    title.val('');
                    brand.val('');
                    star.val('');
                    salePrice.val('');
                    description.val('');
                    image.val('');
                    itemLink.val('');
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
