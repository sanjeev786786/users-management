function preview(img, selection) {
    var scaleX = thumb_width / selection.width;
    var scaleY = thumb_height / selection.height;

    $('#thumbnail + div > img').css({
            width: Math.round(scaleX * image_width) + 'px',
            height: Math.round(scaleY * image_height) + 'px',
            marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
            marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
    });
    $('#x1').val(selection.x1);
    $('#y1').val(selection.y1);
    $('#x2').val(selection.x2);
    $('#y2').val(selection.y2);
}

$(document).ready(function () {
    $('#save_thumb').click(function() {
        var x1 = $('#x1').val();
        var y1 = $('#y1').val();
        var x2 = $('#x2').val();
        var y2 = $('#y2').val();
        if(x1=="" || y1=="" || x2=="" || y2==""){
                alert("You must make a selection first");
                return false;
        }else{
                return true;
        }
    });
});

$(window).load(function () {
	 //alert("Youfirst");
    $('#thumbnail').imgAreaSelect({ maxWidth: 80, maxHeight: 200, handles: true,x1: 120, y1: 90, x2: 200, y2: 290 , onSelectChange: preview });
});