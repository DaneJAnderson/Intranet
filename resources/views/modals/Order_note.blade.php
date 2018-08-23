<!-- START: rder note modal -->
<!-- Trigger the modal with a button -->
<span class="font_style_1">
	note: <a class="font_style_2" data-toggle="modal" data-target="#Order_Note_Modal"> @{{Product.Order_note.length > 0 ? Product.Order_note.substring(0, 20) : 'Add note'}}</a>
</span>
<!-- Modal -->
<div class="modal fade" id="Order_Note_Modal" role="dialog">
	<div class="modal-dialog modal-sm" style="max-width: 50%;">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Shipping Options</h4>
			</div>
			<div class="modal-body">
				<br/>
				<div id="" class="" name="" style="">
					<textarea id="Note" class="" name="" style="" ng-model="Product.Order_note" placeholder="Add a note"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- STOP: Order note model -->