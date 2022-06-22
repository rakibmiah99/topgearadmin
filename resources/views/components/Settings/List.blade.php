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
                <h1 class="content-title">SMS Settings</h1>
                <button data-bs-toggle="modal" data-bs-target="#create-modal" class="btn mx-5 d-none btn-success btn-sm " ><i class="fas fa-plus"></i> Add</button>
            </div>
            <hr class="content-title-hr"/>
            <table  id="tableData">
                <thead>
                <tr class="bg-light">
                    <th data-orderable="false">No</th>
                    <th data-orderable="false">SMS API Token</th>
                    <th data-orderable="false">SMS API SID</th>
                    <th data-orderable="false">SMS API Domain</th>
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
        axios.post('/Settings/ReadSingle', {
            id: id,
        }).then(function (response) {
            RemoveLoadingModal(loader);
            if(response.status === 200){
                let data = response.data;
                    $('#update-modal #data-id').val(data.id);
                    $('#update-modal #sslApiToken').val(data.ssl_wireless_sms_api_token);
                    $('#update-modal #sslSmsId').val(data.ssl_wireless_sms_sid);
                    $('#update-modal #sslDomain').val(data.ssl_wireless_sms_domain);
            }else{
                ErrorToast("Something Went Wrong. Please Try Again.");
            }
        }).catch(function (error) {
            ErrorToast("Something Went Wrong. Please Try Again.");
        });

        //set id to delete modal
        $('#delete-modal #confirmDelete').attr('data-id',id);
    })

    function CreateTableList(){
        let tableList = $('#tableList');
        let tableData = $('#tableData');

        //get seo page data
        axios.get('/Settings/Read')
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
                                <td>${index+1}</td>
                                <td>${item.ssl_wireless_sms_api_token}</td>
                                <td>${item.ssl_wireless_sms_sid}</td>
                                <td>${item.ssl_wireless_sms_domain}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-flat btn-success  dropdown-toggle" data-bs-toggle="dropdown">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><span data-id="${item.id}" data-bs-toggle="modal" data-bs-target="#update-modal" class="edit dropdown-item text-dark"><i class="fas fa-pen-alt" style="padding-right: 7px;"></i>Edit</span></li>
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
