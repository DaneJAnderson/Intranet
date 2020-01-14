
<div ng-controller="ModalDemoCtrl as $ctrl" class="modal-demo">
    <script type="text/ng-template" id="loginPopup.html">
        <div class="modal-header">
            <h3 class="modal-title" id="modal-title">User Login!</h3>
        </div>
        <div class="modal-body" id="modal-body">
            <!-- <ul>
                <li ng-repeat="item in $ctrl.items">
                    <a href="#" ng-click="$event.preventDefault(); $ctrl.selected.item = item">@{{ item }}</a>
                </li>
            </ul> -->
            <p class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" required />
              </p>
              <p class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" required />
              </p>
           <!-- Selected: <b>@{{ $ctrl.selected.item }}</b> -->
        </div>
        <div class="modal-footer">
            <button class="btn btn-success" type="button" ng-click="$ctrl.login()">Login</button>
            <button class="btn btn-warning" type="button" ng-click="$ctrl.cancel()">Cancel</button>
        </div>
    </script>
    

    {{-- <button type="button" class="btn btn-default" ng-click="$ctrl.open()">Open me!</button> --}}

    <div  class="col-md-2 col-xs-12" style="width:80px !important; height: 60px !important; margin-top: 30px"  ng-click="$ctrl.open()">
        <img class="thumbs img-rounded" style="width:100px !important; height: 80px !important;"  src="images/addBday.png" alt="pic">
    </div>
   
    <div ng-show="$ctrl.selected">Selection from a modal: @{{ $ctrl.selected }}</div>
    <div class="modal-parent">
    </div>
</div>




