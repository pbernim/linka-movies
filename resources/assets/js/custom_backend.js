// Custom backend

function deleteMovie(id) {
    event.preventDefault();                                
    if(confirm('Are you sure your want to delete?'))
    {
        var form = document.getElementById("delete-form");
        form.action = form.action.replace(':MOVIE-ID', id);
        form.submit();
    }                                
}

$(document).ready(function() {
          
      // Summernote editor
      $('#summernote').summernote({
            height: 200
      });

      // Preview image before and after upload
      $("#fileUpload").on('change', function () {

            if (typeof (FileReader) != "undefined") {

              var file = $("input[id='fileUpload']").prop('files')[0];              
              if(file.type == "image/jpeg") {
                var image_holder = $("#image-holder");
                image_holder.empty();

                var reader = new FileReader();
                reader.onload = function (e) {
                  $("<img />", {
                      "src": e.target.result,
                      "class": "img-thumbnail"
                  }).appendTo(image_holder);

                  }
                  image_holder.show();
                  reader.readAsDataURL($(this)[0].files[0]);
                } else {
                  alert("Invalid file type: " + file.name );
                }
               
              
          } else {
              alert("This browser does not support FileReader.");
          }

    });

});

          

 