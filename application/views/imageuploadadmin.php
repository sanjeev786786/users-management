<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
				    <?php 
					if($this->session->flashdata('msg')!='')
					{ 
					?>
					  <div class="alert alert-success alert-dismissable" id="mydiv" style="margin-top:5px;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4>	<i class="icon fa fa-check"></i><?php echo $this->session->flashdata('msg') ?></h4>
					   
					  </div>
				<?php } ?>	
                    <h1 class="page-header">Image Upload</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Upload Image
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
								
								<!--------image---------------->
                                    

								<form id="form" method="post" enctype="multipart/form-data" action="imageupload/post">
									
									<div class="col-md-12">
									  <div class="col-md-6">
									  <h2>Original</h2>
									  <div id="jcrop"></div>
									    <input  style="margin-top: 33px;" id="file" type="file" name="old_img" required />
									  </div>
									
									 <div class="col-md-6">
									 <h2>Result</h2>
									 
									<div class="image_can" >
									    <img id="can_img" src=""/>
										<canvas id="canvas" class="portrait " ></canvas>
									
									</div>
									
									<input id="png" type="hidden" name="new_img" />
									
									<button style="margin-top: 33px;" type="submit" value="Submit" class="btn btn-primary">Submit</button>
									</div>
									</div>
								</form>
                                <!--------endimage---------------->
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
		
		
    
<script>
$("#file").change(function(){
	var png = $("#canvas")[0].toDataURL('image/png');
	$("#png").val(png);
	
	picture(this);
});
var picture_width;
var picture_height;
var crop_max_width = 300;
var crop_max_height = 300;
function picture(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$("#jcrop, #preview").html("").append("<img src=\""+e.target.result+"\" alt=\"\" />");
			picture_width = $("#preview img").width();
			picture_height = $("#preview img").height();
			$("#jcrop  img").Jcrop({
				onChange: canvas,
				onSelect: canvas,
				boxWidth: crop_max_width,
				boxHeight: crop_max_height
			});
		}
		reader.readAsDataURL(input.files[0]);	
		
			setTimeout(function() {
		      var src_img = $('#jcrop img').attr('src');
			  $("#can_img").attr('src', src_img);
			  $("#can_img").css('display','block');
			  $('input[name="new_img"]').val(src_img);
	        }, 1000);
			
		//
	}
}
function canvas(coords){
	var imageObj = $("#jcrop img")[0];
	var canvas = $("#canvas")[0];
	canvas.width  = coords.w;
	canvas.height = coords.h;
	var context = canvas.getContext("2d");
	context.drawImage(imageObj, coords.x, coords.y, coords.w, coords.h, 0, 0, canvas.width, canvas.height);
	$("#can_img").css('display','none');
	png();
}
function png() {
	var png = $("#canvas")[0].toDataURL('image/png');
	$("#png").val(png);
}

</script>

<script src="<?php echo base_url();?>public/javascript/jquery.Jcrop.min.js" type="text/javascript"></script>		
	