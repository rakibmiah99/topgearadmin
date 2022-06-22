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
                <h1 class="content-title">Service Request</h1>
            </div>
            <hr class="content-title-hr"/>
            <table id="tableData">
                <thead>
                <tr class="bg-light">
                    <th data-orderable="false">SL No</th>
                    <th data-orderable="false">Customer Name</th>
                    <th data-orderable="false">Mobile</th>
                    <th data-orderable="false">Status</th>
                    <th data-orderable="false">Car Model</th>
                    <th data-orderable="false">Request Date</th>
                    <th data-orderable="false">Appoint Date</th>
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


    //set data to details modal
    $('#tableData').on('click','.details',function (){
        let loader = $('#details-modal #modal-loader');
        LoadingModal(loader)


        let id = $(this).attr('data-id');
        //get data to server
        axios.post('/ServiceRequest/ReadSingle', {
            id: id,
        }).then(function (response) {
            if(response.status === 200){
                let data = response.data;
                $('#details-modal #show-data').empty();
                $('#details-modal #show-data').append(`
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"><span class="list-item-header">Customer Name - </span> ${data.cus_name}</li>
                              <li class="list-group-item"><span class="list-item-header">Customer Mobile - </span>${data.cus_mobile}</li>
                              <li class="list-group-item"><span class="list-item-header">Car Brand - </span>${data.car_brand}</li>
                              <li class="list-group-item"><span class="list-item-header">Car Model - </span>${data.car_model}</li>
                              <li class="list-group-item"><span class="list-item-header">Car Year - </span>${data.car_year}</li>
                              <li class="list-group-item"><span class="list-item-header">Service Description - </span>${data.service_des}</li>
                              <li class="list-group-item"><span class="list-item-header">Appointment Date - </span>${data.appio_date}</li>
                              <li class="list-group-item"><span class="list-item-header">Appointment Time - </span>${data.appio_time}</li>
                              <li class="list-group-item"><span class="list-item-header">Request Date - </span> ${data.req_date}</li>
                              <li class="list-group-item"><span class="list-item-header">Request Time - </span>${data.req_time}</li>
                                <li class="list-group-item"><span class="list-item-header">Status - </span>${data.status}</li>
                            </ul>
                        </div>
                        <div class="col-6 mt-1">
                            <ul class="list-group list-group-flush">

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

        //set id to delete modal
        $('#delete-modal #confirmDelete').attr('data-id',id);
    })



    function CreateTableList(){
        let tableList = $('#tableList');
        let tableData = $('#tableData');


        //get seo page data
        axios.get('/ServiceRequest/Read')
            .then(function (response) {
                console.log(response)
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
                                <td>${item.cus_name}</td>
                                <td>${item.cus_mobile}</td>
                                <td>${item.status}</td>
                                <td>${item.car_model}</td>
                                <td>${item.req_date}</td>
                                <td>${item.appio_date}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-flat  dropdown-toggle" data-bs-toggle="dropdown">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><span data-id="${item.id}"  class="changeStatus dropdown-item text-dark"><i class="fas fa-eye" style="padding-right: 7px;"></i>Change Status</span></li>
                                            <li><span data-id="${item.id}" data-bs-toggle="modal" data-bs-target="#details-modal" class="details dropdown-item text-dark"><i class="fas fa-eye" style="padding-right: 7px;"></i>Details</span></li>
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

                    $('.changeStatus').on('click',function () {
                       let id= $(this).attr("data-id");
                        $("#StatusID").val(id);
                        $("#ChangeStatus").modal('show');
                    })



                }else{
                    ErrorToast("Something Went Wrong. Please Try Again.")
                }
            }).catch(function (error) {
                console.log(error)
                ErrorToast("Something Went Wrong. Please Try Again.")
        });

    }
</script>
