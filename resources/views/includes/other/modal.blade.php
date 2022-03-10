
<style>
    .socio-li{
        width: 100%;
        padding: 0px 18px;
    }
    a.social-button {
    font-size: 300%;
    text-align: center;
}
</style>

{{-- Start Modal Share --}}


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary disp-0" data-toggle="modal" data-target="#eventShareModalCenter" id="eventshare">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="eventShareModalCenter" tabindex="-1" role="dialog" aria-labelledby="eventShareModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="eventShareModalLongTitle">Share on Social Media</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body">
        <div id="social-links">
            <ul style="list-style: none; display: inline-flex;">
                <li class="socio-li" id='facebook'></li>
                <li class="socio-li" id='linkedin'></li>
                <li class="socio-li" id='twitter'></li>
                <li class="socio-li" id='telegram'></li>
            </ul>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- End Modal Share --}}
