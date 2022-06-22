<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="insertData">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Page SEO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             <div class="container">
                 <div class="row">
                     <div class="col-6 mt-3">
                         <label class="form-label">SEO Name *</label>
                         <input  required="" type="text" id="name" class="form-control" >
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
                         <input   required="" type="text" class="form-control" id="imageLink">
                     </div>
                     <div class="col-12 mt-3">
                         <label class="form-label">SEO Description *</label>
                         <textarea required="" rows="4" class="form-control" id="description" placeholder=""></textarea>
                     </div>
                 </div>
             </div>
            </div>
            <div class="modal-footer">
                <button  id="insertData" type="submit" class="btn btn-success" >Save</button>
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
    $('#insertData').submit(function (e){
        let thisBtn = $(this);
        let name = $('#create-modal #name');
        let title = $('#create-modal  #title');
        let shareTitle = $('#create-modal  #shareTitle');
        let keyword = $('#create-modal  #keyword');
        let description = $('#create-modal  #description');
        let imageLink = $('#create-modal #imageLink');
        LoadingButton(thisBtn);
        axios.post('/PageSeo/Insert', {
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
                    if(data===1){
                        SuccessToast("Request Successful")
                        $( "#create-modal" ).modal('hide');
                        name.val('');
                        title.val('');
                        shareTitle.val('');
                        keyword.val('');
                        description.val('');
                        imageLink.val('');
                        CreateTableList();
                    }else{
                        ErrorToast("Request Failed.")
                    }
                }else{
                    ErrorToast("Request Failed.")
                }
            }).catch(function (error) {
            ErrorToast("Request Failed.")
        });
        e.preventDefault();
    });
</script>
