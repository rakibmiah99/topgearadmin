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
        <div class="content-card animated fadeIn">
            <div class="d-flex align-items-center">
                <h1 class="content-title">Product List</h1>
                <button data-bs-toggle="modal" data-bs-target="#create-modal" class="btn btn-success btn-sm pl-1 pr-1" style="margin-left: 30px;"><i class="fas fa-plus mr-05"></i> Add</button>
            </div>
            <hr class="content-title-hr"/>
            <table id="tableData">
                <thead>
                <tr class="bg-light">
                    <th data-orderable="false">Brand</th>
                    <th data-orderable="false">Title</th>
                    <th data-orderable="false">Sale Price</th>
                    <th data-orderable="false">Action</th>
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

    $('#tableData').on('click','.delete',function (){
        let id = $(this).attr('data-id');
        $('#delete-modal #confirmDelete').attr('data-id',id);
    })

    //set data to update model
    $('#tableData').on('click','.edit',function (){
        let loader = $('#update-modal #modal-loader');
        LoadingModal(loader)
        let id = $(this).attr('data-id');
        axios.post('/ProductList/ReadSingle', {
            id: id,
        }).then(function (response) {
            RemoveLoadingModal(loader);
            if(response.status === 200){
                let data = response.data;
                    $('#update-modal #data-id').val(data.id);
                    $('#update-modal #brand').val(data.brand);
                    $('#update-modal #title').val(data.title);
                    $('#update-modal #code').val(data.product_code);
                    $('#update-modal #salePrice').val(data.sell_price);
                    $('#update-modal #specialSalePrice').val(data.special_sell_price);
                    $('#update-modal #specialPrice').val(data.special_price);
                    $('#update-modal #callPrice').val(data.call_price);
                    $('#update-modal #stock').val(data.stock);
                    $('#update-modal #category').val(data.category);
                    $('#update-modal #star').val(data.star);
                    $('#update-modal #image').val(data.image);
                    $('#update-modal #remarks').val(data.remark);
                    $('#update-modal #keywords').val(data.keywords);
            }else{
                ErrorToast("Something Went Wrong. Please Try Again.");
            }
        }).catch(function (error) {
            ErrorToast("Something Went Wrong. Please Try Again.");
        });
        $('#delete-modal #confirmDelete').attr('data-id',id);
    })



    $('#tableData').on('click','.details',function (){
        let loader = $('#details-modal #modal-loader');
        LoadingModal(loader)
        let id = $(this).attr('data-id');
        axios.post('/ProductList/ReadSingle', {
            id: id,
        }).then(function (response) {
            console.log(response)
            if(response.status === 200){
                let data = response.data;
                $('#details-modal #show-data').empty();
                $('#details-modal #show-data').append(`
                    <div class="row">
                        <div class="col-sm-4 p-2 ">
                            <div class="image">
                                <img src="${data.image}" alt="alt_image" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-5">
                                    <ul class="list-group list-group-flush">
                                      <li class="list-group-item"><span class="list-item-header">Stock: </span> ${data.stock}</li>
                                      <li class="list-group-item"><span class="list-item-header">Star: </span>${data.star}</li>
                                      <li class="list-group-item"><span class="list-item-header">Special  Price: </span>${data.special_price}</li>
                                      <li class="list-group-item"><span class="list-item-header">Call Price: </span>${data.call_price}</li>
                                    </ul>
                                </div>
                                <div class="col-7">
                                    <ul class="list-group list-group-flush">
                                      <li class="list-group-item"><span class="list-item-header">Brand: </span> ${data.brand}</li>
                                      <li class="list-group-item"><span class="list-item-header">Category: </span>${data.category}</li>
                                      <li class="list-group-item"><span class="list-item-header">Sale Price: </span>${data.sell_price}</li>
                                      <li class="list-group-item"><span class="list-item-header">Special Sale Price: </span>${data.special_sell_price}</li>
                                   </ul>
                                </div>
                                <div class="col-12">
                                    <ul class="list-group list-group-flush border-top border-1">
                                      <li class="list-group-item"><span class="list-item-header">Keywords - </span> ${data.keywords}</li>
                                      <li class="list-group-item"><span class="list-item-header">Description - </span> ${data.remark}</li>
                                     </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
                RemoveLoadingModal(loader);
            }else{
                ErrorToast("Something Went Wrong. Please Try Again.")
            }
        }).catch(function (error) {
            ErrorToast("Something Went Wrong. Please Try Again.")
        });

        //set id to delete modal
        $('#delete-modal #confirmDelete').attr('data-id',id);
    })



    function CreateTableList(){
        let tableList = $('#tableList');
        let tableData = $('#tableData');
        axios.get('/ProductList/Read')
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
                                <td>${item.brand}</td>
                                <td>${item.title}</td>
                                <td>${item.sell_price}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-flat btn-success dropdown-toggle" data-bs-toggle="dropdown">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><span data-id="${item.id}" data-bs-toggle="modal" data-bs-target="#details-modal" class="details dropdown-item text-dark"><i class="fas fa-eye" style="padding-right: 7px;"></i>Details</span></li>
                                            <li><span data-id="${item.id}" data-bs-toggle="modal" data-bs-target="#update-modal" class="edit dropdown-item text-dark"><i class="fas fa-pen-alt" style="padding-right: 7px;"></i>Edit</span></li>
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
