<!-- start scroll-to-top -->
<div id="scroll-to-top">
    <i class="far fa-angle-up" title="Go top"></i>
</div>
<!-- end scroll-to-top -->

<!-- Template JS Files -->
<script src="{{ asset('website2/js/jquery-3.4.1.min.js') }} "></script>
<script src="{{ asset('website2/js/bootstrap.bundle.min.js') }} "></script>
<script src="{{ asset('website2/js/bootstrap-select.min.js') }} "></script>
<script src="{{ asset('website2/js/owl.carousel.min.js') }} "></script>
<script src="{{ asset('website2/js/jquery.fancybox.min.js') }} "></script>
<!-- Start counter js -->
<script src="{{ asset('website2/js/waypoints.min.js') }} "></script>
<script src="{{ asset('website2/ js/jquery.counterup.min.js') }}"></script>
<!-- end counter js -->
<script src="{{ asset('website2/js/jquery.lazy.min.js') }} "></script>
<script src="{{ asset('website2/js/main.js') }} "></script>
<script src="{{ asset('js/custom.js') }}"></script>

<script>
    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('your-form-id');
        const loading = document.getElementById('loading');

        form.addEventListener('submit', function() {
            // Show the loading element when the form is submitted
            loading.style.display = 'block';
        });
    });
</script>

<script>
    // Show the loading element on page load
    $(document).ready(function() {
        $('#loading').show();
    });
</script>

<script>
    // Show the loading element when the form is submitted
    $(document).ready(function() {
        $('form').submit(function() {
            $('#loading').show();
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"
    integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
   const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
 </script>
</body>


</html>
