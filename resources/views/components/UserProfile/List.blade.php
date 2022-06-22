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
                <h1 class="content-title">User Profile</h1>
            </div>
            <hr class="content-title-hr"/>
            <table id="tableData">
                <thead>
                <tr class="bg-light">
                    <th data-orderable="false">Full Name</th>
                    <th data-orderable="false">Mobile 1</th>
                    <th data-orderable="false">Email</th>
                    <th data-orderable="false">City</th>
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

    //set data to details modal
    $('#tableData').on('click','.details',function (){
        let loader = $('#details-modal #modal-loader');
        LoadingModal(loader);
        let id = $(this).attr('data-id');
        axios.post('/UserProfile/ReadSingle', {
            id: id,
        }).then(function (response) {
            if(response.status === 200){
                let data = response.data;
                $('#details-modal #show-data').empty();
                $('#details-modal #show-data').append(`
                    <div class="row">
                        <div class="col-12">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"><span class="list-item-header">Full Name: </span> ${data.full_name}</li>
                              <li class="list-group-item"><span class="list-item-header">Mobile 1: </span>${data.mobile_1}</li>
                              <li class="list-group-item"><span class="list-item-header">Mobile 2: </span>${data.mobile_2}</li>
                               <li class="list-group-item"><span class="list-item-header">Email:</span> ${data.email}</li>
                               <li class="list-group-item"><span class="list-item-header">Address: </span>${data.address}</li>
                               <li class="list-group-item"><span class="list-item-header">City: </span>${data.city}</li>
                            </ul>
                        </div>
                    </div>
                `);
                RemoveLoadingModal(loader);
            }else{
                ErrorToast("Something Went Wrong. Please Try Again.");
            }
        }).catch(function (error) {
            ErrorToast("Something Went Wrong. Please Try Again.");
        });
    });




    function CreateTableList(){
        let tableList = $('#tableList');
        let tableData = $('#tableData');

        //get seo page data
        axios.get('/UserProfile/Read')
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
                                <td>${item.full_name}</td>
                                <td>${item.mobile_1}</td>
                                <td>${item.email}</td>
                                <td>${item.city}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-flat btn-success  dropdown-toggle" data-bs-toggle="dropdown">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><span data-id="${item.id}" data-bs-toggle="modal" data-bs-target="#details-modal" class="details dropdown-item text-dark"><i class="fas fa-eye" style="padding-right: 7px;"></i>Details</span></li>
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
