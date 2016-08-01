<!-- /.modal -->
<style type="text/css">
    .footer-b {
        --main-bgcolor: {{ $data }};
    }
    .footer-b {
        height:40px; width:100%;
        background-color: var(--main-bgcolor);
    }
</style>
<footer class="footer-a">
    <div class="wrapper-padding">
        <div class="section">
            <div class="footer-lbl">Get In Touch</div>
            <div class="footer-adress">Address: 58911 Lepzig Hore,<br />85000 Vienna, Austria</div>
            <div class="footer-phones">Telephones: +1 777 55-32-21</div>
            <div class="footer-email">E-mail: contacts@miracle.com</div>
            <div class="footer-skype">Skype: angelotours</div>
        </div>
        <div class="section">
            <div class="footer-lbl">Top Routes</div>
            <div class="" style="font-family: DejaVu Sans, 'trebuchet ms', verdana, sans-serif;color: white">Address: 58911 Lepzig Hore,<br />85000 Vienna, Austria</div>
        </div>
        <div class="section">
            <div class="footer-lbl">Twitter widget</div>
            <div class="twitter-wiget">
                <div id="twitter-feed"></div>
            </div>
        </div>
        <div class="section">
            <div class="footer-lbl">newsletter sign up</div>
            <form>
            <div class="footer">
                <div class="">
                    <input type="text" class="form-control" placeholder="you email" value="" />
                </div>
            </div>
            <div class="clear"></div>
            <button class="btn btn-info" type="submit">Sign up</button>
            </form>
        </div>
    </div>
    <div class="clear"></div>
</footer>

<footer class="footer-b">
    <div class="wrapper-padding">
        <div class="footer-left">© Copyright 2015 by MAKGROUP. All rights reserved.</div>
        <div class="footer-social">
            <a href="#" class="footer-twitter"></a>
            <a href="#" class="footer-facebook"></a>
            <a href="#" class="footer-instagram"></a>
        </div>
        <div class="clear"></div>
    </div>
</footer>
<script src="{{ asset('assets/js/bootstrap/bootstrap.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.date-inpt').datepicker({
            beforeShow: function() {
                setTimeout(function(){
                    $('.ui-datepicker').css('z-index', 99999999999999);
                }, 0);
            },
            dateFormat:'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            minDate: +1
        });
    });
</script>
</body>

<!-- Mirrored from sparrow-html.weblionmedia.net/booking_complete.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Jul 2016 08:49:57 GMT -->
</html>