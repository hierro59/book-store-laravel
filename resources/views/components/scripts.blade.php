<!-- JAVASCRIPT FILES ========================================= -->

<script src="{{ asset('assets/js/jquery.min.js') }}"></script><!-- JQUERY MIN JS -->
<script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script><!-- BOOTSTRAP MIN JS -->
<script src="{{ asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script><!-- BOOTSTRAP SELECT MIN JS -->
<script src="{{ asset('assets/vendor/counter/waypoints-min.js') }}"></script><!-- WAYPOINTS JS -->
<script src="{{ asset('assets/vendor/counter/counterup.min.js') }}"></script><!-- COUNTERUP JS -->
<script src="{{ asset('assets/vendor/wow/wow.min.js') }}"></script><!-- WOW JS -->
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script><!-- SWIPER JS -->
<script src="{{ asset('assets/js/tp.carousel.js') }}"></script><!-- tp CAROUSEL JS -->
<script src="{{ asset('assets/js/tp.ajax.js') }}"></script><!-- AJAX -->
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
<script>
    $(document).ready(function() {



        $("#display-01").click(function() {
            $("#div-01").fadeIn('slow');
            $("#div-02").fadeOut('slow');
        });
        $("#display-02").click(function() {
            $("#div-02").fadeIn('slow');
            $("#div-01").fadeOut('slow');
        });



        /* NOTIFICACIONES */
        $("#dropdownMenuButton1").click(function(e) {
            e.preventDefault();
            var formdata = $('#notifications').serialize();
            $.ajax({
                type: "post",
                url: "notifications/update",
                data: formdata
            });
        });

        $("[data-book_id]").click(function(e) {

            let data = {
                'user_id': $(this).attr("data-user_id"),
                'book_id': $(this).attr("data-book_id")
            };

            request = $.ajax({
                type: "get",
                url: "hearts",
                data: data
            });
            request.done(function(response) {

                //console.log(response);
            });
            request.fail(function() {
                console.log(response);
            });
        });
    });
</script>
