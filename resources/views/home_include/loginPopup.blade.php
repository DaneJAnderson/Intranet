<style>
@media screen and (max-width: 1190px) {
  .addbday {
   
    float: right;
	
   
  }
}
.headerText {
  color: #4d79ff;
  text-shadow:
   -1px -1px 0 #fff,  
    1px -1px 0 #fff,
    -1px 1px 0 #fff,
     1px 1px 0 #fff;
}
</style>

<div ng-controller="ModalDemoCtrl as $ctrl" class="modal-demo">
    <script type="text/ng-template" id="loginPopup.html">
        <div class="modal-header bg-info">
            <center><h3 class="modal-title headerText " id="modal-title">HR & Learning Signin </h3></center>
        </div>
        <div class="modal-body" id="modal-body">
            <!-- <ul>
                <li ng-repeat="item in $ctrl.items">
                    <a href="#" ng-click="$event.preventDefault(); $ctrl.selected.item = item">@{{ item }}</a>
                </li>
            </ul> -->
            <p class="form-group">
                <label>Username</label>
                <input type="text" id="loginName" ng-keypress="$ctrl.pressEnter($event)" ng-model="loginName" class="form-control" required />
              </p>
              <p class="form-group">
                <label>Password</label>
                <input type="password" id="loginPwd" ng-keypress="$ctrl.pressEnter($event)" ng-model="loginPwd" class="form-control" required />
              </p>

              <p class="pull-right"><i> This should be your DeskTop Credentials </i></p>
           <!-- Selected: <b>@{{ $ctrl.selected.item }}</b> -->
        </div>
        <div class="modal-footer bg-info">
            <button class="btn btn-success" type="button" id="pressEnter" ng-click="$ctrl.login()">Login</button>
            <button class="btn btn-warning" type="button" ng-click="$ctrl.cancel()">Cancel</button>
        </div>
    </script>
    

    {{-- <button type="button" class="btn btn-default" ng-click="$ctrl.open()">Open me!</button> --}}

    <div ng-if="!suggested"  class="col-md-1 col-xs-12 addbday" style="width:80px !important; height: 60px !important; margin-top: 30px"  ng-click="$ctrl.open()">
        <img class="thumbs img-rounded" style="width:100px !important; height: 80px !important;"  ng-src="images/addBday.png" alt="pic">
    </div>

    
    <a ng-if="suggested"  ng-click="$ctrl.suggested()"  href=""><i><u class="signin"> HR Signin </u></i></a>
   
    {{-- <div ng-show="$ctrl.selected">Selection from a modal: @{{ $ctrl.selected }}</div> --}}
    <div class="modal-parent">
    </div>
</div>




