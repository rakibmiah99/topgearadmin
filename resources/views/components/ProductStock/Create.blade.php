<div data-bs-backdrop="static" class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="insertData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Stock In/ Out</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     <div class="container">
                         <div class="row">
                             <div class="col-6 mt-3">
                                 <label class="form-label">Select Product Code *</label>
                                 <select  class="form-control form-select" id="productCode">
                                     <option value="">SELECT</option>
                                     @foreach($productCode as $product)
                                         <option value="{{$product->product_code}}">{{$product->product_code}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="col-6 mt-3">
                                 <label class="form-label">Stock Type*</label>
                                 <select class="form-control form-select" id="type">
                                     <option value="">SELECT</option>
                                     <option value="stock_in">Stock IN</option>
                                     <option value="stock_out">Stock Out</option>
                                 </select>
                             </div>
                             <div class="col-6 mt-3">
                                 <label class="form-label">Quantity*</label>
                                 <input type="number" required="" id="quantity" class="form-control">
                             </div>
                             <div class="col-6 mt-3">
                                 <label class="form-label">Stock In/Out By *</label>
                                 <input type="text" required="" id="createdBy" class="form-control">
                             </div>
                         </div>
                     </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <span style="margin-left: 21px;" id="showStock"></span>
                    <div>
                        <button  id="insertDataBtn" type="submit" class="btn btn-success" >Save</button>
                        <button class="btn d-none  btn-success" disabled>
                            <span class="spinner-border spinner-border-sm"></span> Processing...
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>



<script>

    $('#create-modal').on('change','#productCode', function(){
        let showStock = $('#showStock');
        let productCode = $(this).val();
        let url = '/ProductStock/ReadSingle';
        let data = {
            productCode: productCode
        }
        showStock.empty();
        showStock.append('loading....')

        axios.post(url,data).then(function(response){
            console.log(response.data.length)
            if(response.status === 200){
                showStock.empty();
                showStock.append("<b>Stock: </b> " + ((response.data.length === 0) ? 0 : response.data.total_product));
            }
        }).catch(function (error){

        })
    });




    //insert Data
    $('#insertData').submit(function (e){
        e.preventDefault();
        let thisBtn = $("#insertDataBtn");
        let productCode = $('#create-modal #productCode');
        let type = $('#create-modal #type');
        let quantity = $('#create-modal #quantity');
        let createdBy = $('#create-modal #createdBy');
        LoadingButton(thisBtn);
        axios.post('/ProductStock/Insert', {
            productCode: productCode.val(),
            type: type.val(),
            quantity: quantity.val(),
            createdBy: createdBy.val(),
            }).then(function (response) {
                if(response.status === 200){
                    let data = response.data;
                    RemoveLoadingButton(thisBtn);
                    if(data === 1){
                        SuccessToast("Request Successful")
                        $("#create-modal" ).modal( "hide" );
                        productCode.val('');
                        type.val('');
                        quantity.val('');
                        createdBy.val('');
                        CreateTableList();
                    }else{
                        ErrorToast("Request Fail ! Try Again");
                    }
                }else{
                    ErrorToast("Request Fail ! Try Again");
                }
            }).catch(function (error) {
            ErrorToast("Request Fail ! Try Again");
        });
    });
</script>
