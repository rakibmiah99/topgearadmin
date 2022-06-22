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
                <h1 class="content-title">Blog List</h1>
                <button data-bs-toggle="modal" data-bs-target="#create-modal" class="btn btn-success btn-sm pl-1 pr-1" style="margin-left: 30px;"><i class="fas fa-plus mr-05"></i> Add</button>
            </div>
            <hr class="content-title-hr"/>
            <table id="tableData">
                <thead>
                <tr class="bg-light">
                    <th data-orderable="false">Title</th>
{{--                    <th data-orderable="false">Short Description</th>--}}
                    <th data-orderable="false">Topic</th>
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
    setTimeout((function (){
        CreateTableList();
    }),1000)

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


        let blogId = $(this).attr('data-id');
        //get data to server
        axios.post('/Blogs/ReadSingle', {
            blogId: blogId,
        }).then(function (response) {
            if(response.status === 200){
                let data = response.data;
                let blogDetails = data.blogDetails;
                let blogList = data.blogList;

                //set data to update modal
                let blogId = $('#update-modal #blog-id').val(blogList.blog_id);
                let title = $('#update-modal #title').val(blogList.title);
                let shortDes = $('#update-modal  #shortDes').val(blogList.short_des);
                let topic = $('#update-modal  #topic').val(blogList.topic);
                let cartPhoto = $('#update-modal  #cartPhoto').val(blogList.cart_photo);

                let writtenBy = $('#update-modal  #writtenBy').val(blogDetails.written_by);
                let readTime = $('#update-modal #readTime').val(blogDetails.read_time);
                let coverPhoto = $('#update-modal #coverPhoto').val(blogDetails.cover_photo);
                // let description = $('#update-modal #description').val(blogDetails.description);
                $('#update-modal #description').summernote('code',blogDetails.description)
                let keywords = $('#update-modal #keywords').val(blogDetails.keywords);

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


        let blogId = $(this).attr('data-id');
        //get data to server
        axios.post('/Blogs/ReadSingle', {
            blogId: blogId,
        }).then(function (response) {
            if(response.status === 200){
                let data = response.data;
                let blogDetails = data.blogDetails;
                let blogList = data.blogList;
                $('#details-modal #show-data').empty();
                $('#details-modal #show-data').append(`
                    <div class="row">
                         <div class="col-6">
                            <div class = "image">
                                <p class="">Cart Photo</p>
                                <img src="${blogList.cart_photo}" alt="alt_cart_image" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class = "image">
                                <p class="">Cart Photo</p>
                                <img src="${blogDetails.cover_photo}" alt="alt_cover_image" class="img-fluid">
                            </div>
                        </div>

                        <div class="col-6 mt-3">
                            <ul class="list-group list-group-flush">
                                  <li class="list-group-item"><span class="list-item-header">Title - </span> ${blogList.title}</li>
                                  <li class="list-group-item"><span class="list-item-header">Topic - </span> ${blogList.topic}</li>
                                  <li class="list-group-item"><span class="list-item-header">Written By - </span>${blogDetails.written_by}</li>
                             </ul>
                        </div>
                        <div class="col-6 mt-3">
                            <ul class="list-group list-group-flush">
                                  <li class="list-group-item"><span class="list-item-header">Read Time - </span>${blogDetails.read_time}</li>
                                  <li class="list-group-item"><span class="list-item-header">keywords - </span>${blogDetails.keywords}</li>
                                  <li class="list-group-item"><span class="list-item-header">Short Description - </span>${blogList.short_des}</li>
                             </ul>
                        </div>
                        <div class="col-12 mt-3">
                            <ul class="list-group list-group-flush">
                                  <li class="list-group-item"><span class="list-item-header">Long Descriptoin - </span>${blogDetails.description}</li>
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
        axios.get('/Blogs/Read')
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
                                <td>${item.title}</td>
                                <td>${item.topic}</td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-flat  dropdown-toggle" data-bs-toggle="dropdown">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><span data-id="${item.blog_id}" data-bs-toggle="modal" data-bs-target="#details-modal" class="details dropdown-item text-dark"><i class="fas fa-eye" style="padding-right: 7px;"></i>Details</span></li>
                                            <li><span data-id="${item.blog_id}" data-bs-toggle="modal" data-bs-target="#update-modal" class="edit dropdown-item text-dark"><i class="fas fa-pen-alt" style="padding-right: 7px;"></i>Edit</span></li>
                                            <li><span data-id="${item.blog_id}" data-bs-toggle="modal" data-bs-target="#delete-modal" class="delete dropdown-item text-danger"><i class="fas fa-trash-alt" style="padding-right: 7px;"></i>Delete</span></li>
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
