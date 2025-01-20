<?php
if (isset($_SESSION['status'])) {
?>
  <script>
    Swal.fire({
      title: "<?php echo $_SESSION['status'][1] ?>",
      text: "<?php echo $_SESSION['status'][2] ?>",
      icon: "<?php echo $_SESSION['status'][0] ?>",
      timer: "<?php echo $_SESSION['status'][3] ?>",
      showConfirmButton: "<?php echo $_SESSION['status'][4] ?>"
    });
  </script>
<?php
  unset($_SESSION['status']);
}
?>
<script>
  function cnfrmTask(e,request,name,action,transData,confirmMessage,successMessage) {
    e.preventDefault();
    $(document).ready(function() {
      Swal.fire({
        title: "Are you sure?",
        text: confirmMessage,
        icon: "warning",
        showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes"
      }).then((result) => {
  if (result.isConfirmed) {
          $.ajax({
            type: request,
            url: action,
            data: {
              [name]:1,
              "data": transData
            },
            success: function(response) {
              Swal.fire({
                title: successMessage,
                icon: "success",
              }).then((result)=>{
                location.reload();
              })
            }
          })
        }
      });
    })
  };
  function bookmark(icon,e,request,name,action,transData) {
    e.preventDefault();
    $(document).ready(function() {
          $.ajax({
            type: request,
            url: action,
            data: {
              [name]:1,
              "data": transData
            },
            success: function(response) {    
              icon.querySelector('.fa-bookmark').classList.toggle('fal');
              icon.querySelector('.fa-bookmark').classList.toggle('fa');
              icon.querySelector('.fa-bookmark').classList.toggle('color-primary');
            }
          })
       
    })
  }
</script>