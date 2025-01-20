function imagePreview(event) {
    var file = event.target.files[0];
    const errorMsg = document.getElementById('errorMsg')
    // Check if a file was selected
    if (file) {
      // Get the file extension (the part after the last dot)
      var fileExtension = file.name.split('.').pop().toLowerCase();
  
      // Check if the file extension is valid
      if (['jpg', 'jpeg', 'png'].includes(fileExtension)) {
        // Check if the file size is less than 800KB (800 * 1024 bytes)
        if (file.size <= 800 * 1024) {
          var image = URL.createObjectURL(file);
          console.log(image);
          var imageBox = document.getElementById('previewBox');
          var img = document.createElement('img');
          // img.style.width = "200px";
          function imagePreview(event) {
            var file = event.target.files[0];
            const errorMsg = document.getElementById('errorMsg')
            // Check if a file was selected
            if (file) {
              // Get the file extension (the part after the last dot)
              var fileExtension = file.name.split('.').pop().toLowerCase();
  
              // Check if the file extension is valid
              if (['jpg', 'jpeg', 'png'].includes(fileExtension)) {
                // Check if the file size is less than 800KB (800 * 1024 bytes)
                if (file.size <= 800 * 1024) {
                  var image = URL.createObjectURL(file);
                  console.log(image);
                  var imageBox = document.getElementById('previewBox');
                  var img = document.createElement('img');
                  img.src = image;
                  imageBox.appendChild(img);
                  errorMsg.innerHTML = ""
                  // Remove the first child if more than one image is shown
                  if (imageBox.children.length > 1) {
                    imageBox.children[0].remove();
                  }
                } else {
                  errorMsg.innerHTML = "File size exceeds 800KB. Please choose a smaller file."
                  // Clear the input value to prevent further processing
                  event.target.value = "";
                }
              } else {
                errorMsg.innerHTML = "Invalid file format. Please select a JPG, JPEG, or PNG image."
                // Clear the input value to prevent further processing
                event.target.value = "";
              }
            }
          }
          img.src = image;
          imageBox.appendChild(img);
          errorMsg.innerHTML = ""
          // Remove the first child if more than one image is shown
          if (imageBox.children.length > 1) {
            imageBox.children[0].remove();
          }
        } else {
          errorMsg.innerHTML = "File size exceeds 800KB. Please choose a smaller file."
          // Clear the input value to prevent further processing
          event.target.value = "";
        }
      } else {
        errorMsg.innerHTML = "Invalid file format. Please select a JPG, JPEG, or PNG image."
        // Clear the input value to prevent further processing
        event.target.value = "";
      }
    }
  }

function checkPasswordMatch() {
    var newPassword = document.getElementById('newPassword').value;
    var renewPassword = document.getElementById('renewPassword').value;
    var indicator = document.getElementById('password-match-indicator');
    var changePasswordBtn = document.getElementById('changePasswordBtn');
  
    if (newPassword === renewPassword) {
        indicator.innerHTML = '<div class="text-success">Passwords Matched</div>';
        changePasswordBtn.disabled = false;
    } else {
        indicator.innerHTML = '<div class="text-warning">Passwords Do Not Match</div>';
        changePasswordBtn.disabled = true;
    }
  }

  function validate(form,event) {
    let fields = form.querySelectorAll('.validField');
    for (let i = 0; i < fields.length; i++) {
        if (fields[i].previousElementSibling.value.trim() === "") {
            fields[i].classList.remove('d-none');
            event.preventDefault();
        } else {
            fields[i].classList.add('d-none');
        }
    }
  }