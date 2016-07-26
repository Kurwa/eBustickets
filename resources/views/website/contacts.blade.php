@extends('website.main')
@section('main-count')

        <!-- main-cont -->
<div class="main-cont">
    {{--<div class="contacts-map">--}}
        {{--<div id="map"></div>--}}
    </div>
    <div class="clear"></div>
    <div class="contacts-page-holder">
        <div class="contacts-page">
            <header class="page-lbl">
                <div class="offer-slider-lbl">GET IN TOUCH WITH US</div>
                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit</p>
            </header>

            <div class="contacts-colls">
                <div class="contacts-colls-l">
                    <div class="contact-colls-lbl">OUR OFFICE</div>
                    <div class="contacts-colls-txt">
                        <p>Address: 58911 Lepzig Hore, 85000 Vienna, Austria </p>
                        <p>Telephones: +1 777 55-32-21</p>
                        <p>E-mail: contacts@miracle.com</p>
                        <p>Skype: sparrow</p>
                        <div class="side-social">
                            <a class="side-social-twitter" href="#"></a>
                            <a class="side-social-facebook" href="#"></a>
                            <a class="side-social-vimeo" href="#"></a>
                            <a class="side-social-pinterest" href="#"></a>
                            <a class="side-social-instagram" href="#"></a>
                        </div>
                    </div>
                </div>
                <div class="contacts-colls-r">
                    <div class="contacts-colls-rb">
                        <div class="contact-colls-lbl">Contact Us</div>
                        <div class="booking-form">
                                {{ Form::open(['id'=>'contact_form']) }}
                                <div class="booking-form-i">
                                    <label>First Name:</label>
                                    <div class="input"><input type="text" name="firstname" value="" /></div>
                                </div>
                                <div class="booking-form-i">
                                    <label>Last Name:</label>
                                    <div class="input"><input type="text" name="lastname" value="" /></div>
                                </div>
                                <div class="booking-form-i">
                                    <label>Email Adress:</label>
                                    <div class="input"><input type="text" name="email" value="" /></div>
                                </div>
                                <div class="booking-form-i textarea">
                                    <label>Message:</label>
                                    <div class="textarea-wrapper">
                                        <textarea name="message" cols="3" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <button class="btn btn-lg btn-info">Send message</button>
                            </form>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>

</div>
<!-- /main-cont -->
@stop
