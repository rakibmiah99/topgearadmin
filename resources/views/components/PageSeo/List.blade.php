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
                <h1 class="content-title">Page SEO</h1>
                <button data-bs-toggle="modal" data-bs-target="#create-modal" class="btn d-none btn-success btn-sm pl-1 pr-1" style="margin-left: 30px;"><i class="fas fa-plus mr-05"></i> Add</button>
            </div>
            <hr class="content-title-hr"/>
            <table id="tableData">
                <thead>
                <tr class="bg-light">
                    <th data-orderable="false">Page Name</th>
                    <th data-orderable="false">Title</th>
                    <th data-orderable="false">Share Title</th>
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
    $('#tableData').on('click','.edit',function (){
        let loader = $('#update-modal #modal-loader');
        LoadingModal(loader)


        let id = $(this).attr('data-id');
        //get data to server
        axios.post('/PageSeo/ReadSingle', {
            id: id,
        }).then(function (response) {
            if(response.status === 200){
                let data = response.data;
                //set data to update modal
                $('#update-modal #data-id').val(data.id);
                $('#update-modal #name').val(data.name);
                $('#update-modal #title').val(data.title);
                $('#update-modal #shareTitle').val(data.share_title);
                $('#update-modal #keyword').val(data.keywords);
                $('#update-modal #description').val(data.description);
                $('#update-modal #imageLink').val(data.page_img);

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
        //get data to server
        axios.post('/PageSeo/ReadSingle', {
            id: id,
        }).then(function (response) {
            if(response.status === 200){
                let data = response.data;
                $('#details-modal #show-data').empty();
                $('#details-modal #show-data').append(`
                    <div class="row">
                        <div class="col-sm-5 p-2 ">
                            <div class="image">
                                <img src="${data.page_img}" alt="alt_image" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"><span class="list-item-header">Name - </span> ${data.name}</li>
                              <li class="list-group-item"><span class="list-item-header">Title - </span>${data.title}</li>
                              <li class="list-group-item"><span class="list-item-header">Share Title - </span>${data.share_title}</li>
                              <li class="list-group-item"><span class="list-item-header">Keywords - </span>${data.keywords}</li>
                              <li class="list-group-item"><span class="list-item-header">Description - </span>${data.description} </li>
                            </ul>
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

    })


    function CreateTableList(){
        let tableList = $('#tableList');
        let tableData = $('#tableData');


        //get seo page data
        axios.get('/PageSeo/Read')
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
                                <td>${item.title}</td>
                                <td>${item.share_title}</td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-flat btn-success btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><span data-id="${item.id}" data-bs-toggle="modal" data-bs-target="#details-modal" class="details dropdown-item text-dark"><i class="fas fa-eye" style="padding-right: 7px;"></i>Details</span></li>
                                            <li><span data-id="${item.id}" data-bs-toggle="modal" data-bs-target="#update-modal" class="edit  dropdown-item text-dark"><i class="fas fa-pen-alt" style="padding-right: 7px;"></i>Edit</span></li>
                                            <li><span data-id="${item.id}" data-bs-toggle="modal" data-bs-target="#delete-modal" class="delete d-none dropdown-item text-danger"><i class="fas fa-trash-alt" style="padding-right: 7px;"></i>Delete</span></li>
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
