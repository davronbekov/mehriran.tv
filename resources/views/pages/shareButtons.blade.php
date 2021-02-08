<?php

    $share = new \Chencha\Share\Share(app());
    $url = request()->fullUrl();
?>

<div class="modal" tabindex="-1" id="share_modal">
    <div class="modal-dialog" style="max-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Share</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <a href="{{ $share->load($url, 'Mehriran.TV')->facebook() }}" target="_blank">
                    <img src="{{ url('images/icons/facebook.jpg') }}" width="50" height="50">
                </a>
                <a href="{{ $share->load($url, 'Mehriran.TV')->pinterest() }}" target="_blank">
                    <img src="{{ url('images/icons/pinterest.png') }}" width="50" height="50">
                </a>
                <a href="{{ $share->load($url, 'Mehriran.TV')->linkedin() }}" target="_blank">
                    <img src="{{ url('images/icons/linkedin.png') }}" width="50" height="50">
                </a>
                <a href="{{ $share->load($url, 'Mehriran.TV')->telegramMe() }}" target="_blank">
                    <img src="{{ url('images/icons/telegram.png') }}" width="50" height="50">
                </a>
                <a href="{{ $share->load($url, 'Mehriran.TV')->twitter() }}" target="_blank">
                    <img src="{{ url('images/icons/twitter.png') }}" width="50" height="50">
                </a>
                <a href="{{ $share->load($url, 'Mehriran.TV')->vk() }}" target="_blank">
                    <img src="{{ url('images/icons/vk.png') }}" width="50" height="50">
                </a>
            </div>

        </div>
    </div>
</div>
