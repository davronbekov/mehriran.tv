<div class="col-md-4 documentary">
    <a href="#" data-toggle="modal" data-target="#file_modal_{{$file->id}}">
        <img src="{{ url($file->relationSnapshot->getUrl()) }}" width="318" height="175">
        <img src="{{ url('images/video_play_ico.png') }}" width="61" height="48" style="position:absolute;left: 145px; top: 63px;">
        <div class="text-white pl-3">
            {{ $file->title }}
        </div>
    </a>
    <div class="row">
        <div class="col-3">
            <a href="#" data-toggle="modal" data-target="#file_modal_{{$file->id}}">
                Info
            </a>
        </div>
        <div class="col-6">

        </div>
        <div class="col-3">
            <a href="">
                <ion-icon name="share-social-outline" style="font-size: 20px;position:absolute;left: 0.5rem;top:0.5rem" class="menu_buttons"></ion-icon>
                <span style="padding-left: 1rem">Share</span>
            </a>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="file_modal_{{$file->id}}">
    <div class="modal-dialog" style="max-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $file->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <b>Trailer</b>
                    </div>
                    <div class="col-md-12">
                        @if(!is_null($file->youtube_url))
                            <iframe width="100%" height="360" src="https://www.youtube.com/embed/{{ $file->youtube_url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @else
                            <div id="file_player_{{$file->id}}"></div>
                            <script>
                                var playerElement = document.getElementById("file_player_{{$file->id}}");

                                var player = new Clappr.Player({
                                    source: '{{ $file->getFileUrl() }}',
                                    poster: '{{ url($file->relationSnapshot->getUrl()) }}',
                                    height: 360,
                                    width: '100%'
                                });

                                player.attachTo(playerElement);


                                $('#file_modal_{{$file->id}}').on('hide.bs.modal', function (e) {
                                    var videoElement = $('#file_player_{{$file->id}} video')[0];
                                    videoElement.pause();
                                    videoElement.currentTime = 0;
                                })
                            </script>
                        @endif
                    </div>
                    <div class="col-md-12 mt-3">

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div id="paypal-button{{ $file->id }}" style="margin-top: 5px"></div>
                                @auth
                                    <script>
                                        @if($file->relationParams->price)
                                            createButton({{ $file->id }}, {{ $file->relationParams->price }}, {{ auth()->user()->getAuthIdentifier() }})
                                        @endif
                                    </script>
                                @else
                                    <a href="#" class="btn btn-primary w-100" data-toggle="modal" data-target="#login_modal">
                                        Login is required to purchase
                                    </a>
                                @endauth
                            </div>
                            <div class="col-md-4">
                                <a href="" class="float-right">
                                    <ion-icon name="share-social-outline" style="font-size: 20px;position:absolute;right: 3.5rem;" class="menu_buttons"></ion-icon>
                                    <span style="padding-left: 1rem">Share</span>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        {!! $file->description !!}
                    </div>

                    <div class="col-md-12 mt-2">
                        <h4>Comments:</h4>
                    </div>

                    @if(!is_null($file->relationComments))
                        @foreach($file->relationComments as $comment)
                            <div class="col-md-12 mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mt-0">
                                            {{ $comment->relationUsers->name }}
                                        </h5>
                                        <div>
                                            {{ $comment->comment }}

                                            <span class="float-right"> {{ $comment->created_at }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <div class="col-md-12 mt-3">
                        @auth
                            <form action="{{ route('comments.addVideo', ['lang' => app()->getLocale()]) }}" method="POST">
                                @method('put')
                                @csrf

                                <input type="hidden" name="file_id" value="{{ $file->id }}" required>

                                <textarea class="form-control" placeholder="Leave a comment here" name="comment" style="height: 100px" required></textarea>

                                <input type="submit" class="btn btn-md mt-3 red_color text-white">
                            </form>
                        @else
                            Sign-in is required to leave comment
                        @endauth
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
