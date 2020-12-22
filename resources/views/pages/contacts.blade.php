@extends('layouts.app')

@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                {{--      Feedback          --}}
                <h2 class="text-danger mb-5">
                    ONLINE INQUIRY
                </h2>

                <div class="row" style="background-color: #EAEAEC">
                    <div class="col-md-6">
                        <img src="{{ url('images/feedback_ico.png') }}" class="w-50" style="margin:5rem 0 5rem 25%;">
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('feedback', ['lang' => app()->getLocale()]) }}" method="POST" class="w-75" style="margin-left: 12.5%; margin-top: 3rem">
                            @csrf

                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your name" name="name" required>
                            </div>

                            <div class="input-group mt-3">
                                <input type="text" class="form-control" placeholder="Your phone" name="phone" required>
                            </div>

                            <div class="input-group mt-3">
                                <input type="email" class="form-control" placeholder="Your email" name="email" required>
                            </div>

                            <div class="input-group mt-3">
                                <textarea name="text" class="form-control" placeholder="Enter your message..." rows="5" required></textarea>
                            </div>

                            <div class="mt-3" id="feedback_captcha" style="margin: 0 auto; width: 300px;"></div>

                            <div class="input-group mt-3 mb-5">
                                <input type="submit" id="feedback_btn" class="form-control bg-light w-50" value="Send">
                            </div>

                        </form>

                        <script type="text/javascript">
                            var onloadCallback = function() {
                                grecaptcha.render('feedback_captcha', {
                                    'sitekey' : '6Lc8fOAZAAAAAJp0rE6goXsOjgp8B8VHblCEvnTS',
                                    'callback' : correctCaptcha
                                });
                            };

                            var correctCaptcha = function(response) {
                                if(response.length !== 0){
                                    var btn = $('#feedback_btn');
                                    btn.removeClass('bg-light');
                                    btn.addClass('bg-primary');
                                }
                            };
                        </script>

                    </div>
                </div>



            </div>
        </div>
    </div>

@endsection
