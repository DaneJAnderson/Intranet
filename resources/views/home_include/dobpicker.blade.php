<style>
    .full button span {
      background-color: limegreen;
      border-radius: 32px;
      color: black;
    }
    .partially button span {
      background-color: orange;
      border-radius: 32px;
      color: black;
    }
  </style>
  <div ng-controller="DatepickerPopupDemoCtrl">

    {{-- <div ng-controller="DatepickerPopupDemoCtrl">
        <pre>Selected date is: <em>{{dt | date:'fullDate' }}</em></pre>
        </div> --}}
       
                {{-- class="col-md-6" --}}
                
        <div >
            
          <span class="input-group">          
            <input readonly="true" id="dob" type="text" class="form-control" uib-datepicker-popup="@{{format}}" ng-model="dt" is-open="popup1.opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" alt-input-formats="altInputFormats" />
            <span class="input-group-btn">
              <button type="button" class="btn btn-default" ng-click="open1()"><i class="glyphicon glyphicon-calendar"></i></button>
            </span>
        </span>
        </div>
  
       
  </div>
