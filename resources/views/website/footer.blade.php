<!-- /.modal -->
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
            <div class="footer-lbl">Featured deals</div>
            <div class="footer-tours">
                <!-- // -->
                <div class="footer-tour">
                    <div class="footer-tour-l"><a href="#"><img alt="" src="img/f-tour-01.jpg" /></a></div>
                    <div class="footer-tour-r">
                        <div class="footer-tour-a">amsterdam tour</div>
                        <div class="footer-tour-b">location: netherlands</div>
                        <div class="footer-tour-c">800$</div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- \\ -->
            </div>
        </div>
        <div class="section">
            <div class="footer-lbl">Twitter widget</div>
            <div class="twitter-wiget">
                <div id="twitter-feed"></div>
            </div>
        </div>
        <div class="section">
            <div class="footer-lbl">newsletter sign up</div>
            <div class="footer-subscribe">
                <div class="footer-subscribe-a">
                    <input type="text" placeholder="you email" value="" />
                </div>
            </div>
            <button class="footer-subscribe-btn">Sign up</button>
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