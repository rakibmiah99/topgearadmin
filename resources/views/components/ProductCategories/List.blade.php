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
                <h1 class="content-title">Product Categories</h1>
                <button data-bs-toggle="modal" data-bs-target="#create-modal" class="btn btn-success btn-sm pl-1 pr-1" style="margin-left: 30px;"><i class="fas fa-plus mr-05"></i> Add</button>
            </div>
            <hr class="content-title-hr"/>
            <table id="tableData">
                <thead>
                <tr class="bg-light">
                    <th data-orderable="false">Category Name</th>
                    <th data-orderable="false">Category Id</th>
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

    $('#tableData').on('click','.edit',function (){
        let loader = $('#update-modal #modal-loader');
        LoadingModal(loader)
        let id = $(this).attr('data-id');
        axios.post('/ProductCategories/ReadSingle', {
            id: id,
        }).then(function (response) {
            RemoveLoadingModal(loader);
            if(response.status === 200){
                let data = response.data;
                    $('#update-modal #data-id').val(data.id);
                    $('#update-modal #catName').val(data.name);
                    $('#update-modal #catId').val(data.categorie_id);
                    $('#update-modal #catImage').val(data.image);
            }else{
                ErrorToast("Something Went Wrong. Please Try Again.");
            }
        }).catch(function (error) {
            ErrorToast("Something Went Wrong. Please Try Again.");
        });
        //set id to delete modal
        $('#delete-modal #confirmDelete').attr('data-id',id);
    })

    //set data to details modal
    $('#tableData').on('click','.details',function (){
        let loader = $('#details-modal #modal-loader');
        LoadingModal(loader)
        let id = $(this).attr('data-id');
        //get data to server
        axios.post('/ProductCategories/ReadSingle', {
            id: id,
        }).then(function (response) {
            if(response.status === 200){
                let data = response.data;
                $('#details-modal #show-data').empty();
                $('#details-modal #show-data').append(`
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-center p-3">
                                <img src="${data.image}" alt="alt_image" class="img-fluid">
                            </div>
                            <h4 class="text-center"><b class="text-secondary">Name: </b>${data.name}</h4>
                            <p class="text-center"><b class="text-secondary">Category Id: </b> ${data.categorie_id}</p>
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
        //get seo page data
        axios.get('/ProductCategories/Read')
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
                                <td>${item.name}</td>
                                <td>${item.categorie_id}</td>
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
