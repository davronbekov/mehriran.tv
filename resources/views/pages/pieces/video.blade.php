<div class="col-md-4 documentary">
    <a href="#" data-toggle="modal" data-target="#file_modal_{{$file->id}}">
        <img src="{{ url($file->relationSnapshot->getUrl()) }}" width="318" height="175">
        <img src="{{ url('images/video_play_ico.png') }}" width="61" height="48" style="position:absolute;left: 145px; top: 63px;">
        <div class="text-white pl-3">
            {{ $file->relationParams->title }}
        </div>
    </a>
    <div class="row">
        <div class="col-3">
            <a href="#" data-toggle="modal" data-target="#file_modal_{{$file->id}}">
                Info
            </a>
        </div>
        <div class="col-6"></div>
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
                <h5 class="modal-title">{{ $file->relationParams->title }}</h5>
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
                                    mute: true,
                                    height: 360,
                                    width: '100%'
                                });

                                player.attachTo(playerElement);
                            </script>
                        @endif
                    </div>
                    <div class="col-md-12 mt-3">
                        <a href="" class="float-right">
                            <ion-icon name="share-social-outline" style="font-size: 20px;position:absolute;right: 3.5rem;" class="menu_buttons"></ion-icon>
                            <span style="padding-left: 1rem">Share</span>
                        </a>
                    </div>
                    <div class="col-md-12">
                        {!! $file->relationParams->description !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
