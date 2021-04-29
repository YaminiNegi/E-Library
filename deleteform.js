jQuery(document).ready(function ($) {
  console.log("here");

  $(".delete_book").submit(function (event) {
    event.preventDefault();
    var del=confirm("Are you sure you want to Delete this book?");
    if(del){
      var book_id = $("#delete_book_id").val();
      console.log(book_id);
      var formData = {
        id: book_id,
      };

      console.log(formData);
      $.ajax({
        type: "POST",
        url: "book_details.php",
        data: formData,
        success: function(res) {

          if (res['success']) {
            alert('here');
          }
       } 
       
      });
      alert("Book Deleted Successfully");
      location.href="index.php";

  }
  });
 });

