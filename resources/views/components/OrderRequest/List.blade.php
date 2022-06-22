<div id="ContentLoaderDiv" class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="Line-Progress">
            <div class="indeterminate">
            </div>
        </div>
    </div>
</div>


<div id="MainDiv" class="row d-none">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="content-card">
            <div class="d-flex align-items-center">
                <h1 class="content-title">List OF Order Request</h1>
            </div>
            <hr class="content-title-hr"/>
            <table id="tableData">
                <thead>
                <tr class="bg-light">
                    <th data-orderable="false">Invoice ID</th>
                    <th data-orderable="false">Name</th>
                    <th data-orderable="false">Mobile</th>
                    <th data-orderable="false">Shipping Address</th>
                    <th data-orderable="false">Sub Total</th>
                    <th data-orderable="false">Payment Method</th>
                    <th data-orderable="false">Order Status</th>
                    <th data-orderable="false">Order Date</th>
                    <th data-orderable="false">#</th>
                </tr>
                </thead>
                <tbody id="tableList">
                {{--        Get Page Seo Table Data--}}
                </tbody>
            </table>
        </div>
    </div>
</div>



<script>
    
     CreateTableList();


    //set id to delete modal
    $('#tableData').on('click','.delete',function (){
        let id = $(this).attr('data-id');
        //set id to delete modal
        $('#delete-modal #confirmDelete').attr('data-id',id);
    })

    //set data to update model
    $('#tableData').on('click','.edit-status',function (){
        let loader = $('#update-modal #modal-loader');
        LoadingModal(loader)


        let id = $(this).attr('data-id');
        //get data to server
        axios.post('/OrderRequest/ReadSingle', {
            id: id,
        }).then(function (response) {
            if(response.status === 200){
                let data = response.data;
                $('#update-modal #data-id').val(data.id);
                $('#update-modal #orderStatus').val(data.order_status);

                RemoveLoadingModal(loader);
            }else{
                ErrorToast("Something Went Wrong. Please Try Again.")
            }
        }).catch(function (error) {
            ErrorToast("Something Went Wrong. Please Try Again.")
        });
    })


    //set data to details modal
    $('#tableData').on('click','.details',function (){
        let loader = $('#details-modal #modal-loader');
        LoadingModal(loader)


        let id = $(this).attr('data-id');
        let invoiceNo = $(this).attr('invoice-no');
        //get data to server
        axios.post('/OrderRequest/GetInvoiceData', {
            invoiceNo: invoiceNo,
        }).then(function (response) {
            if(response.status === 200){
                let customerInfo = response.data.customerInfo;
                let invoiceProduct = response.data.invoiceProduct;
                $('#details-modal #show-data').empty();
                $('#details-modal #show-data').append(`
                        <div id="invoice">
                            <h1 class="text-center">Invoice</h1>
                            <div class="inv-customer-info">
                                <div style="font-size: 14px;" class="lh-lg"><h6>INVOICE NO: ${customerInfo.invoice_no}</h6></div>
                                <div style="font-size: 14px;" class="lh-lg"><b>Name: </b><span id="name">${customerInfo.name}</span></div>
                                <div style="font-size: 14px;" class="lh-lg"><b>Mobile 1: </b><span id="name">${customerInfo.mobile1}</span></div>
                                <div style="font-size: 14px;" class="lh-lg"><b>Mobile 2: </b><span id="name">${customerInfo.mobile2}</span></div>
                                <div style="font-size: 14px;" class="lh-lg"><b>Email: </b><span id="name">${customerInfo.email_address}</span></div>
                                <div style="font-size: 14px;" class="lh-lg"><b>Payment Method: </b><span id="name">${customerInfo.payment_method}</span></div>
                                <div style="font-size: 14px;" class="lh-lg"><b>Order Time: </b><span id="name">${customerInfo.order_date + " , " + customerInfo.order_time}</span></div>
                                <div style="font-size: 14px;" class="lh-lg"><b>City: </b><span id="name">${customerInfo.city}</span></div>
                                <div style="font-size: 14px;" class="lh-lg"><b>Shipping Address: </b><span id="name">${customerInfo.shipping_address}</span></div>
                            <div>
                            <table class="table table-striped table-light mt-3">
                                <thead>
                                    <tr>
                                        <th>SL NO</th>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th>Product Info</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th class="text-end">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody id="invProductList">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6"  class="text-end">Sub Total</td>
                                        <td class="text-end">${customerInfo.subtotal_price}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="text-end">Shipping Charge</td>
                                        <td class="text-end">${customerInfo.shipping_charge}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="text-end">Total Due</td>
                                        <td class="text-end">${customerInfo.total_due}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                `);

                invoiceProduct.forEach(function (item,i){
                    $('#invProductList').append(`
                        <tr>
                            <td>${i++}</td>
                            <td>${item.product_name}</td>
                            <td>${item.product_code}</td>
                            <td>${item.product_info}</td>
                            <td>${item.unit_price}</td>
                            <td>${item.quantity}</td>
                            <td class="text-end">${item.total_price}</td>
                        </tr>
                    `)
                })

                $('#details-modal #invPrintBtn').attr('href','/OrderRequest/Print/'+customerInfo.invoice_no);

                RemoveLoadingModal(loader);
            }else{
                ErrorToast("Something Went Wrong. Please Try Again.")
            }
        }).catch(function (error) {
            ErrorToast("Something Went Wrong. Please Try Again.")
        });

    })


    function CreateTableList(){
        let tableList = $('#tableList');
        let tableData = $('#tableData');


        //get seo page data
        axios.get('/OrderRequest/Read')
            .then(function (response) {
                if(response.status === 200){
                    $('#MainDiv').removeClass("d-none")
                    $('#ContentLoaderDiv').addClass("d-none")
                    tableData.DataTable().destroy();
                    tableList.empty();
                    let data = response.data;
                    data.forEach(function(item,index){
                        tableList.append(`
                            <tr>
                                <td>${item.invoice_no}</td>
                                <td>${item.name}</td>
                                <td>${item.mobile1}</td>
                                <td>${item.shipping_address}</td>
                                <td>${item.subtotal_price}</td>
                                <td>${item.payment_method}</td>
                                <td>${item.order_status}</td>
                                <td>${item.order_date}</td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-flat btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><span invoice-no="${item.invoice_no}" data-id="${item.id}" data-bs-toggle="modal" data-bs-target="#details-modal" class="details dropdown-item text-dark"><i class="fas fa-eye" style="padding-right: 7px;"></i>Details</span></li>
                                            <li><span data-id="${item.id}" data-bs-toggle="modal" data-bs-target="#update-modal" class="edit-status dropdown-item text-dark"><i class="fas fa-pen-alt" style="padding-right: 7px;"></i>Change Order Status</span></li>
                                            <li><span data-id="${item.id}" data-bs-toggle="modal" data-bs-target="#delete-modal" class="delete dropdown-item text-danger"><i class="fas fa-trash-alt" style="padding-right: 7px;"></i>Delete</span></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        `);
                    });
                    tableData.DataTable({
                        "order":true,
                        "lengthMenu": [5, 10, 20, 50,100]
                    });
                    $('.dataTables_length').addClass('bs-select');
                }else{
                    ErrorToast("Something Went Wrong. Please Try Again.")
                }
            }).catch(function (error) {
            ErrorToast("Something Went Wrong. Please Try Again.")
        });
    }
</script>
