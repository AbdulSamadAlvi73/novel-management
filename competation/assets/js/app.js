// Template Name: Striker
// Template URL: https://techpedia.co.uk/template/striker
// Description:  Striker - Sports Club Html Template
// Version: 1.0.0

(function (window, document, $, undefined) {
  "use strict";
  var Init = {
    i: function (e) {
      Init.s();
      Init.methods();
    },
    s: function (e) {
      (this._window = $(window)),
        (this._document = $(document)),
        (this._body = $("body")),
        (this._html = $("html"));
    },
    methods: function (e) {
      Init.w();
      Init.BackToTop();
      Init.preloader();
      Init.jsSlider();
      Init.searchToggle();
      Init.quantityHandle();
      Init.wishlistButton();
      Init.countdownInit(".countdown", "2023/12/01");
      Init.initializeSlick();
      Init.formValidation();
      Init.contactForm();
      Init.wizardInit();
    },

    w: function (e) {
      this._window.on("load", Init.l).on("scroll", Init.res);
    },

    BackToTop: function () {
      var btn = $("#backto-top");
      $(window).on("scroll", function () {
        if ($(window).scrollTop() > 300) {
          btn.addClass("show");
        } else {
          btn.removeClass("show");
        }
      });
      btn.on("click", function (e) {
        e.preventDefault();
        $("html, body").animate(
          {
            scrollTop: 0,
          },
          "300"
        );
      });
    },

    preloader: function () {
      setTimeout(function () {
        $("#preloader").hide("slow");
      }, 2000);
    },
    jsSlider: function () {
      if ($(".js-slider").length) {
        $(".js-slider").ionRangeSlider({
          skin: "big",
          type: "double",
          grid: false,
          min: 0,
          max: 100,
          from: 20,
          to: 80,
          hide_min_max: true,
          hide_from_to: true,
        });
      }
    },

    searchToggle: function () {
      if ($('.search-form').length) {
        $('.search-btn').on('click', function () {
          if ($('.search-form').hasClass('non-active')) {
            $('.search-form').removeClass('non-active');
          } else {
            $('.search-form').addClass('non-active');
          }
          $(this).find("i").toggleClass("fa-search fa-times");
          return false;
        });
      }
    }, 

    quantityHandle: function () {
      $(".decrement").on("click", function () {
        var qtyInput = $(this).closest(".quantity-wrap").children(".number");
        var qtyVal = parseInt(qtyInput.val());
        if (qtyVal > 0) {
          qtyInput.val(qtyVal - 1);
        }
      });
      $(".increment").on("click", function () {
        var qtyInput = $(this).closest(".quantity-wrap").children(".number");
        var qtyVal = parseInt(qtyInput.val());
        qtyInput.val(parseInt(qtyVal + 1));
      });
    },

    wishlistButton: function () {
      if ($(".wishlist-icon").length) {
        $('.wishlist-icon').on('click', function() {
          $(this).find('.fal').toggleClass('fas');
          return false;
        })
      }
    },


    initializeSlick: function (e) {
      if ($(".books-slider").length) {
        $(".books-slider").slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 3000,
          dots: true,
          arrows: false,
          centerPadding: "0",
          
          cssEase: "linear",
          responsive: [
            {
              breakpoint: 1399,
              settings: {
                slidesToShow: 3,
              },
            },
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 2,
              },
            },
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 2,
                dots: false,
              },
            },
            {
              breakpoint: 575,
              settings: {
                slidesToShow: 1,
                dots: false,
              },
            },
          ],
        });
      }
      if ($(".testimonials-area").length) {
        $(".testimonials-area").slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 3000,
          dots: true,
          arrows: true,
          centerPadding: "0",
          // cssEase: "linear",
          fade: true,
          responsive: [
            {
              breakpoint: 1399,
              settings: {
                slidesToShow: 1,
              },
            },
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 1,
              },
            },
            {
              breakpoint: 575,
              settings: {
                arrows: false,
                slidesToShow: 1,
              },
            },
            {
              breakpoint: 399,
              settings: {
                arrows: false,
                dots: false,
              },
            },
          ],
        });
      }
      if ($(".trending-book-slider").length) {
        $(".trending-book-slider").slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          autoplay: false,
          autoplaySpeed: 3000,
          dots: true,
          arrows: false,
          centerPadding: "0",
          cssEase: "linear",
          responsive: [
            {
              breakpoint: 1199,
              settings: {
                slidesToShow: 3,
              },
            },
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 2,
                dots: false,
              },
            },
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 2,
                dots: false,
              },
            },
            {
              breakpoint: 575,
              settings: {
                slidesToShow: 1,
                dots: false,
              },
            },
          ],
        });
      }
      if ($(".weekly-deals-slider").length) {
        $(".weekly-deals-slider").slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 3000,
          dots: true,
          arrows: false,
          centerPadding: "0",
          cssEase: "linear",
          responsive: [
            {
              breakpoint: 1399,
              settings: {
                slidesToShow: 3,
              },
            },
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 2,
              },
            },
            {
              breakpoint: 575,
              settings: {
                slidesToShow: 1,
              },
            },
          ],
        });
      }
      if ($(".horror-books-slider").length) {
        $(".horror-books-slider").slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 3000,
          dots: true,
          arrows: false,
          centerPadding: "0",
          cssEase: "linear",
          responsive: [
            {
              breakpoint: 1399,
              settings: {
                slidesToShow: 3,
              },
            },
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 2,
                dots: false,
              },
            },
            {
              breakpoint: 575,
              settings: {
                slidesToShow: 2,
                dots: false,

              },
            },
          ],
        });
      }
    },
    wizardInit: function () {
      $('#form-wizard').smartWizard();
    },
    countdownInit: function (countdownSelector, countdownTime, countdown) {
      var eventCounter = $(countdownSelector);
      if (eventCounter.length) {
        eventCounter.countdown(countdownTime, function (e) {
          $(this).html(
            e.strftime(
              '<li><h6>%D</h6><h6>Days</h6></li>\
              <li><h6>%H</h6><h6>Hrs</h6></li>\
              <li><h6>%M</h6><h6>Min</h6></li>\
              <li><h6>%S</h6><h6>Sec</h6></li>'
            )
          );
        });
      }
    },

    formValidation: function () {
      if ($(".contact-form").length) {
        $(".contact-form").validate();
      }
    },

    contactForm: function () {
      $(".contact-form").on("submit", function (e) {
        e.preventDefault();
        if ($(".contact-form").valid()) {
          var _self = $(this);
          _self
            .closest("div")
            .find('button[type="submit"]')
            .attr("disabled", "disabled");
          var data = $(this).serialize();
          $.ajax({
            url: "./assets/mail/contact.php",
            type: "post",
            dataType: "json",
            data: data,
            success: function (data) {
              $(".contact-form").trigger("reset");
              _self.find('button[type="submit"]').removeAttr("disabled");
              if (data.success) {
                document.getElementById("message").innerHTML =
                  "<h3 class='bg-success text-white p-3 mt-3'>Email Sent Successfully</h3>";
              } else {
                document.getElementById("message").innerHTML =
                  "<h3 class='bg-success text-white p-3 mt-3'>There is an error</h3>";
              }
              $("#message").show("slow");
              $("#message").slideDown("slow");
              setTimeout(function () {
                $("#message").slideUp("hide");
                $("#message").hide("slow");
              }, 3000);
            },
          });
        } else {
          return false;
        }
      });
    },
  };
  Init.i();
})(window, document, jQuery);
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