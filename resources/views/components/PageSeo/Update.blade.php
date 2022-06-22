<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="updateData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Page SEO</h5>
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
                            <input type="hidden" id="data-id">
                            <div class="col-6 mt-3">
                                <label class="form-label">SEO Name *</label>
                                <input readonly="" title="Invalid Name" required="" type="text" id="name" class="form-control" >
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">SEO Title *</label>
                                <input  required="" type="text" class="form-control" id="title">
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">SEO Share Title *</label>
                                <input required="" type="text" class="form-control" id="shareTitle" >
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">SEO Keywords *</label>
                                <input required="" type="text" class="form-control" id="keyword" >
                            </div>
                            <div class="col-12 mt-3">
                                <label class="form-label">SEO Image Link *</label>
                                <input  required="" type="text" class="form-control" id="imageLink">
                            </div>
                            <div class="col-12 mt-3">
                                <label class="form-label">SEO Description *</label>
                                <textarea required="" rows="4" class="form-control" id="description" placeholder=""></textarea>
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
    //insert Data
    $('#updateData').submit(function (e){

        let thisBtn = $("#updateDataBtn");
        let id = $('#update-modal #data-id');
        let name = $('#update-modal #name');
        let title = $('#update-modal #title');
        let shareTitle = $('#update-modal #shareTitle');
        let keyword = $('#update-modal #keyword');
        let description = $('#update-modal #description');
        let imageLink = $('#update-modal #imageLink');
        LoadingButton(thisBtn);
        axios.post('/PageSeo/Update', {
            id: id.val(),
            name: name.val(),
            title: title.val(),
            shareTitle: shareTitle.val(),
            keyword: keyword.val(),
            description: description.val(),
            imageLink: imageLink.val()
        }).then(function (response) {
            if(response.status === 200){
                let data = response.data;
                RemoveLoadingButton(thisBtn);
                if(data === 1){
                    SuccessToast("Request Successful.");
                    $('#update-modal').modal('hide');
                    name.val('');
                    title.val('');
                    shareTitle.val('');
                    keyword.val('');
                    description.val('');
                    imageLink.val('');
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
