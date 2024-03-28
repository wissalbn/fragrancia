// bytewebster.com
// bytewebster.com
// bytewebster.com
function showSweetAlert() {
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Deleted!',
        'Record has been successfully deleted.',
        'success'
      )
    }
  })
}
  document.getElementById("client-link").addEventListener("click", function() {
        document.getElementById("client-content").style.display = "block";
    });

    document.getElementById("commande-link").addEventListener("click", function() {
      document.getElementById("commande-content").style.display = "block";
  });
  document.getElementById("produir-link").addEventListener("click", function() {
    document.getElementById("produit-content").style.display = "block";
});

