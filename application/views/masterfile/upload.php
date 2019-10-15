<div class="modal fade" id="uploadfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload File
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>                                        
            </div>
            <form method='POST' action='upload_excel' enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="file" class="form-control" name="csv">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Upload</h4>
                            <p class="category">..</p>
                            <br>
                        </div>
                    	<div class="datatable-dashv1-list custom-datatable-overright">
                            <div style="padding: 15px">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <form method='POST' action='upload_excel' enctype="multipart/form-data">
                                            <div class="form-group">
                                                Select Location
                                                <select name="location" id="image" class="form-control" onChange="imageUpdate();">
                                                    <option value="" selected="">--Select Location--</option>
                                                    <?php foreach($location AS $l){ ?>
                                                    <option value="<?php echo $l->location_id;?>" myTag="<?php echo $l->logo;?>"><?php echo $l->location_name; ?></option>
                                                    <?php } ?>
                                                    <!-- <option value="2.png">logo 2</option>
                                                    <option value="3.png">logo 3</option>
                                                    <option value="4.png">logo 4</option> -->
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                Upload File
                                                <input type="file" class="form-control" name="csv">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary btn-md btn-block" value="Upload" name="">
                                            </div>
                                        </form>
                                        <div style="padding-bottom: 500px"></div>
                                    </div>
                                    <div class="col-lg-7">
                                            <div class="thumbnail" style="width: 550px">
                                                <img class="imageNews"  />
                                            </div>                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function imageUpdate() {
            var image = $('select#image option:selected').attr('mytag')
            //alert(image);
            //var image = $("select#image").val();
            var path = "<?php echo base_url(); ?>uploads/";
            var src = $("img.imageNews").attr({
                src: path + image,
                title: "Image",
                alt: "Image"
            });
        }
    </script>