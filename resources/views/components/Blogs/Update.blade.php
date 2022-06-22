<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <form id="updateData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Blog</h5>
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
                            <input type="hidden" id="blog-id">
                            <div class="col-3 mt-2">
                                <label class="form-label">Title *</label>
                                <input  required="" type="text" id="title" class="form-control" >
                            </div>
                            <div class="col-3 mt-2">
                                <label class="form-label">Topic *</label>
                                <input  required="" type="text" class="form-control" id="topic">
                            </div>
                            <div class="col-3 mt-2">
                                <label class="form-label">Short Description *</label>
                                <input required="" type="text" class="form-control" id="shortDes" >
                            </div>
                            <div class="col-3 mt-2">
                                <label class="form-label">Cart Photo *</label>
                                <input required="" type="text" class="form-control" id="cartPhoto" >
                            </div>
                            <div class="col-3 mt-2">
                                <label class="form-label">Written By *</label>
                                <input   required="" type="text" class="form-control" id="writtenBy">
                            </div>
                            <div class="col-3 mt-2">
                                <label class="form-label">Read Time *</label>
                                <input required="" type="text" class="form-control" id="readTime" placeholder="">
                            </div>
                            <div class="col-3 mt-2">
                                <label class="form-label">Cover Photo *</label>
                                <input required="" type="text" class="form-control" id="coverPhoto" placeholder="">
                            </div>
                            <div class="col-3 mt-2">
                                <label class="form-label">Keywords *</label>
                                <input required="" type="text" class="form-control" id="keywords" placeholder="">
                            </div>
                            <div class="col-12 mt-2">
                                <label class="form-label">Description *</label>
                                <textarea rows="15"  required="" type="text" class="form-control update" id="description" placeholder="">
                                </textarea>

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
    editor($('#update-modal #description'));
    $('#updateData').submit(function (e){

        let thisBtn = $(this);
        let blogId = $('#update-modal #blog-id');
        let title = $('#update-modal #title');
        let shortDes = $('#update-modal  #shortDes');
        let topic = $('#update-modal  #topic');
        let cartPhoto = $('#update-modal  #cartPhoto');

        let writtenBy = $('#update-modal  #writtenBy');
        let readTime = $('#update-modal #readTime');
        let coverPhoto = $('#update-modal #coverPhoto');
        let description = $('#update-modal #description');
        let keywords = $('#update-modal #keywords');
        LoadingButton(thisBtn);
        axios.post('/Blogs/Update', {
            blogId: blogId.val(),
            title: title.val(),
            shortDes: shortDes.val(),
            topic: topic.val(),
            cartPhoto: cartPhoto.val(),

            writtenBy: writtenBy.val(),
            readTime: readTime.val(),
            coverPhoto: coverPhoto.val(),
            description: description.val(),
            keywords: keywords.val(),
        }).then(function (response) {
            if(response.status === 200){
                let data = response.data;
                RemoveLoadingButton(thisBtn);
                if(data === 1){
                    SuccessToast("Request Successful.");
                    $('#update-modal').modal('hide');
                    shortDes.val('');
                    title.val('');
                    topic.val('');
                    cartPhoto.val('');
                    description.summernote('code','')
                    writtenBy.val('');
                    readTime.val('');
                    coverPhoto.val('');
                    keywords.val('');
                    CreateTableList();
                }else{
                    ErrorToast("Request Failed.");
                }
            }
        }).catch(function (error) {
            ErrorToast("Request Failed.");
        });
        e.preventDefault();
    });
</script>
