$(document).on("click", '.delete_project_img', function (e) {
    e.preventDefault();
    var isTrue = confirm("Delete this image?");
    if(isTrue==true){
        var href=$(this).attr('href');
        $(this).parent('div').parent('div').remove();
        $.get( href );
    }
});