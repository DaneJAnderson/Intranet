<!-- Trigger the modal with a button -->
<!--button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Shiping_Modal">Open Modal</button-->
Shipping: <a class="" data-toggle="modal" data-target="#Shiping_Modal">@{{Product.Shipping_option ? 'Ship to '+Product.Shipping_option.country+' via '+Product.Shipping_option.shipping_company+' cost $'+Product.Shipping_option.price : 'Add shipping option'}}</a>
<!-- Modal -->
<div class="modal fade" id="Shiping_Modal" role="dialog">
	<div class="modal-dialog modal-sm" style="max-width: 50%;">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Shipping Options</h4>
			</div>
			<div class="modal-body">
				<div id="" class="" name="Shipping_Addresses">
					Addresses: 
					<select class="color-quality" ng-model="Product.Address" ng-change="getSelectedAddressObject()">
						<option ng-repeat="Shipping_Address in Addresses" value="@{{Shipping_Address.id}}">@{{Shipping_Address.line_1.substring(0, 20)}}..., @{{Shipping_Address.country}}</option>
					</select>
				</div>
				<br/>
				<style>
					table {
					font-family: arial, sans-serif;
					border-collapse: collapse;
					width: 100%;
					}
					
					td, th {
					border: 1px solid #dddddd;
					text-align: left;
					padding: 8px;
					}
					
					tr:nth-child(even) {
					background-color: #dddddd;
					}
					
					.Selected_shipping_addresses {
						color: #00FF00;
						font-family:"Courier New";
						font-weight:bold;
					}
					
					.Selected_shipping_addresses_icon {
						color: #00FF00;
						font-family:"Courier New";
						font-weight:bold;
					}
					
					.Shipping_option:hover {
						background-color: #FFFF00;
						cursor: pointer;
					}
				</style>
				<table>
				<tr>
					<th>Shipping Company</th>
					<th>Estimated Devlivery Time</th>
					<th>Cost</th>
				</tr>
				<tr ng-repeat="Shipping_option in product.Shipping_options" class="Shipping_option" ng-class="{'Selected_shipping_addresses': Shipping_option.id == Product.Shipping_option.id}" ng-click="Product.Shipping_option = Shipping_option;" ng-if="Shipping_option.country_id==Selected_Shipping_option[0].country_id">
					<td>@{{Shipping_option.shipping_company}}</td>
					<td>Not available</td>
					<td>$@{{Shipping_option.price}}</td>
				</tr>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>