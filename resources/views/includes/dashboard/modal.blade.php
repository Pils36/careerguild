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


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary disp-0" data-toggle="modal" data-target="#exampleModalCenter" id="change_pass">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>

      </div>
      <form action="{{ route('passwordchange') }}" method="post">
        @csrf
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <h5>Old Password</h5>
                <input type="password" name="oldpassword" id="oldpassword" class="form-control" placeholder="Old Password">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5>New Password</h5>
                <input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="New Password">
            </div>
        </div>
      </div>
      <div class="modal-footer">

        <input type="hidden" name="username" value="{{ session('username') }}">
        <button type="submit" class="btn btn-primary btn-block">Change Password</button>

      </div>
      </form>
    </div>
  </div>
</div>



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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="eventShareModalLongTitle">Share on Social Media</h5>

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
