<?php
/**
* Template Name:Thank You Page
* Description:This will page return the result
*/
global $wpdb;


$response=$mobile_code_authentication_response;

?>

	<div class="content-element-1">
		<div id="content">
			<?php
			if($response->status=='Invalid'){
			?>
				<div style="padding:10px;marign-bottom:5px;">
					<h3><?php echo $response->message?></h3>
				</div>
			<?php
			}if($response->status=='valid'){
			?>
			<table class="response-tbl">
					<!-- <tr>
						<th> Parameter</th>
						<th> Value</th>
						<th> Status</th>
					</tr> -->
					<tr>
						<td colspan="3" style="text-align:center"><b>Your Mobile Number Verification details</b></td>
					</tr>
					<tr>

						<td>Mobile Number</td>
						<td><?php echo ucwords(str_replace("_"," ",$response->mobile_number))?></td>
						
					</tr>
					<tr>
						<td>
						Status
						</td>
						<td><?php echo ($response->is_mobile_number_verified=='true'?'<img src="'.plugins_url("images/icons/tick_105.png" , __FILE__).'">':'<img src="'.plugins_url("images/icons/close-icon.gif" , __FILE__).'" style="width:19px;height:19px">')?></td>
					</tr>
				</table>
				<div>
					<form action="<?php echo ($response->is_mobile_number_verified=='true'?$redirect_url:$error_url)?>" method="post"  style ="text-align:center">
						<input type="hidden" value='<?php echo json_encode($response)?>' name="response">
						<input type="submit" value="Continue" style="text-align:center;background:rgb(78,159,216) !important;color:#fff !important;">
						<br>
						<br>
					</form>
				</div>			
			<?php
			}
			?>
		</div>
	</div>


